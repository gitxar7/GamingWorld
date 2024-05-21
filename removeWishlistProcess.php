<?php

require "connection.php";

if(isset($_GET["id"])){
    $wish_id = $_GET["id"];

    $wish_rs = Database::search("SELECT * FROM `wishlist` WHERE `id`='".$wish_id."'");
    $wish_num = $wish_rs->num_rows;
    $wish_data = $wish_rs->fetch_assoc();

    if($wish_num == 0){
        echo ("Something went wrong. Please try again later");
    }else{
        // Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES 
        // ('".$wish_data["product_id"]."','".$wish_data["user_email"]."')");
        
        Database::iud ("DELETE FROM `wishList` WHERE `id`='".$wish_id."'");
        echo ("success");
    }

}else{
    echo ("Please Select a product");
}

?>