<?php
// Require composer autoload
date_default_timezone_set("Asia/Bangkok");

require_once 'vendor/autoload.php';
require_once 'vendor/mpdf/mpdf/mpdf.php';
require_once 'connect.php';
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);

header('Content-Type: text/html; charset=utf-8');
// เพิ่ม Font ให้กับ mPDF
$mpdf = new mPDF();
date_default_timezone_set("asia/bangkok");
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    // return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    return "$strDay $strMonthThai $strYear";
}
ob_start(); // Start get HTML code
$student_id = $_GET["id"];
?>


<!DOCTYPE html>
<html>

<head>
    <title>Report 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/ovec-removebg.ico" />
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "thsarabun";
        }

        .txt-h {
            text-align: center;
        }

        .text-size {
            font-size: 20px;
        }

        .text-right {
            text-align: right;
        }

        .content {
            padding: 24px;

        }

        .txt-bold {
            font-weight: bold;
        }

        .pic-h {
            height: 3in;
        }

        td,
        th {
            font-size: 20px;
            text-align: left;
        }

        table,
        tr,
        th,
        td {
            /* border: 1px solid black; */
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        .center {
            text-align: center;
        }

        .red {
            background-color: red;
        }

        .mr {
            margin-right: 20px;
        }

        .mt {
            margin-top: 10px;
        }

        body {
            font-size: 20px;
        }

        .bg-color {
            background-color: #05409e;
        }

        .color-b {
            background-color: #659af0;
        }

        .color-w {
            color: white;
        }

        .w100 {
            width: 100%;
        }

        .sig-size {
            width: 85px;
            height: 40px;
        }
    </style>
</head>

<body class="content">
    <h3>ภาคผนวกที่ 4 เอกสารแสดงความประสงค์ของผู้ปกครองเพื่อให้นักเรียน/นักศึกษาชั้น
        มัธยมศึกษาปีที่ 1-6 หรือเทียบเท่า ฉีดวัคซีนไฟเซอร์</h3>
    <div class="row bg-primary p-1">
        <div class="col-md-2">
            <table width="100%" class="bg-color">
                <tr>
                    <td> <img src="img/Public_Health_of_Thailand.png" alt="" width="64" height="64">
                    </td>
                    <td class="color-w"><strong>เอกสารแสดงความประสงค์ของผู้ปกครองให้นักเรียน/นักศึกษาฉีดวัคซีนไฟเซอร์</strong> </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row  mt-3 mt">
        <div class="col-md-5 bg-head-doc rounded h5 color-b"> ส่วนที่ 1 : ข้อควรรู้เกี่ยวกับโรคโควิด 19 และวัคซีนโควิด 19</div>
    </div>
    <div>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โรคโควิด 19 เกิดจากการติดเชื้อไวรัสโคโรนา 2019 ซึ่งการติดเชื้อในเด็กสามารถมีอาการได้หลากหลายตั้งแต่ไม่มี
        อาการเลย จนถึงปอดอักเสบรุนแรง หรือเสียชีวิต ร้อยละ 90 ของผู้ป่วยเด็กติดเชื้อมักมีอาการไม่รุนแรง โดยพบอาการเพียง
        เล็กน้อย เช่น ไข้ ไอ ปวดกล้ามเนื้อ และมีเพียงร้อยละ 5 ของผู้ป่วยเด็กติดเชื้อที่มีอาการรุนแรงหรือวิกฤติ เช่น ปอดอักเสบ
        รุนแรง ระบบหายใจหรือระบบไหลเวียนโลหิตล้มเหลว รวมถึงภาวะอักเสบหลายระบบในเด็ก ภาวะแทรกซ้อนมักพบในผู้ป่วย
        กลุ่มเสี่ยงสูง เช่น เด็กเล็กอายุน้อยกว่า 1 ปี ผู้ป่วยที่มีโรคประจำตัว เช่น โรคหัวใจและหลอดเลือด โรคไต โรคปอดเรื้อรัง
        หรือภาวะภูมิคุ้มกันบกพร่อง ในประเทศไทยพบว่าแม้จะมีการติดเชื้อในเด็กอายุน้อยกว่า 18 ปีในสัดส่วนที่สูงขึ้น แต่ผู้ป่วยเด็ก
        ที่ติดเชื้อโรคโควิด 19 ส่วนใหญ่มักมีอาการไม่รุนแรงและมีอัตราการเสียชีวิตน้อยมาก
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัคซีนมีประสิทธิภาพในการป้องกันการเจ็บป่วยจากโรคโควิด 19 ได้ในระดับสูง และสามารถช่วยลดความรุนแรงของ
        โรคได้ การฉีดวัคซีนอาจป้องกันโรคแบบไม่รุนแรงหรือไม่มีอาการไม่ได้ ดังนั้นผู้ที่ได้รับวัคซีนจึงยังอาจจะติดเชื้อไวรัสโคโรนา
        2019 ได้ จึงจำเป็นต้องปฏิบัติตามคำแนะนำและมาตรการอื่น ๆ ตามที่ศูนย์บริหารสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโร
        นา 2019คณะกรรมการโรคติดต่อจังหวัด/กรุงเทพมหานคร และกระทรวงสาธารณสุขกำหนด เช่น สวมหน้ากากอนามัย เว้น
        ระยะห่าง หมั่นล้างมือ ลงทะเบียนเมื่อเข้าไปยังสถานที่ เป็นต้น
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สำหรับวัคซีนโควิด 19 ในขณะนี้ (ณ วันที่ 15 กันยายน 2564) ที่ได้รับการขึ้นทะเบียนกับสำนักงานคณะกรรมการ
        อาหารและยาของประเทศไทย ให้ใช้ในผู้ที่มีอายุ 12 ปีขึ้นไป มีเพียงชนิดเดียว ได้แก่ วัคซีนไฟเซอร์ (Pfizer Vaccine) และได้
        ผ่านการเห็นชอบให้ใช้วัคซีนดังกล่าวจากคณะอนุกรรมการสร้างเสริมภูมิคุ้มกันโรค โดยวัคซีนนี้เป็นวัคซีนชนิดเอ็มอาร์เอ็นเอ
        (mRNA vaccine) ของบริษัท ไฟเซอร์ไบโอเอ็นเทค (Pizer-BioNTech) ซึ่งเป็นวัคซีนที่มีประสิทธิภาพสูง สามารถป้องกันการ
        นอนโรงพยาบาลเนื่องจากป่วยหนักและเสียชีวิตได้ มีข้อบ่งชี้ในการให้วัคซีนในบุคคลอายุ 12 ปีขึ้นไป โดยฉีดเข้ากล้ามเนื้อ 2
        ครั้ง ห่างกัน 3 - 4 สัปดาห์ และมีข้อห้ามในการรับวัคซีนไฟเซอร์ได้แก่ บุคคลที่มีอาการแพ้อย่างรุนแรงในการฉีดวัคซีนเข็ม
        แรก บุคคลที่แพ้วัคซีนและสารที่เป็นส่วนประกอบของวัคซีนอย่างรุนแรง ผู้ที่มีอายุน้อยกว่า 12 ปี ผู้ที่มีความเจ็บป่วย
        เฉียบพลัน และหญิงตั้งครรภ์ที่มีอายุครรภ์น้อยกว่า 12 สัปดาห์
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ที่มีความประสงค์รับวัคซีนไฟเซอร์ควรมีการเตรียมตัวก่อนรับวัคซีนไฟเซอร์ได้แก่ ปฏิบัติตัวตามปกติ พักผ่อนให้
        เพียงพอ ออกกำลังกายตามปกติ ทำจิตใจให้ไม่เครียดหรือวิตกกังวล หากเจ็บป่วยไม่สบายควรเลื่อนการฉีดออกไปก่อน ผู้ที่มี
        โรคประจำตัวต่าง ๆ สามารถรับวัคซีนได้ รับประทานยาประจำได้ตามปกติ ยกเว้นโรคที่มีความเสี่ยงที่อาจอันตรายถึงชีวิต โรค
        ที่ยังควบคุมไม่ได้ มีอาการกำเริบ หรืออาการยังไม่คงที่ เช่น โรคหัวใจและหลอดเลือด และโรคทางระบบประสาท เป็นต้น ในผู้
        ที่ไม่แน่ใจหรืออาการยังไม่คงที่ ควรให้แพทย์ผู้ดูแลเป็นประจำประเมินก่อนฉีด และการมีประจำเดือนไม่เป็นข้อห้ามในการฉีด
        วัคซีน
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากการศึกษาผลข้างเคียงของการฉีดวัคซีนไฟเซอร์ในเด็กและวัยรุ่น พบว่ามีความปลอดภัยสูง ไม่แตกต่างกับการฉีด
        ในประชากรกลุ่มอายุอื่นๆ โดยผลข้างเคียงที่พบบ่อย ได้แก่ เจ็บในตำแหน่งที่ฉีด อ่อนเพลีย ปวดศีรษะหรือมีไข้มักพบ
        ผลข้างเคียงหลังการฉีดวัคซีนเข็มที่สองมากกว่าหลังการฉีดเข็มแรกเล็กน้อย ส่วนมากอาการไม่รุนแรงและหายไปได้เองใน 1-2
        วัน หากพบอาการดังกล่าว แนะนำให้รับประทานยาพาราเซทตามอล และควรงดออกกำลังกายหลังได้รับวัคซีนนาน 1 สัปดาห์
        แม้ว่าวัคซีนเหล่านี้จะได้รับการรับรองจากสำนักงานคณะกรรมการอาหารและยา ว่ามีความปลอดภัยและให้ใช้ได้แล้วก็ตาม แต่
        การฉีดวัคซีนนี้ก็ยังสามารถทำให้เกิดอาการแพ้รุนแรง (anaphylaxis) ซึ่งเป็นปฏิกิริยาภูมิแพ้แบบฉับพลัน โดยมากมักเกิด
        ภายใน 5-30 นาทีหลังจากฉีดวัคซีน อาการแพ้รุนแรงมักมีอาการทั่วร่างกายหรือมีอาการแสดงหลายระบบ เช่น หอบเหนื่อย
        หลอดลมตีบ หมดสติ ความดันโลหิตต่ำ ผื่นลมพิษ ปากบวม หน้าบวม คลื่นไส้ อาเจียน หรืออาจมีความรุนแรงถึงชีวิต จึง
        จำเป็นต้องสังเกตอาการหลังการฉีดอย่างน้อย 30 นาทีในสถานพยาบาลหรือสถานที่ฉีดวัคซีนเสมอ
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากข้อมูลของศูนย์ควบคุมและป้องกันโรค ประเทศสหรัฐอเมริกา (US CDC) ณ วันที่ 11 มิถุนายน 2564 พบรายงาน
        การเกิดภาวะกล้ามเนื้อหัวใจอักเสบ หรือ เยื่อหุ้มหัวใจอักเสบภายหลังการฉีดวัคซีนชนิดเอ็มอาร์เอ็นเอ ในผู้ที่มีอายุ 12-17 ปี
        ได้โดยพบอาการดังกล่าวหลังฉีดเข็มที่สองมากกว่าเข็มที่ 1 และมักพบในเพศชาย (ประมาณ 66.7 รายจากการฉีดวัคซีน 1
        ล้านโดส) และเพศหญิง (ประมาณ 9.1 รายจากการฉีดวัคซีน 1 ล้านโดส) โดยอาการที่พบ เช่น การเจ็บหน้าอก หายใจไม่อิ่ม
        หรือ ใจสั่น อย่างไรก็ตาม จากการติดตามผู้ที่ได้รับการวินิจฉัยภาวะกล้ามเนื้อหัวใจอักเสบ หรือ เยื่อหุ้มหัวใจอักเสบในระยะสั้น
        พบว่า ส่วนใหญ่สามารถกลับมาใช้ชีวิตเป็นปกติได้ภายหลังการรักษา
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากผู้รับวัคซีนเกิดอาการไม่พึงประสงค์หรือไม่มั่นใจว่าอาการดังกล่าวเกิดจากวัคซีนหรือไม่ ควรแนะนำให้ผู้ปกครอง/
        ผู้รับวัคซีนปรึกษาแพทย์เพิ่มเติม โดยเฉพาะอย่างยิ่งหากมีอาการไม่พึงประสงค์ที่รุนแรงและเกิดขึ้นในช่วง 4 สัปดาห์หลังฉีด
        วัคซีน และหากฉีดวัคซีนแล้วมีปฏิกิริยาแพ้รุนแรง เช่น มีผื่นทั้งตัว หน้าบวม คอบวม หายใจลำบาก ใจสั่น วิงเวียนหรืออ่อน
        แรง หรือมีอาการแขนขาอ่อนแรง รวมถึงหากมีอาการเจ็บแน่นหน้าอก หายใจเหนื่อย หรือหายใจไม่อิ่ม ใจสั่น ซึ่งเป็นอาการที่
        สงสัยภาวะกล้ามเนื้อหัวใจอักเสบ/เยื่อหุ้มหัวใจอักเสบ ควรรีบไปพบแพทย์หรือโทร 1669 เพื่อรับบริการทางการแพทย์ฉุกเฉิน
    </div>
    <pagebreak />
    <?php $sql = "select * from doc2 where student_id = '$student_id'
        ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div class="row  mt-3 mt">
        <div class="col-md-5 bg-head-doc rounded h5 color-b"> ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์ </div>
    </div>
    <div class="mt jst">
        <table width="100%">
            <tr>
                <td>ข้าพเจ้า ชื่อ - นามสกุล <?php echo $row["prefix_parent"] . $row["parent_name"] . " " . $row["parent_surname"]; ?></td>
                <td>
                    หมายเลขโทรศัพท์ (ผู้ปกครอง) <?php echo $row["phone_parent"]; ?>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    ผู้ปกครองของ <?php echo $row["prefix_name"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>
                </td>
                <td>
                    มีความสัมพันธ์เป็น <?php echo $row["relevance"]; ?>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    ที่อยู่ <?php echo $row["home_id"]; ?>
                </td>
                <td>
                    หมู่ที่ <?php echo $row["moo"]; ?>
                </td>
                <td>
                    ถนน <?php echo $row["street"]; ?>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    ตำบล/แขวง <?php echo $row["tumbol_name"]; ?>
                </td>
                <td>
                    อำเภอ/เขต <?php echo $row["amphure_name"]; ?>
                </td>
                <td>
                    จังหวัด <?php echo $row["province_name"]; ?>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    หมายเลขโทรศัพท์ (นักเรียน) <?php echo $row["phone_std"]; ?>
                </td>

            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    ชื่อ-นามสกุล (นักเรียน) <?php echo $row["prefix_name"] . $row["stu_fname"] . " " . $row["stu_lname"]; ?>
                </td>
                <td>
                    อายุ <?php echo $row["age"]; ?> ปี
                </td>
                <td>
                    วัน/เดือน/ปีเกิด <?php echo $row["birthday"]; ?>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    เลขประจำตัว 13 หลัก/หมายเลขหนังสือเดินทาง (กรณีชาวต่างประเทศ) <?php echo $row["people_id"]; ?>
                <td>
                    สัญชาติ <?php echo $row["nationality"]; ?>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    ชื่อสถานศึกษา วิทยาลัยเทคนิคชลบุรี
                </td>
                <td>
                    ชั้น/ปี <?php echo $row["student_group_short_name"]; ?>
                </td>
                <td>
                    ห้อง <?php echo $row["group_no"]; ?>
                </td>
            </tr>
        </table>
        <div class="center mt">
            <div> ทั้งนี้ ข้าพเจ้าได้รับทราบข้อมูลและได้ซักถามรายละเอียดจนเข้าใจเกี่ยวกับวัคซีนไฟเซอร์และอาการไมพึงประสงคของวัคซีนที่
                อาจเกิดขึ้น เป็นที่เรียบร้อยแล้ว</div>

            <div> ข้าพเจ้า <input type="checkbox" <?php echo ($row["decision"] == 1 ? "checked='checked'" : "false"); ?>> ประสงค์ให้บุตรหลาน ฉีดวัคซีนไฟเซอร์โดยสมัครใจ</div>
            <div> <input type="checkbox" <?php echo ($row["decision"] == 0 ? "checked='checked'" : "false"); ?>> ไม่ประสงค์ให้บุตรหลาน ฉีดวัคซีนไฟเซอร์สาเหตุ (ถ้ามี)<?php echo $row["note"]; ?></div>
            <div>และรับรองว่าข้อมูลเป็นความจริง</div>
            <div>ลงชื่อ <img class="sig-size" src="signature/<?php echo $row["signature"]; ?>"> ผู้ปกครอง/ผู้แทนโดยชอบธรรม</div>
            <div>(<?php echo $row["prefix_parent"] . $row["parent_name"] . " " . $row["parent_surname"]; ?>)</div>
            <div> วันที่............./........................./..................</div>
            <div> หมายเหตุ : ขอให้นำเอกสารนี้แสดงแก่ครูประจำชั้นและเจ้าหน้าที่ผู้ให้บริการ ในวันที่ฉีดวัคซีน
                ข้อควรรู้เกี่ยวกับโรคโควิด-19 และวัคซีนโควิด-19 สามารถดาวน์โหลดอ่านได้ที่ QR code</div>
        </div>
        <?php $mpdf->AddPage(); ?>
        <pagebreak />
        <h3>ภาคผนวกที่ 5 แบบคัดกรองก่อนรับบริการฉีดวัคซีนโควิด 19 สำหรับนักเรียน/นักศึกษา
            ชั้นมัธยมศึกษาปีที่ 1-6 หรือเทียบเท่า</h3>
        <div class="row bg-primary p-1">
            <div class="col-md-2">
                <table width="100%" class="bg-color">
                    <tr>
                        <td> <img src="img/Public_Health_of_Thailand.png" alt="" width="64" height="64">
                        </td>
                        <td class="color-w"><strong>แบบคัดกรองก่อนรับบริการฉีดวัคซีนโควิด 19 สำหรับนักเรียน/นักศึกษาชั้น
                                มัธยมศึกษาปีที่ 1-6 หรือเทียบเท่า</strong> </td>
                    </tr>
                </table>
            </div>
        </div>
        <div>คำชี้แจง ให้ผู้ปกครอง กรุณากรอกข้อมูลโดยทำเครื่องหมาย ในช่องว่างตามความจริง เพื่อเจ้าหน้าที่
            จะได้พิจารณาว่า นักเรียน/นักศึกษา สามารถฉีดวัคซีนได้หรือไม่</div>
        <table class="table mt-5" border="1">
            <thead>
                <?php
                $sql2 = "select * from assessment a 
                left join topic t on t.topic_id = a.topic_id
                where a.student_id = '$student_id' order by t.topic_id";
                $res2 = mysqli_query($conn, $sql2);
                $i = 0;
                while ($row2 = mysqli_fetch_array($res2)) {
                ?>
                    <tr>
                        <td><?php echo (++$i) . ". " . $row2["topic_detail"] ?></td>
                        <td width="15%">
                            <input <?php echo ($row2["ass_result"] == 1 ? "checked='checked'" : "false"); ?> type="radio" name="<?php echo $row2["topic_id"]; ?>" value="1" required>ใช่&nbsp;&nbsp;
                            <input <?php echo ($row2["ass_result"] == 0 ? "checked='checked'" : "false"); ?> type="radio" name="<?php echo $row2["topic_id"]; ?>" value="0" required>ไม่ใช่
                        </td>
                    </tr>
                <?php } ?>
            </thead>
        </table>
        หมายเหตุ: หากนักเรียน/นักศึกษาในสถาบันการศึกษาดังกล่าว มีอายุเกิน 18 ปี ให้รับวัคซีนไฟเซอร์ได้พร้อม
        กับนักเรียนร่วมสถาบันการศึกษา
        <div class="center mt">
            <div>ทั้งนี้ ข้าพเจ้าขอรับรองว่าข้อมูลดังกล่าวเป็นความจริง</div>

            <div>ลงชื่อ <img class="sig-size" src="signature/<?php echo $row["signature"]; ?>"> ผู้ปกครอง/ผู้แทนโดยชอบธรรม</div>
            <div>(<?php echo $row["prefix_parent"] . $row["parent_name"] . " " . $row["parent_surname"]; ?>)</div>
            <div> วันที่............./........................./..................</div>
            <div>หมายเหตุ : ขอให้นำเอกสารนี้แสดงแก่เจ้าหน้าที่ผู้ให้บริการ ในวันที่ฉีดวัคซีน</div>
        </div>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
// $mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$taget = "pdf/report1.pdf";
$mpdf->Output($taget);
ob_end_flush();
echo "<script>window.location.href='$taget';</script>";
exit;
?>