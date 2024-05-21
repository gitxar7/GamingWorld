<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
    $page = "Products";
    $pageNo;
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
        <title>My Products | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                include "headerX.php"; ?>

                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                        <div class="row ">
                            <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                            </div>
                            <div class="col-10 text-center offset-1 offset-lg-0">
                                <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">My Products</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content -->
                <div class="offset-1 col-10 bg-black bg-opacity-25 rounded mb-3 p-3">
                    <!-- cheader -->
                    <div class="col-12 rounded mt-2 p-2" style="background-color: brown;">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                                        <?php
                                        $profile_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                        $profile_num = $profile_rs->num_rows;
                                        if ($profile_num == 1) {
                                            $profile_data = $profile_rs->fetch_assoc();

                                            if ($profile_data["img"] != "") {
                                        ?>
                                                <img src="<?php echo $profile_data["img"] ?>" width="90px" height="90px" class="rounded-circle" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="resources/profile_img/gamer.png" width="90px" height="90px" class="rounded-circle">
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <img src="resources/profile_img/gamer.png" width="90px" height="90px" class="rounded-circle">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="row text-center text-lg-start">
                                            <div class="col-12 mt-0 mt-lg-4">
                                                <span class="text-white fw-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                            </div>
                                            <div class="col-12">
                                                <span class="text-black-50 fw-bold"><?php echo $email; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mt-2 mt-lg-4">
                                        <h1 class="offset-4 offset-lg-2 text-white fw-bold">Products</h1>
                                    </div>
                                    <div class="col-12 col-lg-2 mt-lg-4 d-flx">
                                        <div class="col-12 d-grid">
                                        <a href="addProducts.php" class="btn btn-warning">Add Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- cheader -->
                    <!-- cbody -->
                    <div class="col-12 p-3">
                        <div class="row">
                            <!-- filter -->
                            <div class="col-12 col-lg-2  my-3 border border-danger rounded-start">
                                <div class="row">
                                    <div class="col-12 mt-3 fs-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-4">Sort Products</label>
                                            </div>
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input type="text" id="s" placeholder="Search...." class="form-control  border-0 bg-transparent text-white-50">
                                                    </div>
                                                    <div class="col-1 p-1">
                                                        <label class="form-label"><i class="bi bi-search fs-5"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label fw-bold">Active Time</label>
                                            </div>
                                            <div class="col-12">
                                                <hr style="width: 80%;">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="n" name="r1">
                                                    <label class="form-check-label" for="n">
                                                        Newest to oldest
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="o" name="r1">
                                                    <label class="form-check-label" for="o">
                                                        Oldest to newest
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label fw-bold opacity-50">By quantity</label>
                                            </div>
                                            <div class="col-12">
                                                <hr style="width: 80%;">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="h" name="r2" disabled>
                                                    <label class="form-check-label" for="h">
                                                        Hight to low
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="l" name="r2" disabled>
                                                    <label class="form-check-label" for="l">
                                                        Low to high
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label fw-bold">By platform</label>
                                            </div>
                                            <div class="col-12">
                                                <hr style="width: 80%;">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="p" name="r3">
                                                    <label class="form-check-label" for="p">
                                                        PC
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="c" name="r3">
                                                    <label class="form-check-label" for="c">
                                                        Console
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input bg-black bg-opacity-50 border-white" type="radio" id="m" name="r3">
                                                    <label class="form-check-label" for="m">
                                                        Mobile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-3 mb-3">
                                                <div class="row g-2">
                                                    <div class="col-12 col-lg-6 d-grid">
                                                        <button class="btn btn-success fw-bold" onclick="sort1(0);">Sort</button>
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-grid">
                                                        <button class="btn btn-primary fw-bold" onclick="clearSort();">Clear</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- filter -->
                            <!-- product -->
                            <div class="col-12 col-lg-10 mt-3 mb-3 border border-danger rounded-end">
                                <div class="row" id="sort">
                                    <div class="col-12 text-center">
                                        <div class="row justify-content-around gap-1">

                                            <?php

                                            if (isset($_GET["page"])) {
                                                $pageNo = $_GET["page"];
                                            } else {
                                                $pageNo = 1;
                                            }

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                            $product_num = $product_rs->num_rows;

                                            $results_per_page = 3;
                                            $number_of_pages = ceil($product_num / $results_per_page);

                                            $page_results = ($pageNo - 1) * $results_per_page;
                                            $selected_rs =  Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                            LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                            $selected_num = $selected_rs->num_rows;

                                            for ($x = 0; $x < $selected_num; $x++) {
                                                $selected_data = $selected_rs->fetch_assoc();
                                            ?>

                                                <!-- card -->
                                                <div class="card mb-3 mt-3 col-12 col-lg-10 border-0 hi">
                                                    <div class="row">
                                                        <div class="col-md-5 py-2 pe-2 d-flx">
                                                            <img src="<?php echo $selected_data["img"]; ?>" class="rounded contain-image" style="width: 100%; height: 168px;">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="card-body mt-2">
                                                                <h4 class="card-title fw-bolder" style="color: rgb(37, 1, 1)"><?php echo $selected_data["name"]; ?></h4>
                                                                <p class="card-title fw-bold" style="color: rgb(37, 1, 1)"><?php echo $selected_data["title"]; ?></p>
                                                                <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span><br>
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["status_id"] == 2) { ?> checked <?php } ?> />
                                                                    <label class="form-check-label fw-bold text-info" for="fd<?php echo $selected_data["id"]; ?>">
                                                                        <?php if ($selected_data["status_id"] == 2) { ?>Activate Your Product<?php
                                                                                                                                            } else {
                                                                                                                                                ?>Deactivate Your Product<?php
                                                                                                                                            } ?>

                                                                    </label>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row g-1">
                                                                            <div class="col-12 col-lg-6 d-grid">
                                                                            <button class="btn btn-success fw-bold" onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</button>
                                                                            </div>
                                                                            <div class="col-12 col-lg-6 d-grid">
                                                                                <button class="btn btn-danger fw-bold" onclick="removeFromProduct(<?php echo $selected_data['id']; ?>);">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card -->

                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>

                                    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-lg justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="
                                                <?php if ($pageNo <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageNo - 1);
                                                } ?>
                                                " aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php

                                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                                if ($x == $pageNo) {
                                            ?>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="<?php echo "?page=".($x); ?>"><?php echo $x; ?></a>
                                                    </li>
                                            <?php
                                                } else {
                                                    ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="<?php echo "?page=".($x); ?>"><?php echo $x; ?></a>
                                                    </li>
                                            <?php
                                                }
                                            }

                                            ?>

                                            <li class="page-item">
                                                <a class="page-link" href="
                                                <?php if ($pageNo >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageNo + 1);
                                                } ?>
                                                " aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                </div>
                            </div>
                            <!-- product -->
                        </div>
                    </div>
                    <!-- cbody -->
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