<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];
$brand = $_POST["b"];

$query = "SELECT DISTINCT product_id, `name`, `title`, `price`, `img` FROM `product_has_category` INNER JOIN `product` ON product.id = product_has_category.product_id";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' OR `name` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id`='" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' OR `name` LIKE '%" . $txt . "%' AND `category_id`='" . $select . "'";
}

if ($brand != "not") {
    $query .= " WHERE `brand_id`='" . $brand . "'";
}


?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php


            if ("0" != ($_POST["page"])) {
                $pageNo = $_POST["page"];
            } else {
                $pageNo = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 6;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageNo - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class=" col-12 col-lg-6 p-2">
                    <div class="card col-12 bg-body bg-opacity-10 rounded-2 hvrOn">
                        <div class="row">

                            <div class="col-md-5">
                                <!-- <img src="<?php echo $selected_data["img"]; ?>" class="img-fluid rounded-start" alt="..."> -->
                                <div class="cover-image col-12 mx-auto hgh" style="background-image: url('<?php echo $selected_data["img"]; ?>')"></div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">

                                    <span class="card-title fs-5 fw-bolder text-center text-black"><?php echo $selected_data["name"]; ?></span>
                                    <span class="card-title fs-5 fw-bolder text-center text-black"><?php echo $selected_data["title"]; ?></span>
                                    <br>
                                    <span class="card-text text-success fw-bold fs">Rs. <?php echo $selected_data["price"]; ?> .00</span>

                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row g-1">
                                                <div class="col-12 col-lg-6 d-grid">
                                                    <a href='<?php echo "singleProductView.php?id=" . ($selected_data["product_id"]); ?>' class="btn btn-success fs">Buy Now</a>
                                                </div>
                                                <div class="col-12 col-lg-6 d-grid">
                                                    <a href="#" class="btn btn-danger fs" onclick="addToCart(<?php echo $selected_data['product_id']; ?>);">Add Cart</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            }
            ?>



        </div>
    </div>
    <!--  -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageNo <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageNo - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageNo) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageNo >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageNo + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  -->
</div>