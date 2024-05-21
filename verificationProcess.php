<?php

session_start();
require "connection.php";

if(isset($_GET["v"])){

    $v = $_GET["v"];
    $e = $_GET["e"];

    $admin = Database::search("SELECT * FROM `admin` WHERE `email` = '".$e."' AND ( `verification_code`='".$v."' OR `code`='".$v."')");
    $num = $admin->num_rows;

    if($num == 1){
        $data = $admin->fetch_assoc();
        $_SESSION["au"] = $data;
        echo ("success");
    }else{
        echo ("invalid verification code or user.");
    }

}else{
    echo ("Please enter your verification");
}

?>