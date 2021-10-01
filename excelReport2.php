<?php
require_once "connect.php";
require_once "function.php";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
$sql = "select *,
s.stu_fname as stu_fnameD,
s.stu_lname as stu_lnameD,
s.people_id as people_idD,
s.birthday as birthdayD,
d.tumbol_name as tumbol_nameD,
d.amphure_name as amphure_nameD,
d.province_name as province_nameD,
d.moo as mooD,
d.home_id as home_idD
from stu_status ss
    inner join student s on ss.student_id = s.student_id
    left join doc2 d on d.student_id = ss.student_id
    inner join prefix p on s.perfix_id = p.prefix_id
    inner join tumbol t on s.tumbol_id = t.tumbol_id
    inner join amphure a on t.amphure_id = a.amphure_id
    inner join province pv on a.province_id = pv.province_id
    ";
$res = mysqli_query($conn, $sql);
?>
<style>
    .center {
        text-align: center;
    }
</style>
<table class="table" style="width:100%" border='1'>
    <tr>
        <th>ที่</th>
        <th>คำนำหน้าชื่อ</th>
        <th>ชื่อ</th>
        <th>สกุล</th>
        <th>เพศ</th>
        <th>วันเกิด</th>
        <th>ID (เลข13 หลักบัตรประชาชน)</th>
        <th>เบอร์โทรศัพท์มือถือ</th>
        <th>ประสงค์รับวัคซีน</th>
        <th>จังหวัด</th>
        <th>อำเภอ</th>
        <th>ตำบล</th>
        <th>หมู่ที่</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        while ($row = mysqli_fetch_array($res)) {
        ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $row["prefix_name"]; ?></td>
                <td><?php echo $row["stu_fnameD"]; ?></td>
                <td><?php echo $row["stu_lnameD"]; ?></td>
                <td><?php echo ($row["gender_id"] == 1 ? "ชาย" : "หญิง"); ?></td>
                <td><?php echo $row["birthdayD"]; ?></td>
                <td><?php echo $row["people_idD"]; ?></td>
                <td><?php echo "A".(empty($row["phone_std"])? (empty($row["par_tell"])?(empty($row["fat_tell"])?$row["mot_tell"]:$row["fat_tell"]):$row["par_tell"]) : $row["phone_std"]); ?></td>
                <td>
                    <?php echo ($row["student_status"] == "ประสงค์จะฉีด" ? "รับ" : ($row["student_status"] == "ไม่ประสงค์จะฉีด"?"ไม่รับ":$row["student_status"])); ?>
                </td>
                <td>
                    <?php echo (empty($row["province_nameD"])?$row["province_name"]:$row["province_nameD"]); ?>
                </td>
                <td>
                    <?php echo (empty($row["amphure_nameD"])?$row["amphure_name"]:$row["amphure_nameD"]); ?>
                </td>
                <td>
                    <?php echo (empty($row["tumbol_nameD"])?$row["tumbol_name"]:$row["tumbol_nameD"]); ?>
                </td>
                <td>
                    <?php echo (empty($row["mooD"])?$row["moo"]:$row["mooD"]); ?>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7"></td>
        </tr>
    </tbody>
</table>