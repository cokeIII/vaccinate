<?php
require_once "connect.php";
session_start();
$student_id = $_SESSION["student_id"];
$telPar = $_POST["telPar"];
$parent_id = $_POST["parent_id"];
$home_id = $_POST["home_id"];
$moo = $_POST["moo"];
$street = $_POST["street"];
$tumbol = $_POST["tumbol"];
$telStd = $_POST["telStd"];

$sql = "update parents set phone = '$telPar' where parent_id = '$parent_id'";
$res = mysqli_query($conn,$sql);

$sqlStd = "update students set 
home_id='$home_id',
moo='$moo',
street = '$street',
tumbol_id = '$tumbol',
phone = '$telStd'
where 
student_id = '$student_id'
";
$resStd = mysqli_query($conn,$sqlStd);

if($res && $resStd){
    echo "ok";
} else {
    echo $sql."<br>".$sqlStd;
}