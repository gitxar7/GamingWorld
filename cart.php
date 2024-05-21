<?php

session_start();
$_SESSION["py"] = null;
require "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"]["email"];

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
        <title>Cart | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                $page = "Cart";
                include "headerX.php"; ?>

                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                        <div class="row ">
                            <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                            </div>
                            <div class="col-10 text-center offset-1 offset-lg-0">
                                <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">Shopping Cart</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content -->
                <div class="offset-1 col-10 bg-black bg-opacity-25 rounded mb-3">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder"><i class="bi bi-cart4 text-success fs-1"></i></label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control border-0" placeholder="Search in Cart..." style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                                </div>
                                <div class="col-12 col-lg-2 d-grid mb-3">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr>
                        </div>

                        <?php

                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
                        $cart_num = $cart_rs->num_rows;

                        $subtal = 0;

                        if ($cart_num == 0) {

                        ?>
                            <!-- Empty View -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptyCart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1 fw-bold">
                                            Oops, cart is empty.....
                                        </label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                                        <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                            Start Shopping?
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty View -->
                        <?php

                        } else {
                        ?>

                            <!-- products -->
                            <div class="col-12 col-lg-8 ms-lg-5">
                                <div class="row">

                                    <?php
                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $product_data["brand_id"] . "'");
                                        $brand_data = $brand_rs->fetch_assoc();

                                        $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                        $seller_data = $seller_rs->fetch_assoc();
                                        $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                                        $product_price = $product_data["price"];
                                        $subtal = $subtal + $product_price;

                                    ?>
                                        <div class="card mb-3 mx-0 col-12 border-0" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black-50 fs-5">Seller : </span>&nbsp;
                                                            <span class="fw-bold text-black-50 fs-5"><?php echo $seller; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-4 p-2 hghImg" onclick="window.location ='singleProductVeiw.html'">
                                                    <div class="cover-image col-12 mx-auto rounded hvrOn" style="height:100%; background-image: url('<?php echo $product_data["img"]; ?>')" data-bs-custom-class="custom-popover" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Product Description" data-bs-content="<?php echo $product_data["description"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <span class="fs-2 fw-bold text-danger"><?php echo $product_data["name"]; ?></span> <br>
                                                        <span class="fs-3 fw-bold text-danger opacity-50"><?php echo $product_data["title"]; ?></span> <br>

                                                        <span class="fw-bold text-black-50 fs-5">Brand :</span>&nbsp;
                                                        <span class="fw-bold text-black-50 fs-5"><?php echo $brand_data["name"]; ?></span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                        <span class="fw-bold text-black-50 fs-5">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        <br>
                                                        <br>
                                                        <span class="fw-bold text-black-50">
                                                            +5% service charge applies.
                                                        </span>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        <a class="btn btn-outline-success mb-2" href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>'>Buy Now</a>
                                                        <a class="btn btn-outline-danger mb-2" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);">Remove</a>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                    ?>

                                </div>
                            </div>
                            <!-- products -->
                            <!-- summary -->
                            <div class="col-12 col-lg-3">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fs-3 fw-bold">Summary</label>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-6 mb-3">
                                        <span class="fs-6 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                    </div>
                                    <?php

                                    $s_charge = 5 / 100 * $subtal;
                                    $total = $s_charge + $subtal;
                                    ?>

                                    <div class="col-6 text-end mb-3">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $subtal; ?> .00</span>
                                    </div>

                                    <div class="col-7">
                                        <span class="fs-6 fw-bold">Service Charge(5%)</span>
                                    </div>

                                    <div class="col-5 text-end">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $s_charge; ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>

                                    <div class="col-6 mt-2">
                                        <span class="fw-bolder" style="font-size: 17px;">Total</span>
                                    </div>

                                    <div class="col-6 mt-2 text-end">
                                        <span class="fw-bolder" style="font-size: 17px;">Rs. <?php echo $total; ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3 mb-3 d-grid">
                                        <button class="btn btn-primary fs-5 fw-bold" onclick="payNow();">CHECKOUT</button>
                                    </div>

                                </div>
                            </div>
                            <!-- summary -->

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
                                                    <?php

                                                    $py_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
                                                    $py_num = $py_rs->num_rows;
                                                    $py_arr = array();

                                                    for ($x = 0; $x < $py_num; $x++) {
                                                        $py_data = $py_rs->fetch_assoc();

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $py_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc(); ?>

                                                        <div class="my-1 row">
                                                            <div class="col-1">
                                                                <img src="<?php echo $product_data["img"]; ?>" class="rounded-circle bg-body" style="height: 50px; width: 50px;">
                                                            </div>
                                                            <div class="col-10 ms-4 mb-2">
                                                                <span class="fs-5"><?php echo $product_data["name"]; ?> <?php echo $product_data["title"]; ?></span><br>
                                                                <span class="fs-6 text-white-50"><?php echo $product_data["price"]; ?> LKR</span>
                                                            </div>
                                                            <hr>
                                                        </div>

                                                        <?php                                                        
                                                        $py_arr[$x] = $product_data["id"];
                                                        $_SESSION["py"] = $py_arr;
                                                         } ?>
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
                                            $product_arr = "['1', '2']";
                                            $product_txt = json_encode($product_arr);
                                            ?>
                                            <button type="button" class="btn btn-primary" onclick="proceedPayment(<?php echo $total; ?>, <?php echo $py_num; ?>);">Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- payment modal -->

                        <?php }
                        ?>
                    </div>
                </div>
                <!-- content -->

                <?php include "footer.php"; ?>
            </div>
        </div>

        <script src="bs/bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>
    </body>

    </html>
    <!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->

<?php

} else {
    header("Location:home.php");
}

?>