<?php
require_once "connect.php";
header('Content-Type: text/html; charset=utf-8');
session_start();
$student_id = $_SESSION["student_id"];
$infect_date = $_REQUEST["infect_date"];
$status = $_REQUEST["covidInject"];
if (empty($student_id)) {
    header("location: errPage.php?textErr=เกิดข้อผิดพลาดในการบันทึก กรุณาติดต่อเจ้าหน้าที่ 0918325709");
}
// if (!empty($_REQUEST["notOk"])) {
    $covidInject = $_REQUEST["covidInject"];
    $sql="replace into infect (student_id,infect_date) value('$student_id','$infect_date')";
    mysqli_query($conn, $sql);
    $sqlStatus = "insert into stu_status (student_id,student_status) value('$student_id','$status')";
    $resStatus = mysqli_query($conn, $sqlStatus);
    if (mysqli_affected_rows($conn) > 0) {
        $re = $status;
    } else {
        $re = "";
    }
    echo $re;
// } else if (!empty($_REQUEST["ok"])) {
//     $covidInject = $_REQUEST["covidInject"];
//     $sqlStatus = "insert into stu_status (student_id,student_status) value('$student_id','$status')";
//     $resStatus = mysqli_query($conn, $sqlStatus);
//     if (mysqli_affected_rows($conn)) {
//         $re = "ok";
//     } else {
//         $re = "";
//     }
//     echo $re;
// }
