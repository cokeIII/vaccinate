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
                            <div class="card-body p-3">
                                <div class="row  mt-3">
                                    <div class="col-md-7 bg-head-doc rounded h5"> ส่วนที่ 2 : เอกสารแสดงความประสงค์ของผู้ปกครองให้บุตรหลานฉีดวัคซีนไฟเซอร์</div>
                                </div>
                                <hr>
                                <!-- <h5>ข้อมูลผู้ปกครอง</h5> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>คำนำหน้าชื่อ</label>
                                        <input type="text" class="form-control mt-1">
                                    </div>
                                    <div class="col-md-3">
                                        <label>ชื่อ</label>
                                        <input type="text" name="parent_th_name" id="parent_th_name" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-3">
                                        <label>สกุล</label>
                                        <input type="text" name="parent_th_surname" id="parent_th_surname" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-3">
                                        <label>หมายเลขโทรศัพท์ (ผู้ปกครอง)</label>
                                        <input type="number" name="telPar" id="telPar" class="form-control mt-1" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ผู้ปกครองของ</label>
                                        <input type="text" name="parent_form" id="" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>มีความสัมพันธ์เป็น</label>
                                        <input type="text" name="relevance_form" id="" class="form-control mt-1" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>ที่อยู่</label>
                                        <input type="text" name="address" id="address" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label>หมู่ที่</label>
                                        <input type="number" name="moo" id="moo" class="form-control mt-1" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label>ถนน</label>
                                        <input type="text" name="road" id="road" class="form-control mt-1" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">ตำบล</label>
                                        <select name="tumbol" id="tumbol">
                                            
                                        </select>
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
    $(document).ready(function(){
        
    })
</script>