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
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                </table>
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