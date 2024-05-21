<!-- nav -->
<div class="col-12 col-lg-2 bg-black bg-opacity-50">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center p-1 pt-2 opacity-25">
                        <h5 class="fw-bold">GamingWorld Admin</h5>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="<?php echo $_SESSION["au"]["img"]; ?>" width="90px" height="90px" class="rounded-circle">
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="col-12 d-flex justify-content-center">
                            <span class="text-white fw-bold"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <span class="text-white text-opacity-75"><?php echo $_SESSION["au"]["email"]; ?></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h5 class="text-white text-opacity-25">Navigation</h5>
                    </div>
                    <div class="col-12">
                        <nav class="nav flex-column nav-pills">
                            <?php if ($navPage == "panel") {
                               ?> <a class="nav-link active mb-1" aria-current="page">Dashboard</a> <?php 
                            } else{
                                ?> <a class="nav-link mb-1" aria-current="page" href="adminPanel.php">Dashboard</a> <?php 
                            } ?>

                            <?php if ($navPage == "user") {
                               ?> <a class="nav-link mb-1 active">Manage Users</a> <?php 
                            } else{
                                ?> <a class="nav-link mb-1" href="manageUsers.php">Manage Users</a> <?php 
                            } ?>

                            <?php if ($navPage == "product") {
                               ?> <a class="nav-link mb-1 active">Manage Products</a> <?php 
                            } else{
                                ?> <a class="nav-link mb-1" href="manageProducts.php">Manage Products</a> <?php 
                            } ?>

                            <?php if ($navPage == "message") {
                               ?> <a class="nav-link mb-1 active">Message</a> <?php 
                            } else{
                                ?> <a class="nav-link mb-1" href="adminMessage.php">Message</a> <?php 
                            } ?>
                            
                            
                        </nav>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h5 class="text-white text-opacity-25">Selling History</h5>
                    </div>
                    <div class="col-12">
                        <span class="text-white ms-1">Date from</span>
                    </div>
                    <div class="col-12 mb-2">
                        <input class="form-control bg-transparent text-white" type="date" placeholder="Search from..." id="shStart">
                    </div>
                    <div class="col-12">
                        <span class="text-white ms-1">Date to</span>
                    </div>
                    <div class="col-12">
                        <input class="form-control bg-transparent text-white" type="date" placeholder="Search to..." id="shEnd">
                    </div>
                    <div class="col-12 mt-1 d-grid">
                        <button class="btn btn-primary" onclick="searchSh(0);" data-bs-toggle="collapse" href="#searchSh" role="button" aria-expanded="false" aria-controls="searchSh">Search</button>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
            </div>
            <!-- nav -->

             <!-- nav -->
             <!-- <div class="col-12 col-lg-2 bg-black bg-opacity-50">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center p-1 pt-2 opacity-25">
                        <h5 class="fw-bold">GamingWorld Admin</h5>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="resources/manager.png" width="90px" height="90px" class="rounded-circle">
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="col-12 d-flex justify-content-center">
                            <span class="text-white fw-bold">Prince</span>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <span class="text-white text-opacity-75">prince@royalmail.crown</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div> -->
                    <!-- <div class="col-12 d-flex justify-content-center">
                        <h5 class="text-white text-opacity-25">Navigation</h5>
                    </div>
                    <div class="col-12">
                        <nav class="nav flex-column nav-pills">
                            <a class="nav-link active mb-1" aria-current="page" href="#">Dashboard</a>
                            <a class="nav-link mb-1" href="manageUsers.php">Manage Users</a>
                            <a class="nav-link mb-1" href="manageProducts.php">Manage Products</a> -->
                            <!-- <a class="nav-link mb-1" href="manageProducts.php">Manage Cat&Brands</a> -->
                            <!-- <a class="nav-link mb-1" href="adminMessage.php">Message</a>
                        </nav>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h5 class="text-white text-opacity-25">Selling History</h5>
                    </div>
                    <div class="col-12">
                        <span class="text-white ms-1">Date from</span>
                    </div>
                    <div class="col-12 mb-2">
                        <input class="form-control bg-transparent text-white" type="date" placeholder="Search from..." id="shStart">
                    </div>
                    <div class="col-12">
                        <span class="text-white ms-1">Date to</span>
                    </div>
                    <div class="col-12">
                        <input class="form-control bg-transparent text-white" type="date" placeholder="Search to..." id="shEnd">
                    </div>
                    <div class="col-12 mt-1 d-grid">
                        <button class="btn btn-primary" onclick="searchSh(0);" data-bs-toggle="collapse" href="#searchSh" role="button" aria-expanded="false" aria-controls="searchSh">Search</button>
                    </div>
                    <div class="col-12"> -->
                        <!-- <hr>
                    </div>
                </div>
            </div> -->
            <!-- nav -->