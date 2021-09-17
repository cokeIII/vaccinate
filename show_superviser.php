<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
    
</head>
<?php
    // $_SESSION['teacher_id'] = '3240400238082'; //hard code
    $teacher_id = $_SESSION["teacher_id"];
    $group=get_group_name($teacher_id);//array
    $teacher_name=get_teacher_name($teacher_id);
    // print_r($group);
?>
<body>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <?php require_once "menuTop.php"; ?>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="text-center">
                <h3>รายงานสรุปครูที่ปรึกษา</h3>
                <form action="" method="post">
                <?php
                
                ?>
                    <label for="">เลือกกลุ่มการเรียน</label>
                    <select name="group_id" id="">
                        <?php
                        foreach($group as $k1 => $value1){
                            echo "<option value='$value1'>$value1</option>";
                        }
                        ?>
                    </select>
                    <button class="btn btn-primary" type="submit"> OK </button>
                </form>            
                <?php
                if(isset($_POST['group_id'])){
                    $group=$_POST['group_id'];
                    $g=explode("=>",$group);
                    $group_id=$g[0];
                    $group_name=$g[1];
                    $sql="SELECT stu_status.student_id,
                    concat(prefix.prefix_name,student.stu_fname,'  ',student.stu_lname) as name,
                    stu_status.time_stamp,student.par_tell,
                    stu_status.student_status
                    FROM `stu_status` 
                    INNER JOIN student ON stu_status.student_id=student.student_id
                    INNER JOIN prefix ON prefix.prefix_id=student.perfix_id
                    WHERE student.group_id='$group_id'
                    ORDER by student.student_id";
                    // echo $sql;
                    $res=mysqli_query($conn,$sql);

                }
                ?>
                    <div class="text-center">
                        <h5>ชื่อกลุ่ม <?php echo $group_name ?> ชื่อครูที่ปรึกษา <?php echo $teacher_name?></h5>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ที่</th>
                            <th>รหัสนักเรียน</th>
                            <th>ชื่อ-สกุล</th>
                            <th>เวลาส่ง</th>
                            <th>หมายเลขโทรศัพท์</th>
                            <th>รายการ</th>
                        </tr>
                        <?php
                        $c=0;
                        while($row=mysqli_fetch_assoc($res)){
                            $c++;
                        ?>
                            <tr>
                                <td><?php echo $c ?></td>
                                <td><?php echo $row['student_id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['time_stamp'] ?></td>
                                <td><?php echo $row['par_tell'] ?></td>
                                <td><?php echo $row['student_status'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                <?php        
                // }
                ?>
            </div>
                
                
            



                <?php
                    // }
                
                ?>

        </div>
    </div>

</body>

</html>
<?php require_once "setFoot.php"; ?>

<?php
function get_group_name($teacher_id){
    global $conn;
    $sql="SELECT `student_group_id`,`std_group`.`group_name` FROM `student_group` 
    INNER JOIN `std_group` ON `std_group`.`group_id`= `student_group`.`student_group_id`
    WHERE `teacher_id1`='$teacher_id'";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $group_name[]=$row['student_group_id']."=>".$row['group_name'];
    }
    return $group_name;
}

function get_teacher_name($id){
    global $conn;
    $sql="SELECT concat(`people_name`,'  ',`people_surname`) as name FROM `people` 
    WHERE `people_id`='$id'";
    // echo $sql;
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['name'];
}