<?php

session_start();

require "connection.php";

$user = $_SESSION["u"];


$search = $_POST["s"];
$time = $_POST["t"];
$qty = $_POST["q"];
$platform = $_POST["p"];

$query = "SELECT product.id AS 'id', product.name AS 'product_name', `price`, `title`, `datetime_added`, `status_id`, `img`  FROM `product` WHERE `user_email`='" . $user["email"] . "'";

if ($platform != "0") {
    $query = "SELECT  product.id AS 'id', product.name AS 'product_name', platform.name AS 'platform_name', `price`, `title`, `datetime_added`, `status_id`, `img` 
    FROM `product_has_platform` INNER JOIN `platform` ON platform.id=product_has_platform.platform_id INNER JOIN `product`ON 
    product.id=product_has_platform.product_id WHERE `user_email`='" . $user["email"] . "' AND `platform_id`='" . $platform . "'";
}
if (!empty($search)) {
    $query .= " AND `title` OR product.name  LIKE '%" . $search . "%'";
}

if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}

if ($time != "0" && $qty != "0") {
    if ($qty == "1") {
        // $query .= " , `qty` DESC";
    } else if ($qty == "2") {
        // $query .= " , `qty` ASC";
    }
} else if ($time == "0" && $qty != "0") {
    if ($qty == "1") {
        // $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        // $query .= " ORDER BY `qty` ASC";
    }
}

?>

<div class="col-12 text-center">
    <div class="row justify-content-around gap-1">

        <?php


        if ("0" != ($_POST["page"])) {
            $pageNo = $_POST["page"];
        } else {
            $pageNo = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 3;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageNo - 1) * $results_per_page;
        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();
        ?>

            <!-- card -->
            <div class="card mb-3 mt-3 col-12 col-lg-10 border-0 hi">
                <div class="row">
                    <div class="col-md-5 py-2 pe-2 d-flx">
                        <img src="<?php echo $selected_data["img"]; ?>" class="rounded contain-image" style="width: 100%; height: 168px;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body mt-2">
                            <h4 class="card-title fw-bolder" style="color: rgb(37, 1, 1)"><?php echo $selected_data["product_name"]; ?></h4>
                            <p class="card-title fw-bold" style="color: rgb(37, 1, 1)"><?php echo $selected_data["title"]; ?></p>
                            <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span><br>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["status_id"] == 2) { ?> checked <?php } ?> />
                                <label class="form-check-label fw-bold text-info" for="fd<?php echo $selected_data["id"]; ?>">
                                    <?php if ($selected_data["status_id"] == 2) { ?>Activate Your Product<?php
                                                                                                        } else {
                                                                                                            ?>Deactivate Your Product<?php
                                                                                                                                    } ?>

                                </label>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-1">
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-success fw-bold" onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</button>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-danger fw-bold">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
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