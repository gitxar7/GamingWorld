<?php

require "connection.php";

if(isset($_GET["id"])){
    $invoice_id = $_GET["id"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='".$invoice_id."'");
    $invoice_num = $invoice_rs->num_rows;

    if($invoice_id == "all"){
        Database::iud ("DELETE FROM `invoice`");
        echo ("success");
    }else{

        if($invoice_num == 0){
            echo ("Something went wrong. Please try again later");
        }else{
            Database::iud ("DELETE FROM `invoice` WHERE `id`='".$invoice_id."'");
            echo ("success");
        }

    }       

}else{
    echo ("Please Select a product");
}

?>