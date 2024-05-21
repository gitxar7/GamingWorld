<?php

session_start();
if (isset($_SESSION["u"])) {
    require "connection.php";
    $mail = $_SESSION["u"]["email"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $mail . "'");
    $invoice_num = $invoice_rs->num_rows;
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
        <title>Purchase History | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                $page = "Purchase";
                include "headerX.php"; ?>

                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                        <div class="row ">
                            <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                            </div>
                            <div class="col-10 text-center offset-1 offset-lg-0">
                                <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">Purchase History</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content -->
                <?php
                if ($invoice_num == 0) {

                ?>
                    <div class="col-12 text-center" style="height: 500px;">
                        <div class="row">
                            <div class="col-12 px-1 pt-3" style="height: 200px;">
                                <div class="contain-image  col-12 mx-auto rounded" style="height: 330px;  background-image: url('resources/Shrug-bro.png')"></div>
                            </div>
                            <div class="col-12" style="margin-top: 150px;">
                                <span class="fs-1 fw-bold">
                                    You have not purchased any item yet...
                                </span>
                            </div>
                        </div>
                    </div>
                <?php

                } else {
                ?>
                    <div class="offset-1 col-10 bg-black bg-opacity-25 rounded">
                        <div class="row p-2">
                            <div class="col-12">
                                <hr>
                            </div>

                            <?php

                            for ($x = 0; $x < $invoice_num; $x++) {
                                $invoice_data = $invoice_rs->fetch_assoc();
                            ?>
                                <div class="col-12 mt-2">
                                    <h3 class="text-white-50">#<?php echo $invoice_data["id"]; ?></h3>
                                </div>
                                <div class="card col-12 border-0" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                                    <?php
                                    $pid = $invoice_data["product_id"];
                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
                                    $product_data = $product_rs->fetch_assoc();

                                    $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $product_data["brand_id"] . "' ");
                                    $brand_data = $brand_rs->fetch_assoc();

                                    $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "' ");
                                    $seller_data = $seller_rs->fetch_assoc();
                                    ?>
                                    <div class="row g-0">
                                        <div class="col-md-4 px-1 py-3" style="height: 230px;">
                                            <div class="cover-image  col-12 mx-auto rounded" style="height: 224px;  background-image: url('<?php echo $product_data["img"]; ?>')"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card-body">
                                                <span class="fs-2 fw-bold text-danger"><?php echo $product_data["name"]; ?></span> <br>
                                                <span class="fs-3 fw-bold text-danger opacity-50"><?php echo $product_data["title"]; ?></span> <br>
                                                <span class="fs-5 fw-bold text-black-50">Seller : <?php echo $seller_data["fname"]; ?> | <?php echo $product_data["user_email"]; ?></span><br>
                                                <span class="fs-5 fw-bold text-black-50">Brand : </span>&nbsp; &nbsp;
                                                <span class="fs-5 fw-bold text-black"><?php echo $brand_data["name"]; ?></span><br>
                                                <span class="fs-5 fw-bold text-black-50">Total Price : </span>&nbsp; &nbsp;
                                                <span class="fs-5 fw-bold text-black">Rs. <?php echo $invoice_data["total"]; ?> .00</span><br>
                                                <span class="fs-5 fw-bold text-black-50">Purchased Date & Time :</span><br class="d-block d-lg-none">
                                                <span class="fs-5 fw-bold text-black"><?php echo $invoice_data["date"]; ?> </span>
                                                <div class="col-12 btn-toolbar justify-content-end mt-2">
                                                    <button class="btn btn-secondary me-2" onclick="addFeedback(<?php echo $invoice_data['product_id']; ?>);"><i class="bi bi-exclamation-circle"></i> Feedback</button>
                                                    <button class="btn btn-danger me-2" onclick="removeFromHistory(<?php echo $invoice_data['id']; ?>);"><i class="bi bi-trash3"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- model -->
                                <div class="modal bg-opacity-25" tabindex="-1" id="feedbackModal<?php echo $invoice_data['product_id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">Add New Feedback</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="form-label fw-bold">Type</label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="<?php echo $pid; ?>type" id="<?php echo $pid; ?>type1" />
                                                                        <label class="form-check-label text-success fw-bold" for="<?php echo $pid; ?>type1">
                                                                            Positive
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="<?php echo $pid; ?>type" id="<?php echo $pid; ?>type2" checked />
                                                                        <label class="form-check-label text-warning fw-bold" for="<?php echo $pid; ?>type2">
                                                                            Neutral
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="<?php echo $pid; ?>type" id="<?php echo $pid; ?>type3" />
                                                                        <label class="form-check-label text-danger fw-bold" for="<?php echo $pid; ?>type3">
                                                                            Negative
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="form-label fw-bold">User's Email</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <input type="text" class="form-control bg-dark bg-opacity-50 text-white" id="<?php echo $pid; ?>mail" value="<?php echo $mail; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="form-label fw-bold">Feedback</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <textarea class="form-control bg-dark bg-opacity-50 text-white" cols="50" rows="8" id="<?php echo $pid; ?>feed"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-outline-primary" onclick="saveFeedback(<?php echo $pid; ?>);">Save Feedback</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- model -->

                            <?php

                            }
                            ?>

                            <div class="col-12">
                                <hr>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 btn-toolbar justify-content-end">
                                        <button class="btn btn-danger me-2" onclick="removeFromHistory('all');"><i class="bi bi-trash3"></i> Clear All Records</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                }
                ?>
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