<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
if(isset($_GET["id"])){

    $pid = $_GET["id"];
    $user_email = $_SESSION["u"]["email"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$user_email."'");
    $cart_num = $cart_rs->num_rows;

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();


    if($cart_num == 1){
            echo ("Update Finished");

    }else{

        Database::iud("INSERT INTO `cart`(`product_id`,`user_email`) VALUES ('".$pid."','".$user_email."')");
        echo ("New Product added to the Cart");

    }

}else{
    echo ("Something Went Wrong");
}
}else{
    echo ("Please Log In or Sign Up");
}

?>