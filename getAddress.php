<?php
require_once "connect.php";
$opt = "";
if (!empty($_POST["getAumF"])) {
    $province_id  = $_POST["province_id"];
    $sql = "select * from amphure where province_id = '$province_id'";
    $res = mysqli_query($conn, $sql);
    $opt = '<option value="">-- กรุณาเลือกอำเภอ</option>';
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["amphure_id"] . '">' . $row["amphure_name"] . '</option>';
    }
} else if (!empty($_POST["getTum"])) {
    $sql = "select * from tumbol";
    $res = mysqli_query($conn, $sql);
    $opt = '<option value="">-- กรุณาเลือกตำบล --</option>';
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["amphure_id"] . '">' . $row["tumbol_name"] . '</option>';
    }
} else if (!empty($_POST["getAum"])) {
    $amphure_id = $_POST["getAum"];
    $sql = "select * from amphure where amphure_id = '$amphure_id'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["amphure_id"] . '">' . $row["amphure_name"] . '</option>';
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
