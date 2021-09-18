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
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select id="group_id" class="form-control mb-3">
                                            <option value="">-- เลือกกลุ่ม --</option>
                                            <?php
                                            $sqlG = "select * from std_group order by group_id";
                                            $resG = mysqli_query($conn, $sqlG);
                                            while ($rowG = mysqli_fetch_array($resG)) {
                                            ?>
                                                <option value="<?php echo $rowG["group_id"]; ?>"><?php echo $rowG["group_name"] . " (" . $rowG["group_id"] . ")"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>รหัสประจำตัวนักเรียน/นักศึกษา</th>
                                            <th>ชื่อ - สกุล</th>
                                            <th>สถานะที่ลงทะเบียน</th>
                                            <th>อายุ</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>วันที่บันทึก</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <th>รหัสประจำตัวนักเรียน/นักศึกษา</th>
                                        <th>ชื่อ - สกุล</th>
                                        <th>สถานะที่ลงทะเบียน</th>
                                        <th>อายุ</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>วันที่บันทึก</th>
                                        <th></th>
                                        <th></th>
                                    </tfoot>
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
<script>
    $(document).ready(function() {
        $('#listStd').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "bDestroy": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 30,
            "ajax": {
                "url": "getTable.php",
                "type": "POST",
                "data": function(d) {
                    d.std = true
                    d.group_id = $("#group_id").val()
                }
            },
            'processing': true,
            "columns": [{
                    "data": "std_id"
                },
                {
                    "data": "std_name"
                },
                {
                    "data": "age"
                },
                {
                    "data": "phone_std"
                },
                {
                    "data": "stu_status"
                },
                {
                    "data": "print"
                },
            ],
            "language": {
                'processing': '<img src="img/tenor.gif" width="80">',
                "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
                "zeroRecords": "ไม่มีข้อมูล",
                "info": "กำลังแสดงข้อมูล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "search": "ค้นหา:",
                "infoEmpty": "ไม่มีข้อมูลแสดง",
                "infoFiltered": "(ค้นหาจาก _MAX_ total records)",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "หน้าต่อไป",
                    "previous": "หน้าก่อน"
                }
            }
        });

    })
</script>