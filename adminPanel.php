<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="30"> -->
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
            $navPage = "panel";
            include "adminNav.php";
            ?>
            <!-- body -->
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
                <div class="col-12 p-2">
                    <div class="row">
                        <div class="col-12 col-lg-4 p-1">
                            <div class="col-12 bg-black bg-opacity-50 p-4 rounded">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="text-white fw-bold fs-5">Today Earnings</span>
                                    </div>
                                    <?php

                                    $today = date("Y-m-d");
                                    $thismonth = date("m");
                                    $thisyear = date("Y");

                                    $a = "0";
                                    $b = "0";
                                    $c = "0";
                                    $e = "0";
                                    $f = "0";

                                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                    $invoice_num = $invoice_rs->num_rows;

                                    for ($x = 0; $x < $invoice_num; $x++) {
                                        $invoice_data = $invoice_rs->fetch_assoc();

                                        $f = $f + 1; //total qty

                                        $d = $invoice_data["date"];
                                        $splitDate = explode(" ", $d); //separate date from time
                                        $pdate = $splitDate[0]; //sold date

                                        if ($pdate == $today) {
                                            $a = $a + $invoice_data["total"];
                                            $c = $c + 1;
                                        }

                                        $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                        $pyear = $splitMonth[0]; //year
                                        $pmonth = $splitMonth[1]; //month

                                        if ($pyear == $thisyear) {
                                            if ($pmonth == $thismonth) {
                                                $b = $b + $invoice_data["total"];
                                                $e = $e + 1;
                                            }
                                        }
                                    }

                                    ?>
                                    <div class="col-12 d-flex justify-content-center mt-1">
                                        <span class="text-white">Rs. <?php echo $a; ?> .00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 p-1">
                            <div class="col-12 bg-black bg-opacity-50 p-4 rounded">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="text-white fw-bold fs-5">Monthly Earnings</span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-1">
                                        <span class="text-white">Rs. <?php echo $b; ?> .00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 p-1">
                            <div class="col-12 bg-black bg-opacity-50 p-4 rounded">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="text-white fw-bold fs-5">Today Selling</span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-1">
                                        <span class="text-white"><?php echo $c; ?> Items</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 p-1">
                            <div class="col-12 bg-black bg-opacity-50 p-4 rounded">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="text-white fw-bold fs-5">Monthly Selling</span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-1">
                                        <span class="text-white"><?php echo $e; ?> Items</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 p-1">
                            <div class="col-12 bg-black bg-opacity-50 p-4 rounded">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="text-white fw-bold fs-5">Total Selling</span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-1">
                                        <span class="text-white"><?php echo $f; ?> Items</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 p-1">
                            <div class="col-12 bg-black bg-opacity-50 p-4 rounded">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="text-white fw-bold fs-5">Total Engagements</span>
                                    </div>
                                    <?php
                                    $user_rs = Database::search("SELECT * FROM `user`");
                                    $user_num = $user_rs->num_rows;
                                    ?>
                                    <div class="col-12 d-flex justify-content-center mt-1">
                                        <span class="text-white"><?php echo $user_num; ?> Members</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 p-2 rounded bg-black bg-opacity-50">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                            <span class="text-white fw-bold">Total Active Time</span>
                        </div>
                        <?php

                        $start_date = new DateTime("2023-01-01 00:00:00");

                        $tdate = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $tdate->setTimezone($tz);

                        $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                        $difference = $end_date->diff($start_date);

                        ?>
                        <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                            <span class="text-success text-center"><?php

                                                                    echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                                                        $difference->format('%d') . " Days " . $difference->format('%H') . " Hours <br class='d-lock d-lg-none'/>" .
                                                                        $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
                                                                    ?></span>
                        </div>

                    </div>
                </div>

                <div class="col-12 p-2  mt-2">
                    <div class="row">
                        <div class="col-12 col-lg-6 mt-2 mt-lg-0 px-3">
                            <div class="row">
                                <div class="col-12 card rounded bg-black bg-opacity-50" style="height: 320px;">
                                    <div class="row  d-flex justify-content-center">
                                        <div class="card-header  d-flex justify-content-center">
                                            <h4 class="card-title text-white">Mostly Sold Item</h4>
                                        </div>
                                        <?php

                                        $freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurrence` 
                                        FROM `invoice` WHERE `date` LIKE '%" . $thismonth . "%' GROUP BY `product_id` ORDER BY 
                                        `value_occurrence` DESC LIMIT 1");

                                        $freq_num = $freq_rs->num_rows;
                                        if ($freq_num > 0) {
                                            $freq_data = $freq_rs->fetch_assoc();

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();

                                            $p_user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                            $p_user_data = $p_user_rs->fetch_assoc();

                                        ?>
                                            <div class="col-12 px-1 pt-3" style="height: 220px;">
                                                <div class="cover-image  col-12 mx-auto rounded" style="height: 200px; width: 80%;  background-image: url('<?php echo $product_data["img"]; ?>')"></div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center text-white fs-5"><?php echo $product_data["name"]; ?> <?php echo $product_data["title"]; ?><span class="text-white-50 fs-5"> by <?php echo $p_user_data["fname"]; ?></span></h5>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-12 px-1 pt-3" style="height: 220px;">
                                                <div class="contain-image bg-secondary  col-12 mx-auto rounded" style="height: 200px; width: 80%;  background-image: url('resources/image.png')"></div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center text-white-50 fs-5">There are no recent purchases or activities</h5>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                            <div class="row">
                                <div class="col-12 card rounded bg-black bg-opacity-50" style="height: 320px;">
                                    <div class="row  d-flex justify-content-center">
                                        <div class="card-header  d-flex justify-content-center">
                                            <h4 class="card-title text-white">Mostly Famous Seller</h4>
                                        </div>
                                        <?php
                                        if ($freq_num > 0) {

                                            $user_rs1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                            $user_data1 = $user_rs1->fetch_assoc();
                                        ?>
                                            <div class="col-12 px-1 pt-3" style="height: 220px;">
                                                <div class="contain-image  col-12 mx-auto rounded-circle bg-black bg-opacity-10" style="height: 200px; width:  200px;  background-image: url('<?php echo $user_data1["img"]; ?>')"></div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center text-white fs-5"><?php echo $user_data1["fname"]; ?> | <span class="text-white-50 fs-5"><?php echo $user_data1["email"]; ?></span></h5>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-12 px-1 pt-3" style="height: 220px;">
                                                <div class="contain-image  col-12 mx-auto rounded-circle bg-black bg-opacity-10" style="height: 200px; width:  200px;  background-image: url('resources/Shrug-bro.png')"></div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center text-white-50 fs-5">Invalid user</h5>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    header("Location:index.php");
}

?>