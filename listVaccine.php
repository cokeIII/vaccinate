<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    require_once "connect.php";
    $student_id = $_SESSION["student_id"];
    $sql_status = "select * from stu_status where student_id = '$student_id'";
    $res_status = mysqli_query($conn, $sql_status);
    $row_status = mysqli_fetch_array($res_status);
    $ageArr = calAgeV2($_SESSION["birthday"]);
    ?>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <?php //require_once "menuSidebar.php"; 
        ?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <?php require_once "menuTop.php"; ?>
            <!-- Page content-->
            <div class="container-fluid">
                <div id="login">
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5>รายการที่บันทึกไว้ (ตรวจสอบข้อมูลว่าถูกต้องหรือไม่ ถ้าไม่ถูกสามารถกดยกเลิกและบันทึกลงใหม่ได้)</h5>
                                <hr>
                                <!-- justify-content-center -->
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="text-content"><strong>รหัสประจำตัวนักเรียน/นักศึกษา : </strong> <?php echo $student_id; ?></div>
                                        <!-- <div class="text-content"><strong>ชื่อ - สกุล: </strong> <?php //echo $_SESSION["prefix_name"] . $_SESSION["stu_fname"] . " " . $_SESSION["stu_lname"]; 
                                                                                                        ?></div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <strong>สถานะที่ลงทะเบียน : </strong><?php echo $row_status["student_status"]; ?>
                                    </div>
                                </div>
                                <hr>
                                <?php if ($row_status["student_status"] == "ประสงค์จะฉีด" && $ageArr[0] < 18) {
                                    $sql_doc2 = "select * from doc2 where student_id = '$student_id'";
                                    $res_doc2 = mysqli_query($conn, $sql_doc2);
                                    $row_doc2 = mysqli_fetch_array($res_doc2); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์</strong>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>หมายเลขโทรศัพท์(นักเรียน/นักศึกษา)</label> <input class="form-control" type="text" value="<?php echo $row_doc2["phone_std"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label>ชื่อ - นามสกุล (นักเรียน/นักศึกษา)</label> <input class="form-control" type="text" value="<?php echo $row_doc2["prefix_name"] . $row_doc2["stu_fname"] . " " . $row_doc2["stu_lname"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>หมายเลขโทรศัพท์(ผู้ปกครอง)</label> <input class="form-control" type="text" value="<?php echo $row_doc2["phone_parent"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>ชื่อ - นามสกุล (ผู้ปกครอง)</label> <input class="form-control" type="text" value="<?php echo $row_doc2["prefix_parent"] . $row_doc2["parent_name"] . " " . $row_doc2["parent_surname"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>มีความสัมพันธ์เป็น</label> <input class="form-control" type="text" value="<?php echo $row_doc2["relevance"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>ที่อยู่</label> <input class="form-control" type="text" value="<?php echo $row_doc2["home_id"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>หมู่ที่</label> <input class="form-control" type="text" value="<?php echo $row_doc2["moo"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>ถนน</label> <input class="form-control" type="text" value="<?php echo $row_doc2["street"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>ตำบล</label> <input class="form-control" type="text" value="<?php echo $row_doc2["tumbol_name"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>อำเภอ</label> <input class="form-control" type="text" value="<?php echo $row_doc2["amphure_name"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>จังหวัด</label> <input class="form-control" type="text" value="<?php echo $row_doc2["province_name"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>อายุ</label> <input class="form-control" type="text" value="<?php echo $row_doc2["age"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>วัน/เดือน/ปีเกิด</label> <input class="form-control" type="text" value="<?php echo $row_doc2["birthday"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>เลขประจำตัว 13 หลัก/หมายเลขหนังสือเดินทาง (กรณีชาวต่างประเทศ)</label>
                                                <input class="form-control" type="text" value="<?php echo $row_doc2["people_id"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>สัญชาติ</label>
                                                <input class="form-control" type="text" value="<?php echo $row_doc2["nationality"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>ชั้น/ปี</label>
                                                <input class="form-control" type="text" value="<?php echo $row_doc2["student_group_short_name"]; ?>" readonly>
                                            </div>
                                            <div class="col-md-1">
                                                <label>ห้อง</label>
                                                <input class="form-control" type="text" value="<?php echo $row_doc2["group_no"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <hr>
                                <div class="row">
                                    <!-- <a href="cancle.php?student_id=<?php //echo $student_id; 
                                                                        ?>"></a> -->
                                    <div class="col-md-12">
                                        <button class="btn btn-danger " id="btnCancle">ยกเลิกรายการ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#btnCancle").click(function() {
            if (confirm("คุณต้องการจะยกเลิก? ข้อมูลของคุณจะถูกลบจากระบบนี้")) {
                $.ajax({
                    type: "POST",
                    url: "cancle.php",
                    data: {
                        student_id: '<?php echo $student_id; ?>'
                    },
                    success: function(result) {
                        if (result == "ok") {
                            window.location.replace("conInjectData.php");
                        }
                    }
                });
            }
        })
    })
</script>