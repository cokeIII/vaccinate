<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    $student_id = $_SESSION["student_id"];
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
                                <div class="text-content"><strong>อายุ : </strong> <?php echo  calAgeNumber($_SESSION["birthday"]) . " ปี"; ?></div>
                                <div class="text-content"><strong>วัน/เดือน/ปีเกิด : </strong> <?php echo $_SESSION["birthday"]; ?></div>
                            </div>
                        </div>
                        <?php if (calAgeNumber($_SESSION["birthday"]) < 18) { ?>
                            <div class="row justify-content-center mt-2">
                                <div class="col-md-6 text-content">
                                    <form action="confirm.php" method="post">

                                        <?php
                                        $sql = "select * from parents pr,data_prefix p where student_id = '$student_id' and pr.parent_th_prefix = p.prefix_code order by relevance";
                                        $res = mysqli_query($conn, $sql);
                                        ?>
                                        <div class="card border border-dark">
                                            <div class="card-body">
                                                <strong> 1. ข้อมูลผู้ให้คำยินยอม (กรุณาเลือกผู้ให้คำยินยอมกรณีอายุไม่ถึง 18 ปีบริบูรณ์) <span class="text-danger">*</span></strong>
                                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                                    <div>
                                                        <input type="radio" name="parent" class="parent" value="<?php echo $row["parent_id"]; ?>"> <?php echo $row["relevance"]; ?> ชื่อ <?php echo $row["prefix_name"] . $row["parent_th_name"] . " " . $row["parent_th_surname"]; ?>
                                                    </div>
                                                <?php } ?>

                                                <div>
                                                    <input type="radio" name="parent" id="parentOtherR"> ผู้ให้คำยินยอม
                                                </div>
                                                <?php
                                                $sqlPre = "select * from data_prefix where prefix_code in (3,4,5)";
                                                $resPre = mysqli_query($conn, $sqlPre);
                                                ?>
                                                <div class="row" id="parentOther">
                                                    <div class="col-md-3">
                                                        <select name="prefix_id" id="prefix_id" class="form-control mt-1">
                                                            <option value="">-- คำนำหน้า --</option>
                                                            <?php while ($rowPre = mysqli_fetch_array($resPre)) { ?>
                                                                <option value="<?= $rowPre["prefix_code"] ?>"><?= $rowPre["prefix_name"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="parent_th_name" id="parent_th_name" class="form-control mt-1" placeholder="ชื่อจริง">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="parent_th_surname" id="parent_th_surname" class="form-control mt-1" placeholder="นามสกุล">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="relevance" id="relevance" class="form-control mt-1" placeholder="เกี่ยวข้องเป็น">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row justify-content-center mt-3" id="">
                                            <div class="col-md-12">
                                                <div class="card border border-dark">
                                                    <div class="card-body">
                                                        <div> <strong>2. ข้อมูลการฉีดวัคซีน </strong><span class="text-danger">*</span></div>
                                                        <div>
                                                            <input type="radio" name="inject" id="inject" value="ฉีดแล้ว" class="" required>
                                                            ฉีดแล้ว
                                                        </div>
                                                        <!-- <div>
                                                            <input type="radio" name="inject" id="notInject" value="ยังไม่ได้ฉีด" class="no-inject" required>
                                                            ประสงค์จะฉีด
                                                        </div> -->
                                                        <div>
                                                            <input type="radio" name="inject" id="domicileInject" value="ประสงค์ฉีดที่ภูมิลำเนา" class="no-inject" required>
                                                            ประสงค์ฉีดที่ภูมิลำเนา
                                                        </div>
                                                        <!-- <div>
                                                            <input type="radio" name="inject" id="noInject" value="ไม่ประสงค์ฉีด" class="no-inject" required>
                                                            ไม่ประสงค์ฉีด
                                                        </div> -->
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
                                                                วันที่ฉีด : <input type="date" name="injectDate[]" id="injectDate" class="form-control">
                                                            </div>
                                                            <div>
                                                                เข็มที่:
                                                                <input type="number" name="needle[]" id="needle" class="form-control">
                                                            </div>
                                                            <div>
                                                                lot NO:
                                                                <input type="number" name="lotno[]" id="lotno" class="form-control">
                                                            </div>
                                                            <div>
                                                                ชื่อโรงพยาบาล:
                                                                <input type="text" name="hospital_name[]" id="hospital_name" class="form-control">
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="province" id="province" class="form-control">
                                                                    <option value="">-- เลือกจังหวัด --</option>
                                                                    <?php while ($rowOther = mysqli_fetch_array($resOther)) { ?>
                                                                        <option value="<?php echo $rowOther["province_id"]; ?>"><?php echo $rowOther["province_name"]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6"></div>
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
                        <?php } ?>
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
        $("#parentOther").hide()
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
        })
        $(document).on('click', ".no-inject", function() {
            $("#injectContent").hide()
        })
        $(document).on('click', ".delListInject", function() {
            let indexList = $(this).attr("val")
            $("#ListInject" + indexList).remove()
            listCount--
        })
        $(document).on('click', ".domicileInject", function() {
            $("#injectContentOther").fadeIn()
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
                'class = "form-control" >' +
                '</div>' +
                '<div>' +
                'เข็มที่:' +
                '<input type = "number"' +
                'name = "needle[]"' +
                'id = "needle"' +
                'class = "form-control" >' +
                '</div>' +
                '<div>' +
                'lot NO:' +
                '<input type = "number"' +
                'name = "lotno[]"' +
                'id = "lotno"' +
                'class = "form-control" >' +
                '</div>' +
                '<div >' +
                'ชื่อโรงพยาบาล:' +
                '<' +
                'input type = "text"' +
                'name = "hospital_name[]"' +
                'id = "hospital_name"' +
                'class = "form-control" >' +
                '</div></div>')
        })
    })
</script>