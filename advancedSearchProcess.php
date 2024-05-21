<?php

require "connection.php";

$search_txt = $_POST["t"];
$category = $_POST["c"];
$brand = $_POST["b"];
$platform = $_POST["p"];
$price_from = $_POST["pf"];
$price_to = $_POST["to"];
$sort = $_POST["s"];

$query = "SELECT DISTINCT product.id AS id, `name`, `title`, `price`, `img` FROM `product_has_category` INNER JOIN `product` ON product.id = product_has_category.product_id INNER JOIN `product_has_platform` ON product.id = product_has_platform.product_id";
$status = 0;

if ($sort == 0) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' OR `name` LIKE '%" . $search_txt . "%' ";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_id`='" . $category . "'";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_id`='" . $category . "'";
    }

    if ($brand != 0 && $status == 0) {
        $query .= " WHERE `brand_id`='" . $brand . "'";
        $status = 1;
    } else if ($brand != 0 && $status != 0) {
        $query .= " AND `brand_id`='" . $brand . "'";
    }

    if ($platform != 0 && $status == 0) {
        $query .= " WHERE `platform_id`='" . $platform . "'";
        $status = 1;
    } else if ($platform != 0 && $status != 0) {
        $query .= " AND `platform_id`='" . $platform . "'";
    }


    if (!empty($price_from) && empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $price_from . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        }
    }
} else if ($sort == 1) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }
} else if ($sort == 2) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
}

if ($_POST["page"] != "0") {

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
                    <div class="cover-image col-12 mx-auto hghAd" style="background-image: url('<?php echo $selected_data["img"]; ?>')"></div>
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
                                        <a href='<?php echo "singleProductView.php?id=" . ($selected_data["id"]); ?>' class="btn btn-success fs">Buy Now</a>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <a href="#" class="btn btn-danger fs" onclick="addToCart(<?php echo $selected_data['id']; ?>);">Add Cart</a>
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



<div class=" col-12 mb-3 text-center d-flx">
    <div class="row">

        <div class="pagination bg-black bg-opacity-50 rounded-pill px-3 py-1">
            <a class="bg-transparent text-white" <?php if ($pageNo <= 1) {
                    echo "#";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageNo - 1); ?>')" <?php
                                                                        } ?>>&laquo;</a>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageNo) {

            ?>
                    <a onclick="advancedSearch('<?php echo ($page); ?>')" class="active bg-transparent text-white">
                        <?php echo $page; ?>
                    </a>
                <?php

                } else {

                ?>
                    <a class="bg-transparent text-white" onclick="advancedSearch('<?php echo ($page); ?>')">
                        <?php echo $page; ?>
                    </a>
            <?php

                }
            }

            ?>

            <a class="bg-transparent text-white" <?php if ($pageNo >= $number_of_pages) {
                    echo "#";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageNo + 1); ?>')" <?php
                                                                        } ?>>&raquo;</a>
        </div>

    </div>
</div>