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
                                <h5>ยืนยันการฉีดวัคซีน เข็มที่2</h5>
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
                                    $row_doc2 = mysqli_fetch_array($res_doc2);

                                    $sql_std = "select * from student where student_id = '$student_id'";
                                    $res_std = mysqli_query($conn, $sql_std);
                                    $row_std = mysqli_fetch_array($res_std);
                                ?>

                                    <div class="row">
                                        <h5>ขั้นตอนการยืนยันการฉีดวัคซีน</h5>
                                        <div>1.อ่านข้อมูล หนังสือออกแจ้งกำหนดฉีดวัคซีนเข็มที่ 2</div>
                                        <div>2.อ่านข้อมูล ส่วนที่ 1 : ข้อความรู้เกี่ยวกับวัคซีนโควิด – 19</div>
                                        <div>3.อ่านข้อมูล ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์ เข็มที่ 2</div>
                                        <div>4.เซ็นลายเซ็นยืนยันการรับวัคซีนและรับทราบข้อมูล</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h5>หนังสือออกแจ้งกำหนดฉีดวัคซีนเข็มที่ 2</h5>
                                        <!-- <button class="btn btn-primary view-pdf col-md-3">ดูไฟล์หนังสือ</button> -->
                                        <!-- <iframe id="frame" src="dataPDF/DocVaccine2.pdf"></iframe> -->
                                        <img src="img/DocVaccine2-1.png" alt="">
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="text-center">
                                            <strong>
                                                เอกสารแสดงความประสงค์ของผู้ปกครองเพื่อให้นักเรียน นักศึกษาชั้นประกาศนียบัตรวิชาชีพ (ปวช.) และประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.) ฉีดวัคซีนไฟเซอร์ เข็มที่ 2
                                            </strong>
                                        </div>
                                        <div><strong>ส่วนที่ 1 : ข้อความรู้เกี่ยวกับวัคซีนโควิด – 19</strong></div>
                                        <br>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คณะอนุฯ สร้างเสริมภูมิคุ้มกัน มีมติ เด็กชาย อายุ 12-16 ปี รับวัคซีนไฟเซอร์เข็มที่ 2 ได้ตามสมัครใจ กล้ามเนื้อหัวใจอักเสบเกิดได้น้อย รักษาหายได้ ฟื้นตัวได้รวดเร็ว </div><br>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นพ.โอภาส การย์กวินพงศ์ อธิบดีกรมควบคุมโรค แถลงภายหลังการประชุมคณะอนุกรรมการสร้างเสริมภูมิคุ้มกันโรค กรณีการฉีดวัคซีนไฟเซอร์เข็ม 2 ในเด็กชายอายุ 12-16 ปี ว่า ที่ผ่านมามีข้อกังวลเรื่องการเกิดภาวะกล้ามเนื้อหัวใจอักเสบในเด็กผู้ชายอายุ 12-16 ปี จึงให้ฉีดเพียง 1 เข็มก่อน และได้เชิญผู้เชี่ยวชาญ ทั้งกุมารแพทย์ โรคติดเชื้อและกุมารแพทย์โรคหัวใจ มาร่วมทบทวนการฉีดวัคซีนไฟเซอร์ในเด็กซึ่งทั่วโลกฉีดไปแล้วกว่า 100 ล้านโดส ได้ข้อสรุป 3R คือ </div>
                                        <div><strong>1. Real </strong>กล้ามเนื้อหัวใจอักเสบเกิดขึ้นจริง ส่วนมากเกิดในเข็มที่ 2 ในเด็กผู้ชายอายุ 12-16 ปี </div>
                                        <div><strong>2. Rare </strong>เกิดขึ้นได้น้อยมาก ในระดับไม่กี่รายต่อล้านคน พบมากสุดประมาณ 6 ในแสนคน ซึ่งน้อยกว่า โรคโควิด 19 ในเด็กที่ทำให้เกิดการอักเสบทั่วร่างกาย (MIS-C) รวมถึงกล้ามเนื้อหัวใจอักเสบ </div>
                                        <div><strong>3. Recovery </strong>ภาวะกล้ามเนื้อหัวใจอักเสบที่มีอาการเจ็บแน่นหน้าอก เหนื่อยง่าย ไม่รุนแรงและสามารถหายได้เองมีจำนวนน้อยรายที่อาการรุนแรงจนต้องเข้าโรงพยาบาล และทั่วโลกรายงานพบผู้เสียชีวิตที่เกี่ยวกับวัคซีน 1 ราย ขณะที่มีการฟื้นตัวรวดเร็วมากถึง 90% </div>
                                        <br>
                                        <div><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่ประชุมมีมติว่าสามารถฉีดวัคซีนไฟเซอร์เข็ม 2 ในเด็กชายอายุ 12 – 16 ปีได้ โดยให้เป็นไปตาม ความสมัครใจ ขึ้นกับความประสงค์ของผู้ปกครอง และนักเรียน และไม่ให้เป็นข้อบังคับ เรื่องการเข้าเรียนโดยกระทรวงสาธารณสุข จะสื่อสารข้อมูลทั้งประโยชน์ และผลข้างเคียง เน้นย้ำให้ผู้ปกครองติดตามเฝ้าระวังอาการ และทำการสื่อสารไปยังหน่วยบริการฉีดวัคซีนให้เข้าใจ และปฏิบัติตรงกัน</strong></div>
                                        <hr>
                                        <div><strong>ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์ เข็มที่ 2</strong></div>
                                        <div>ข้าพเจ้า <?php echo $row_doc2["prefix_parent"] . $row_doc2["parent_name"] . " " . $row_doc2["parent_surname"]; ?> หมายเลขโทรศัพท์ (ผู้ปกครอง) <?php echo ($row_doc2["phone_parent"] != "" ? $row_doc2["phone_parent"] : ($row_std["fat_tell"] != "" ? $row_std["fat_tell"] : ($row_std["mot_tell"] != "" ? $row_std["mot_tell"] : ($row_std["par_tell"] != "" ? $row_std["par_tell"] : "")))); ?></div>
                                        <div>ผู้ปกครองของ <?php echo $row_doc2["prefix_name"] . $row_doc2["stu_fname"] . " " . $row_doc2["stu_lname"]; ?> มีความสัมพันธ์เป็น <?php echo $row_doc2["relevance"]; ?></div>
                                        <br><br>
                                        <div>ข้าพเจ้าได้รับทราบข้อมูลและได้ซักถามรายละเอียดจนเข้าใจเกี่ยวกับวัคซีนไฟเซอร์และอาการไม่พึงประสงค์ของวัคซีนที่อาจเกิดขึ้น เป็นที่เรียบยร้อยแล้ว</div>
                                        <div>ข้าพเจ้า <input type="radio" name="status_confirm2" value="1" id="inject">ประสงค์ให้บุตรหลาน ฉีดวัคซีนไฟเซอร์โดยสมัครใจ</div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_confirm2" value="0" id="noInject">ไม่ประสงค์ให้บุตรหลาน ฉีควัคซีนไฟเซอร์ <span>สาเหตุ (ถ้ามี) <input type="text" name="note" id="note"></span></div>
                                        <?php
                                        $sqlSig = "select * from confirm where student_id = '$student_id'";
                                        $resSig = mysqli_query($conn, $sqlSig);
                                        $resSigRow = mysqli_query($conn, $sqlSig);
                                        $rowSigNum = mysqli_num_rows($resSig);
                                        $rowSig =  mysqli_fetch_array($resSigRow);
                                        if ($rowSigNum < 1 || $rowSig["signature2"] == "") {
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
                                <!-- <div><strong>รับทราบข้อมูล</strong></div> -->
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
<div id="modalPDF" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">หนังสือออกแจ้งกำหนดฉีดวัคซีนเข็มที่ 2</h4>
            </div>
            <div class="modal-body">

                <!-- <embed src="dataPDF/DocVaccine2.pdf" frameborder="0" width="100%" height="400px"> -->
                <div data-role="popup" id="popupVideo" data-overlay-theme="a" data-theme="d" data-tolerance="15,15" class="ui-content">

                    <iframe src="dataPDF/DocVaccine2.pdf" width="497" height="298" seamless></iframe>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<?php } ?>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $('#btnShow').click(function() {
            $("#dialog").dialog();
            $("#frame").attr("src", "dataPDF/DocVaccine2.pdf");
        });
        $("#note").hide()
        $(document).on('click', '#noInject', function() {
            $("#note").show()
        })
        $(document).on('click', '#inject', function() {
            $("#note").hide()
        })

        $(document).on("pagecreate", function() {

            function scale(width, height, padding, border) {
                var scrWidth = $(window).width() - 30,
                    scrHeight = $(window).height() - 30,
                    ifrPadding = 2 * padding,
                    ifrBorder = 2 * border,
                    ifrWidth = width + ifrPadding + ifrBorder,
                    ifrHeight = height + ifrPadding + ifrBorder,
                    h, w;

                if (ifrWidth < scrWidth && ifrHeight < scrHeight) {
                    w = ifrWidth;
                    h = ifrHeight;
                } else if ((ifrWidth / scrWidth) > (ifrHeight / scrHeight)) {
                    w = scrWidth;
                    h = (scrWidth / ifrWidth) * ifrHeight;
                } else {
                    h = scrHeight;
                    w = (scrHeight / ifrHeight) * ifrWidth;
                }
                return {
                    'width': w - (ifrPadding + ifrBorder),
                    'height': h - (ifrPadding + ifrBorder)
                };
            };

            $(".ui-popup iframe")
                .attr("width", 0)
                .attr("height", "auto");

            $("#popup_video").on({
                popupbeforeposition: function() {

                    // here calling custom function scale() to get the width and height
                    var size = scale(497, 298, 15, 1),
                        w = size.width,
                        h = size.height;
                    $("#popup_video iframe")
                        .attr("width", w)
                        .attr("height", h);
                },

                popupafterclose: function() {
                    $("#popup_video iframe")
                        .attr("width", 0)
                        .attr("height", 0);
                }
            });
        });

        // $(document).on("click", ".view-pdf", function() {
        //     $("#modalPDF").modal("show")
        // })
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
            // $("#modalPDF").modal("hide")
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
            if (picSig == "") {
                return alert("กรุณาเซ็นลายเซ็น")
            } else {
                let status_confirm2 = $("input[name='status_confirm2']:checked").val();
                let note = $("#note").val()
                $.ajax({
                    type: "POST",
                    url: "saveSignature2.php",
                    data: {
                        signed: picSig,
                        status_confirm2: status_confirm2,
                        note: note
                    },
                    success: function(result) {
                        console.log(result)
                        if (result == "ok") {
                            window.location.replace("listVacAfter2.php");
                        }
                    }
                });
            }
        })
    })
</script>