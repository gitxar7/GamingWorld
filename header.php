<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="col-12 bg-opacity-25 p-1 sticky-lg-top" style="background-color: rgb(52, 2, 2);">
        <div class="row">
            <div class="col-12 col-lg-2">
                <div class="row align-items-center hvr" onclick="window.location= 'home.php'">
                    <div class="col-12 col-lg-2 d-flex d-lg-block justify-content-center mt-1"> <img src="resources/gmw.png" style="height: 35px;"></div>
                    <div class="col-12 col-lg-10 d-flex d-lg-block gw-iconText justify-content-center mt-1">GamingWorld</div>
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <hr>
            </div>
            <div class="col-12 col-lg-10">
                <div class="row mt-1">
                    <div class="col-12 col-lg-5 px-3">
                        <div class="row">

                            <?php

                            session_start();

                            if (isset($_SESSION["u"])) {

                                $data = $_SESSION["u"];

                            ?>
                                <div class="col-4 col-lg-auto d-flex justify-content-end justify-content-lg-start mt-2">
                                    <span class="fw-bold opacity-50 shake"><b>Welcome </b><?php echo $data["fname"]; ?></span>
                                </div>
                                <div class="col-4 col-lg-auto d-flex justify-content-center justify-content-lg-start mt-2">
                                    <span class="fw-bold opacity-50 so" onclick="signOut();">Sign Out</span>
                                </div>

                            <?php

                            } else {

                            ?>

                                <div class="col-4 col-lg-auto d-flex justify-content-center justify-content-lg-start mt-2">
                                    <span class="fw-bold opacity-50 sr" onclick="window.location='index.php'">Sign In or Register</span>
                                </div>

                            <?php

                            }

                            ?>

                            <div class="col-4 col-lg-auto d-flex justify-content-center justify-content-lg-start mt-2">
                                <span class="text-lg-start fw-bold opacity-50 hc" id="homeAndHc" onclick="window.location = 'hc.php'">Help and Contact</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-2 d-none d-lg-block"></div>
                    <div class="col-12 col-lg-5 px-3 mt-2 mt-lg-0">
                        <div class="row">
                            <div class="col-4 d-flex justify-content-center justify-content-lg-end mt-2 opacity-50 hvr" onclick="window.location='addProducts.php'">Sell</div>
                            <div class="col-4 d-flex justify-content-center justify-content-lg-end mb-1">
                                <div class="col-8 offset-2 dropdown">
                                    <button class="btn bg-transparent dropdown-toggle border border-2 border-danger" style="color: antiquewhite;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        HOME
                                    </button>
                                    <ul class="dropdown-menu bg-opacity-50 bg-danger">
                                        <li><a class="dropdown-item text-white " href="myProfile.php">My Profile</a></li>
                                        <li><a class="dropdown-item text-white" href="myProducts.php">My Products</a></li>
                                        <li><a class="dropdown-item text-white" href="wishlist.php">Wishlist</a></li>
                                        <li><a class="dropdown-item text-white" href="purchaseHistory.php">Purchase History</a></li>
                                        <li><a class="dropdown-item text-white" href="messages.php">Message</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-center mt-1">
                                <div class="col-4 cart-icon hvr" style="filter: drop-shadow(-1px -1px 3px rgb(220, 53, 69));" onclick="window.location = 'cart.php'"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bs/bootstrap.bundle.js"></script>
    <script src="bs/bootstrap.js"></script>
</body>

</html>
<!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->