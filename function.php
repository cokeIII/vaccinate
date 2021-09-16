<?php
require_once "connect.php";

function calAge($birthday)
{
    $birthDate = explode("/", $birthday);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2] - 543))) > date("md")
        ? ((date("Y") - ($birthDate[2] - 543)) - 1)
        : (date("Y") - ($birthDate[2] - 543)));
    $groupAge = "";
    if ($age >= 12 && $age <= 17) {
        $groupAge = "12-18";
    } else if ($age >= 18) {
        $groupAge = "18";
    } else if ($age < 12) {
        $groupAge = "<12";
    }
    return  $groupAge;
}

function calAgeNumber($birthday)
{
    $birthDate = explode("/", $birthday);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2] - 543))) > date("md")
        ? ((date("Y") - ($birthDate[2] - 543)) - 1)
        : (date("Y") - ($birthDate[2] - 543)));
    return  $age;
}

