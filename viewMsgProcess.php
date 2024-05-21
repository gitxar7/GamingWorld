<?php

session_start();
require "connection.php";

$receiver_email = $_SESSION["u"]["email"];
$sender_email = $_GET["e"];

$msg_rs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $sender_email . "' OR `to`='" . $sender_email . "'");
$msg_num = $msg_rs->num_rows;

for ($x = 0; $x < $msg_num; $x++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["from"] == $sender_email && $msg_data["to"] == $receiver_email) {

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();


?>
        <!-- sender -->
        <div class="media w-75">

            <div class="media-body me-4">
                <div class="rounded py-2 px-3 mb-2" style="background-color:rgb(160, 10, 10);">

                    <div class="row">
                        <div style="width: 30px;">
                            <?php
                            if (isset($user_data["img"])) {
                            ?>
                                <img src="<?php echo $user_data["img"]; ?>" width="30px" class="rounded-circle">
                            <?php
                            } else {
                            ?>
                                <img src="resource//new_user.svg" width="30px" class="rounded-circle">
                            <?php
                            }

                            ?>
                        </div>
                        <div class="col">
                            <p class="mb-0 fw-bold ms-2 mt-1"><?php echo $msg_data["content"]; ?></p>

                        </div>
                    </div>

                </div>
                <p class="small fw-bold text-end"><?php echo $msg_data["date_time"]; ?></p>
                <p class="invisible" id="rmail"><?php echo $msg_data["from"]; ?></p>
            </div>
        </div>
        <!-- sender -->
    <?php

    } else if ($msg_data["to"] == $sender_email && $msg_data["from"] == $receiver_email) {

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();

    ?>
        <!-- receiver -->
        <div class="offset-3 col-9 media w-75 text-end justify-content-end align-items-end">
            <div class="media-body">
                <div class="rounded py-2 px-3 mb-2" style="background-color:rgb(72, 3, 3);">
                    <p class="mb-0 text-white"><?php echo $msg_data["content"]; ?></p>
                </div>
                <p class="small fw-bold  text-end"><?php echo $msg_data["date_time"]; ?></p>
            </div>
        </div>
        <!-- receiver -->
<?php
    }
    if ($msg_data["status"] == 0) {
        Database::iud("UPDATE `chat` SET `status`='1' WHERE `from`='" . $sender_email . "' 
        AND `to`='" . $receiver_email . "'");
    }
}

?>