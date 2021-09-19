<?php
header('Content-Type: text/html; charset=UTF-8');
require_once "connect.php";
require_once "function.php";
$datalist = array();
if (!empty($_POST["group_id"])) {
    $group_id = $_POST["group_id"];
    $sql = "select *, d.status as docStatus from stu_status ss
    inner join student s on ss.student_id = s.student_id
    inner join doc2 d on d.student_id = ss.student_id
    inner join prefix p on p.prefix_id = s.perfix_id 
    where s.group_id = '$group_id'"; //6320901012
} else {
    $sql = "select *, d.status as docStatus from stu_status ss
    inner join doc2 d on d.student_id = ss.student_id
    inner join student s on ss.student_id = s.student_id
    inner join prefix p on p.prefix_id = s.perfix_id
    ";
}
$datalist["data"][0]["std_id"] = "ไม่มีข้อมูล";
$datalist["data"][0]["std_name"] = "";
$datalist["data"][0]["stu_status"] = "";
$datalist["data"][0]["age"] = "";
$datalist["data"][0]["phone_std"] = "";
$datalist["data"][0]["time_stamp"] = "";
$datalist["data"][0]["status"] = "";
// $datalist["data"][0]["print"] = "";
$datalist["data"][0]["btnPrint"] = "";


$res = mysqli_query($conn, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $datalist["data"][$i]["std_id"] = $row["student_id"];
    $datalist["data"][$i]["std_name"] = $row["prefix_name"] . $row["stu_fname"] . " " . $row["stu_lname"];
    $datalist["data"][$i]["stu_status"] = $row["student_status"];
    $datalist["data"][$i]["age"] = calAgeV2($row["birthday"])[0];
    $datalist["data"][$i]["phone_std"] = $row["phone_std"];
    $datalist["data"][$i]["time_stamp"] = $row["time_stamp"];
    $datalist["data"][$i]["status"] = '<button class="btn ' . ($row["docStatus"] == "ส่งแล้ว" ? "btn-secondary" : "btn-success") . ' updatePrint" stdId="' . $row["student_id"] . '">' . $row["docStatus"] . '</button>';
    // $datalist["data"][$i]["print"] = '<button class="btn btn-success updatePrint" stdId="' . $row["student_id"] . '"><i class="fas fa-clipboard-list"></i></button>';
    if ($row["student_status"] == "ประสงค์จะฉีด") {
        $datalist["data"][$i]["btnPrint"] = '<a href="report1.php?id=' . $row["student_id"] . '" target="_blank"><button class="btn btn-success print" stdId="' . $row["student_id"] . '"><i class="fas fa-print"></i></button></a>';
    } else {
        $datalist["data"][$i]["btnPrint"] = '';
    }
    $i++;
}
echo json_encode($datalist, JSON_UNESCAPED_UNICODE);
