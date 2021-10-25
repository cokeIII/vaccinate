<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
    <style>
        #tb {
            width: 90%;
            margin: auto;
        }

        tbody tr td {
            font-size: 14px;
        }
    </style>

</head>
<?php
if (isset($_POST['level'])) {
    $level = $_POST['level'];
    $_SESSION['level'] = $level;
}
date_default_timezone_set("Asia/Bangkok");
$student_all = count_all_student();
?>

<body>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <?php require_once "menuTop.php"; ?>
        <!-- Page content-->
        <div class="container-fluid mt-3">
            <div class="row justify-content-center" style="margin:auto">
                <div class="card bg-primary" style="width:200px">
                    <div class="card-header text-white text-center">นักเรียนทั้งหมดที่ต้องฉีดวัคซีน</div>
                    <div class="card-body text-white text-center"><?php echo $student_all ?></div>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="card bg-warning" style="width:230px">
                    <div class="card-header text-white text-center">จำนวนการเซ็นรับทราบ</div>
                    <div class="card-body text-white text-center"><?php echo $s2 = get_all_sent() ?>
                        (
                        <?php
                        echo number_format($s2 / $student_all * 100, 2);
                        ?> %
                        )
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="card bg-info" style="width:230px">
                    <div class="card-header text-white text-center">ประสงค์ฉีดเข็มที่ 2</div>
                    <div class="card-body text-white text-center"><?php echo $s2 = get_one_status() ?>
                        (
                        <?php
                        echo number_format($s2 / $student_all * 100, 2);
                        ?> %
                        )
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="card bg-danger" style="width:230px">
                    <div class="card-header text-white text-center">ไม่ประสงค์ฉีดเข็มที่ 2</div>
                    <div class="card-body text-white text-center"><?php echo $s2 = get_zero_status() ?>
                        (
                        <?php
                        echo number_format($s2 / $student_all * 100, 2);
                        ?> %
                        )
                    </div>
                </div>

            </div>
            <br>

            <div class="text-center">
                <h3>รายงานสรุปตามกลุ่มการเรียน </h3>
                <h4>วันที่ <?php echo chDay(date("Y-m-d")); ?> &nbsp; เวลา <?php echo date("H:i") ?> น.</h4>
                <div class="row ">
                    <div class="col-md-3">
                        <label style="display:block; text-align: right;">เลือกระดับชั้น:</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <select class="form-control" name="level" id="">
                                            <?php
                                            $a1 = '';
                                            $a2 = '';
                                            $a3 = '';
                                            $a4 = '';
                                            $a5 = '';
                                            if (isset($_SESSION['level'])) {
                                                if ($_SESSION['level'] == '642')
                                                    $a1 = "selected";
                                                elseif ($_SESSION['level'] == '632')
                                                    $a2 = "selected";
                                                elseif ($_SESSION['level'] == '622')
                                                    $a3 = "selected";
                                                elseif ($_SESSION['level'] == '643')
                                                    $a4 = "selected";
                                                elseif ($_SESSION['level'] == '633')
                                                    $a5 = "selected";
                                                elseif ($_SESSION['level'] == '612')
                                                    $a6 = "selected";
                                                elseif ($_SESSION['level'] == '623')
                                                    $a7 = "selected";
                                            }
                                            ?>
                                            <option value="">--เลือกระดับชั้น--</option>
                                            <option value="642" <?php echo $a1 ?>>ปวช.1</option>
                                            <option value="632" <?php echo $a2 ?>>ปวช.2</option>
                                            <option value="622" <?php echo $a3 ?>>ปวช.3</option>
                                            <option value="612" <?php echo $a6 ?>>ปวช.ตกค้าง</option>
                                            <option value="643" <?php echo $a4 ?>>ปวส.1</option>
                                            <option value="633" <?php echo $a5 ?>>ปวส.2</option>
                                            <option value="623" <?php echo $a7 ?>>ปวส.3 และตกค้าง</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2" style="display:block; text-align: left;">
                                        <button type="submit" class="btn btn-primary"> OK </button>
                                    </div>
                                </div>

                                <!-- <div class="col-md-2">
                                    <a href="sum_everyday_ex.php">
                                    <button type="button" class="btn btn-info"> excel </button></a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['level'])) {
                $level = $_SESSION['level'];

                if ($level == '612') {
                    $sql = "SELECT stdg.`student_group_id`,stdg.`student_group_short_name` as name ,sg.group_name,stdg.`teacher_id1`
                            FROM `student_group` stdg
                            INNER JOIN std_group2 sg on sg.group_id=stdg.`student_group_id`
                            where (substr(stdg.`student_group_id`,1,3) = '612'
                            or substr(stdg.`student_group_id`,1,3) = '602'
                            or substr(stdg.`student_group_id`,1,3) = '592'
                            )
                            and stdg.`student_group_id` !='632090103' and stdg.`student_group_id` !='632090104'
                            and stdg.`student_group_id` not LIKE '62202%'
                            and stdg.`student_group_id` not LIKE '6122%'
                            and stdg.`student_group_id` != '633010403'
                            and stdg.`student_group_id` != '633010404'
                            ORDER by stdg.`student_group_id`";
                } else if ($level == '623') {
                    $sql = "SELECT stdg.`student_group_id`,stdg.`student_group_short_name` as name ,sg.group_name,stdg.`teacher_id1`
                            FROM `student_group` stdg
                            INNER JOIN std_group2 sg on sg.group_id=stdg.`student_group_id`
                            where (substr(stdg.`student_group_id`,1,3) = '623'
                            or substr(stdg.`student_group_id`,1,3) = '613'
                            or substr(stdg.`student_group_id`,1,3) = '603')
                            and stdg.`student_group_id` !='632090103' and stdg.`student_group_id` !='632090104'
                            and stdg.`student_group_id` not LIKE '62202%'
                            and stdg.`student_group_id` not LIKE '6122%'
                            and stdg.`student_group_id` != '633010403'
                            and stdg.`student_group_id` != '633010404'

                            ORDER by stdg.`student_group_id`";
                } else {
                    $sql = "SELECT stdg.`student_group_id`,stdg.`student_group_short_name` as name ,sg.group_name,stdg.`teacher_id1`
                            FROM `student_group` stdg
                            INNER JOIN std_group2 sg on sg.group_id=stdg.`student_group_id`
                            where substr(stdg.`student_group_id`,1,3) = '$level'
                            and stdg.`student_group_id` !='632090103' and stdg.`student_group_id` !='632090104'
                            and stdg.`student_group_id` not LIKE '62202%'
                            and stdg.`student_group_id` != '633010403'
                            and stdg.`student_group_id` != '633010404'

                            ORDER by stdg.`student_group_id`";
                }




                $res = mysqli_query($conn, $sql);
            ?>
                <br>
                <table class="table table-bordered table-striped table-responsive-lg" id='tb'>
                    <thead>
                        <tr>
                            <th>ที่</th>
                            <th>รหัสกลุ่ม</th>
                            <th>ชื่อกลุ่ม</th>
                            <th>ชื่อครูที่ปรึกษา</th>
                            <th class="text-center">นักเรียนทั้งหมดที่ต้องฉีดวัคซีน</th>
                            <th class="text-center">รับทราบข้อมูล</th>
                            <th class="text-center"> % </th>
                            <th>print</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        while ($row = mysqli_fetch_array($res)) {
                            // if (count_sum($level, $row['student_group_id']) != 0) {
                        ?>
                                <tr>
                                    <td><?php echo $counter++ ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['group_name'] ?></td>
                                    <td><?php echo get_teacher_name($row['teacher_id1']) ?></td>
                                    <td class="text-center"><?php echo $csum[] = count_sum($level, $row['student_group_id']) ?></td>
                                    <td class="text-center"><?php echo $csent[] = status_sent($level, $row['student_group_id']) ?></td>
                                    <?php
                                    $sum = count_sum($level, $row['student_group_id']);
                                    if ($sum != 0) {
                                        if (count_sum($level, $row['student_group_id']) == 0) {
                                            $sum = 1;
                                        } else {
                                            $sum = count_sum($level, $row['student_group_id']);
                                        }
                                        $percent = status_sent($level, $row['student_group_id']) / $sum * 100;
                                    } else {
                                        $percent = 100;
                                    }
                                    if ($percent >= 100) {
                                        $bg = 'bg-primary text-white';
                                    } else if ($percent < 70) {
                                        $bg = 'bg-danger text-white';
                                    } else {
                                        $bg = '';
                                    }
                                    ?>
                                    <td class="text-center <?php echo $bg ?>"><?php echo number_format($percent, 2) ?></td>
                                    <td><a href="reportConfirmPdf2.php?group=<?php echo $row['student_group_id'] ?>" target="_blank"><button class="btn bg-info">print</button></a></td>
                                </tr>


                            <?php
                            }


                            if (is_array($csum)) {
                            ?>
                                <tr class="bg-info">
                                    <td colspan='4'></td>
                                    <td class="text-center"><?php echo Array_sum($csum) ?></td>
                                    <td class="text-center"><?php echo Array_sum($csent) ?></td>
                                    <?php
                                    if (Array_sum($csent) != 0 && Array_sum($csum) != 0) {
                                        $sum_percent = Array_sum($csent) / Array_sum($csum) * 100;
                                    } else {
                                        $sum_percent = (Array_sum($csent) + 1) / (Array_sum($csum) + 1) * 100;
                                    }
                                    ?>
                                    <td class="text-center"><?php echo number_format($sum_percent, 2) ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ที่</th>
                            <th>รหัสกลุ่ม</th>
                            <th>ชื่อกลุ่ม</th>
                            <th>ชื่อครูที่ปรึกษา</th>
                            <th class="text-center">นักเรียนทั้งหมด</th>
                            <th class="text-center">บันทึกข้อมูล</th>
                            <th class="text-center"> % </th>
                        </tr>
                    </tfoot>
                </table>
        <?php
                        }
                    // }
        ?>
        <br>


        </div>
    </div>
    <?php
    function get_one_status()
    {
        global $conn;
        $sql = "SELECT count(student_id) as c FROM `confirm` WHERE status_confirm2 = 1";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['c'];
    }
    function get_zero_status()
    {
        global $conn;
        $sql = "SELECT count(student_id) as c FROM `confirm` WHERE status_confirm2 = '0'";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['c'];
    }
    function get_teacher_name($id)
    {
        global $conn;
        $sql = "SELECT concat(`people_name`,'  ',`people_surname`) as name FROM `people` 
    WHERE `people_id`='$id'";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['name'];
    }

    // นักเรียนทั้งหมดไม่รวมทวิศึกษา
    function count_all_student()
    {
        global $conn;
        $id = $level . "%";
        $sql = "SELECT count(*) as c FROM `student` 
    INNER JOIN stu_status ss on ss.student_id = student.student_id
    WHERE STATUS='0'
    and group_id !='632090103'
    and group_id !='632090104'
    and group_id not LIKE '62202%'
    and group_id not LIKE '6122%'
    and group_id != '633010403'
    and group_id != '633010404'
    and ss.student_status = 'ประสงค์จะฉีด'";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['c'];
    }

    function count_sum($level, $gid)
    {
        global $conn;
        $id = $level . "%";
        $sql = "SELECT count(*) as c FROM `student` 
    INNER JOIN std_group on student.group_id=std_group.group_id
    INNER JOIN stu_status ss on ss.student_id = student.student_id
    WHERE student.`group_id` = '$gid'
    and student.`status`='0'
    and ss.student_status = 'ประสงค์จะฉีด' 
    -- and std_group.`group_id` like '$id' 
    ";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['c'];
    }

    function status_sent($level, $gid)
    {
        global $conn;
        $id = $level . "%";
        $sql = "SELECT count(*) as c FROM confirm
    INNER JOIN student on student.student_id = confirm.student_id
    INNER JOIN stu_status ss on ss.student_id = confirm.student_id
    where  student.`group_id` = '$gid' 
    -- and student.`group_id` like '$id'
    and ss.student_status = 'ประสงค์จะฉีด'
    and status_confirm2 != ''
    ";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['c'];
    }


    //แปลง 2011-03-08 to 8 มีนาคม 2554
    function chDay($s)
    {
        $d = explode("-", $s);
        //print_r($d);
        $arr_month = array(
            'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
            'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
        );
        $y = $d[0] + 543;
        //$da=ins0($d[0]);
        return del0($d[2]) . " " . $arr_month[$d[1] - 1] . " " . $y;
    }

    //ตัดเลข 0 ถ้าไม่ถึง 10 //=== 08 >> 8
    function del0($s)
    {
        if ($s < 10) {
            $r = substr($s, 1);
        } else {
            $r = $s;
        }
        return $r;
    }

    //ส่งทั้งหมด  
    function get_all_sent()
    {
        global $conn;
        $sql = "SELECT count(*) as c FROM confirm 
        INNER JOIN stu_status ss on ss.student_id = confirm.student_id
        WHERE confirm.student_id !='' 
        and status_confirm2 != ''
        and  ss.student_id !=''
        and ss.student_status = 'ประสงค์จะฉีด'
        ";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return $row['c'];
    }
