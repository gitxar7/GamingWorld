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
        <title>Invoice | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <!-- content -->
                <div class="offset-0 offset-lg-1 col-12 col-lg-10 bg-black bg-opacity-75 rounded my-0 my-lg-5">
                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 btn-toolbar justify-content-start">
                                <button class="btn btn-danger fs-4 fw-bold px-3 py-0 me-2" title="close invoice" onclick="window.history.back()">×</button>
                            </div>
                            <div class="col-10 btn-toolbar justify-content-end">
                                <button class="btn btn-dark me-2"><i class="bi bi-printer-fill"></i> print</button>
                                <button class="btn btn-danger me-2" onclick="window.print();"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="offset-6 col-6">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <span class="gw-iconText fs-3">GamingWorld</span>
                                    </div>
                                    <div class="col-12 text-end">
                                        <span class="text-white-50">Galle City, Galle, Sri Lanka</span><br />
                                        <span class="text-white-50">+94 112 4445558</span><br />
                                        <span class="text-white-50">gamingworld@gmail.com</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border border-1 border-dark" />
                            </div>

                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="fw-bold mt-4">INVOICE TO :</h5>
                                        <span class="text-white-50 fs-4"><?php echo $_SESSION["u"]["fname"] ?></span> <br>
                                        <span class="text-white-50"><?php echo $_SESSION["u"]["email"] ?></span>
                                    </div>
                                    <div class="col-6 text-end mt-4">
                                        <h1 style="color: rgb(72, 3, 3);">INVOICE 01</h1>
                                        <span class="fw-bold text-white-50">Date & Time of Invoice : </span><br />
                                        <span class="text-white-50">
                                            <?php
                                            $d = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $d->setTimezone($tz);
                                            $date = $d->format("Y-m-d H:i:s");
                                            echo $date;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <table class="table">

                                    <thead>
                                        <tr class="border border-1 border-dark">
                                            <th>#</th>
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Product Title</th>
                                            <th class="text-center">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $id_rs = Database::search("SELECT `id` FROM `invoice` ORDER BY `date` DESC;");
                                        $id_data = $id_rs->fetch_assoc();
                                        $sub_total = 0;
                                        $n = 1;

                                        foreach ($_SESSION["py"] as $ids) {
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $ids . "'");
                                            $product_data = $product_rs->fetch_assoc();
                                            $total_pr = $product_data["price"] + 5/100 * $product_data["price"]  ;

                                            Database::iud("INSERT INTO `invoice`
                                                          (`date`, `total`, `product_id`, `user_email`) VALUES 
                                                          ('" . $date . "', '" . $total_pr . "', '" . $ids . "', '" . $_SESSION["u"]["email"]. "')");
                                        ?>
                                            <tr class="border border-1 border-dark" style="height: 72px;">
                                                <td class="fs-3 pt-3 text-center bg-dark bg-opacity-25">0<?php echo $n ?></td>
                                                <td class="fw-bold fs-6 text-center pt-4  text-white">#000<?php echo ($id_data["id"] + 1) ?></td>
                                                <td class="fw-bold fs-6 text-center pt-4  text-white bg-dark bg-opacity-25"><?php echo $product_data["name"] ?></td>
                                                <td class="fw-bold fs-6 text-center pt-4  text-white "><?php echo $product_data["title"] ?></td>
                                                <td class="fw-bold fs-6 text-center pt-4  text-white bg-dark bg-opacity-25">Rs. <?php echo $product_data["price"] ?> .00</td>
                                            </tr>
                                        <?php
                                            $sub_total = $sub_total + $product_data["price"];
                                            $n = $n + 1;
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="border-0"></td>
                                            <td class="fs-5 text-end fw-bold border-dark">SUBTOTAL</td>
                                            <td class="text-end border-dark">Rs. <?php echo $sub_total ?> .00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-0"></td>
                                            <td class="fs-5 text-end fw-bold border-dark">Discount</td>

                                            <td class="text-end border-dark">Rs. 0 .00 (0%)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-0"></td>
                                            <td class="fs-5 text-end fw-bold border-dark" style="color: rgb(160, 10, 10)">GRAND TOTAL(+5%sc)</td>
                                            <td class="text-end border-dark" style="color: rgb(160, 10, 10)">Rs. <?php echo $sub_total + 5 / 100 * $sub_total ?> .00</td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>

                            <div class="col-4 text-center" style="margin-top: -100px;">
                                <span class="fs-1 fw-bold text-success">Thank You !</span>
                            </div>

                            <div class="col-12 border-start border-5 border-danger mt-3 mb-3 opacity-75" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                                <div class="row">
                                    <div class="col-12 mt-3 mb-3">
                                        <label class="form-label fw-bold fs-5" style="color: rgb(72, 3, 3);">NOTICE : </label><br />
                                        <label class="form-label fs-6 ">Purchased items can't be returned. Go to <a href="hc.php" class="text-decoration-none">h&c page</a> to inquiry about return policy.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border border-1 border-dark" />
                            </div>

                            <div class="col-12 text-center mb-3">
                                <label class="form-label fs-5 text-body fw-bold">
                                    Invoice was created on a computer and is valid without the Signature and Seal.
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content -->
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