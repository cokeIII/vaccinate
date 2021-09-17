<?php
header('Content-Type: text/html; charset=UTF-8');
require_once "connect.php";
$opt = "";
if (!empty($_POST["getAumF"])) {
    $province_id  = $_POST["getAumF"];
    $sql = "select * from amphure where province_id = '$province_id'";
    $res = mysqli_query($conn, $sql);
    $opt = '<option value="">-- กรุณาเลือกอำเภอ --</option>';
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["amphure_id"] . '">' . $row["amphure_name"] . '</option>';
    }
} else if (!empty($_POST["getTum"])) {
    $sql = "select * from tumbol t,amphure a where t.amphure_id = a.amphure_id";
    $res = mysqli_query($conn, $sql);
    $opt = '<option value="">-- กรุณาเลือกตำบล --</option>';
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option val="'.$row["amphure_id"].'" tum_name="'.$row["tumbol_name"].'" value="' . $row["tumbol_id"] . '">' . $row["tumbol_name"]."(อ.".$row["amphure_name"].")". '</option>';
    }
} else if (!empty($_POST["getAum"])) {
    $amphure_id = $_POST["getAum"];
    $sql = "select * from amphure where amphure_id = '$amphure_id'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["province_id"] . '">' . $row["amphure_name"] . '</option>';
    }
} else if (!empty($_POST["getPro"])) {
    $province_id = $_POST["getPro"];
    $sql = "select * from province where province_id = '$province_id'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["province_id"] . '">' . $row["province_name"] . '</option>';
    }
}

echo $opt;
