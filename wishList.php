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
        <title>WishList | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                $page = "WishList";
                include "headerX.php"; ?>

                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                        <div class="row ">
                            <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                            </div>
                            <div class="col-10 text-center offset-1 offset-lg-0">
                                <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">Wish List</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content -->
                <div class="col-12">
                    <div class="row">
                        <div class="offset-1 col-10 bg-black bg-opacity-25 rounded mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bolder">❤️</label>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                            <input type="text" class="form-control border-0" placeholder="Search in Wishlist..." style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                                        </div>
                                        <div class="col-12 col-lg-2 mb-3 d-grid">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-11 col-lg-2 border-0 ">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav flex-column nav-pills">
                                        <a class="nav-link active" aria-current="page" href="#">My Wishlist</a>
                                        <a class="nav-link" href="cart.php">My Cart</a>
                                        <a class="nav-link" href="#">Purchase History</a>
                                    </nav>
                                </div>

                                <?php

                                $wish_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $wish_num = $wish_rs->num_rows;

                                if ($wish_num == 0) {
                                ?>
                                    <!-- empty view -->
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold">You have no items in your wishlist yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                <a href="home.php" class="btn btn-warning fs-3 fw-bold">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                    <?php
                                } else {
                                    for ($x = 0; $x < $wish_num; $x++) {
                                        $wish_data = $wish_rs->fetch_assoc();
                                    ?>
                                        <div class="col-12 col-lg-9
                                        <?php
                                        if ($x!==0) {
                                            ?> offset-lg-2 <?php
                                        }
                                        ?>
                                        ">
                                            <div class="row">



                                                <div class="card mb-3 mx-0 mx-lg-2 col-12 border-0 p-0" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                                                    <div class="row g-0 ">
                                                        <?php

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wish_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();
                                                        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $product_data["brand_id"] . "'");
                                                        $brand_data = $brand_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-md-4 p-2 hghWish" onclick="window.location ='singleProductVeiw.html'">
                                                            <div class="cover-image col-12 mx-auto rounded hvrOn" style="height:100%; background-image: url('<?php echo $product_data["img"]; ?>')"></div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <span class="fs-2 fw-bold text-danger"><?php echo $product_data["name"]; ?></span> <br>
                                                                <span class="fs-3 fw-bold text-danger opacity-50"><?php echo $product_data["title"]; ?></span> <br>
                                                                <span class="fs-5 fw-bold text-black-50">Brand : </span>
                                                                <span class="fs-5 fw-bold text-black"><?php echo $brand_data["name"]; ?></span><br>
                                                                <span class="fs-5 fw-bold text-black-50">Price : </span>&nbsp; &nbsp;
                                                                <span class="fs-5 fw-bold text-black">Rs. <?php echo $product_data["price"]; ?> .00 </span><br>
                                                                <span class="fs-5 fw-bold text-black-50">Seller : </span><br>
                                                                <span class="fs-5 fw-bold text-black"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"];  ?></span><br>
                                                                <span class="fs-5 fw-bold text-black"><?php echo $_SESSION["u"]["email"]; ?></span><br>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-lg-grid">
                                                                <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>' class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <button class="btn btn-outline-warning mb-2"  onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                                                <button class="btn btn-outline-danger mb-2" onclick='removeFromWishlist(<?php echo $wish_data["id"]; ?>);'>Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                <?php
                                    }
                                }

                                ?>

                            </div>
                        </div>
                    </div>
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