<?php
session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if(empty($email)){
    echo ("1");
}else if(strlen($email) > 100){
    echo ("2");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("3");
}else if(empty($password)){
    echo ("4");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("5");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `password`='".$password."'");
    $n = $rs->num_rows;

    if($n == 1){
        $d = $rs->fetch_assoc();
        $x = "0";

       if ($d["status_id"] == "1") {

        echo ("success");
        $_SESSION["u"] = $d;

        if($rememberme == "true"){

            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));

        }else{

            setcookie("email","",-1);
            setcookie("password","",-1);

        }
       } else{
        echo ("6");
       }


    }else{

        echo ("7");

    }

     
}

?>