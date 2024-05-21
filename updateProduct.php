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
        <title>Update Product | GamingWorld</title>
    </head>

    <body class="home-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                $page = "Products";
                include "headerX.php";

                if (isset($_SESSION["p"])) {

                    $product = $_SESSION["p"];
                ?>



                    <!-- content -->
                    <div class="offset-1 col-10 bg-black bg-opacity-25 rounded mb-3 p-2">
                        <div class="col-12">
                            <div class="row">


                                <div class="col-12 text-center">
                                    <h2 class="h2 text-danger fw-bold py-4">Update Product</h2>
                                </div>

                                <div class="col-12 col-lg-6 opacity-50">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">
                                                Add Your Product Name
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                            <input type="text" class="form-control text-center text-white border-0" style="background-color: rgb(86, 5, 5);" value="<?php echo $product["name"]; ?>" disabled />
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
                                            <input type="text" id="titleUpd" class="form-control text-center text-white border-0" style="background-color: rgb(86, 5, 5);" value="<?php echo $product["title"]; ?>" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>



                                <div class="col-12 opacity-50">
                                    <div class="row">

                                        <div class="">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                        </div>

                                        <div class="col-10 offset-1">
                                            <select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);" disabled>
                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $product["brand_id"] . "'");
                                                $brand_data = $brand_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo $brand_data["name"]; ?></option>
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
                                                    $platformX_rs = Database::search("SELECT * FROM `product_has_platform` INNER JOIN `platform` ON platform.id=product_has_platform.platform_id WHERE `product_id`='" . $product["id"] . "';");
                                                    $platformX_num = $platformX_rs->num_rows;

                                                    $platform_id0 = 0;
                                                    $platform_id1 = 0;
                                                    $platform_id2 = 0;

                                                    for ($y = 0; $y < $platformX_num; $y++) {
                                                        $platformX_data = $platformX_rs->fetch_assoc();
                                                        ${"platform_id" . $y} = $platformX_data["platform_id"];
                                                    }
                                                    for ($x = 0; $x < $platform_num; $x++) {
                                                        $platform_data = $platform_rs->fetch_assoc();
                                                    ?>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input bg-danger shadow-none border-0" <?php
                                                                                                                            if ($platform_id0 == $platform_data["id"] || $platform_id1 == $platform_data["id"] || $platform_id2 == $platform_data["id"]) {
                                                                                                                            ?> checked <?php
                                                                                                                                    }
                                                                                                                                        ?> type="checkbox" id="<?php echo $platform_data["name"]; ?>" />
                                                            <label class="form-check-label fw-bold" for="<?php echo $platform_data["name"]; ?>"><?php echo $platform_data["name"]; ?></label>
                                                        </div>

                                                    <?php
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-8  opacity-50">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Categories</label>
                                                </div>
                                                <div class="col-11 offset-1">

                                                    <?php

                                                    $category_rs = Database::search("SELECT * FROM `category`");
                                                    $category_num = $category_rs->num_rows;
                                                    $categoryX_rs = Database::search("SELECT * FROM `product_has_category` INNER JOIN `category` ON category.id=product_has_category.category_id WHERE `product_id`='" . $product["id"] . "';");
                                                    $categoryX_num = $categoryX_rs->num_rows;

                                                    $category_id0 = 0;
                                                    $category_id1 = 0;
                                                    $category_id2 = 0;
                                                    $category_id3 = 0;
                                                    $category_id4 = 0;
                                                    $category_id5 = 0;
                                                    $category_id6 = 0;
                                                    $category_id7 = 0;

                                                    for ($y = 0; $y < $categoryX_num; $y++) {
                                                        $categoryX_data = $categoryX_rs->fetch_assoc();
                                                        ${"category_id" . $y} = $categoryX_data["category_id"];
                                                    }
                                                    for ($x = 0; $x < $category_num; $x++) {
                                                        $category_data = $category_rs->fetch_assoc();
                                                    ?>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input bg-danger shadow-none border-0" <?php
                                                                                                                            if ($category_id0 == $category_data["id"] || $category_id1 == $category_data["id"] || $category_id2 == $category_data["id"] || $category_id3 == $category_data["id"]) {
                                                                                                                            ?> checked <?php
                                                                                                                                    }
                                                                                                                                    if ($category_id4 == $category_data["id"] || $category_id5 == $category_data["id"] || $category_id6 == $category_data["id"] || $category_id7 == $category_data["id"]) {
                                                                                                                                        ?> checked <?php
                                                                                                                                    }
                                                                                                                                        ?> type="checkbox" id="<?php echo $category_data["name"]; ?>" />
                                                            <label class="form-check-label fw-bold" for="<?php echo $category_data["name"]; ?>"><?php echo $category_data["name"]; ?></label>
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

                                        <div class="col-6 border-end border-success opacity-50">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text text-white border-0" style="background-color: rgb(86, 5, 5);">Rs.</span>
                                                        <input type="text" value="<?php echo $product["price"]; ?>" class="form-control text-white border-0 text-center" id="cost" style="background-color: rgb(86, 5, 5);" disabled />
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
                                            <textarea id="descUpd" cols="30" rows="15" class="form-control text-white border-0" style="background-color: rgb(86, 5, 5);"><?php echo $product["description"]; ?></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="col-12">

                                            <?php
                                            $img = array();

                                            $img[0] = "resources/upImage.png";
                                            $img[1] = "resources/upImage.png";
                                            $img[2] = "resources/upImage.png";


                                            if ($product["img"] != "") {
                                                $img[0] = $product["img"];
                                            }
                                            if ($product["ss1"] != "") {
                                                $img[1] = $product["ss1"];
                                            }
                                            if ($product["ss2"] != "") {
                                                $img[2] = $product["ss2"];
                                            }

                                            ?>

                                            <div class="row">
                                                <div class="col-4 p-3">
                                                    <div class="col-12 border border-danger rounded">
                                                        <img src="<?php echo $img[0]; ?>" class="product-image" id="i0" />
                                                    </div>
                                                </div>
                                                <div class="col-4 p-3">
                                                    <div class="col-12 border border-danger rounded">
                                                        <img src="<?php echo $img[1]; ?>" class="product-image" id="i1" />
                                                    </div>
                                                </div>
                                                <div class="col-4 p-3">
                                                    <div class="col-12 border border-danger rounded">
                                                        <img src="<?php echo $img[2]; ?>" class="product-image" id="i2" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 16px;">Notice...</label><br />
                                            <label class="form-label" style="color: rgb(250, 250, 176)">
                                            Select multiple image files to upload multiple images.
                                            </label>
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


                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="updateProduct();">Update Product</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- content -->


                <?php

                } else {
                ?>
                    <script>
                        alert("Please select a product to Update.");
                        window.location = "myProducts.php";
                    </script>
                <?php
                } ?>

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
?>
    <script>
        alert("Please SignIn to Access.");
        window.location = "home.php";
    </script>
<?php
} ?>