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
s.home_id,
s.moo,
s.street,
s.tumbol_id,
e.id_card_pic
from student s
inner join enroll e on e.student_id = s.student_id
where e.status = 'พิมพ์แล้ว' and s.status = 0 and s.group_id != '632090103' and s.group_id !='632090104'
and s.group_id not LIKE '62202%'
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
    $home_id = $row["home_id"];
    $moo = $row["moo"];
    $street = $row["street"];
    $tumbol_id = $row["tumbol_id"];
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
        status,
        home_id,
        moo,
        street,
        tumbol_id
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
            '',
            '$home_id',
            '$moo',
            '$street',
            '$tumbol_id'

        )";

    $resStd = mysqli_query($conn, $sqlStd);
    if ($resStd) {
        $countQuery++;
        if ($stdCount == $countQuery) {
            echo "ok";
        }
    }
}

