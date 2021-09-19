<?php
require_once "connect.php";
$sql = "select * from doc2";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($res)) {
    if (is_numeric($row["amphure_name"])) {
        $student_id =  $row["student_id"];
        $sqlStudent = "select * from student s
        inner join tumbol t on s.tumbol_id = t.tumbol_id
        inner join amphure a on a.amphure_id = t.amphure_id
        inner join province p on p.province_id = a.province_id
        where student_id = '$student_id'";
        $resStudent = mysqli_query($conn, $sqlStudent);
        $rowStudent = mysqli_fetch_array($resStudent);
        $tumbol_name = $rowStudent["tumbol_name"];
        $amphure_name = $rowStudent["amphure_name"];
        $province_name = $rowStudent["province_name"];
        $sqlUpdate = "update doc2 set 
        tumbol_name = '$tumbol_name',
        amphure_name='$amphure_name',
        province_name='$province_name'
        where student_id = '$student_id'
        ";
        mysqli_query($conn,$sqlUpdate);
    }
}
