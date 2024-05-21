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
    <title>Admin Panel | GamingWorld</title>
</head>

<body class="home-body">
    <div class="container-fluid">
        <div class="row">

            <?php
            $navPage = "user";
            include "adminNav.php";
            ?>
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <?php
                include "adminH.php";
                ?>
                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                            <input type="text" class="form-control text-white border-danger" id="searchUsersAdTxt" placeholder="Search in Users..." style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                        </div>
                        <div class="col-12 col-lg-2 d-grid mb-3">
                            <button class="btn btn-danger" onclick="searchAd('user');">Search</button>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <hr class="border border-2">
                </div>
                <div id="searchUsersAd">
                    <?php

                    $ur_rs = Database::search("SELECT * FROM `user`;");
                    $ur_num = $ur_rs->num_rows;

                    for ($x = 0; $x < $ur_num; $x++) {
                        $ur_data = $ur_rs->fetch_assoc();
                        $ur_id = $ur_data["id"];
                    ?>
                        <div class="col-12">
                            <h3>#<?php echo $ur_id ?></h3>
                        </div>

                        <div class="card col-12 border-0 <?php if ($ur_data["status_id"] == 2) { ?> opacity-75 <?php } ?>" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3)); ">
                            <div class="row g-0">
                                <div class="col-md-4 p-3 pt-0 d-flx">
                                    <img src="<?php echo $ur_data['img']; ?>" style="height: 200px;" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title fs-2 fw-bold text-danger"><?php echo $ur_data['fname']; ?> <?php echo $ur_data['lname']; ?></h5>
                                        <span class="fs-5 fw-bold text-black-50">ID : GWU<?php echo $ur_id ?></span><br>
                                        <span class="fs-5 fw-bold text-black-50">Email : <?php echo $ur_data['email']; ?></span><br>
                                        <span class="fs-5 fw-bold text-black-50">Roll : Seller</span><br>
                                        <span class="fs-5 fw-bold text-black-50">Registered Date : <?php echo $ur_data['joined_date']; ?> </span><br>
                                        <span class="fs-5 fw-bold text-black-50">Status : <?php if ($ur_data['status_id'] == 1) {
                                                                                                echo "Active";
                                                                                            } else {
                                                                                                echo "Inactive";
                                                                                            } ?> </span>

                                        <div class="col-12 btn-toolbar justify-content-end">
                                            <button class="btn btn-success me-2" data-bs-toggle="collapse" href="#user<?php echo $ur_id ?>" role="button" aria-expanded="false" aria-controls="user<?php echo $ur_id ?>">Message</button>
                                            <button class="btn btn-danger me-2" onclick="blockUser(<?php echo $ur_id ?>);">
                                                <?php if ($ur_data["status_id"] == 2) { ?>Unblock<?php  } else {  ?>Block<?php } ?>
                                            </button>
                                            <button class="btn btn-outline-danger me-2 disabled">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body bg-black bg-opacity-50 collapse mt-2" id="user<?php echo $ur_id ?>">
                            <div class="row">
                                <div class="col-12 col-lg-6 d-flex justify-content-start justify-content-lg-end"> <span class="fs-5 fw-bold text-white-50">FROM: prince@royalmail.com</span></div>
                                <div class="col-12 col-lg-6 d-flex justify-content-start justify-content-lg-end"> <span class="fs-5 fw-bold text-white-50">To: <?php echo $ur_data['email']; ?></span></div>
                                <div class="input-group my-2">
                                    <input type="text" class="form-control rounded border-0 py-3 fs-5 bg-black bg-opacity-50 text-light" placeholder="Type your message ..." aria-describedby="send_btn" name="<?php echo $ur_data['email']; ?>" id="msg<?php echo $ur_id ?>" />
                                    <button class="btn bg-black bg-opacity-50" id="" onclick="send_quick_msg(<?php echo $ur_id ?>, 1);"><i class="bi bi-send-fill fs-1 text-white "></i></button>
                                </div>
                                <div class="col-12 my-2 text-center">
                                    <span>GW-Chat ~ Powered by Gaming World</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border border-2">
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <!-- body -->

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