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
d.home_id as home_idD,
ss.student_id as idS
from stu_status ss
    inner join student s on ss.student_id = s.student_id
    left join doc2 d on d.student_id = ss.student_id
    left join student_group pp on pp.student_group_id = s.group_id
    left join people pe on pe.people_id = pp.teacher_id1
    inner join std_group sg on sg.group_id = s.group_id
    inner join prefix p on s.perfix_id = p.prefix_id
    inner join tumbol t on s.tumbol_id = t.tumbol_id
    inner join amphure a on t.amphure_id = a.amphure_id
    inner join province pv on a.province_id = pv.province_id
    where ss.student_status = 'ไม่ประสงค์ฉีด' or ss.student_status = 'ได้รับเชื้อไม่เกิน3เดือน'
    order by  pp.major_name,grade_name,sg.group_id
    ";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
?>
<style>
    .center {
        text-align: center;
    }

    .bg {
        background-color: #83d1f2;
    }
</style>
<table class="table" style="width:100%" border='1'>
    <tr>
        <th>รายชื่อนักศึกษาที่ไม่ได้ฉีดวัคซีน <?php echo "(".$count."คน)";?></th>
    </tr>
    </thead>
    <tbody>
        <?php
        $major_name = "";
        $grade_name = "";
        $group_name = "";
        $counter = 1;
        
        while ($row = mysqli_fetch_array($res)) {
        ?>
            <?php if ($major_name != $row["major_name"]) {
                $major_name =  $row["major_name"] ?>
                <tr>
                    <td class="bg">แผนกวิชา<?php echo $major_name; ?></td>
                </tr>
            <?php } ?>
            <?php if ($grade_name != $row["grade_name"]) {
                $grade_name =  $row["grade_name"] ?>
                <tr>
                    <td><strong><?php echo $row["grade_name"]; ?></strong></td>
                </tr>
            <?php } ?>
            <?php 
            if ($group_name != $row["group_name"]) {$i = 0;
                $group_name =  $row["group_name"] ?>
                <tr>
                    <td><strong><?php echo $row["group_name"]; ?></strong></td>
                </tr>

            <?php } ?>
            <tr>
                <td><?php echo ++$i . ". " . $row["prefix_name"] . $row["stu_fnameD"] . " " . $row["stu_lnameD"]; ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7"></td>
        </tr>
    </tbody>
</table>