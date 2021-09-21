<?php
require_once "connect.php";
session_start();
$parent_id = "";
$re = "";
if (!empty($_POST["parent"])) {
    $parent_id = $_POST["parent"];
}
$student_id = $_SESSION["student_id"];
if (empty($student_id)) {
    header("location: errPage.php?textErr=เกิดข้อผิดพลาดในการบันทึก กรุณาติดต่อเจ้าหน้าที่ 0918325709");
}
$amphure_id = $_POST["amphure"];
$status = $_POST["inject"];
if ($parent_id == "ผู้ให้คำยินยอม") {
    $parent_id = $student_id . "P";
    $prefix_id = $_POST["prefix_id"];
    $parent_th_name = $_POST["parent_th_name"];
    $parent_th_surname = $_POST["parent_th_surname"];
    $relevance = $_POST["relevance"];
    $sqlRe = "replace into parents 
    (parent_id,student_id,parent_th_prefix,parent_th_name,parent_th_surname,relevance)
    values ('$parent_id','$student_id','$prefix_id','$parent_th_name','$parent_th_surname','$relevance')
    ";
    mysqli_query($conn, $sqlRe);
}
$sql = "update students set status = '$status', parent_id = '$parent_id' where student_id = '$student_id'";
$res = mysqli_query($conn, $sql);
$sqlStatus = "insert into stu_status (student_id,student_status) value('$student_id','$status')";
$resStatus = mysqli_query($conn, $sqlStatus);
$sqlLand = "replace into student_land (student_id,amphure_id) values ('$student_id','$amphure_id')";
$resLand = mysqli_query($conn, $sqlLand);
if (mysqli_affected_rows($conn) > 0) {
    $re = "ok";
} else {
    $re = "";
}
echo $re;
