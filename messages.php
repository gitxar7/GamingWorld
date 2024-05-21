<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bs/bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/gmw.png">
        <title>GW-Chat | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                $page = "GW-Chat";
                $mail = $_SESSION["u"]["email"];
                include "headerX.php"; ?>

                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                        <div class="row ">
                            <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                            </div>
                            <div class="col-10 text-center offset-1 offset-lg-0">
                                <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">Messages</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content -->

                <div class="col-12 py-5 px-4">
                    <div class="row overflow-hidden shadow rounded">
                        <div class="col-12 col-lg-5 px-0">
                            <div class="bg-black bg-opacity-25">
                                <div class="bg-black bg-opacity-50 px-4 py-2">
                                    <div class="col-12">
                                        <h5 class="mb-0 py-1">Recents</h5>
                                    </div>
                                    <div class="col-12">

                                        <?php

                                        $msg_rs = Database::search("SELECT DISTINCT `from`,`content`,`date_time`,`status` 
                                        FROM `chat` WHERE `to`='" . $mail . "' ORDER BY `date_time` DESC");
                                        $msg_num = $msg_rs->num_rows;

                                        ?>

                                        <!--  -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item " role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Received</button>
                                            </li>
                                            <li class="nav-item " role="presentation">
                                                <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sent</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content bg-black rounded mb-3 bg-opacity-25" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="message_box" id="message_box">
                                                    <?php

                                                    for ($x = 0; $x < $msg_num; $x++) {
                                                        $msg_data = $msg_rs->fetch_assoc();

                                                        if ($msg_data["status"] == 0) {

                                                    ?>
                                                            <div class="list-group rounded-0" onclick="viewMessages('<?php echo $msg_data['from']; ?>');">
                                                                <a href="#" class="list-group-item list-group-item-action" style="background-color: rgb(56, 5, 5) !important;color: #ffffff !important;border: 1px solid rgb(220, 53, 69) !important;">
                                                                    <?php

                                                                    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
                                                                    $user_data = $user_rs->fetch_assoc();


                                                                    ?>
                                                                    <div class="media">
                                                                        <?php

                                                                        if (isset($user_data["img"])) {
                                                                        ?>
                                                                            <img src="<?php echo $user_data["img"]; ?>" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <img src="resources/profile_img/gamer.png" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        }

                                                                        ?>

                                                                        <div class="me-4">
                                                                            <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                                <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"]; ?></h6>
                                                                                <small class="small fw-bold"><?php echo $msg_data["date_time"]; ?></small>

                                                                            </div>
                                                                            <p class="mb-2"><?php echo $msg_data["content"]; ?></p>
                                                                            <span class="mb-0 bg-danger p-1 rounded-pill" style="margin-left: -5px;">New Message ●</span>
                                                                        </div>
                                                                    </div>
                                                                </a>

                                                            </div>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <div class="list-group rounded-0" onclick="viewMessages('<?php echo $msg_data['from']; ?>');" style="">
                                                                <a href="#" class="list-group-item list-group-item-action " style="background-color: rgb(86, 5, 5) !important;color: #ffffff !important;border: 1px solid rgb(220, 53, 69) !important;">
                                                                    <?php

                                                                    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
                                                                    $user_data = $user_rs->fetch_assoc();


                                                                    ?>
                                                                    <div class="media">
                                                                        <?php

                                                                        if (isset($user_data["img"])) {
                                                                        ?>
                                                                            <img src="<?php echo $user_data["img"]; ?>" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <img src="resource//new_user.svg" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        }

                                                                        ?>

                                                                        <div class="me-4">
                                                                            <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                                <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"]; ?></h6>
                                                                                <small class="small fw-bold"><?php echo $msg_data["date_time"]; ?></small>

                                                                            </div>
                                                                            <p class="mb-0"><?php echo $msg_data["content"]; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </a>

                                                            </div>
                                                    <?php
                                                        }
                                                    }

                                                    ?>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                                <div class="message_box" id="message_box">
                                                    <?php

                                                    $msg_rs2 = Database::search("SELECT DISTINCT `to`,`content`,`date_time`,`status` 
                                                    FROM `chat` WHERE `from`='" . $mail . "' GROUP BY `to` ORDER BY `date_time` DESC");
                                                    $msg_num2 = $msg_rs2->num_rows;

                                                    for ($y = 0; $y < $msg_num2; $y++) {
                                                        $msg_data2 = $msg_rs2->fetch_assoc();
                                                    ?>
                                                        <div class="list-group rounded-0" onclick="viewMessages('<?php echo $msg_data2['to']; ?>');">
                                                            <a href="#" class="list-group-item list-group-item-action rounded-0 bg-black border border-secondary">
                                                                <div class="media">
                                                                    <?php

                                                                    $user_rs2 = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data2["to"] . "'");
                                                                    $user_data2 = $user_rs2->fetch_assoc();



                                                                    if (isset($user_data2["img"])) {
                                                                    ?>
                                                                        <img src="<?php echo $user_data2["img"]; ?>" width="50px" class="rounded-circle">
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <img src="resource//new_user.svg" width="50px" class="rounded-circle">
                                                                    <?php
                                                                    }

                                                                    ?>
                                                                    <div class="me-4">
                                                                        <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                            <h6 class="mb-0 fw-bold"> me -> <?php echo $user_data2["fname"]; ?></h6>
                                                                            <small class="small fw-bold"><?php echo $msg_data2["date_time"]; ?></small>

                                                                        </div>
                                                                        <p class="mb-0"><?php echo $msg_data2["content"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                        </div>
                                                    <?php
                                                    }

                                                    ?>

                                                </div>


                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-7 px-0 bg-black bg-opacity-50">
                            <div class="row px-4 py-5 text-white chat_box" id="chat_box">

                                <!-- view area -->
                                <div class="col-12 px-1 pt-3" style="height: 200px;">
                                    <div class="contain-image  col-12 mx-auto rounded opacity-50" style="height: 330px;  background-image: url('resources/Messaging-bro.png')"></div>
                                </div>
                                <!-- view area -->

                            </div>
                            <div class="col-12 fs-3 text-center text-danger" id="sndAlert">
                            </div>
                            <!-- txt -->
                            <div class="col-12 px-2">
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded border-0 py-3 text-white fs-5" placeholder="Type a message ..." aria-describedby="send_btn" id="msg_txt" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));" />
                                        <button class="btn" id="send_btn" onclick="send_msg();" style="background-color:rgb(72, 3, 3);"><i class="bi bi-send-fill fs-1 text-white "></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- txt -->
                        </div>

                    </div>
                </div>

                <div class="col-12 mb-3 text-center">
                    <h5>GW-Chat ~ Powered by Gaming World</h5>
                </div>

                <!-- content -->

                <?php include "footer.php"; ?>
            </div>
        </div>

        <script src="bs/bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
    <!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->

<?php

} else {
    header("Location:home.php");
}

?>