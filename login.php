<?php
require_once "connect.php";
require_once "function.php";
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
header('Content-Type: text/html; charset=UTF-8');
checkStd($username);
if ($username == "admin" && $password == "12345678") {
    $_SESSION["username"] = "admin";
    $_SESSION["status"] = "admin";
    header("location: manageData.php");
} else if ($password == "advisor") {
    $sql = "select * from people where people_id = '$username'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $row = mysqli_fetch_array($res);
        $_SESSION['teacher_id'] = $row["people_id"];
        $_SESSION["status"] = "teacher";
        header("location: show_superviser.php");
    } else {
        header("location: errPage.php?textErr=ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง กรุณาเข้าสู่ระบบใหม่อีกครั้ง <a href='index.php'>เข้าสู่ระบบ<a/>");
    }
} else if ($password == "officers") {
    $sql = "select * from people where people_id = '$username'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $row = mysqli_fetch_array($res);
        $_SESSION['officer_id'] = $row["people_id"];
        $_SESSION["status"] = "officer";
        header("location: listPrint.php");
    } else {
        header("location: errPage.php?textErr=ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง กรุณาเข้าสู่ระบบใหม่อีกครั้ง <a href='index.php'>เข้าสู่ระบบ<a/>");
    }
} else {
    $sql = "select s.*,p.* from students s,prefix p
     where s.student_id = '$username ' and s.birthday = '$password' and p.prefix_id  = s.prefix_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $rowcount = mysqli_num_rows($res);
    if ($rowcount > 0) {
        $sqlCheck = "select * from stu_status where student_id = '$username'";
        $resCheck = mysqli_query($conn, $sqlCheck);
        $rowcountCheck = mysqli_num_rows($resCheck);

        $_SESSION["student_id"] = $row["student_id"];
        $_SESSION["prefix_name"] = $row["prefix_name"];
        $_SESSION["stu_fname"] = $row["stu_fname"];
        $_SESSION["stu_lname"] = $row["stu_lname"];
        $_SESSION["birthday"] = $row["birthday"];
        $_SESSION["gender_id"] = $row["gender_id"];
        $_SESSION["group_age"] = $row["group_age"];
        $_SESSION["status"] = "student";
        if ($rowcountCheck <= 0) {
            if (!cVideo($row["student_id"])) {
                insertVideo($row["student_id"]);
                header("location: video2.php");
            } else {
                header("location: conInjectData.php");
            }
        } else {
            if (!cVideo($row["student_id"])) {
                insertVideo($row["student_id"]);
                header("location: video2.php");
            } else {
                header("location: listVaccine.php");
            }
        }
        // header("location: fix.php");
    } else {
        header("location: errPage.php?textErr=ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง กรุณาเข้าสู่ระบบใหม่อีกครั้ง <a href='index.php'>เข้าสู่ระบบ<a/>");
    }
}
