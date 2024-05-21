<?php

require "connection.php";

if(isset($_GET["id"])){

    $pid = $_GET["id"];

    Database::iud("DELETE FROM `product_has_category` WHERE `product_id`='".$pid."'");
    Database::iud("DELETE FROM `product_has_platform` WHERE `product_id`='".$pid."'");
    Database::iud("DELETE FROM `product` WHERE `id`='".$pid."'");

    echo ("Product has been removed");

}else{
    echo ("something went wrong");
}

?>