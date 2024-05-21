<?php
require "connection.php";

$start =  $_POST["start"];
$end =  $_POST["end"];

$query = "SELECT product.id AS `pid`, product.name AS `pname`, `title`, `date`, `total`, product.img AS `pimg`, brand.name 
AS `bname`, product.user_email AS `seller`, invoice.user_email AS `buyer` FROM `invoice` INNER JOIN `product` ON invoice.product_id = product.id
INNER JOIN `brand` ON brand.id = product.brand_id WHERE `date` BETWEEN '".$start."' AND '".$end."'";
?>

<div class="col-12 d-flex justify-content-end">
    <button type="button" class="btn-lg btn-close btn-close-white" aria-label="Close" data-bs-toggle="collapse" href="#searchSh" role="button" aria-expanded="false" aria-controls="searchSh"></button>
</div>
<div class="col-12 text-center">
    <div class="row  justify-content-lg-start">

        <?php


        if ("0" != ($_POST["page"])) {
            $pageNo = $_POST["page"];
        } else {
            $pageNo = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 4;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageNo - 1) * $results_per_page;
        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");


        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();
            $buyer_rs =  Database::search("SELECT * FROM `user` WHERE email = '" . $selected_data["buyer"] . "'");
            $buyer_data = $buyer_rs->fetch_assoc();
            $seller_rs =  Database::search("SELECT * FROM `user` WHERE email = '" . $selected_data["seller"] . "'");
            $seller_data = $seller_rs->fetch_assoc();
        ?>

            <!-- card -->
            <div class="col-lg-6 col-12 p-1">
                <div class="card mb-3 mt-3 col-12  border-0 hi">
                    <div class="row">
                        <div class="col-md-4 py-2 d-flx ms-2" style="width: 40%;">
                            <img src="<?php echo $selected_data["pimg"]; ?>" class="rounded contain-image" style="width: 100%; height: 168px;">
                        </div>
                        <div class="mt-4 text-start" style="width: 58%;">
                            <span class="fw-bolder fs-5" style="color: rgb(37, 1, 1)"><?php echo $selected_data["pname"]; ?> <?php echo $selected_data["title"]; ?></span><br>
                            <span class="fs-6 fw-bold text-black-50">Seller : <?php echo $seller_data["fname"]; ?> | <?php echo $seller_data["email"]; ?></span><br>
                            <span class="fs-6 fw-bold text-black-50">Buyer : <?php echo $buyer_data["fname"]; ?> | <?php echo $buyer_data["email"]; ?></span><br>
                            <span class="fs-6 fw-bold text-black-50">Brand : </span>&nbsp; &nbsp;
                            <span class="fs-6 fw-bold text-black"><?php echo $selected_data["bname"]; ?></span><br>
                            <span class="fs-6 fw-bold text-black-50">Total Price : </span>&nbsp; &nbsp;
                            <span class="fs-6 fw-bold text-black">Rs. <?php echo $selected_data["total"]; ?> .00</span><br>
                            <span class="fs-6 fw-bold text-black-50">Purchased Date & Time :</span><br class="d-block d-lg-none">
                            <span class="fs-6 fw-bold text-black"><?php echo $selected_data["date"]; ?> </span>
                        </div>

                    </div>
                </div>
            </div>
            <!-- card -->
        <?php
        }

        ?>

    </div>
</div>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-2">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageNo <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="sort1(<?php echo ($pageNo - 1) ?>);" <?php
                                                                                        } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageNo) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="sort1(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="sort1(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageNo >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="sort1(<?php echo ($pageNo + 1) ?>);" <?php
                                                                                        } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>