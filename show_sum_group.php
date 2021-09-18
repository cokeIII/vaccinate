<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
    <style>
        #tb{
            width:90%;
            margin:auto;
        }
        tbody tr td{
            font-size: 14px;
        }
    </style>
    
</head>
<?php
if (isset($_POST['level'])){
    $level=$_POST['level'];
    $_SESSION['level']=$level;
}
?>
<body>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <?php require_once "menuTop.php"; ?>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="text-center">
                <h3>รายงานสรุปตามกลุ่มการเรียน</h3>
                <div class="row " >
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
                                            $a1='';$a2='';$a3='';$a4='';$a5='';
                                            if (isset($_SESSION['level'])){
                                                if ($_SESSION['level']=='642')
                                                    $a1="selected";
                                                elseif ($_SESSION['level']=='632')
                                                    $a2="selected";
                                                elseif ($_SESSION['level']=='622')
                                                    $a3="selected";
                                                elseif ($_SESSION['level']=='643')
                                                    $a4="selected";
                                                elseif ($_SESSION['level']=='633')
                                                    $a5="selected";
                                                elseif ($_SESSION['level']=='612')
                                                    $a6="selected";
                                                elseif ($_SESSION['level']=='623')
                                                    $a7="selected";
                                            }
                                            ?>
                                            <option value="">--เลือกระดับชั้น--</option>
                                            <option value="642" <?php echo $a1?>>ปวช.1</option>
                                            <option value="632" <?php echo $a2?>>ปวช.2</option>
                                            <option value="622" <?php echo $a3?>>ปวช.3</option>
                                            <option value="612" <?php echo $a6?>>ปวช.ตกค้าง</option>
                                            <option value="643" <?php echo $a4?>>ปวส.1</option>
                                            <option value="633" <?php echo $a5?>>ปวส.2</option>
                                            <option value="623" <?php echo $a6?>>ปวส.3 และตกค้าง</option>

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
                if (isset($_SESSION['level'])){
                    $level=$_SESSION['level'];

                    if ($level=='612'){
                        $sql="SELECT stdg.`student_group_id`,stdg.`student_group_short_name` as name ,sg.group_name,stdg.`teacher_id1`
                            FROM `student_group` stdg
                            INNER JOIN std_group sg on sg.group_id=stdg.`student_group_id`
                            where (substr(stdg.`student_group_id`,1,3) = '612'
                            or substr(stdg.`student_group_id`,1,3) = '602')
                            and stdg.`student_group_id` !='632090103' and stdg.`student_group_id` !='632090104'
                            and stdg.`student_group_id` not LIKE '62202%'
                            and stdg.`student_group_id` not LIKE '6122%'
                            
                            ORDER by stdg.`student_group_id`";

                    }else if($level=='623'){
                        $sql="SELECT stdg.`student_group_id`,stdg.`student_group_short_name` as name ,sg.group_name,stdg.`teacher_id1`
                            FROM `student_group` stdg
                            INNER JOIN std_group sg on sg.group_id=stdg.`student_group_id`
                            where (substr(stdg.`student_group_id`,1,3) = '623'
                            or substr(stdg.`student_group_id`,1,3) = '613'
                            or substr(stdg.`student_group_id`,1,3) = '603')
                            and stdg.`student_group_id` !='632090103' and stdg.`student_group_id` !='632090104'
                            and stdg.`student_group_id` not LIKE '62202%'
                            and stdg.`student_group_id` not LIKE '6122%'
                            ORDER by stdg.`student_group_id`";                            
                    }
                    else{
                        $sql="SELECT stdg.`student_group_id`,stdg.`student_group_short_name` as name ,sg.group_name,stdg.`teacher_id1`
                            FROM `student_group` stdg
                            INNER JOIN std_group sg on sg.group_id=stdg.`student_group_id`
                            where substr(stdg.`student_group_id`,1,3) = '$level'
                            and stdg.`student_group_id` !='632090103' and stdg.`student_group_id` !='632090104'
                            and stdg.`student_group_id` not LIKE '62202%'
                            ORDER by stdg.`student_group_id`";
                    }
                
                    


                    $res=mysqli_query($conn, $sql);
                    ?>
                    <br>
                    <table class="table table-bordered table-striped table-responsive-lg" id='tb'>
                        <thead>
                            <!-- <tr>
                                <th colspan=6>ระดับ <?php echo $level ?></th>
                            </tr> -->
                            <tr>
                                <th>ที่</th>
                                <th>รหัสกลุ่ม</th>
                                <th>ชื่อกลุ่ม</th>
                                <th>ชื่อครูที่ปรึกษา</th>
                                <th class="text-center">นักเรียนทั้งหมด</th>
                                <th class="text-center">บันทึกข้อมูล</th>
                                <th class="text-center">ฉีด</th>
                                <th class="text-center">ไม่ฉีด</th>
                                <th class="text-center">ฉีดแล้ว</th>
                                <th class="text-center"> % </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter=1;
                            while ($row = mysqli_fetch_array($res)){
                            ?>
                            <tr>
                                <td><?php echo $counter++?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['group_name']?></td>
                                <td><?php echo get_teacher_name($row['teacher_id1'])?></td>
                                <td class="text-center"><?php echo $csum[]=count_sum($level,$row['student_group_id'])?></td>
                                <td class="text-center"><?php echo $csent[]=status_sent($level,$row['student_group_id']) ?></td>
                                <td class="text-center"><?php echo $cok[]=status_ok($level,$row['student_group_id']) ?></td>
                                <td class="text-center"><?php echo $cno[]=status_no($level,$row['student_group_id']) ?></td>
                                <td class="text-center"><?php echo $cready[]=status_ready($level,$row['student_group_id']) ?></td>
                                <?php
                                if(count_sum($level,$row['student_group_id'])==0){
                                    $sum=1;
                                }else{
                                    $sum=count_sum($level,$row['student_group_id']);
                                }
                                $percent= status_sent($level,$row['student_group_id'])/$sum*100;
                                ?>
                                <td class="text-center"><?php echo number_format($percent,2) ?></td>
                            </tr>
                        
                            <?php
                            }

                
                            if (is_array($csum)){
                                ?>   
                                <tr class="bg-info">
                                    <td colspan='4'></td>
                                    <td  class="text-center"><?php echo Array_sum($csum)?></td>
                                    <td class="text-center"><?php echo Array_sum($csent)?></td>
                                    <td class="text-center"><?php echo Array_sum($cok)?></td>
                                    <td class="text-center"><?php echo Array_sum($cno)?></td>
                                    <td class="text-center"><?php echo Array_sum($cready)?></td>
                                    <?php
                                        $sum_percent= Array_sum($csent)/Array_sum($csum)*100;
                                    ?>
                                    <td class="text-center"><?php echo number_format($sum_percent,2) ?></td>
                                </tr> 
                                
                                <?php
                            }
                            ?>
                        </tbody>
                    </table> 
                    <?php
                }
                    
                ?>
                <br>
            

        </div>
    </div>
