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
<style>
    .sig-size {
        width: 85px;
        height: 40px;
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
            <div class="container-fluid">
                <div id="login">
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5>ยืนยันการฉีดวัคซีน</h5>
                                <hr>
                                <!-- justify-content-center -->
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="text-content"><strong>รหัสประจำตัวนักเรียน/นักศึกษา : </strong> <?php echo $student_id; ?></div>
                                        <div class="text-content"><strong>ชื่อ - สกุล: </strong> <?php echo $_SESSION["prefix_name"] . $_SESSION["stu_fname"] . " " . $_SESSION["stu_lname"];
                                                                                                    ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>สถานะที่ลงทะเบียน : </strong><?php echo $row_status["student_status"]; ?>
                                    </div>
                                </div>
                                <hr>
                                <?php if ($row_status["student_status"] == "ประสงค์จะฉีด") {
                                    $sql_doc2 = "select * from doc2 where student_id = '$student_id'";
                                    $res_doc2 = mysqli_query($conn, $sql_doc2);
                                    $row_doc2 = mysqli_fetch_array($res_doc2); ?>
                                    <div class="row">
                                        <h5>ขั้นตอนการยืนยันการฉีดวัคซีน</h5>
                                        <div>1.อ่านข้อมูล ข้อมูลการแจ้งฉีดวัคซีน Pfizer</div>
                                        <div>2.เซ็นลายเซ็นยืนยันการรับทราบข้อมูล</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="text-center">
                                            <strong>
                                                ข้อมูลการแจ้งฉีดวัคซีน Pfizer สำหรับนักเรียนนักศึกษาวิทยาลัยเทคนิคชลบุรี
                                            </strong>
                                        </div>
                                        <div>เรื่อง ขออนุญาตฉีดวัคซีนไฟเซอร์สำหรับนักเรียนนักศึกษา</div>
                                        <div>เรียน ท่านผู้ปกครองนักเรียน</div>
                                        <br>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยสถานการณ์การระบาดของเชื้อไวรัสโคโรนา 2019 ในปัจจุบันได้ส่งผลกระทบในวงกว้าง
                                            อย่างรวดเร็ว ประเทศไทยจึงมีนโยบายให้วัคซีนไฟเซอร์ (Pfizer) สำหรับนักเรียน/นักศึกษาซึ่งศึกษาใน
                                            ระดับชั้นมัธยมศึกษา หรือเทียบเท่า เพื่อลดความรุนแรงและการเสียชีวิตจากการป่วยด้วยโรคติดเชื้อไวรัสไวรัสโคโร
                                            นา 2019 ในสถานศึกษา </div>
                                        <div>เนื่องจากโรงพยาบาลบ้านบึง จะให้บริการฉีดวัคซีนไฟเซอร์สำหรับนักเรียน/นักศึกษา
                                            ในวันที่ 7 ตุลาคม พ.ศ. 2564 ระดับชั้น ปวช. เวลา 07.30 น. และ ระดับชั้น ปวส. เวลา 09.00 น. จึงเรียนมาเพื่อขอ
                                            ความร่วมมือจากท่านผู้ปกครองในการแจ้งความประสงค์ให้บุตรหลานของท่านได้รับการฉีดวัคซีนไฟเซอร์เพื่อ
                                            สร้างเสริมภูมิคุ้มกันโรคโควิด 19 โดยให้ตอบกลับความประสงค์มายังครูประจำชั้น ภายในวันที่
                                            6 ตุลาคม พ.ศ. 2564</div>
                                        <br>
                                        <?php
                                        $sqlSig = "select * from confirm where student_id = '$student_id'";
                                        $resSig = mysqli_query($conn, $sqlSig);
                                        $resSigRow = mysqli_query($conn, $sqlSig);
                                        $rowSigNum = mysqli_num_rows($resSig);
                                        $rowSig =  mysqli_fetch_array($resSigRow);
                                        if ($rowSigNum < 1) {
                                        ?>
                                            <div id="sigNotShow">
                                                <div class="row mt-3">
                                                    <div class="d-flex justify-content-center text-center">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div><strong>รับทราบข้อมูล</strong></div>
                                                                <label>ลายเซ็น<?php echo ($ageArr[0] > 17 ? "นักเรียนนักศึกษา" : "ผู้ปกครอง") ?><span class="re_status"></span></label>
                                                                <div id="signatureparent">
                                                                    <div id="signature"></div>
                                                                </div>
                                                                <div>(<?php echo ($ageArr[0] > 17 ? $_SESSION["prefix_name"] . $_SESSION["stu_fname"] . " " . $_SESSION["stu_lname"] : $row_doc2["prefix_parent"] . $row_doc2["parent_name"] . " " . $row_doc2["parent_surname"]) ?>)</div>
                                                                <div class="mt-2">
                                                                    <button class="btn btn-secondary" id="clear" type="button">ลบลายเซ็น</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-2">
                                            <div class="mt-2 d-flex justify-content-center text-center">
                                                <button class="btn btn-success" id="conf" type="button">รับทราบข้อมูล</button>
                                            </div>
                                        <?php } else { ?>
                                            <div id="sigShow">
                                                <div class="row mt-3">
                                                    <div class="d-flex justify-content-center text-center">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div>ลงชื่อ <img class="sig-size" src="signatureCon/<?php echo $rowSig["signature"]; ?>"></div>
                                                                <div>(<?php echo ($ageArr[0] > 17 ? $_SESSION["prefix_name"] . $_SESSION["stu_fname"] . " " . $_SESSION["stu_lname"] : $row_doc2["prefix_parent"] . $row_doc2["parent_name"] . " " . $row_doc2["parent_surname"]) ?>)</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-2">
                                            <div class="row mt-3">
                                                <div class="d-flex justify-content-center text-center">
                                                    <button type="button" class="btn btn-warning" id="editSig">แก้ไขลายเซ็น</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<div class="modal" tabindex="-1" role="dialog" id="modalEditSig">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขลายเซ็น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="d-flex justify-content-center text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div><strong>รับทราบข้อมูล</strong></div>
                                <label>ลายเซ็น<?php echo ($ageArr[0] > 17 ? "นักเรียนนักศึกษา" : "ผู้ปกครอง") ?><span class="re_status"></span></label>
                                <div id="signatureparent">
                                    <div id="signature"></div>
                                </div>
                                <div>(<?php echo ($ageArr[0] > 17 ? $_SESSION["prefix_name"] . $_SESSION["stu_fname"] . " " . $_SESSION["stu_lname"] : $row_doc2["prefix_parent"] . $row_doc2["parent_name"] . " " . $row_doc2["parent_surname"]) ?>)</div>
                                <div class="mt-2">
                                    <button class=" btn btn-secondary" id="clear" type="button">ลบลายเซ็น</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="conf">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        let signed = false
        let signed2Load = false
        let picSig = ""
        $("#conf").prop('disabled', true)
        $(document).on('change', "#signatureparent", function() {
            if (signed2Load) {
                signed = true
                if (signed) {
                    $("#conf").prop('disabled', false)
                    picSig = "image/svg+xml;base64," + $("#signatureparent").jSignature('getData', "image/svg+xml;base64")[1]
                }
            }
            signed2Load = true
        })
        $(document).on('click', '#editSig', function() {
            $("#modalEditSig").modal("show")
        })
        $(document).on('click', '.close', function() {
            $("#modalEditSig").modal("hide")
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
            signed = false
            if (!signed) {
                $("#conf").prop('disabled', true)
            }
        })
        $(document).on('click', '#conf', function() {
            console.log(picSig)
            if (picSig == "") {
                return alert("กรุณาเซ็นลายเซ็น")
            } else {
                $.ajax({
                    type: "POST",
                    url: "saveSignature.php",
                    data: {
                        signed: picSig
                    },
                    success: function(result) {
                        if (result == "ok") {
                            window.location.replace("listVacAfter.php");
                        }
                    }
                });
            }
        })
    })
</script>