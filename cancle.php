<?php
require_once "connect.php";
$student_id = $_REQUEST["student_id"];
$sqlStatus = "delete from stu_status where student_id = '$student_id'";
$resStatus = mysqli_query($conn,$sqlStatus);
$sqlDoc2 = "delete from doc2 where student_id = '$student_id'";
$resDoc2 = mysqli_query($conn,$sqlDoc2);
$sqlAss = "delete from assessment where student_id = '$student_id'";
$resAss = mysqli_query($conn,$sqlAss);

if($resStatus && $resDoc2 && $resAss){
    echo "ok";
}