<?php
function get_teacher_name($id){
    global $conn;
    $sql="SELECT concat(`people_name`,'  ',`people_surname`) as name FROM `people` 
    WHERE `people_id`='$id'";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['name'];
}

function count_sum($level,$gid){
    global $conn;
    $id=$level."%";
    $sql="SELECT count(*) as c FROM `student` 
    INNER JOIN std_group on student.group_id=std_group.group_id
    WHERE student.`group_id` = '$gid'
    and student.`status`='0' and std_group.`group_id` like '$id' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['c'];
}

function status_sent($level,$gid){
    global $conn;
    $id=$level."%";
    $sql="SELECT count(*) as c FROM `stu_status`
    INNER JOIN student on student.student_id=`stu_status`.student_id
    where  student.`group_id` = '$gid' and student.`group_id` like '$id' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['c'];
}

function status_ok($level,$gid){
    global $conn;
    $id=$level."%";
    $sql="SELECT count(*) as c FROM `stu_status` 
    INNER JOIN student on student.student_id=`stu_status`.student_id 
    where student.`group_id` = '$gid' 
    and student.`group_id` like '$id'
    and `student_status`='ประสงค์จะฉีด' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['c'];
}

function status_no($level,$gid){
    global $conn;
    $id=$level."%";
    $sql="SELECT count(*) as c FROM `stu_status` 
    INNER JOIN student on student.student_id=`stu_status`.student_id 
    where student.`group_id` = '$gid' 
    and student.`group_id` like '$id'
    and `student_status`='ไม่ประสงค์ฉีด' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['c'];
}

function status_ready($level,$gid){
    global $conn;
    $id=$level."%";
    $sql="SELECT count(*) as c FROM `stu_status` 
    INNER JOIN student on student.student_id=`stu_status`.student_id 
    where student.`group_id` = '$gid' 
    and student.`group_id` like '$id'
    and `student_status`='ฉีดแล้ว' ";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['c'];
}