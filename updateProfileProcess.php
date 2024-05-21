<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
   $fname=$_POST["fn"];
   $lname=$_POST["ln"];
   $mobile=$_POST["m"];

   if (isset($_FILES["image"])) {
    $image= $_FILES["image"];


    $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $image["type"];

    if (!in_array($file_ex, $allowed_image_extensions)) {
        echo("Please select a valid Image");
    }else{

        $new_file_extension;

        if ($file_ex=="image/jpg") {
           $new_file_extension=".jpg";
        } else if($file_ex=="image/jpeg"){
            $new_file_extension=".jpeg";
        }else if($file_ex=="image/png"){
            $new_file_extension=".png";
        }else if($file_ex=="image/svg+xml"){
            $new_file_extension=".svg";
        }
        
       $file_name = "resources/profile_img/".$_SESSION["u"]["fname"]."_".uniqid().$new_file_extension;
       move_uploaded_file($image["tmp_name"], $file_name);

       $image_rs = Database::search("SELECT * FROM `user` WHERE
       `email` = '".$_SESSION["u"]["email"]."'");
       $image_num = $image_rs->num_rows;

       if ($image_num==1) {
        Database::iud("UPDATE `user` SET `img`='".$file_name."' WHERE
        `email`='".$_SESSION["u"]["email"]."'");
       }else{
        Database::iud("INSERT INTO `user` (`img`) VALUES
        ('".$file_name."')");
       }

    }
   
    }

   Database::iud("UPDATE `user` SET `fname`='".$fname."',`lname`= '".$lname."', `mobile`= '".$mobile."'
   WHERE `email` = '".$_SESSION["u"]["email"]."'");

   echo("Updated Successfully");
}

?>