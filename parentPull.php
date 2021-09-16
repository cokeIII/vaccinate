<?php
require_once "connect.php"; 
$sql = "select * from student_family";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res)){

    $student_id = $row["student_id"];

    $parent_th_prefix = $row["parent_th_prefix"];
    $parent_th_name = $row["parent_th_name"];
    $parent_th_surname = $row["parent_th_surname"];
    $father_th_prefix = $row["father_th_prefix"];
    $father_th_name = $row["father_th_name"];
    $father_th_surname = $row["father_th_surname"];
    $mother_th_prefix = $row["mother_th_prefix"];
    $mother_th_name = $row["mother_th_name"];
    $mother_th_surname = $row["mother_th_surname"];
    
    // $sqlParent = "replace into parents (
    //     student_id,
    //     parent_th_prefix,
    //     parent_th_name,
    //     parent_th_surname,
    //     relevance,
    //     id_card_pic
    // ) values (
    //     '$student_id',
    //     '$parent_th_prefix',
    //     '$parent_th_name',
    //     '$parent_th_surname',
    //     '',
    //     ''
    // )";
    // mysqli_query($conn,$sqlParent);
    $parent_id = $student_id."F";
    $sqlFather = "replace into parents (
        parent_id,
        student_id,
        parent_th_prefix,
        parent_th_name,
        parent_th_surname,
        relevance,
        id_card_pic
    ) values (
        '$parent_id',
        '$student_id',
        '$father_th_prefix',
        '$father_th_name',
        '$parent_th_surname',
        'บิดา',
        ''
    )";
    mysqli_query($conn,$sqlFather);
    $parent_id = $student_id."M";
    $sqlMother = "replace into parents (
        parent_id,
        student_id,
        parent_th_prefix,
        parent_th_name,
        parent_th_surname,
        relevance,
        id_card_pic
    ) values (
        '$parent_id',
        '$student_id',
        '$mother_th_prefix',
        '$mother_th_name',
        '$mother_th_surname',
        'มารดา',
        ''
    )";
    mysqli_query($conn,$sqlMother);
}
echo "ok";