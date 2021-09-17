<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    require_once "connect.php";
    if ($_SESSION["group_age"] == 18) {
        header("location: conInject3.php");
    }
    if(!empty($_SESSION["student_id"])){
        $student_id = $_SESSION["student_id"];
    } else if(!empty($_GET["student_id"])){
        $student_id = $_GET["student_id"];
    } else {
        header("location: logout.php");
    }
    
    $sql = "select e.phone as parentPhone,sg.*,t.amphure_id,s.*,pr.*,dp.prefix_name as prefix_name_db,p.prefix_name as prefix_name_p
        from students s,prefix p,parents pr,data_prefix dp,tumbol t,student_group sg,enroll e
        where s.student_id = '$student_id' 
        and p.prefix_id = s.prefix_id
        and pr.parent_th_prefix = dp.prefix_code
        and s.parent_id = pr.parent_id
        and s.tumbol_id = t.tumbol_id
        and sg.student_group_id = s.group_id
        and e.student_id = s.student_id
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
                    <div class="container">
                        <div class="card mt-5">
                            <form method="post" id="conInject2">
                                <input type="hidden" name="parent_id" value="<?php echo $row["parent_id"] ?>">
                                <div class="card-body p-3">
                                    <div class="row  mt-3">
                                        <div class="col-md-8 bg-head-doc rounded h5"> ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์</div>
                                    </div>
                                    <hr>
                                    <!-- <h5>ข้อมูลผู้ปกครอง</h5> -->
                                    <div class="row mt-1">
                                        <div class="col-md-3">
                                            <label>คำนำหน้าชื่อ</label>
                                            <input value="<?php echo $row["prefix_name_db"]; ?>" name="prefix_name_db" type="text" class="form-control mt-1" readonly required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>ชื่อ</label>
                                            <input value="<?php echo $row["parent_th_name"]; ?>" type="text" name="parent_th_name" id="parent_th_name" class="form-control mt-1" placeholder="" readonly required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>สกุล</label>
                                            <input value="<?php echo $row["parent_th_surname"]; ?>" type="text" name="parent_th_surname" id="parent_th_surname" class="form-control mt-1" placeholder="" readonly required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>หมายเลขโทรศัพท์ (ผู้ปกครอง)</label>
                                            <input value="<?php echo $row["parentPhone"]; ?>" type="number" name="telPar" id="telPar" class="form-control mt-1" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-6">
                                            <input type="hidden" name="prefix_name_p" value="<?php echo $row["prefix_name_p"]; ?>">
                                            <input type="hidden" name="stu_fname" value="<?php echo $row["stu_fname"]; ?>">
                                            <input type="hidden" name="stu_lname" value="<?php echo $row["stu_lname"]; ?>">
                                            <label>ผู้ปกครองของ</label>
                                            <input value="<?php echo $row["prefix_name_p"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>" type="text" name="parent_form" id="" class="form-control mt-1" placeholder="" readonly required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>มีความสัมพันธ์เป็น</label>
                                            <input value="<?php echo $row["relevance"]; ?>" type="text" name="relevance" id="" class="form-control mt-1" placeholder="" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-4">
                                            <label>ที่อยู่</label>
                                            <input value="<?php echo $row["home_id"]; ?>" type="text" name="home_id" id="address" class="form-control mt-1" placeholder="" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>หมู่ที่</label>
                                            <input value="<?php echo $row["moo"]; ?>" type="number" name="moo" id="moo" class="form-control mt-1" placeholder="" >
                                        </div>
                                        <div class="col-md-4">
                                            <label>ถนน</label>
                                            <input value="<?php echo $row["street"]; ?>" type="text" name="street" id="street" class="form-control mt-1" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-4">
                                            <label for="">ตำบล</label>
                                            <input type="hidden" name="tumbol_name" value="">
                                            <select name="tumbol" id="tumbol" class="form-control" required>

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
                                    <div class="row mt-1">
                                        <div class="col-md-3">
                                            <label>หมายเลขโทรศัพท์(นักเรียน)</label>
                                            <input type="number" name="telStd" id="telStd" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>ชื่อ-สกุล(นักเรียน)</label>
                                            <input value="<?php echo $row["prefix_name_p"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>" type="text" name="" id="" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label>อายุ</label>
                                            <input value="<?php echo calAgeNumber($row["birthday"]);
                                                            ?>" type="text" name="age" id="age" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>วัน/เดือน/ปีเกิด</label>
                                            <input value="<?php echo $row["birthday"]; ?>" type="text" name="birthday" id="birthday" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-6">
                                            <label>เลขประจำตัว 13 หลัก/หมายเลขหนังสือเดินทาง (กรณีชาวต่างประเทศ)</label>
                                            <input value="<?php echo $row["people_id"]; ?>" type="text" name="people_id" id="people_id" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>สัญชาติ</label>
                                            <input type="text" name="nationality" id="nationality" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
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
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            ทั้งนี้ ข้าพเจ้าได้รับทราบข้อมูลและได้ซักถามรายละเอียดจนเข้าใจเกี่ยวกับวัคซีนไฟเซอร์และอาการไมพึงประสงคของวัคซีนที่
                                            อาจเกิดขึ้น เป็นที่เรียบร้อยแล้ว
                                        </div>
                                    </div>
                                    <div class="row justify-content-center text-center mt-3">
                                        <div class="col-md-8">
                                            <div>ข้าพเจ้า <input type="radio" name="decision" id="" value="1" required> ประสงค์ให้บุตรหลาน ฉีดวัคซีนไฟเซอร์โดยสมัครใจ</div>
                                            <div>ข้าพเจ้า <input type="radio" name="decision" id="" value="0" required> ไม่ประสงค์ให้บุตรหลาน ฉีดวัคซีนไฟเซอร์ สาเหตุ (ถ้ามี) <input type="text" name="noteInject" id=""></div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="signed" name="signed" value="">
                                    <div class="row mt-3">
                                        <div class="d-flex justify-content-center text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div>และรับรองว่าข้อมูลเป็นความจริง</div>
                                                    <label>ลายเซ็น<span class="re_status"></span></label>
                                                    <div id="signatureparent">
                                                        <div id="signature"></div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <button class="btn btn-secondary" id="clear" type="button">ลบลายเซ็น</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-3">
                                        <div class="d-flex justify-content-center text-center">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success" id="btnEnroll">บันทึกข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        let signed = false
        $("#btnEnroll").attr('disabled', true)
        $(document).on('change', "#signatureparent", function() {
            console.log(signed)
            signed = true
            if (signed) {
                $("#btnEnroll").attr('disabled', false)
            }
            $("#signed").val("image/svg+xml;base64," + $("#signatureparent").jSignature('getData', "image/svg+xml;base64")[1])
        })
        $("#signatureparent").jSignature({

            // line color
            color: "black",

            // line width
            lineWidth: 5,

            // width/height of signature pad
            width: 300,
            height: 200,

            // background color
            "background-color": "##AEB4B2"
        });
        $("#clear").click(function() {
            $("#signatureparent").jSignature('reset')
            signed2 = false
            if (!signed || !signed2) {
                $("#btnEnroll").attr('disabled', true)
            }
        })
        let tumbolData = '<?php echo $row["tumbol_id"]; ?>'
        console.log(tumbolData)
        $.ajax({
            type: "POST",
            url: "getAddress.php",
            data: {
                getTum: true
            },
            success: function(result) {
                $("#tumbol").html(result)
                $("#tumbol").select2({
                    width: "100%"
                })
                $("#tumbol").val(tumbolData).trigger("change")
            }
        });
        $(document).on('change', '#tumbol', function() {
            $("#tum_name").val($('option:selected', this).attr('tum_name'))
            $.ajax({
                type: "POST",
                url: "getAddress.php",
                data: {
                    getAum: $('option:selected', this).attr('val')
                },
                success: function(result) {
                    console.log(result)
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
        $(document).on('submit', '#conInject2', function() {
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "saveConInject2.php",
                data: formData,
                success: function(result) {
                    if (result == "ok") {
                        window.location.replace("conInject3.php");
                    }
                }
            });
            return false
        })
    })
</script>