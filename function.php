<?php
require_once "connect.php";

function calAge($birthday)
{
    $birthDate = explode("/", $birthday);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2] - 543))) > date("md")
        ? ((date("Y") - ($birthDate[2] - 543)) - 1)
        : (date("Y") - ($birthDate[2] - 543)));
    $groupAge = "";
    if ($age >= 12 && $age <= 17) {
        $groupAge = "12-18";
    } else if ($age >= 18) {
        $groupAge = "18";
    } else if ($age < 12) {
        $groupAge = "<12";
    }
    return  $groupAge;
}

function calAgeNumber($birthday)
{
    $birthDate = explode("/", $birthday);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2] - 543))) > date("md")
        ? ((date("Y") - ($birthDate[2] - 543)) - 1)
        : (date("Y") - ($birthDate[2] - 543)));
    return  $age;
}

function calAgeV2($birthday)
{
    $birthDate = explode("/", $birthday);
    $bDate = $birthDate[0] . "-" . $birthDate[1] . "-" . ($birthDate[2] - 543);
    $today = date("Y-m-d");
    // Calculate the time difference between the two dates
    $diff = date_diff(date_create($bDate), date_create($today));
    // Get the age in years, months and days
    return [$diff->format('%y'), $diff->format('%m'), $diff->format('%d')];
}

function cVideo($student_id)
{
    global $conn;
    $sql = "select * from video where student_id = '$student_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row["video_1"] == 1 && $row["video_2"] == 1 && $row["video_3"] == 1 && $row["video_4"] == 1) {
        return 1;
    }
    return 0;
}

function insertVideo($student_id)
{
    global $conn;
    $sqlCount = "select count(student_id) as stdCount from video where student_id = '$student_id'";
    $resCount = mysqli_query($conn, $sqlCount);
    $rowCount = mysqli_fetch_array($resCount);
    if ($rowCount["stdCount"] <= 0) {
        $sql = "insert into video (
        student_id,
        video_1,
        video_2,
        video_3,
        video_4) values(
            '$student_id',
            '0',
            '0',
            '0',
            '0'
        )";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            return true;
        }
    }
    return false;
}
