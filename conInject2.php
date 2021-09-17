<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    require_once "connect.php";
    $student_id = $_SESSION["student_id"];
    $sql = "select sg.*,t.amphure_id,s.*,pr.*,dp.prefix_name as prefix_name_db,p.prefix_name as prefix_name_p
        from students s,prefix p,parents pr,data_prefix dp,tumbol t,student_group sg
        where s.student_id = '$student_id' 
        and p.prefix_id = s.prefix_id
        and pr.parent_th_prefix = dp.prefix_code
        and s.parent_id = pr.parent_id
        and s.tumbol_id = t.tumbol_id
        and sg.student_group_id = s.group_id
        ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
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
                    <h3 class="text-center text-white pt-5">Login form</h3>
                    <div class="container">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row  mt-3">
                                    <div class="col-md-8 bg-head-doc rounded h5"> ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์</div>
                                </div>
                                <hr>
                                <!-- <h5>ข้อมูลผู้ปกครอง</h5> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>คำนำหน้าชื่อ</label>
                                        <input value="<?php echo $row["prefix_name_db"]; ?>" type="text" class="form-control mt-1" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>ชื่อ</label>
                                        <input value="<?php echo $row["parent_th_name"]; ?>" type="text" name="parent_th_name" id="parent_th_name" class="form-control mt-1" placeholder="" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>สกุล</label>
                                        <input value="<?php echo $row["parent_th_surname"]; ?>" type="text" name="parent_th_surname" id="parent_th_surname" class="form-control mt-1" placeholder="" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>หมายเลขโทรศัพท์ (ผู้ปกครอง)</label>
                                        <input value="" type="number" name="telPar" id="telPar" class="form-control mt-1" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ผู้ปกครองของ</label>
                                        <input value="<?php echo $row["prefix_name_p"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>" type="text" name="parent_form" id="" class="form-control mt-1" placeholder="" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>มีความสัมพันธ์เป็น</label>
                                        <input value="<?php echo $row["relevance"]; ?>" type="text" name="relevance_form" id="" class="form-control mt-1" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>ที่อยู่</label>
                                        <input value="<?php echo $row["home_id"]; ?>" type="text" name="address" id="address" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label>หมู่ที่</label>
                                        <input value="<?php echo $row["moo"]; ?>" type="number" name="moo" id="moo" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label>ถนน</label>
                                        <input value="<?php echo $row["street"]; ?>" type="text" name="road" id="road" class="form-control mt-1" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">ตำบล</label>
                                        <select name="tumbol" id="tumbol" class="form-control">

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">อำเภอ</label>
                                        <select name="amphure" id="amphure" readonly class="form-control"></select>
                                        <!-- <input type="text" name="amphure" id="amphure" class="form-control" readonly> -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">จังหวัด</label>
                                        <select name="province" id="province" readonly class="form-control"></select>
                                        <!-- <input type="text" name="province" id="province" class="form-control" readonly> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>หมายเลขโทรศัพท์(นักเรียน)</label>
                                        <input type="number" name="telStd" id="telStd" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>ชื่อ-สกุล(นักเรียน)</label>
                                        <input value="<?php echo $row["prefix_name_p"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>" type="text" name="" id="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label>อายุ</label>
                                        <input value="<?php echo calAgeNumber($row["birthday"]); ?>" type="text" name="" id="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>วัน/เดือน/ปีเกิด</label>
                                        <input value="<?php echo $row["birthday"]; ?>" type="text" name="" id="" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>เลขประจำตัว 13 หลัก/หมายเลขหนังสือเดินทาง (กรณีชาวต่างประเทศ)</label>
                                        <input value="<?php echo $row["people_id"]; ?>" type="text" name="" id="" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>สัญชาติ</label>
                                        <input type="text" name="nationality" id="nationality" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ชื่อสถานศึกษา</label>
                                        <input value="วิทยาลัยเทคนิคชลบุรี" type="text" name="school" id="school" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>ชั้น/ปี</label>
                                        <input value="<?php echo $row["student_group_short_name"]; ?>" type="text" name="student_group_short_name" id="student_group_short_name" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>ห้อง</label>
                                        <input value="<?php echo $row["student_group_no"]; ?>" type="text" name="student_group_no" id="student_group_no" class="form-control" readonly>
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
        let tumbolData = '<?php echo $row["amphure_id"]; ?>'
        console.log(tumbolData)
        $.ajax({
            type: "POST",
            url: "getAddress.php",
            data: {
                getTum: true
            },
            success: function(result) {
                $("#tumbol").html(result)
                $("#tumbol").select2()
                $("#tumbol").val(tumbolData).trigger("change")
            }
        });
        $(document).on('change', '#tumbol', function() {
            $.ajax({
                type: "POST",
                url: "getAddress.php",
                data: {
                    getAum: $("#tumbol").val()
                },
                success: function(result) {
                    // console.log(result)
                    $("#amphure").html(result)
                    $.ajax({
                        type: "POST",
                        url: "getAddress.php",
                        data: {
                            getPro: $("#amphure").val()
                        },
                        success: function(result) {
                            // console.log(result)
                            $("#province").html(result)
                        }
                    });
                }
            });
        })
    })
</script>