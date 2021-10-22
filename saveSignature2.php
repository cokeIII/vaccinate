<?php
require_once "connect.php";
session_start();
header('Content-Type: text/html; charset=utf-8');
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$student_id = $_SESSION["student_id"];
// signature
date_default_timezone_set("Asia/Bangkok");
$nameDate = date("YmdHis");
$folderPath = "signatureCon/";
$image_parts = explode(";base64,", $_REQUEST['signed']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$status_confirm2 = $_POST["status_confirm2"];
$note = $_POST["note"];

$file = $folderPath . $student_id . "_" . $nameDate . '.' . "svg";
$stu_signature = $student_id . "_" . $nameDate . '.' . "svg";
file_put_contents($file, $image_base64);

//
if (empty($_POST["edit"])) {
    $sqlC = "select * from confirm where student_id = '$student_id'";
    $resC = mysqli_query($conn, $sqlC);
    $rowC = mysqli_num_rows($resC);
    if ($rowC > 0) {
        $sql = "update confirm set signature2='$stu_signature',status_confirm2='$status_confirm2',note='$note' where student_id = '$student_id'";
    } else {
        $sql = "replace into confirm (student_id,signature2,status_confirm2,note) value('$student_id','$stu_signature','$status_confirm2','$note')";
    }
} else {
    $sql = "update confirm set signature2='$stu_signature' where student_id = '$student_id'";
}

$res = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    echo "ok";
} else {
    echo $sql;
}
