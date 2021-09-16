<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <?php //require_once "menuSidebar.php"; ?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <?php require_once "menuTop.php"; ?>
            <!-- Page content-->
            <div class="container">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>ดึงข้อมูลนักเรียนจาก rms</h4>
                                <button class="btn btn-warning" id="studentPull"><i class="fas fa-database"></i> ดึงข้อมูลนักเรียน</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>ดึงข้อมูลผู้ให้คำยินยอมจาก rms</h4>
                                <button class="btn btn-warning" id="parentPull"><i class="fas fa-database"></i> ดึงข้อมูลผู้ให้คำยินยอม</button>
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
        $('body').loadingIndicator();
        var loader = $('body').data("loadingIndicator")
        loader.hide()
        $(document).on('click', '#studentPull', function() {
            $('body').data("loadingIndicator")
            loader.show()
            $.ajax({
                type: "POST",
                url: "studentPull.php",
                data: {},
                success: function(result) {
                    console.log(result)
                    if (result == "ok") {
                        loader.hide()
                    }
                }
            });
        })
        $(document).on('click', '#parentPull', function() {
            loader.show()
            $.ajax({
                type: "POST",
                url: "parentPull.php",
                data: {},
                success: function(result) {
                    console.log(result)
                    if (result == "ok") {
                        loader.hide()
                    }
                }
            });
        })
    })
</script>