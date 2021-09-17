<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
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
                            <div class="card-body">
                                <form method="post" id="conInject3">
                                    <h5>ภาคผนวกที่ 5 แบบคัดกรองก่อนรับบริการฉีดวัคซีนโควิด 19 สำหรับนักเรียน/นักศึกษา
                                        ชั้นมัธยมศึกษาปีที่ 1-6 หรือเทียบเท่า</h5>
                                    <div class="row bg-primary p-1">
                                        <div class="col-md-2">
                                            <img src="img/Public_Health_of_Thailand.png" alt="" width="84" height="84">
                                        </div>
                                        <div class="col-md-10 ">
                                            <div class="font-head-doc">แบบคัดกรองก่อนรับบริการฉีดวัคซีนโควิด 19 สำหรับนักเรียน/นักศึกษาชั้น
                                                มัธยมศึกษาปีที่ 1-6 หรือเทียบเท่า</div>
                                        </div>
                                    </div>
                                    คำชี้แจง ให้ผู้ปกครอง กรุณากรอกข้อมูลโดยทำเครื่องหมาย ในช่องว่างตามความจริง เพื่อเจ้าหน้าที่
                                    จะได้พิจารณาว่า นักเรียน/นักศึกษา สามารถฉีดวัคซีนได้หรือไม่
                                    <table class="table mt-5">
                                        <thead>
                                            <tr>
                                                <th>1 นักเรียนมีอายุไม่ถึง 12 ปีบริบูรณ์</th>
                                                <th width="15%">
                                                    <input type="radio" name="c1" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c1" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>2 นักเรียนเคยมีประวัติแพ้ วัคซีนโควิด 19 หรือส่วนประกอบของวัคซีนโควิด 19
                                                    หรือมีปฏิกิริยาจากการฉีดครั้งก่อนอย่างรุนแรง (พิจารณาให้วัคซีนโควิด 19 ชนิด
                                                    อื่นแทน)</th>
                                                <th width="15%">
                                                    <input type="radio" name="c2" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c2" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>3 นักเรียนได้ตรวจพบเชื้อโควิด 19 ภายใน 1 เดือน</th>
                                                <th width="15%">
                                                    <input type="radio" name="c3" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c3" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>4 นักเรียนมีโรคประจำตัวที่รุนแรงที่อาการยังไม่คงที่ ไม่สามารถควบคุมอาการของ
                                                    โรคได้ เช่น โรคหัวใจ โรคทางระบบประสาท และโรคอื่น ๆ ที่เพิ่งจะมีอาการ
                                                    กำเริบ ยกเว้นแพทย์ผู้ดูแลเป็นประจำได้ประเมินแล้วว่าให้วัคซีนได้ (ผู้ที่มีโรค
                                                    ประจำตัวเหล่านี้ ควรปรึกษาแพทย์ก่อนรับวัคซีน)</th>
                                                <th width="15%">
                                                    <input type="radio" name="c4" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c4" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>5 นักเรียนอยู่ระหว่างตั้งครรภ์ ที่มีอายุครรภ์ น้อยกว่า 12 สัปดาห</th>
                                                <th width="15%">
                                                    <input type="radio" name="c5" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c5" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>6 นักเรียนมีความเจ็บป่วยที่ต้องอยู่ในโรงพยาบาลหรือเพิ่งออกจากโรงพยาบาลมา
                                                    ไม่เกิน 14 วัน (ยกเว้นแพทย์ให้ความเห็นว่าสามารถรับวัคซีนได้) </th>
                                                <th width="15%">
                                                    <input type="radio" name="c6" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c6" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>7 นักเรียนกำลังมีอาการป่วยไม่สบายใด ๆ (ควรรักษาให้หายป่วยก่อน) </th>
                                                <th width="15%">
                                                    <input type="radio" name="c7" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c7" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>8 นักเรียนได้รับวัคซีนใด ๆ มาก่อนในช่วง 14 วันหรือไม่ </th>
                                                <th width="15%">
                                                    <input type="radio" name="c8" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c8" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>9 นักเรียนมีความกังวลใจมากในการรับวัคซีนโควิด 19
                                                    (ขอให้รับคำปรึกษาจากแพทย์หรือบุคลากรทางการแพทย์ เพื่อทำความเข้าใจ
                                                    และคลายความกังวลก่อนรับวัคซีนโควิด 19)</th>
                                                <th width="15%">
                                                    <input type="radio" name="c9" value="1" required>ใช่&emsp;&emsp;
                                                    <input type="radio" name="c9" value="0" required>ไม่ใช่
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    หมายเหตุ: หากนักเรียน/นักศึกษาในสถาบันการศึกษาดังกล่าว มีอายุเกิน 18 ปี ให้รับวัคซีนไฟเซอร์ได้พร้อม
                                    กับนักเรียนร่วมสถาบันการศึกษา
                                    <div class="row mt-3">
                                        <div class="d-flex justify-content-center text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div>ทั้งนี้ ข้าพเจ้าขอรับรองว่าข้อมูลดังกล่าวเป็นความจริง</div>
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
                                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
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
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
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
        $(document).on('submit', '#conInject3', function() {
            window.location.replace("success.php");
            return false
        })
    })
</script>