<?php

require "connection.php";

$user_id = $_GET["u"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `id`='".$user_id."'");
$user_num = $user_rs->num_rows;

if($user_num == 1){

    $user_data = $user_rs->fetch_assoc();
    $status = $user_data["status_id"];

    if($status == 1){
        Database::iud("UPDATE `user` SET `status_id`='2' WHERE `id`='".$user_id."'");
        echo("deactivated");
    }else if($status == 2){
        Database::iud("UPDATE `user` SET `status_id`='1' WHERE `id`='".$user_id."'");
        echo("activated");
    }

}else{
    echo ("Something went wrong.");
}

?>