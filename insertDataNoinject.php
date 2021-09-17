<?php
require_once "connect.php";
session_start();
$parent_id = $_POST["parent"];
$student_id = $_SESSION["student_id"];
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
$res = mysqli_query($conn,$sql);

if($res){
    echo "ok";
}
