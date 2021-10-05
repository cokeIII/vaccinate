<?php
// session_start();
// $level=$_SESSION['level'];
$level='642';
// Require composer autoload
date_default_timezone_set("Asia/Bangkok");

require_once 'vendor/autoload.php';
require_once 'vendor/mpdf/mpdf/mpdf.php';
require_once 'connect.php';
require_once "function.php";
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);

header('Content-Type: text/html; charset=utf-8');
// เพิ่ม Font ให้กับ mPDF
$mpdf = new mPDF();
date_default_timezone_set("asia/bangkok");
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    // return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    return "$strDay $strMonthThai $strYear";
}

ob_start(); // Start get HTML code
// $group_id = $_GET["group"];
// $group_id='642010104';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Report 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/ovec-removebg.ico" />
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "thsarabun";
        }

        .txt-h {
            text-align: center;
        }

        .text-size {
            font-size: 20px;
        }

        .text-right {
            text-align: right;
        }
        .text-left {
            text-align: left;
        }

        .content {
            padding: 24px;

        }

        .txt-bold {
            font-weight: bold;
        }

        .pic-h {
            height: 3in;
        }
        th{
            background-color: cornflowerblue;
        }

        td,
        th {
            font-size: 12px;
            text-align: center;
            
        }

        table,
        tr,
        th,
        td {
            /* border: 1px solid black; */
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        .center {
            text-align: center;
        }

        .red {
            background-color: red;
        }

        .mr {
            margin-right: 20px;
        }

        .mt {
            margin-top: 10px;
        }

        body {
            font-size: 20px;
        }

        .bg-color {
            background-color: rgb(139, 176, 243);
        }
        .bg-color2 {
            background-color: rgb(85, 142, 248);
        }

        .color-b {
            background-color: #659af0;
        }

        .color-w {
            color: white;
        }

        .w100 {
            width: 100%;
        }

        .sig-size {
            width: 85px;
            height: 40px;
        }
        .mt-s{
            margin-top: 20px;
        }
    </style>
</head>

<body class="content">
    <h4 style="text-align: center">รายชื่อผู้ประสงค์ฉีดวัคซีน Pfizer สำหรับนักเรียน นักศึกษา ระดับชั้น <?php echo get_level($level) ?></h4>

            <table width="100%" >
                <tr>
                    <td style="text-align: center">ชื่อวิทยาลัย วิทยาลัยเทคนิคชลบุรี </td>
                </tr>
                <tr >
                    <td style="text-align: center">สังกัดอาชีวศึกษาจังหวัด ชลบุรี  ภาค ตะวันออก</td>
                </tr>
                <!-- <tr >
                    <td style="text-align: center">ระดับชั้น <?php echo get_level($level) ?></td>
                </tr> -->

                
            </table>

    <!-- <pagebreak /> -->
    <?php $sql = "SELECT stu_status.`student_id` ,
        concat(prefix.prefix_name ,std.stu_fname,'  ',std.stu_lname) as name,
        std.people_id,std_group.group_name,
        std.birthday,stu_status.`student_status`
        FROM stu_status 
        INNER JOIN students std on std.student_id = stu_status.`student_id`
        INNER JOIN prefix on prefix.prefix_id=std.prefix_id
        INNER JOIN std_group on std_group.group_id=std.group_id
        WHERE stu_status.`student_status`='ประสงค์จะฉีด'
        and substr(std.group_id,1,3) like '$level'
        order by std_group.group_id
        ";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
    ?>
    <!-- <div class="row  mt-3 mt">
        <div class=""><strong>คำชี้แจง</strong> ขอให้ครูที่ปรึกษาประจำชั้นสำรวจข้อมูลการฉีดวัคซีน Pfizer สำหรับนักเรียน/นักศึกษาระดับชั้นปวช.1-3 / ปวส.1-2 แต่ละห้องเรียน </div>
    </div> -->
    <div class="mt jst">
        <table class="table mt-5" border="1"  width="100%">
            <tr>
                <th width="20px" class="center color-b ">ลำดับ</th>
                <th  class="center">รหัสนักเรียน</th>
                <th width="20%" class="center">ชื่อ-นามสกุล</th>
                <th>ชื่อกลุ่ม</th>
                <!-- <th class="center">หมายเลขบัตรประชาชน</th>
                <th class="center">วัน/เดือน/ปีเกิด</th> -->
                <th class="center">อายุ (ปี)</th>
                <th class="center">ความประสงค์รับวัคซีน</th>
                <!-- <th width="" class="center">หมายเหตุ</th> -->
            </tr>
            <?php
            $i = 0;
            $rowcount=mysqli_num_rows($res);
            // echo "c= ".$rowcount;
            while ($row = mysqli_fetch_array($res)) {
                $i++;
                if ($i==1){
                    $arr_std_id="(";
                }
                
                $arr_std_id.= "'".$row['student_id']."'";
                if ($i!=$rowcount){
                    $arr_std_id.=",";
                }else if ($i==$rowcount){
                    $arr_std_id.=")";
                }
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['student_id']?></td>
                    <td class="text-left"><?php echo $row['name']?></td>
                    <td><?php echo $row['group_name']?></td>
                    <!-- <td ><?php echo $row['people_id']?></td>
                    <td ><?php echo $row['birthday']?></td> -->
                    <td ><?php echo calAgeV2($row['birthday'])[0]." ปี ".calAgeV2($row['birthday'])[1]." เดือน"?></td>
                    <td ><?php echo $row['student_status']?></td>
                    <!-- <td></td> -->
                </tr>
            <?php } 
            if ($rowcount==0){
                ?>
                <tr>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <!-- <td> - </td>
                    <td> - </td> -->
                    <td> - </td>
                    <td> - </td>
                    <!-- <td> - </td> -->
                </tr>
                <?php
            }
            // echo $arr_std_id;
            ?>
                <tr class="bg-color">
                    <td colspan="2"> รวม (ผู้รับวัคซีน)</td>
                    <td > <?php echo $i?> คน</td>
                    <td colspan="5"></td>
                </tr>
        <!-- </table>
        <table class="table mt-5" border="1"  width="100%"> -->
            <?php
            // print_r($arr_std_id);
            //     if ($arr_std_id!=''){
            //         $sql2="SELECT std.`student_id` , concat(prefix.prefix_name ,std.stu_fname,' ',std.stu_lname) as name, std.people_id, std.birthday
            //             FROM students std
            //             INNER JOIN prefix on prefix.prefix_id=std.prefix_id 
            //             WHERE std.group_id='$group_id' 
            //             AND std.`student_id` not in $arr_std_id
            //             ";
            //     }else{
            //         $sql2="SELECT std.`student_id` , concat(prefix.prefix_name ,std.stu_fname,' ',std.stu_lname) as name, std.people_id, std.birthday
            //             FROM students std
            //             INNER JOIN prefix on prefix.prefix_id=std.prefix_id 
            //             WHERE std.group_id='$group_id' 
            //             ";
            //     }
            //     // echo $sql2;
            //     $res2 = mysqli_query($conn, $sql2);
            //     $c=0;
            //     while ($row2 = mysqli_fetch_array($res2)) {  
            //         $c++;                  
            // ?>
            <!-- //     <tr>
            //         <td><?php echo $c ?></td>
            //         <td><?php echo $row2['student_id']?></td>
            //         <td class="text-left"><?php echo $row2['name']?></td>
            //         <!-- <td ><?php echo $row2['people_id']?></td>
            //         <td ><?php echo $row2['birthday']?></td> -->
            <!-- //         <td ><?php echo calAgeV2($row2['birthday'])[0]." ปี ".calAgeV2($row2['birthday'])[1]." เดือน"?></td>
            //         <td ><?php echo get_status($row2['student_id'])?></td>
            //         <td></td>
            //     </tr> --> -->
            //     <?php
            //     }
            //     ?>
            <!-- //     <tr class="bg-color">
            //         <td colspan="2"> รวม (ผู้ไม่รับวัคซีน)</td>
            //         <td > <?php echo $c?> คน</td>
            //         <td colspan="5"></td>
            //     </tr>
            //     <tr class="bg-color2">
            //         <td colspan="2"> รวมทั้งหมด</td>
            //         <td > <?php echo $c+$i?> คน</td>
            //         <td colspan="5"></td>
            //     </tr> -->
        </table>
        <!-- <table    width="100%">
            <tr class="text-left">
                <td>หมายเหตุ:</td>
                <td class="text-left">1. หากนักเรียน/นักศึกษาในสถาบันการศึกษาดังกล่าว มีอายุเกิน 18 ปี ให้รับวัคซีนไฟเซอร์ได้พร้อม
        กับนักเรียนร่วมสถานศึกษา</td>
            </tr>
            <tr>
                <td></td>
                <td class="text-left">2. ความประสงค์การได้รับวัคซีนพิจารณาจากเอกสารแสดงความจำนงการฉีดวัคซีนจากผู้ปกครอง</td>
            </tr>
            <tr>
                <td></td>
                <td class="text-left">3. ขอให้เก็บเอกสารฉบับนี้ไว้ ณ สถานศึกษา</td>
            </tr>

        </table> -->
        
         
        
        
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
// $mpdf->AddPage('L');

$mpdf->WriteHTML($html);
// $taget = "pdf/report_".$level.".pdf";
$taget = "pdf/report_level.pdf";
$mpdf->Output($taget);
ob_end_flush();
echo "<script>window.location.href='$taget';</script>";
// exit;

function get_group_detail($gid){
    global $conn;
    $id=$level."%";
    $sql="SELECT grade_name, std_group.group_name,`student_group_no`
    FROM `student_group` 
    INNER JOIN std_group on std_group.group_id=student_group.student_group_id
    WHERE `student_group_id`='$gid' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['grade_name'] .'  '. $row['group_name'] ." กลุ่ม ".del0($row['student_group_no']);
}
//ตัดเลข 0 ถ้าไม่ถึง 10 //=== 08 >> 8
function del0($s){
    if ($s<10){
        $r=substr($s,1);
    }else{
        $r=$s;
    }
    return $r;
}

function get_status($stu_id){
    global $conn;
    $id=$level."%";
    $sql="SELECT `student_status` FROM `stu_status` WHERE `student_id`='$stu_id' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    if ($row['student_status']!=''){
        return $row['student_status'] ;
    }else{
        return '<font color="red">ไม่บันทึกข้อมูล</font>';
    }
    
}

function get_level($id){
    if($id=='642'){
        return 'ปวช.1';
    }else if($id=='632'){
        return 'ปวช.2';
    }else if($id=='622'){
        return 'ปวช.3';
    }else if($id=='643'){
        return 'ปวส.1';
    }else if($id=='633'){
        return 'ปวส.2';
    }else if($id=='612'){
        return 'ปวช.ตกค้าง';
    }else if(id=='623'){
        return 'ปวส.3 และตกค้าง';
    }
    
}
?>