<?php 
$id = $_POST["id"];
$msg = $_POST["msg"];

require "connection.php";
require "email/SMTP.php";
require "email/OAuth.php";
require "email/PHPMailer.php";
require "email/Exception.php";


use PHPMailer\PHPMailer\PHPMailer;

$rs = Database::search("SELECT * FROM `help_and_contact` WHERE `id`='".$id."'");
$data = $rs->fetch_assoc();
    $email = $data["email"];
$type = "";
    if ($data["type"] == 1) {
       $type= "Account Management:";
    } else if ($data["type"] == 2) {
        $type= "Billing and Payments:";
    }  else if ($data["type"] == 3) {
        $type= "Refunds and Cancellations:";
    } else if ($data["type"] == 4) {
        $type= "Contact Information:";
    } else if ($data["type"] == 5) {
        $type="Product Update:";
    }
    
        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'drkknght.solutions@gmail.com';
            $mail->Password = 'kspwbomgufupfduk';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('drkknght.solutions@gmail.com', 'GamingWorld HC');
            $mail->addReplyTo('drkknght.solutions@gmail.com', 'GamingWorld HC');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Gaming World support request reply';
            $bodyContent = '<h1 style="color:green;">'.$type.'</h1> <h3>'.$msg.'</h3>';
            $mail->Body= $bodyContent;

            if (!$mail->send()) {
                echo 'Email sending failed';
            } else {
                Database::iud("DELETE FROM `help_and_contact` WHERE `id`='".$id."'");
                echo 'Success';
            }

?>