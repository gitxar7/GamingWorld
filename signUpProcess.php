<?php

require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if (empty($fname)) {
    echo ("1");
} else if (strlen($fname) > 50) {
    echo ("2");
} else if (empty($lname)) {
    echo ("3");
} else if (strlen($lname) > 50) {
    echo ("4");
} else if (empty($email)) {
    echo ("5");
} else if (strlen($email) > 100) {
    echo ("6");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("7");
} else if (empty($password)) {
    echo ("8");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("9");
} else if (empty($mobile)) {
    echo ("10");
} else if (strlen($mobile) != 10) {
    echo ("11");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo ("12");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
    echo ("13");
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`
                (`fname`,`lname`,`email`,`mobile`,`password`, `gender_id`,`joined_date`, `status_id`, `img`) VALUES
                ('" . $fname . "','" . $lname . "','" . $email . "', '" . $mobile . "','" . $password . "','" . $gender . "','" . $date . "','1', 'resources/profile_img/gamer.png')");

        echo ("success");
    }
}
