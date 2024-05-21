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
    <title>Home | GamingWorld</title>
</head>

<body class="home-body">
    <div class="container-fluid">
        <div class="row">
            <?php
            $_SESSION["py"] = null;
             include "header.php"; ?>
            <!-- content -->
            <!-- csearch -->
            <div class="col-12 justify-content-center">
                <div class="row mb-3">


                    <div class="offset-4 offset-lg-1 col-4 col-lg-1">
                        <div></div>
                    </div>

                    <div class="col-12 col-lg-6">

                        <div class="input-group mt-3 mb-3 ">
                            <input type="text" class="form-control bg-body bg-opacity-50" aria-label="Text input with dropdown button" id="basic_search_txt">

                            <select class="form-select bg-body bg-opacity-50" style="max-width: 250px;" id="basic_search_select">
                                <option value="0" class="bg-black bg-opacity-50">All Categories</option>

                                <?php
                                require "connection.php";

                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();

                                ?>

                                    <option class="bg-black bg-opacity-50" value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                                <?php

                                }

                                ?>
                            </select>

                        </div>
                    </div>

                    <div class="col-12 col-lg-2 d-grid">
                        <button class="btn mt-3 mb-3 search text-white" style="background-color: rgb(100, 2, 2);" onclick="basicSearch(0);">Search</button>
                    </div>

                    <div class=" col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                        <a href="advancedSearch.php" class="text-decoration-none fw-bold" style="color: rgb(220, 53, 69);">Advanced</a>
                    </div>

                </div>
            </div>
            <!-- csearch -->

            <div id="basicSearchResult">

                <!-- carousel -->
                <div class="offset-1 col-10 mb-2 d-none d-lg-block">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/COD.jpg" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/fifa23.jpg" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/FC6.jpg" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/sonic.jpg" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/GOW.webp" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/marvel.jpg" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/SF6.png" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <div class="col-12  w-100 bg-body bg-opacity-10 rounded-3 d-flex justify-content-center">
                                    <img src="resources/gamesWl/GR7.jpeg" class="d-block contain-imageX" alt="..." style="height: 550px;">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- carousel -->

                <!-- products -->
                <div class="col-12">
                    <div class="row">
                        <!-- Category -->
                        <div class="col-12">
                            <a class="text-white-50 fs-3 text-decoration-none" href="#"><b class="fs-3">Explore Categories |</b> See all→</a>
                        </div>
                        <div class="col-12 ">
                            <div class="row d-flex justify-content-around gap-2 p-3">
                                <?php

                                $category_rs = Database::search("SELECT * FROM `category` LIMIT 5");
                                $category_num = $category_rs->num_rows;

                                for ($y = 0; $y < $category_num; $y++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>

                                    <div class="bg-body bg-opacity-10 rounded-4 hvrOn" onclick="basicSearch(0, <?php echo $category_data['id'] ?>);" style="height: 270px; width: 250px;">
                                        <div class="contain-image mt-1 col-12 mx-auto" style="height: 210px; background-image: url('<?php echo $category_data["img"] ?>')"></div>
                                        <div class=" col-12" style="height: 40px;">
                                            <p class="col-12 fs-4 fw-bolder text-center text-black mx-auto"><?php echo $category_data["name"] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Category -->

                        <!-- Brands -->
                        <div class="col-12">
                            <a class="text-white-50 fs-3 text-decoration-none" href="#"><b class=" fs-3">Explore Top Brands |</b> See all→</a>
                        </div>
                        <div class="col-12 ">
                            <div class="row d-flex justify-content-around gap-2 p-3">
                                <?php

                                $brand_rs = Database::search("SELECT * FROM `brand` LIMIT 5");
                                $brand_num = $brand_rs->num_rows;

                                for ($y = 0; $y < $brand_num; $y++) {
                                    $brand_data = $brand_rs->fetch_assoc();
                                ?>

                                    <div class="bg-body bg-opacity-10 rounded-4 hvrOn" style="height: 270px; width: 250px;" onclick="basicSearch(0, 0, <?php echo $brand_data['id'] ?>);">
                                        <div class="contain-image mt-1 col-12 mx-auto" style="height: 210px; background-image: url('<?php echo $brand_data["img"] ?>')"></div>
                                        <div class=" col-12" style="height: 40px;">
                                            <p class="col-12 fs-4 fw-bolder text-center text-black mx-auto"><?php echo $brand_data["name"] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Brands -->
                        <!-- items -->
                        <div class="col-12">
                            <a class="text-white-50 fs-3 text-decoration-none" href="#"><b class=" fs-3">Explore Latest Products |</b> See all→</a>
                        </div>
                        <div class="col-12 ">
                            <div class="row d-flex justify-content-around gap-2 p-3">
                                <?php

                                $product_rs = Database::search("SELECT * FROM `product`  WHERE `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                                $product_num = $product_rs->num_rows;


                                for ($y = 0; $y < $product_num; $y++) {
                                    $product_data = $product_rs->fetch_assoc();


                                ?>

                                    <div class="bg-body bg-opacity-10 rounded-4 hvrOn" style="height: 360px; width: 250px;">
                                        <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>'>
                                            <div class="col-12 px-1 pt-3" style="height: 200px;">
                                                <div class="cover-image  col-12 mx-auto img-thumbnail " style="height: 180px;  background-image: url('<?php echo $product_data["img"] ?>')"></div>
                                            </div>
                                        </a>

                                        <div class=" col-12" style="height: 25px;">
                                            <p class="col-12 fs-5 fw-bolder text-center text-black mx-auto"><?php echo $product_data["name"] ?></p>
                                        </div>
                                        <div class=" col-12" style="height: 25px;">
                                            <p class="col-12 fs-6 text-black-50 fw-bold text-center mx-auto"><?php echo $product_data["title"] ?></p>
                                        </div>
                                        <div class=" col-12 gap-1 d-flx" style="height: 25px;">

                                            <?php

                                            $product_id = $product_data['id'];
                                            $platform_rs = Database::search("SELECT * FROM `product_has_platform` INNER JOIN `platform` ON platform.id=product_has_platform.platform_id WHERE  `product_id` = '" . $product_id . "'");
                                            $platform_num = $platform_rs->num_rows;

                                            for ($x = 0; $x < $platform_num; $x++) {
                                                $platform_data = $platform_rs->fetch_assoc();
                                            ?>

                                                <span class="col-auto bg-black bg-opacity-25 px-1 rounded-pill text-black-50"><?php echo $platform_data["name"] ?></span>

                                            <?php } ?>
                                        </div>
                                        <div class=" col-12 gap-1 d-flx" style="height: 25px;">

                                            <?php

                                            $category_rs = Database::search("SELECT * FROM `product_has_category` INNER JOIN `category` ON category.id=product_has_category.category_id WHERE  `product_id` = '" . $product_id . "'");
                                            $category_num = $category_rs->num_rows;

                                            for ($x = 0; $x < $category_num; $x++) {
                                                $category_data = $category_rs->fetch_assoc();
                                            ?>

                                                <span class="col-auto bg-black bg-opacity-25 px-1 rounded-pill text-black-50"><?php echo $category_data["name"] ?></span>

                                            <?php } ?>
                                        </div>
                                        <div class=" col-12" style="height: 25px;">
                                            <p class="col-12 fs-6 fw-bolder  text-center mx-auto" style="color: rgb(2, 2, 108);">Rs. <?php echo $product_data["price"] ?> .00</p>
                                        </div>
                                        <div class=" col-12 d-flx p-2" style="height: 25px;">
                                            <?php

                                            if (isset($_SESSION["u"])) {

                                                $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                $wishlist_num = $wishlist_rs->num_rows;

                                                if ($wishlist_num == 1) {
                                            ?>
                                                    <button class="btn bg-black hvrW bg-opacity-100 btn-sm d-grid col-12" title="Remove from Wishlist" onclick='addToWishlist(<?php echo $product_data["id"]; ?>);'>🤍</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn bg-black hvrW bg-opacity-25 btn-sm d-grid col-12" title="Add to Wishlist" onclick='addToWishlist(<?php echo $product_data["id"]; ?>);'>🤍</button>
                                            <?php
                                                }
                                            } else {
                                                ?>
                                                    <button class="btn bg-black hvrW bg-opacity-25 btn-sm d-grid col-12" title="Add to Wishlist" disabled>🤍</button>
                                            <?php
                                                }

                                            ?>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- items -->

                    </div>
                </div>
                <!-- products -->
            </div>
            <!-- content -->
            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bs/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>