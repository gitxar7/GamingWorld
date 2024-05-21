<?php

require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$msg = $_POST["m"];
$type = $_POST["t"];

if (empty($fname)) {
    echo ("1");
} else if (strlen($fname) > 50) {
    echo ("2");
} else if (empty($email)) {
    echo ("3");
} else if (strlen($email) > 100) {
    echo ("4");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("5");
} else if (empty($msg)) {
    echo ("6");
} else {

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    Database::iud("INSERT INTO `help_and_contact`(`fname`,`lname`,`email`,`type`,`msg`, `date_time`) VALUES ('" . $fname . "','" . $lname . "','" . $email . "', '" . $type . "','" . $msg . "','" . $date . "')");

echo ("success");

}
 ?>
