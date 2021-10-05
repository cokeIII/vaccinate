<?php
require_once "connect.php";
session_start();
header('Content-Type: text/html; charset=utf-8');
$student_id = $_SESSION["student_id"];
// signature
date_default_timezone_set("Asia/Bangkok");
$nameDate = date("YmdHis");
$folderPath = "signatureCon/";
$image_parts = explode(";base64,", $_REQUEST['signed']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);

$file = $folderPath . $student_id . "_" . $nameDate . '.' ."svg";
$stu_signature = $student_id . "_" . $nameDate . '.' . "svg";
file_put_contents($file, $image_base64);

//
$sql = "replace into confirm (student_id,signature) value('$student_id','$stu_signature')";
$res = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn) > 0) {
    echo "ok";
} else {
    
}