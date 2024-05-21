<div class="col-12 p-2">
    <div class="row">
        <div class="col-10">
            <?php if ($navPage == "panel") {
            ?> <h3 class="text-white fw-bold">Dashboard</h3> <?php
                                                            } else if ($navPage == "user") {
                                                                ?> <h3 class="text-white fw-bold">Manage Users</h3> <?php
                                                                } else if ($navPage == "product") {
                                                                    ?> <h3 class="text-white fw-bold">Manage Products</h3> <?php
                                                                    } else if ($navPage == "message") {
                                                                        ?> <h3 class="text-white fw-bold">Message</h3> <?php
                                                                    } ?>
        </div>
        <!-- message -->
        <div class="col-2 mt-1 d-flex justify-content-center justify-content-lg-end" title="Messages" data-bs-toggle="collapse" href="#messageAlert" role="button" aria-expanded="false" aria-controls="messageAlert">
            <?php

            $hc_rs = Database::search("SELECT * FROM `help_and_contact`");
            $hc_num = $hc_rs->num_rows;

            if ($hc_num == 0) {
            ?>
                <div class="bg-info rounded-circle d-none" style="height: 8px; width: 8px; "></div>

            <?php
            } else {
            ?>
                <div class="bg-info rounded-circle" style="height: 8px; width: 8px; "></div>

            <?php
            } ?>

            <img src="resources/icons8_google_alerts_208px.png" alt="" height="25px">
        </div>

        <div class="col-12 collapse" id="messageAlert">
            <?php
            for ($x = 0; $x < $hc_num; $x++) {
                $hc_data = $hc_rs->fetch_assoc();
            ?>
                <div class="card card-body bg-black bg-opacity-50 mb-3">
                    <div class="row">
                        <div style="width: 30px;">
                            <img src="resources/profile_img/gamer.png" width="30px" class="rounded-circle">
                        </div>
                        <div class="col">
                            <p class="mb-0 fw-bold ms-2 mt-1 fs-5"><?php
                                                                    if ($hc_data["type"] == 1) {
                                                                        echo ("Account Management:");
                                                                    } else if ($hc_data["type"] == 2) {
                                                                        echo ("Billing and Payments:");
                                                                    } else if ($hc_data["type"] == 3) {
                                                                        echo ("Refunds and Cancellations:");
                                                                    } else if ($hc_data["type"] == 4) {
                                                                        echo ("Contact Information:");
                                                                    } else if ($hc_data["type"] == 5) {
                                                                        echo ("Product Update:");
                                                                    }
                                                                    ?> </p>
                            <p class="mb-0 fw-bold ms-2 mt-1 text-white-50"><?php echo $hc_data["msg"]; ?></p>
                            <span class="text-success fw-bold ms-2 me-5 mt-1">USER: <?php echo $hc_data["fname"]; ?> | <span class="text-success bg-opacity-50 fw-bold ms-2 mt-1"><?php echo $hc_data["email"]; ?></span></span>
                            <span class="text-success fw-bold ms-2 ms-lg-5 mt-1"><?php echo $hc_data["date_time"]; ?></span>
                            <div class="col-12 text-danger ms-2 mt-2" id="msgReplyX<?php echo $hc_data['id']; ?>"></div>
                            <div class="col-12 form-floating mt-3 px-2 input-group m-2">
                                <input type="text" class="form-control text-light bg-danger bg-opacity-25 border-0" id="msgReply<?php echo $hc_data['id']; ?>" placeholder="Email">
                                <label class="form-label text-light ms-2"> Add your Reply....</label>
                                <button class="btn btn-outline-danger border-none" type="button" onclick="replyHc(<?php echo $hc_data['id']; ?>);">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <?php
            if ($hc_num == 0) {
            ?>
                <div class="card card-body bg-black bg-opacity-50">
                    There are no HC requests...
                </div>

            <?php
            }
            ?>

        </div>
        <!-- message -->
    </div>
</div>

<div class="col-12">
    <hr>
</div>

<div class="card card-body bg-black bg-opacity-50 collapse mx-1" id="searchSh"></div>
