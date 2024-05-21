<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

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
    <title>Admin Panel | GamingWorld</title>
</head>

<body class="home-body">
    <div class="container-fluid">
        <div class="row">
            <?php
            $navPage = "product";
            include "adminNav.php";
            ?>
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <?php
                include "adminH.php";
                ?>
                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                            <input type="text" class="form-control text-white border-danger" id="searchProductsAdTxt" placeholder="Search in Products..." style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3));">
                        </div>
                        <div class="col-12 col-lg-2 d-grid mb-3">
                            <button class="btn btn-danger" onclick="searchAd('product');">Search</button>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <hr class="border border-2">
                </div>

                <div id="searchProductsAd">
                    <?php

                    $pr_rs = Database::search("SELECT product.id AS `id`, product.name AS `name`, `title`, `price`,brand.name 
                    AS `bname`,`fname`,`email`, `datetime_added`, product.img `img`,product.status_id `status_id` FROM `product` INNER JOIN `brand` 
                    ON `brand_id`= brand.id INNER JOIN `user` ON `user_email`= user.email ;");
                    $pr_num = $pr_rs->num_rows;
                    for ($x = 0; $x < $pr_num; $x++) {
                        $pr_data = $pr_rs->fetch_assoc();
                    ?>
                        <div class="col-12">
                            <h3>#<?php echo $pr_data['id']; ?></h3>
                        </div>

                        <div class="card col-12 border-0 <?php if ($pr_data["status_id"] == 2) { ?> opacity-75 <?php } ?>" style="background-image: linear-gradient(90deg, rgb(160, 10, 10), rgb(72, 3, 3)); ">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo $pr_data['img']; ?> " style="height: 210px;" class="img-fluid rounded">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title fs-2 fw-bold text-danger"><?php echo $pr_data['name']; ?> <?php echo $pr_data['title']; ?></h5>
                                        <span class="fs-5 fw-bold text-black-50">Brand : <?php echo $pr_data['bname']; ?></span> <br>
                                        <span class="fs-5 fw-bold text-black-50">Seller : <?php echo $pr_data['fname']; ?> | <?php echo $pr_data['email']; ?></span><br>
                                        <span class="fs-5 fw-bold text-black-50">Price : </span>&nbsp; &nbsp;
                                        <span class="fs-5 fw-bold text-black-50">Rs. <?php echo $pr_data['price']; ?> .00 </span><br>
                                        <span class="fs-5 fw-bold text-black-50">Registered Date : <?php echo $pr_data['datetime_added']; ?> </span>
                                        <div class="col-12 btn-toolbar justify-content-end">
                                            <a href='<?php echo "singleProductView.php?id=" . ($pr_data["id"]); ?>' class="btn btn-secondary me-2">View</a>
                                            <button class="btn btn-danger me-2" onclick="changeStatus(<?php echo $pr_data['id']; ?>);"><?php if ($pr_data["status_id"] == 2) { ?>Unblock<?php
                                                                                                                                                                                    } else {
                                                                                                                                                                                        ?>Block<?php
                                                                                                                                                                                    } ?>
                                            </button>
                                            <button class="btn btn-outline-danger me-2" onclick="removeFromProduct(<?php echo $pr_data['id']; ?>);">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border border-2">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- body -->

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