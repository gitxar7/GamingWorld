<?php

session_start();
require "connection.php";

if(isset($_SESSION["p"])){

    $pid = $_SESSION["p"]["id"];

    $title = $_POST["t"];
    $description = $_POST["d"];

    Database::iud("UPDATE `product` SET `title`='".$title."',`description`='".$description."' WHERE `id`='".$pid."'");

    Database::iud("DELETE FROM `product_has_platform` WHERE `product_id`='".$pid."'");

    $platform_rs = Database::search("SELECT * FROM `platform`");
    $platform_num = $platform_rs->num_rows;

    for ($i=0; $i < $platform_num; $i++) { 
        $platform_data = $platform_rs->fetch_assoc();
        if (isset($_POST[$platform_data["name"]])) {
           $p= $platform_data["id"];
            Database::search("INSERT INTO `product_has_platform`(`product_id`, `platform_id`) VALUES('".$pid."','".$p."')");
            
        }
      }

    echo ("Product has been updated!");

    $length = sizeof($_FILES);
    $allowed_img_extensions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

    if($length <= 3 && $length > 0){

        for($x = 0;$x < $length;$x++){
            if(isset($_FILES["i".$x])){

                $img_file = $_FILES["i".$x];
                $file_extension = $img_file["type"];

                if(in_array($file_extension,$allowed_img_extensions)){

                    $new_file_extension;

                    if($file_extension == "image/jpg"){
                        $new_file_extension = ".jpg";
                    }else if($file_extension == "image/jpeg"){
                        $new_file_extension = ".jpeg";
                    }else if($file_extension == "image/png"){
                        $new_file_extension = ".png";
                    }else if($file_extension == "image/svg+xml"){
                        $new_file_extension = ".svg";
                    }

                    $file_name = "resource//mobile_images//".$title."_".$x."_".uniqid().$new_file_extension;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                    if ($_FILES["image0"]) {
                        Database::iud("UPDATE `product` SET  `img`='".$file_name."' WHERE `id`= '".$product_id."'");
                    }
                    if (isset($_FILES["image1"])) {
                        Database::iud("UPDATE `product` SET  `ss1`='".$file_name."' WHERE `id`= '".$product_id."'");
                    }
                    if (isset($_FILES["image2"])) {
                        Database::iud("UPDATE `product` SET  `ss2`='".$file_name."' WHERE `id`= '".$product_id."'");
                    }

                }else{
                    echo ("Invalid image type");
                }

            }
        }

    }else{
        echo ("Images did not update!");
    }

}

?>