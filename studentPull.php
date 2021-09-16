<?php
require_once "connect.php";
require_once "function.php";
$sql = "select 
s.student_id,
s.perfix_id,
s.stu_fname,
s.stu_lname,
s.birthday,
s.gender_id,
s.major_id,
s.group_id,
e.id_card_pic
from student s
inner join enroll e on e.student_id = s.student_id
where e.status = 'พิมพ์แล้ว' and s.status = 0
";
$resCount = mysqli_query($conn, $sql);
$stdCount = mysqli_num_rows($resCount);
$res = mysqli_query($conn, $sql);
$countQuery = 0;
while ($row = mysqli_fetch_array($res)) {

    $student_id = $row["student_id"];
    $perfix_id = $row["perfix_id"];
    $stu_fname = $row["stu_fname"];
    $stu_lname = $row["stu_lname"];
    $gender_id = $row["gender_id"];
    $birthday = $row["birthday"];
    $major_id = $row["major_id"];
    $group_id = $row["group_id"];
    $group_age = calAge($row["birthday"]);
    $id_card_pic = $row["id_card_pic"];

    $sqlStd = "replace into students (
        student_id,
        perfix_id,
        stu_fname,
        stu_lname,
        birthday,
        gender_id,
        major_id,
        group_id,
        group_age,
        id_card_pic,
        status
        ) value (
            '$student_id',
            '$perfix_id',
            '$stu_fname',
            '$stu_lname',
            '$birthday',
            '$gender_id',
            '$major_id',
            '$group_id',
            '$group_age',
            '$id_card_pic',
            ''
        )";

    $resStd = mysqli_query($conn, $sqlStd);
    if ($resStd) {
        $countQuery++;
        if ($stdCount == $countQuery) {
            echo "ok";
        }
    }
}

