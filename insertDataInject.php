<?php
require_once "connect.php";
session_start();
$parent_id = $_POST["parent"];
$student_id = $_SESSION["student_id"];
$status = $_POST["inject"];
$inject_date = $_POST["injectDate"];
$needle = $_POST["needle"];
$lotno = $_POST["lotno"];
$hospital_name = $_POST["hospital_name"];
$re = "";
$sqlDel = "delete from history_inject where student_id = '$student_id'";
mysqli_query($conn, $sqlDel);
for ($i = 0; $i < count($inject_date); $i++) {
    $inject_dateData = $inject_date[$i];
    $needleData = $needle[$i];
    $lotnoData = $lotno[$i];
    $hospital_nameData = $hospital_name[$i];
    if (!empty($inject_dateData) && !empty($needleData) && !empty($lotnoData) && !empty($hospital_nameData)) {
        $sql = "insert into history_inject (student_id,inject_date,needle,lot_no,hospital_name)
values($student_id,'$inject_dateData','$needleData','$lotnoData','$hospital_nameData')";
        $res = mysqli_query($conn, $sql);

        if($parent_id == "ผู้ให้คำยินยอม"){
            $parent_id = $student_id."P";
            $prefix_id = $_POST["prefix_id"];
            $parent_th_name = $_POST["parent_th_name"];
            $parent_th_surname = $_POST["parent_th_surname"];
            $relevance = $_POST["relevance"];
            $sqlRe = "replace into parents 
            (parent_id,student_id,parent_th_prefix,parent_th_name,parent_th_surname,relevance)
            values ('$parent_id','$student_id','$prefix_id','$parent_th_name','$parent_th_surname','$relevance')
            ";
            mysqli_query($conn,$sqlRe);
        }
        $sqlUp = "update students set status = 'ฉีดแล้ว', parent_id='$parent_id' where student_id = '$student_id'";
        $resUp = mysqli_query($conn, $sqlUp);
        if ($res && $resUp) {
            $re = "ok";
        } else {
            $re = $sql;
        }
    }
}
echo $re;