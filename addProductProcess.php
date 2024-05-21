<?php
session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$name = $_POST["n"];
$brand = $_POST["b"];
$title = $_POST["t"];
$cost = $_POST["cost"];
$desc = $_POST["desc"];

$platform = false;
$category =false;

$platform_rs = Database::search("SELECT * FROM `platform`");
$platform_num = $platform_rs->num_rows;

//   for ($i=0; $i < $platform_num; $i++) { 
//     $platform_data = $platform_rs->fetch_assoc();
//     if (isset($_POST[$platform_data["name"]])) {
//        $platform = true;
//     }
//   }

if ($_POST["PC"] =true || $_POST["Console"] = true || $_POST["Mobile"] = true) {
    $platform = true;
}

$category_rs = Database::search("SELECT * FROM `category`");
$category_num = $category_rs->num_rows;

if ($_POST["Action"] =true || $_POST["Adventure"] = true || $_POST["Racing"] = true || $_POST["Sports"] = true) {
    $category = true;
}
if ($_POST["RolePlaying"] =true || $_POST["Puzzle"] = true || $_POST["Simulation"] = true || $_POST["Arcade"] = true) {
    $category = true;
}

//   for ($i=0; $i < $category_num; $i++) { 
//     $category_data = $category_rs->fetch_assoc();
//     if (isset($_POST[$category_data["name"]])) {
//         $category = true;
//     }
//   }

if(empty($name)){
    echo ("Please add the Name");
}else if(strlen($name) >= 20){
    echo ("Title should have less than 20 characters");
}else if(empty($title)){
    echo ("Please add the Title");
}else if(strlen($title) >= 24){
    echo ("Title should have less than 24 characters");
}else if($brand == "0"){
    echo ("Please select a Brand");
}else if($platform == false){
    echo ("Please select at least one Platform");
}else if($category == false){
    echo ("Please select at least one Category");
}else if(empty($cost)){
    echo ("Please add the Cost");
}else if(!is_numeric($cost)){
    echo ("Invalid value for field Cost Per Item");
}else if(empty($desc)){
    echo ("Please add the Description");
}else{

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product`(`name`, `title`, `description`, `price`, `datetime_added`, `brand_id`, `status_id`, `user_email`) 
    VALUES('".$name."', '".$title."', '".$desc."', '".$cost."', '".$date."', '".$brand."', '".$status."', '".$email."')");

    echo ("Product Added Successfully.");
    

    $product_id = Database::$connection->insert_id;


    for ($i=0; $i < $platform_num; $i++) { 
        $platform_data = $platform_rs->fetch_assoc();
        if (isset($_POST[$platform_data["name"]])) {
           $p= $platform_data["id"];
            Database::search("INSERT INTO `product_has_platform`(`product_id`, `platform_id`) VALUES('".$product_id."','".$p."')");
            
        }
      }

      for ($i=0; $i < $category_num; $i++) { 
        $category_data = $category_rs->fetch_assoc();
        if (isset($_POST[$category_data["name"]])) {
            $c= $category_data["id"];
            Database::search("INSERT INTO `product_has_category`(`product_id`, `category_id`) VALUES('".$product_id."','".$c."')");
        }
      }


    $length = sizeof($_FILES);

    if($length <= 3 && $length > 0){

        $allowed_image_extensions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

        for($x = 0;$x < $length;$x++){
            if(isset($_FILES["image".$x])){

                $image_file = $_FILES["image".$x];
                $file_extension = $image_file["type"];

                if(in_array($file_extension,$allowed_image_extensions)){

                    $new_img_extension;

                    if($file_extension =="image/jpg"){
                        $new_img_extension = ".jpg";
                    }else if($file_extension =="image/jpeg"){
                        $new_img_extension = ".jpeg";
                    }else if($file_extension =="image/png"){
                        $new_img_extension = ".png";
                    }else if($file_extension =="image/svg+xml"){
                        $new_img_extension = ".svg";
                    }

                    $file_name = "resources//products//".$title."_".$x."_".uniqid().$new_img_extension;
                    move_uploaded_file($image_file["tmp_name"],$file_name);

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
                    echo ("Not an allowed image type");
                }

            }
        }

        echo ("Product images saved successfully");

    }else{
        echo ("Invalid Image Count");

}


}

?>