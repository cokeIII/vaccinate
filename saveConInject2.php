<?php
require_once "connect.php";
session_start();
$re = "";
$student_id = $_SESSION["student_id"];
$prefix_name_p = $_POST["prefix_name_p"];
$stu_fname = $_POST["stu_fname"];
$stu_lname = $_POST["stu_lname"];
$age = $_POST["age"];
$people_id = $_POST["people_id"];
$telPar = $_POST["telPar"];
$home_id = $_POST["home_id"];
$moo = $_POST["moo"];
$street = $_POST["street"];
$tumbol = $_POST["tumbol"];
$tumbol_name = $_POST["tumbol_name"];
$amphure_name = $_POST["amphure"];
$province_name = $_POST["province"];
$phone_std = $_POST["telStd"];
$prefix_name_db = $_POST["prefix_name_db"];
$parent_name  = $_POST["parent_th_name"];
$parent_surname = $_POST["parent_th_surname"];
$relevance = $_POST["relevance"];
// signature
date_default_timezone_set("Asia/Bangkok");
$nameDate = date("YmdHis");
$folderPath = "signature/";
$image_parts = explode(";base64,", $_POST['signed']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);

$file = $folderPath . $student_id . "_" . $nameDate . '.' . $image_type;
$stu_signature = $student_id . "_" . $nameDate . '.' . $image_type;
file_put_contents($file, $image_base64);

//
$nationality = $_POST["nationality"];
$birthday = $_POST["birthday"];
$student_group_short_name = $_POST["student_group_short_name"];
$group_no = $_POST["student_group_no"];
$decision = $_POST["decision"];
$noteInject = $_POST["noteInject"];
$parent_id = $_POST["parent_id"];
$telStd = $_POST["telStd"];

$sqlSave = "insert into doc2 (
    student_id,
    prefix_name,
    stu_fname,
    stu_lname,
    age,
    people_id,
    phone_parent,
    home_id,
    moo,
    street,
    tumbol_name,
    amphure_name,
    province_name,
    phone_std,
    prefix_parent,
    parent_name,
    parent_surname,
    relevance,
    signature,
    nationality,
    birthday,
    student_group_short_name,
    group_no,
    decision,
    note,
    status
    ) value (
    '$student_id',  
    '$prefix_name_p',  
    '$stu_fname',  
    '$stu_lname',  
    '$age',  
    '$people_id',  
    '$telPar',  
    '$home_id',  
    '$moo',  
    '$street',  
    '$tumbol_name',  
    '$amphure_name',  
    '$province_name',  
    '$phone_std',  
    '$prefix_name_db',  
    '$parent_name',  
    '$parent_surname',  
    '$relevance',  
    '$stu_signature',  
    '$nationality',  
    '$birthday',  
    '$student_group_short_name',  
    '$group_no',  
    '$decision',  
    '$noteInject',  
    'ส่งข้อมูล'  
    )
";
$resSave = mysqli_query($conn, $sqlSave);
if (mysqli_affected_rows($conn)) {
    $re = "ok";
} else {
    $re = "";
}
echo $re;
//////////////////////////////////////////////
$sql = "update parents set phone = '$telPar' where parent_id = '$parent_id'";
$res = mysqli_query($conn, $sql);

$sqlStd = "update students set 
home_id='$home_id',
moo='$moo',
street = '$street',
tumbol_id = '$tumbol',
phone = '$telStd'
where 
student_id = '$student_id'
";
$resStd = mysqli_query($conn, $sqlStd);

// if ($res && $resStd) {
//     echo "ok";
// } else {
//     echo $sql . "<br>" . $sqlStd;
// }
