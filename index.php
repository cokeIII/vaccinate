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
                                <div id="login-row" class="row justify-content-center align-items-center">
                                    <div id="login-column" class="col-md-6">
                                        <div id="login-box" class="col-md-12">
                                            <form id="login-form" class="form" action="login.php" method="post">
                                                <h3 class="text-center ">ระบบ ยินยอมรับบริการฉีดวัคซีนโควิด 19</h3>
                                                <div class="form-group">
                                                    <label for="username" class="">รหัสนักศึกษา :</label><br>
                                                    <input type="text" name="username" id="username" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="">รหัสผ่าน :</label><br>
                                                    <input type="password" name="password" id="password" class="form-control" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="เข้าสู่ระบบ">
                                                </div>
                                            </form>
                                            <div class="note mt-3">
                                                <p>หมายเหตุ:</p>
                                                <p> - เข้าสู่ระบบโดยใช้ ชื่อผู้ใช้งานคือ รหัสประจำตัวนักเรียน นักศึกษา
                                                <div>รหัสผ่านคือ วัน/เดือน/ปีเกิด เช่น 30/12/2540</div>
                                            </div>
                                        </div>
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