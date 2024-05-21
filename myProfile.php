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
    <title>My Profile | GamingWorld</title>
</head>

<body class="home-body">
    <div class="container-fluid">
        <div class="row">
            <?php
            $page = "Profile";
            include "headerX.php"; ?>

            <div class="row">
                <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                    <div class="row ">
                        <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                            <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                        </div>
                        <div class="col-10 text-center offset-1 offset-lg-0">
                            <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">My Profile</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];


                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON gender.id=user.gender_id WHERE `email`='" . $email . "'");
                $details = $details_rs->fetch_assoc();
            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 bg-bg-transparent rounded mt-2 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 ">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        if ($details['img'] == "") {
                                        ?>
                                            <img src="resources/profile_img/gamer.png" class="rounded mt-5" style="width: 150px;" id="vwImg" />
                                        <?php
                                        } else {
                                        ?>
                                            <img src="<?php echo $details['img']; ?>" class="rounded mt-5" style="width: 150px;" />
                                        <?php
                                        }

                                        ?>


                                        <span class="fw-bold"><?php echo $details["fname"] . " " . $details["lname"]; ?></span>
                                        <span class="fw-bold text-white-50"><?php echo $email; ?></span>

                                        <input type="file" class="d-none" id="profileImg" accept="image/*">
                                        <label for="profileImg" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile image</label>
                                    </div>
                                </div>

                                <div class="col-md-5 ">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" id="myF" class="form-control bg-black bg-opacity-25 text-white border-0" value="<?php echo $details["fname"]; ?>" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" id="myL" class="form-control bg-black bg-opacity-25 text-white border-0" value="<?php echo $details["lname"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" id="myM" class="form-control bg-black bg-opacity-25 text-white border-0" value="<?php echo $details["mobile"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control bg-black bg-opacity-25 text-white-50 border-0" value="<?php echo $details["password"]; ?>" readonly />
                                                    <span class="input-group-text bg-black bg-opacity-50 border-0" id="basic-addon2">
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control bg-black bg-opacity-25 text-white text-white-50 border-0" readonly value="<?php echo $details["email"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control bg-black bg-opacity-25 text-white text-white-50 border-0" readonly value="<?php echo $details["joined_date"]; ?>" />
                                            </div>

                                            <?php
                                            if (!empty($details["gender_id"])) {

                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control bg-black bg-opacity-25 text-white text-white-50 border-0" value="<?php echo $details["gender"] ?>" readonly />
                                                </div>
                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control bg-black bg-opacity-25 text-white border-0" readonly />
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="updProfile();" id="umpBtn">Update My Profile</button>
                                            </div>
                                            <div class="col-12 d-grid mt-3">
                                                <span><b>Note:</b>You can not update password, email, gender and registered date
                                                    if you want to update password, you can go to <a href="index.php" class="text-decoration-none">Sign in page</a>
                                                    and if you want to update email, you can do it by requesting an admin by going to <a href="hc.php" class="text-decoration-none">h&c page</a>.
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 text-center gap-2">
                                    <div class="row">
                                        <span class="fw-bold text-white-50 mt-5">Display ads</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {

                header("Location:home.php");
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bs/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
<!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->