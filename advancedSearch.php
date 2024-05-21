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
    <title>Advanced Search | GamingWorld</title>
</head>

<body class="home-body">
    <div class="container-fluid">
        <div class="row">
            <?php
            $page = "Search";
            include "headerX.php"; ?>

            <div class="row">
                <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                    <div class="row ">
                        <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                            <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                        </div>
                        <div class="col-10 text-center offset-1 offset-lg-0">
                            <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">Advanced Search</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-10 col-lg-8 offset-1 offset-lg-2 bg-black bg-opacity-25 rounded-3">
                <div class="row p-1">
                    <div class="col-12 col-lg-10 mt-2 mb-1 ">
                        <input type="text" class="form-control text-white border-0" style="background-color: rgb(86, 5, 5);" placeholder="Type keyword to search..." id="t">
                    </div>
                    <div class="col-12 col-lg-2 mt-2 mb-1 d-grid">
                        <button class="btn btn-primary" onclick="advancedSearch(0);">Search</button>
                    </div>
                </div>
            </div>

            <div class="col-10 col-lg-8 offset-1 offset-lg-2 bg-black bg-opacity-25 mt-1 rounded-3">
                <div class="row pt-2">
                    <div class="col-12 col-lg-4 mb-2">
                        <select id="c" select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);">
                            <option value="0">Select Category</option>
                            <?php

                            require "connection.php";

                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 mb-2">
                        <select id="b" select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);">
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
                    <div class="col-12 col-lg-4 mb-2">
                        <select id="p" select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);">
                            <option value="0">Select Platform</option>
                            <?php

                            $platform_rs = Database::search("SELECT * FROM `platform`");
                            $platform_num = $platform_rs->num_rows;

                            for ($x = 0; $x < $platform_num; $x++) {
                                $platform_data = $platform_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $platform_data["id"]; ?>"><?php echo $platform_data["name"]; ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 mb-2 opacity-75">
                        <select id="xxxx" select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);" disabled>
                            <option value="0">Select Rating</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 mb-2 opacity-75">
                        <select id="xxxx" select class="form-select text-center  text-white border-0" style="background-color: rgb(86, 5, 5);" disabled>
                            <option value="0">Select Release Year</option>
                        </select>
                    </div>

                    <div class="col-12 col-lg-6 mb-2">
                        <input type="number" class="form-control text-white border-0" style="background-color: rgb(86, 5, 5);" placeholder="Price From..." id="pf">
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <input type="number" class="form-control text-white border-0" style="background-color: rgb(86, 5, 5);" placeholder="Price To..." id="pt">
                    </div>
                </div>
            </div>

            <div class="col-10 col-lg-8 offset-1 offset-lg-2 bg-black bg-opacity-25 mt-1 rounded-3">
                <div class="row p-1">
                    <div class="offset-4 offset-lg-8 col-8 col-lg-4 mt-2 mb-2">
                        <select select class="form-select text-center text-white border-0" style="background-color: rgb(86, 5, 5);" id="s">
                            <option value="0">SORT BY</option>
                            <option value="1">PRICE HIGHT TO LOW</option>
                            <option value="2">PRICE LOW TO HIGH</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-10 col-lg-8 offset-1 offset-lg-2 bg-black bg-opacity-25 mt-1 mb-3 rounded-3">
                <div class="row p-1">
                    <div class=" col-12  text-center">
                        <div class="row" id="view_area">
                            <div class="offset-5 col-2 mt-5">
                                <span class="fw-bold text-black-50"><i class="bi bi-search" style="font-size: 120px;"></i></span>
                            </div>
                            <div class="offset-2 col-8 mt-3 mb-5 ">
                                <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                            </div>
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