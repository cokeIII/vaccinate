<?php
require_once "connect.php";
$student_id = $_POST["student_id"];
$status = $_POST["status"];
if($status == "พิมพ์แล้ว"){
    $status = "ส่งข้อมูล";
} else {
    $status = "พิมพ์แล้ว";
}
$sql = "update doc2 set status = '$status' where student_id = '$student_id'";
$res = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn) > 0){
    echo "ok";
}