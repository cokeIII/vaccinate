<?php
require_once "connect.php";
session_start();
$student_id = $_SESSION["student_id"];
if (!empty($_POST["v1"])) {
    $v1 = $_POST["v1"];
    $sql = "update video set video_1 = '$v1' where student_id = '$student_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "ok";
    }
} else if (!empty($_POST["v2"])) {
    $v2 = $_POST["v2"];
    $sql = "update video set video_2 = '$v2' where student_id = '$student_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "ok";
    }
} else if (!empty($_POST["v3"])) {
    $v3 = $_POST["v3"];
    $sql = "update video set video_3 = '$v3' where student_id = '$student_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "ok";
    }
} else if (!empty($_POST["v4"])) {
    $v4 = $_POST["v4"];
    $sql = "update video set video_4 = '$v4' where student_id = '$student_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "ok";
    }
}
