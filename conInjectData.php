<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    $student_id = $_SESSION["student_id"];
    $ageArr = calAgeV2($_SESSION["birthday"]);
    ?>
</head>
<style>
    .text-content {
        font-size: 18px;
    }
</style>

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
            <div class="container">
                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="text-center">ข้อมูลผู้ให้คำยินยอม</h3>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="text-content"><strong>รหัสประจำตัวนักเรียน/นักศึกษา : </strong> <?php echo $student_id; ?></div>
                                <div class="text-content"><strong>ชื่อ - สกุล: </strong> <?php echo $_SESSION["prefix_name"] . $_SESSION["stu_fname"] . " " . $_SESSION["stu_lname"]; ?></div>
                                <div class="text-content"><strong>อายุ : </strong> <?php echo  $ageArr[0] . " ปี " . $ageArr[1] . " เดือน" . $ageArr[2] . " วัน"; ?></div>
                                <div class="text-content"><strong>วัน/เดือน/ปีเกิด : </strong> <?php echo $_SESSION["birthday"]; ?></div>
                            </div>
                        </div>
                        <?php $topic = 0;
                        if (calAgeNumber($_SESSION["birthday"]) < 18) { ?>
                            <div class="row justify-content-center mt-2">
                                <div class="col-md-6 text-content">
                                    <form action="confirm.php" method="post" id="confirm">
                                        <?php
                                        $sql = "select * from parents pr,data_prefix p where student_id = '$student_id' and pr.parent_th_prefix = p.prefix_code order by relevance";
                                        $res = mysqli_query($conn, $sql);
                                        ?>
                                        <div class="card border border-dark">
                                            <div class="card-body">
                                                <strong> <?php echo ++$topic . ". "; ?> ข้อมูลผู้ให้คำยินยอม (กรุณาเลือกผู้ให้คำยินยอมกรณีอายุไม่ถึง 18 ปีบริบูรณ์) <span class="text-danger">*</span></strong>
                                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                                    <div>
                                                        <input type="radio" name="parent" class="parent" value="<?php echo $row["parent_id"]; ?>" required> <?php echo $row["relevance"]; ?> ชื่อ <?php echo $row["prefix_name"] . $row["parent_th_name"] . " " . $row["parent_th_surname"]; ?>
                                                    </div>
                                                <?php } ?>

                                                <div>
                                                    <input type="radio" name="parent" id="parentOtherR" value="ผู้ให้คำยินยอม"> ผู้ให้คำยินยอม
                                                </div>
                                                <?php
                                                $sqlPre = "select * from data_prefix where prefix_code in (3,4,5)";
                                                $resPre = mysqli_query($conn, $sqlPre);
                                                ?>
                                                <div class="row" id="parentOther">
                                                    <div class="col-md-3">
                                                        <label>คำนำหน้า</label>
                                                        <select name="prefix_id" id="prefix_id" class="form-control mt-1">
                                                            <option value="">-- คำนำหน้า --</option>
                                                            <?php while ($rowPre = mysqli_fetch_array($resPre)) { ?>
                                                                <option value="<?= $rowPre["prefix_code"] ?>"><?= $rowPre["prefix_name"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>ชื่อจริง</label>
                                                        <input type="text" name="parent_th_name" id="parent_th_name" class="form-control mt-1" placeholder="ชื่อจริง">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>นามสกุล</label>
                                                        <input type="text" name="parent_th_surname" id="parent_th_surname" class="form-control mt-1" placeholder="นามสกุล">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>เกี่ยวข้องเป็น</label>
                                                        <input type="text" name="relevance" id="relevance" class="form-control mt-1" placeholder="เกี่ยวข้องเป็น">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="row justify-content-center mt-3" id="">
                                        <div class="col-md-12">
                                            <div class="card border border-dark">
                                                <div class="card-body">
                                                    <div> <strong><?php echo ++$topic . ". "; ?> ข้อมูลการฉีดวัคซีน </strong><span class="text-danger">*</span></div>
                                                    <div>
                                                        <input type="radio" name="inject" id="inject" value="ฉีดแล้ว" class="" required>
                                                        ฉีดแล้ว
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="inject" id="willInject" value="ประสงค์จะฉีด" class="no-inject" required>
                                                        ประสงค์จะฉีด
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="inject" id="domicileInject" value="ประสงค์ฉีดที่ภูมิลำเนา" class="no-inject" required>
                                                        ประสงค์ฉีดที่ภูมิลำเนา
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="inject" id="noInject" value="ไม่ประสงค์ฉีด" class="no-inject" required>
                                                        ไม่ประสงค์ฉีด
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="inject" id="covid19" value="ได้รับเชื้อไวรัสโควิด 19" class="no-inject" required>
                                                        เคยติดเชื้อไวรัสโคโรนา 2019
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3" id="covid19Date">
                                        <div class="col-md-12">
                                            <div class="card border border-dark">
                                                <div class="card-body">
                                                    <label>ได้รับเชื้อในวันที่</label>
                                                    <input type="date" name="covid19D" id="covid19D" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3" id="injectContent">
                                        <div class="col-md-12">
                                            <div class="card border border-dark">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-primary" id="addListInject"><i class="fas fa-plus "></i> เพิ่มรายการที่ฉีด</button>
                                                    <hr>
                                                    <!-- รายการที่ 1 -->
                                                    <div id="listInject">
                                                        <div>
                                                            วันที่ฉีด : <input type="date" name="injectDate[]" id="injectDate" class="form-control injectDate">
                                                        </div>
                                                        <div>
                                                            เข็มที่:
                                                            <input type="number" name="needle[]" id="needle" class="form-control needle">
                                                        </div>
                                                        <div>
                                                            Lot No:
                                                            <input type="number" name="lotno[]" id="lotno" class="form-control lotno">
                                                        </div>
                                                        <div>
                                                            ชื่อโรงพยาบาล:
                                                            <input type="text" name="hospital_name[]" id="hospital_name" class="form-control hospital_name">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3" id="injectContentOther">
                                        <div class="col-md-12">
                                            <div class="card border border-dark">
                                                <div class="card-body">
                                                    เลือกจังหวัดและอำเภอที่ต้องการฉีด
                                                    <?php $sqlOther = "select * from province";
                                                    $resOther = mysqli_query($conn, $sqlOther);

                                                    ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>เลือกจังหวัด</label>
                                                            <select name="province" id="province" class="form-control">
                                                                <option value="">-- เลือกจังหวัด --</option>
                                                                <?php while ($rowOther = mysqli_fetch_array($resOther)) { ?>
                                                                    <option value="<?php echo $rowOther["province_id"]; ?>"><?php echo $rowOther["province_name"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>เลือกอำเภอ</label>
                                                            <select name="amphure" id="amphure" class="form-control">
                                                                <option value="">-- กรุณาเลือกอำเภอ --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success"> <i class="fas fa-clipboard-check"></i> ยืนยัน</button>
                                        </div>
                                    </div>
                                    </form>
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
        $("#amphure").select2({
            width: "100%"
        })
        $("#province").select2({
            width: "100%"
        })
        $("#parentOther").hide()
        $("#covid19Date").hide()
        $("#injectContent").hide()
        $("#injectContentOther").hide()
        $(document).on('click', '#parentOtherR', function() {
            $("#parentOther").fadeIn()
        })
        $(document).on('click', ".parent", function() {
            $("#parentOther").hide()
        })
        $(document).on('click', "#inject", function() {
            $("#injectContent").fadeIn()
            $("#injectContentOther").hide()
            $("#covid19Date").hide()
        })
        $(document).on('click', ".no-inject", function() {
            $("#injectContent").hide()
            $("#injectContentOther").hide()
            $("#covid19Date").hide()
        })
        $(document).on('click', ".delListInject", function() {
            let indexList = $(this).attr("val")
            $("#ListInject" + indexList).remove()
            listCount--
        })
        $(document).on('click', "#domicileInject", function() {
            $("#injectContentOther").fadeIn()
        })
        $(document).on('click', "#covid19", function() {
            $("#covid19Date").fadeIn()
        })
        $(document).on('change', '#province', function() {
            $.ajax({
                type: "POST",
                url: "getAddress.php",
                data: {
                    getAumF: $("#province").val()
                },
                success: function(result) {
                    $("#amphure").html(result)
                }
            });
        })
        $(document).on('change', '#province', function() {

        })
        $(document).on('submit', '#confirm', function() {
            var formData = $(this).serialize();
            if ($('#inject').is(':checked')) {
                if ($('.injectDate').val() == "") {
                    alert("กรุณากรอกวันที่ฉีด")
                    return false
                }
                if ($('.needle').val() == "") {
                    alert("กรุณากรอกฉีดเข็มที่")
                    return false
                }
                if ($('.lotno').val() == "") {
                    alert("กรุณากรอกหมายเลข Lot No")
                    return false
                }
                if ($('.hospital_name').val() == "") {
                    alert("กรุณากรอกชื่อโรงพยาบาล")
                    return false
                }

                $.ajax({
                    type: "POST",
                    url: "insertDataInject.php",
                    data: formData,
                    success: function(result) {
                        console.log(result)
                        if (result == "ok") {
                            window.location.replace("success.php");
                        }
                    }
                });
            } else if ($('#domicileInject').is(':checked')) {
                if ($('#province').val() == "") {
                    alert("กรุณาเลือกจังหวัด")
                    return false
                }
                if ($('#amphure').val() == "") {
                    alert("กรุณาเลือกอำเภอ")
                    return false
                }
                // $.ajax({
                //     type: "POST",
                //     url: "insertDomicileInject.php",
                //     data: formData,
                //     success: function(result) {
                //         console.log(result)
                //         if (result == "ok") {
                //             window.location.replace("success.php");
                //         }
                //     }
                // });
                window.location.replace("success.php");
            } else if ($('#covid19').is(':checked')) {
                if ($('#covid19D').val() == "") {
                    alert("กรุณาเลือกวันที่ติดเชื้อ")
                    return false
                }

                var start = $('#start_date').val();
                var end = $('#end_date').val();

                // end - start returns difference in milliseconds 
                var diff = new Date(end - start);

                // get days
                var days = diff / 1000 / 60 / 60 / 24;

                console.log(days)

            } else if ($('#willInject').is(':checked')) {
                $.ajax({
                    type: "POST",
                    url: "insertDataWillInject.php",
                    data: formData,
                    success: function(result) {
                        console.log(result)
                        if (result == "ok") {
                            window.location.replace("conInject.php");
                        }
                    }
                });
            } else if ($('#noInject').is(':checked')) {
                $.ajax({
                    type: "POST",
                    url: "insertDataNoinject.php",
                    data: formData,
                    success: function(result) {
                        console.log(result)
                        if (result == "ok") {
                            window.location.replace("success.php");
                        }
                    }
                });
            }

            if ($('#parentOtherR').is(':checked')) {
                if ($("#prefix_id").val() == "") {
                    alert("กรุณาเลือกคำนำหน้า")
                    return false
                }
                if ($("#parent_th_name").val() == "") {
                    alert("กรุณากรอกชื่อจริง")
                    return false
                }
                if ($("#parent_th_surname").val() == "") {
                    alert("กรุณากรอกนามสกุล")
                    return false
                }
                if ($("#relevance").val() == "") {
                    alert("กรุณากรอกเกี่ยวข้องเป็น")
                    return false
                }
            }
            return false;
        })
        let listCount = 1;
        $(document).on('click', '#addListInject', function() {
            $("#listInject").append(
                '<div id="ListInject' + (++listCount) + '">' +
                '<hr>' +
                '<div class="d-flex flex-row-reverse"><button class="btn btn-danger delListInject" val="' + listCount + '" type="button"><i class="fas fa-minus"></i> ลบรายการ</button></div>' +
                // 'รายการที่'+listCount,
                '<div>' +
                'วันที่ฉีด: <input type = "date"' +
                'name = "injectDate[]"' +
                'id = "injectDate"' +
                'class = "form-control injectDate" >' +
                '</div>' +
                '<div>' +
                'เข็มที่:' +
                '<input type = "number"' +
                'name = "needle[]"' +
                'id = "needle"' +
                'class = "form-control needle" >' +
                '</div>' +
                '<div>' +
                'lot NO:' +
                '<input type = "number"' +
                'name = "lotno[]"' +
                'id = "lotno"' +
                'class = "form-control lotno" >' +
                '</div>' +
                '<div >' +
                'ชื่อโรงพยาบาล:' +
                '<' +
                'input type = "text"' +
                'name = "hospital_name[]"' +
                'id = "hospital_name"' +
                'class = "form-control hospital_name" >' +
                '</div></div>')
        })
    })
</script>