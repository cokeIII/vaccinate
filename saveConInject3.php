<?php
require_once "connect.php";
session_start();
header('Content-Type: text/html; charset=utf-8');
$student_id = $_SESSION["student_id"];
$topic[0] = $_POST["1"];
$topic[1] = $_POST["2"];
$topic[2] = $_POST["3"];
$topic[3] = $_POST["4"];
$topic[4] = $_POST["5"];
$topic[5] = $_POST["6"];
$topic[6] = $_POST["7"];
$topic[7] = $_POST["8"];
$topic[8] = $_POST["9"];
$check = "";
for ($i = 0; $i < 9; $i++) {
    $topicData =  $topic[$i];
    $topicC = $i+1;
    $sql = "insert into assessment 
(student_id,topic_id,ass_result) 
value('$student_id','$topicC','$topicData')";
    $res = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        $check = "ok";
    } else {
        $check = "";
    }
}
$sqlPrint = "replace into doc3_ass (student_id,status_print) values('$student_id','ส่งข้อมูล')";
$resPrint = mysqli_query($conn,$sqlPrint);

echo $check;
