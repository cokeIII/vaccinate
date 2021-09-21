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
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <select id="group_id" class="form-control ">
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
                                <table class="table table-responsive" id="listStd">
                                    <thead>
                                        <tr>
                                            <th>รหัสประจำตัวนักเรียน/นักศึกษา</th>
                                            <th>รหัสกลุ่ม</th>
                                            <th>ชื่อ - สกุล</th>
                                            <th>สถานะที่ลงทะเบียน</th>
                                            <th>อายุ</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>วันที่บันทึก</th>
                                            <th>สถานะ</th>
                                            <!-- <th></th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Modal -->
<!-- <div class="modal fade" id="printModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.updatePrint', function() {
            let thiss = $(this)
            $.ajax({
                type: "POST",
                url: "updatePrint.php",
                data: {
                    student_id: $(this).attr("stdId"),
                    status: $(this).html()
                },
                success: function(result) {
                    if (result == "ok") {
                        if (thiss.html() == "ส่งข้อมูล") {
                            thiss.removeClass("btn-secondary")
                            thiss.addClass("btn-success")
                            thiss.html("พิมพ์แล้ว")
                        } else {
                            thiss.removeClass("btn-success")
                            thiss.addClass("btn-secondary")
                            thiss.html("ส่งข้อมูล")
                        }
                    }
                }
            });
        })
        $("#group_id").select2()
        $("#group_id").change(function() {
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
                        d.std = true,
                            d.group_id = $("#group_id").val()
                    }
                },
                'processing': true,
                "columns": [{
                        "data": "std_id"
                    },
                    {
                        "data": "group_name"
                    },
                    {
                        "data": "std_name"
                    },
                    {
                        "data": "stu_status"
                    },
                    {
                        "data": "age"
                    },
                    {
                        "data": "phone_std"
                    },
                    {
                        "data": "time_stamp"
                    },
                    {
                        "data": "status"
                    },
                    // {
                    //     "data": "print"
                    // },
                    {
                        "data": "btnPrint"
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
                    d.std = true,
                        d.group_id = $("#group_id").val()
                }
            },
            'processing': true,
            "columns": [{
                    "data": "std_id"
                },
                {
                    "data": "group_name"
                },
                {
                    "data": "std_name"
                },
                {
                    "data": "stu_status"
                },
                {
                    "data": "age"
                },
                {
                    "data": "phone_std"
                },
                {
                    "data": "time_stamp"
                },
                {
                    "data": "status"
                },
                // {
                //     "data": "print"
                // },
                {
                    "data": "btnPrint"
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
            },
            responsive: true
        });

    })
</script>