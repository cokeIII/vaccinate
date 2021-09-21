<?php
// Require composer autoload
date_default_timezone_set("Asia/Bangkok");

require_once 'vendor/autoload.php';
require_once 'vendor/mpdf/mpdf/mpdf.php';
require_once 'connect.php';
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);

header('Content-Type: text/html; charset=utf-8');
// เพิ่ม Font ให้กับ mPDF
$mpdf = new mPDF();
date_default_timezone_set("asia/bangkok");
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate));
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
function DateEng($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthThai = $strMonthCut[$strMonth];
    // return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    return "$strDay $strMonthThai " . ($strYear - 543);
}
ob_start(); // Start get HTML code
$student_id = $_GET["id"];
$bDate = $_GET["bDate"];
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

        .content {
            padding: 24px;

        }

        .txt-bold {
            font-weight: bold;
        }

        .pic-h {
            height: 3in;
        }

        td,
        th {
            font-size: 20px;
            text-align: left;
        }

        table

        /* tr,
        th,
        td  */
            {
            border: 1px solid black;
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
            background-color: #05409e;
        }

        .color-b {
            background-color: #659af0;
        }

        .font-h {
            color: white;
            font-size: 24px;
        }

        .w100 {
            width: 100%;
        }

        .sig-size {
            width: 85px;
            height: 40px;
        }

        .mt-s {
            margin-top: 50px;
        }

        .box-h {
            background-color: #3ca358;
            color: white;
        }
        .tb-h-color{
            background-color: #a2caeb;
        }
    </style>
</head>
<?php
// test
$student_id = $_GET["id"];
$bDate = $_GET["bDate"];
$sql = "select * from 
student s
inner join prefix p on s.perfix_id = p.prefix_id
inner join tumbol t on s.tumbol_id = t.tumbol_id
inner join amphure a on a.amphure_id = t.amphure_id
inner join province pv on pv.province_id = a.province_id 
where s.student_id = '$student_id'
";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
?>

<body class="content">
    <table width="100%" class="">
        <tr class="box-h">
            <td> <img src="img/Public_Health_of_Thailand.png" alt="" width="64" height="64">
            </td>
            <td class="font-h"><strong>เอกสารการได้รับวัคซีนโควิด 19</strong> </td>
        </tr>
        <tr>
            <td colspan="2">
                ชื่อ-นามสกุล <?php echo $row["prefix_name"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                เพศ <?php echo ($row["gender_id"] == 1 ? "ชาย" : "หญิง"); ?>
            </td>
            <td>
                วัน/เดือน/ปีเกิด <?php echo DateThai($row["birthday"]); ?>
            </td>
        </tr>
        <tr>
            <!-- <td colspan="2">
                Sex <?php //echo ($row["gender_id"] == 1 ? "MALE" : "FEMALE"); 
                    ?>
            </td>
            <td>
                วัน/เดือน/ปีเกิด <?php //echo DateEng($row["birthday"]); 
                                    ?>
            </td> -->
        </tr>
        <tr>
            <td>
                หมายเลขบัตรประชาชน <?php echo $row["people_id"]; ?>
            </td>
            <td>
                ที่อยู่ <?php echo $row["home_id"] . " หมู่ " . $row["moo"] . " ต." . $row["tumbol_name"] . " อ. " . $row["amphure_name"] . " จ. " . $row["province_name"] ?>
            </td>
        </tr>
        <!-- <tr>
            <td>
                ID Card Number <?php //echo $row["people_id"]; 
                                ?>
            </td>
        </tr> -->
    </table>
    <table class="mt" width="100%">
        <tr class="tb-h-color">
            <th>
                เข็มที่
            </th>
            <th>
                ชื่อวัคซีน
            </th>
            <th>
                วันที่ได้รับวัคซีน
            </th>
            <th>
                Lot No.
            </th>
            <th>
                โรงพยาบาล
            </th>
        </tr>
        <?php
        $sqlIn = "select * from history_inject where student_id = '$student_id'";
        $resIn = mysqli_query($conn, $sqlIn);
        while ($rowIn = mysqli_fetch_array($resIn)) {
        ?>
            <tr>
                <td><?php echo $rowIn["needle"]; ?></td>
                <td><?php echo $rowIn["vaccine_name"]; ?></td>
                <td><?php echo $rowIn["inject_date"]; ?></td>
                <td><?php echo $rowIn["lot_no"]; ?></td>
                <td><?php echo $rowIn["hospital_name"]; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
// $mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$taget = "pdf/report1.pdf";
$mpdf->Output($taget);
ob_end_flush();
echo "<script>window.location.href='$taget';</script>";
exit;
?>