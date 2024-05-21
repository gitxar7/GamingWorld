<?php
session_start();
$_SESSION["py"] = null;
require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.name AS pname, product.id AS pid, brand.name AS bname,`title`,`brand_id`, `description`,`user_email`, `price`,
     `status_id`, product.img AS pimg, `ss1`, `ss2`, brand.img AS bimg, product.datetime_added AS date 
    FROM `product` INNER JOIN `brand` ON brand.id = product.brand_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

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
            <title><?php echo $product_data["title"]; ?> | GamingWorld</title>

        </head>

        <body class="home-body">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $page = "product";
                    include "headerX.php"; ?>

                    <div class="row">
                        <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                            <div class="row ">
                                <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                    <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                                </div>
                                <div class="col-10 text-center offset-1 offset-lg-0">
                                    <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50"><?php echo $product_data["title"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- content -->
                    <!-- payment modal -->
                    <div class="modal modal-lg bg-black bg-opacity-75" tabindex="-1" id="paymentModal">
                        <div class="modal-dialog">
                            <div class="modal-content bg-black bg-opacity-50">
                                <div class="modal-header">
                                    <div class="col-auto mt-1">
                                        <img src="resources/gmw.png" style="height: 50px; width: 50px;">
                                        <span class="gw-iconText fs-4">GamingWorld<i class="fs-4">Pay</i></span>&trade;
                                    </div>
                                </div>
                                <div class="modal-body">

                                    <div class="row p-2">
                                        <div class="col-12 col-lg-6 rounded bg-primary mb-2 overflow-auto">
                                            <div class="my-1 row">
                                                <div class="col-1">
                                                    <img src="<?php echo $product_data["pimg"]; ?>" class="rounded-circle bg-body" style="height: 50px; width: 50px;">
                                                </div>
                                                <div class="col-10 ms-4 mb-2">
                                                    <span class="fs-5"><?php echo $product_data["pname"]; ?> <?php echo $product_data["title"]; ?></span><br>
                                                    <span class="fs-6 text-white-50"><?php echo $product_data["price"]; ?> LKR</span>
                                                </div>
                                                <hr>

                                                <?php
                                                $py_arr = array();
                                                array_push($py_arr, $product_data["pid"]);
                                                $_SESSION["py"] = $py_arr;
                                                 ?>

                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2">
                                            <div class="row g-3 mb-2">

                                                <div class="col-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control bg-transparent text-light" id="cardEmail" />
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Card Holder's Name</label>
                                                    <input type="text" class="form-control bg-transparent text-light" id="cardName" />
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Card Number</label>
                                                    <input type="text" class="form-control bg-transparent text-light" id="cardNumber" />
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label">Expiry</label>
                                                    <input type="text" class="form-control bg-transparent text-light" id="cardExpiry" />
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label">CVV</label>
                                                    <input type="text" class="form-control bg-transparent text-light" id="cardCVV" />
                                                </div>

                                                <div class="col-12 text-danger" id="cardAlert"></div>
                                                
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <?php 
                                    $product_arr ="['1', '2']";
                                    $product_txt = json_encode($product_arr);
                                    ?>
                                    <button type="button" class="btn btn-primary" onclick="proceedPayment(<?php echo ($product_data['price'] + 5/100 * $product_data['price']  ) ?>, <?php echo $product_arr ?>);">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- payment modal -->

                    <!-- a -->
                    <div class="offset-1 col-10">
                        <div class="row bg-black bg-opacity-25 rounded mb-3 p-2">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <div class="col-12 bg-black rounded cover-image" style="height: 300px; background-image: url('<?php echo $product_data["pimg"]; ?>')"></div>
                                    </div>
                                    <div class="col-6 p-1">
                                        <?php
                                        if ($product_data["ss1"] == "") {
                                        ?> <div class="col-12 rounded contain-image bg-dark" style="height: 150px; background-image: url('resources/image.png')"></div> <?php
                                                                                                                                                                    } else {
                                                                                                                                                                        ?> <div class="col-12 rounded cover-image" style="height: 150px; background-image: url('<?php echo $product_data["ss1"]; ?>')"></div> <?php
                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                ?>
                                    </div>
                                    <div class="col-6 p-1">
                                        <?php
                                        if ($product_data["ss2"] == "") {
                                        ?> <div class="col-12 rounded contain-image bg-dark" style="height: 150px; background-image: url('resources/image.png')"></div> <?php
                                                                                                                                                                    } else {
                                                                                                                                                                        ?> <div class="col-12 rounded cover-image" style="height: 150px; background-image: url('<?php echo $product_data["ss2"]; ?>')"></div> <?php
                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                ?> </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 rounded bg-black bg-opacity-50 mt-1 singleP">
                                <div class="row p-1">

                                    <div class="col-12 my-2">
                                        <div class="row">
                                            <div class="col-12 col-lg-1 d-flx">
                                                <div class="col-12 bg-light rounded-circle contain-image" style="width: 35px; height:35px; background-image: url('<?php echo $product_data["bimg"]; ?>')"></div>
                                            </div>
                                            <div class="col-11 text-center text-lg-start">
                                                <span class="fs-4 fw-bold text-success"><?php echo $product_data["pname"] . " " . $product_data["title"]; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <div class="col-12 my-2">
                                        <span class="badge">
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>

                                            <div class="d-none d-lg-inline-block">&nbsp;&nbsp;&nbsp;</div>
                                            <div class="d-block d-lg-none"><br></div>

                                            <label class="fs-5 text-white-50 fw-bold">4.5 Stars | 39 Reviews and Ratings</label>
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <?php

                                    $price = $product_data["price"];
                                    $adding_price = ($price / 100) * 5;
                                    $new_price = $price + $adding_price;
                                    $difference = $new_price - $price;
                                    $percentage = ($difference / $price) * 100;

                                    ?>

                                    <div class="col-12 my-2">
                                        <span class="fs-4 text-white-50 fw-bold">Rs. <?php echo $price; ?> .00</span>
                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span class="fs-4 text-danger fw-bold">Rs. <?php echo $new_price; ?> .00</span>
                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span class="fs-4 fw-bold text-white-50">Save Rs. <?php echo $difference; ?></span>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <div class="col-12 my-2">
                                        <span class="fs-5 text-white-50"><b class="fs-5 text-white">Update : </b>Lifetime game upgrade</span><br />
                                        <span class="fs-5 text-white-50"><b class="fs-5 text-white">Return Policy : </b>No return policy</span><br />
                                        <span class="text-white-50">Go to <a href="hc.php" class="text-decoration-none">h&c page</a> to know more about return policy</span>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <?php



                                    $seller_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $product_data["user_email"] . "';");
                                    $seller_num = $seller_rs->num_rows;
                                    $seller_data = $seller_rs->fetch_assoc();

                                    $cat_rs_x = Database::search("SELECT * FROM `product_has_category` INNER JOIN `category` ON category.id = product_has_category.category_id WHERE `product_id` = '" . $pid . "';");
                                    $cat_num_x = $cat_rs_x->num_rows;
                                    $cat_data_x = $cat_rs_x->fetch_assoc();

                                    $plat_rs = Database::search("SELECT * FROM `product_has_platform` INNER JOIN `platform` ON platform.id = product_has_platform.platform_id WHERE `product_id` = '" . $pid . "';");
                                    $plat_num = $plat_rs->num_rows;

                                    ?>

                                    <div class="col-12 my-2">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 border border-1 border-dark text-center">
                                                <span class="fs-5 text-white-50"><b class="fs-5">Seller : </b><?php echo $seller_data["lname"]; ?></span>
                                            </div>
                                            <div class="col-12 col-lg-6 border border-1 border-dark text-center">
                                                <span class="fs-5 text-white-50"><b class="fs-5">Sold : </b>100 Items</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-lg-4 mb-1 mb-lg-0 d-grid">
                                                <button class="btn btn-success" type="submit" id="payHere-payment" onclick="payNow(<?php echo $pid ?>);">Buy Now</button>
                                            </div>
                                            <div class="col-12 col-lg-4 mb-1 mb-lg-0 d-grid">
                                                <button class="btn btn-primary" onclick="addToCart(<?php echo $pid ?>);">Add To Cart</button>
                                            </div>
                                            <div class="col-12 col-lg-4 mb-1 mb-lg-0 d-grid">
                                                <?php

                                                $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $pid . "' AND 
                                                `user_email`='" . $product_data["user_email"] . "'");
                                                $wishlist_num = $wishlist_rs->num_rows;

                                                if ($wishlist_num == 1) {
                                                ?>
                                                    <button class="btn btn-secondary hvrW  d-grid col-12" title="Added to Wishlist" onclick='addToWishlist(<?php echo $pid; ?>);'>🤍</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-outline-secondary hvrW  d-grid col-12" title="Add to Wishlist" onclick='addToWishlist(<?php echo $pid; ?>);'>🤍</button>
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
                    <!-- a -->

                    <!-- b -->
                    <div class="offset-1 col-10">
                        <div class="row bg-black bg-opacity-25 rounded mb-3 p-2">
                            <div class="col-12">
                                <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Related Items</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row d-flx">
                                    <?php

                                    $rel_rs = Database::search("SELECT DISTINCT product.id AS id, product.name AS name, `title`, `price`, product.img AS img FROM `product` 
                                    INNER JOIN `brand` ON brand.id = product.brand_id INNER JOIN `product_has_category` ON product_has_category.product_id = product.id 
                                    WHERE product.title LIKE '%" . $product_data["title"] . "%' OR product.name LIKE '%" . $product_data["pname"] . "%' OR `category_id`= '" . $cat_data_x["id"] . "'  OR `brand_id`= '" . $product_data["brand_id"] . "' LIMIT 4 OFFSET 0");
                                    $rel_num = $rel_rs->num_rows;


                                    for ($y = 0; $y < $rel_num; $y++) {
                                        $rel_data = $rel_rs->fetch_assoc();

                                    ?>

                                        <div class="" style="height: 300px; width: 260px; padding:5px;">
                                            <div class="bg-body bg-opacity-10 rounded-4 hvrOn" style="height: 290px; width: 250px;">
                                                <a href='<?php echo "singleProductView.php?id=" . ($rel_data["id"]); ?>'>
                                                    <div class="col-12 px-1 pt-3" style="height: 200px;">
                                                        <div class="cover-image  col-12 mx-auto rounded" style="height: 180px;  background-image: url('<?php echo $rel_data["img"] ?>')"></div>
                                                    </div>
                                                </a>

                                                <div class=" col-12" style="height: 25px;">
                                                    <p class="col-12 fs-5 fw-bolder text-center text-black mx-auto"><?php echo $rel_data["name"] ?></p>
                                                </div>
                                                <div class=" col-12" style="height: 25px;">
                                                    <p class="col-12 fs-6 text-black-50 fw-bold text-center mx-auto"><?php echo $rel_data["title"] ?></p>
                                                </div>
                                                <div class="col-12 d-grid px-3" style="height: 30px;">
                                                    <button class="btn btn-primary" onclick="addToCart(<?php echo $rel_data['id']  ?>);">Add To Cart</button>
                                                </div>

                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- b -->
                    <!-- c -->
                    <div class="offset-1 col-10">
                        <div class="row bg-black bg-opacity-25 rounded mb-3 p-2">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Product Details</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <b class="text-white fs-5">Categories:</b>
                                            <?php

                                            $cat_rs = Database::search("SELECT * FROM `product_has_category` INNER JOIN `category` ON category.id = product_has_category.category_id WHERE `product_id` = '" . $pid . "';");
                                            $cat_num = $cat_rs->num_rows;

                                            for ($x = 0; $x < $cat_num; $x++) {
                                                $cat_data = $cat_rs->fetch_assoc();
                                            ?>
                                                <span class="text-white-50 fs-5"><?php echo $cat_data["name"] ?></span> &nbsp;
                                            <?php } ?>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <b class="text-white fs-5">Supporting Platforms:</b>
                                            <?php for ($x = 0; $x < $plat_num; $x++) {
                                                $plat_data = $plat_rs->fetch_assoc();
                                            ?>
                                                <span class="text-white-50 fs-5"><?php echo $plat_data["name"] ?></span> &nbsp;
                                            <?php } ?>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <b class="text-white fs-5">Product Brand:</b>
                                            <span class="text-white-50 fs-5"><?php echo $product_data["bname"] ?></span>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fs-5 fw-bold">Description : </label>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea cols="60" rows="10" class="form-control border-0 bg-black bg-opacity-25 text-white-50 fs-5" readonly><?php echo $product_data["description"]; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fs-5 fw-bold">Feedbacks : </label>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row bg-black bg-opacity-25 rounded me-0 of" style="height: 270px;">

                                                                <?php

                                                                $feedback_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
                                                                $feedback_num = $feedback_rs->num_rows;

                                                                for ($x = 0; $x < $feedback_num; $x++) {
                                                                    $feedback_data = $feedback_rs->fetch_assoc();
                                                                ?>
                                                                    <div class="col-12 mt-1 mx-1">
                                                                        <div class="row  bg-dark bg-opacity-25 border border-1 border-dark rounded me-0">
                                                                            <?php

                                                                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $feedback_data["user_email"] . "'");
                                                                            $user_data = $user_rs->fetch_assoc();

                                                                            ?>
                                                                            <div class="col-10 mt-1 mb-1 ms-0"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></div>
                                                                            <div class="col-2 mt-1 mb-1 ms-1 ms-lg-0">
                                                                                <?php
                                                                                if ($feedback_data["type"] == 1) {
                                                                                ?>
                                                                                    <span class="badge bg-success">Positive</span>
                                                                            </div>
                                                                        <?php
                                                                                } else if ($feedback_data["type"] == 2) {
                                                                        ?>
                                                                            <span class="badge bg-warning">Neutral</span>
                                                                        </div>
                                                                    <?php
                                                                                } else if ($feedback_data["type"] == 3) {
                                                                    ?>
                                                                        <span class="badge bg-danger">Negative</span>
                                                                    </div>
                                                                <?php
                                                                                }
                                                                ?>

                                                                <div class="col-12">
                                                                    <b>
                                                                        <?php echo $feedback_data["feedback"]; ?>
                                                                    </b>
                                                                </div>
                                                                <div class="offset-6 col-6 text-end">
                                                                    <label class="form-label fs-6 text-white-50"><?php echo $feedback_data["date"]; ?></label>
                                                                </div>
                                                            </div>
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
                        </div>


                    </div>
                </div>
            </div>
            <!-- c -->

            <!-- content -->

            <?php include "footer.php"; ?>
            </div>
            </div>

            <script src="bs/bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>
        <!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->


<?php

    } else {
        echo ("Sorry for the inconvenient");
    }
} else {
    echo ("Something went wrong");
}

?>