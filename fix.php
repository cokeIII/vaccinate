<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $textErr = "";
    require_once "setHead.php";
    if (!empty($_REQUEST["textErr"])) {
        $textErr = $_REQUEST["textErr"];
    }
    ?>
</head>
<style>
    .text-err {
        color: blue;
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="text-err h3">ปิดรับข้อมูล</div>
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