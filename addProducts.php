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
        <title>Add Product | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                $page = "Products";
                include "headerX.php"; ?>



                <!-- content -->
                <div class="offset-1 col-10 bg-black bg-opacity-25 rounded mb-3 p-2">
                    <div class="col-12">
                        <div class="row">


                            <div class="col-12 text-center">
                                <h2 class="h2 text-danger fw-bold py-4">Add New Product</h2>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">
                                            Add Your Product Name
                                        </label>
                                    </div>
                                    <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                        <input type="text" id="nameAdd" class="form-control text-center text-white border-0" style="background-color: rgb(86, 5, 5);" placeholder="Ex:Need For Speed..." />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">
                                            Add Your Product Title
                                        </label>
                                    </div>
                                    <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                        <input type="text" id="titleAdd" class="form-control text-center text-white border-0" style="background-color: rgb(86, 5, 5);" placeholder="Ex:Most Wanted..." />
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <hr class="border-success" />
                            </div>



                            <div class="col-12">
                                <div class="row">

                                    <div class="">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                    </div>

                                    <div class="col-10 offset-1">
                                        <select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);" id="brandAdd">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            $brand_rs = Database::search("SELECT * FROM `brand`");
                                            $brand_num = $brand_rs->num_rows;

                                            for ($x = 0; $x < $brand_num; $x++) {
                                                $brand_data = $brand_rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>


                            <div class="col-12 py-3">
                                <div class="row">

                                    <div class="col-12 col-lg-4 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Platform</label>
                                            </div>
                                            <div class="col-11 offset-1">
                                                <?php

                                                $platform_rs = Database::search("SELECT * FROM `platform`");
                                                $platform_num = $platform_rs->num_rows;

                                                for ($x = 0; $x < $platform_num; $x++) {
                                                    $platform_data = $platform_rs->fetch_assoc();
                                                ?>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input bg-danger shadow-none border-0" type="checkbox" id="<?php echo $platform_data["name"]; ?>" />
                                                        <label class="form-check-label fw-bold" for="<?php echo $platform_data["name"]; ?>"><?php echo $platform_data["name"];?></label>
                                                    </div>

                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-8  border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Categories</label>
                                            </div>
                                            <div class="col-11 offset-1">
                                                <?php

                                                $categories_rs = Database::search("SELECT * FROM `category`");
                                                $categories_num = $categories_rs->num_rows;

                                                for ($x = 0; $x < $categories_num; $x++) {
                                                    $categories_data = $categories_rs->fetch_assoc();
                                                ?>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input bg-danger shadow-none border-0" type="checkbox" id="<?php echo $categories_data["name"]; ?>" />
                                                        <label class="form-check-label fw-bold" for="<?php echo $categories_data["name"]; ?>"><?php echo $categories_data["name"];; ?></label>
                                                    </div>

                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-6 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                            </div>
                                            <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text text-white border-0" style="background-color: rgb(86, 5, 5);">Rs.</span>
                                                    <input type="text" id="costAdd" class="form-control text-white border-0" id="cost" style="background-color: rgb(86, 5, 5);" />
                                                    <span class="input-group-text text-white border-0" style="background-color: rgb(86, 5, 5);">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                                    <div class="col-2 pm pm2"></div>
                                                    <div class="col-2 pm pm3"></div>
                                                    <div class="col-2 pm pm4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea id="desc" placeholder="Ex:Requirements, features, story...etc" cols="30" rows="15" class="form-control text-white border-0" style="background-color: rgb(86, 5, 5);"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 p-3">
                                                <div class="col-12 border border-danger rounded">
                                                    <img src="resources/upImage.png" class="product-image" id="i0" />
                                                </div>
                                            </div>
                                            <div class="col-4 p-3">
                                                <div class="col-12 border border-danger rounded">
                                                    <img src="resources/upImage.png" class="product-image" id="i1" />
                                                </div>
                                            </div>
                                            <div class="col-4 p-3">
                                                <div class="col-12 border border-danger rounded">
                                                    <img src="resources/upImage.png" class="product-image" id="i2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                        <input type="file" class="d-none" id="imageUploader" multiple />
                                        <label for="imageUploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
                                <label class="form-label" style="color: rgb(250, 250, 176)">
                                    We are taking 5% of the product from price from every
                                    product as a service charge.
                                </label>
                            </div>

                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                <button class="btn btn-success" onclick="addProduct();">Save Product</button>
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