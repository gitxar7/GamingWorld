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
                <title>Help & Contact | GamingWorld</title>
            </head>

            <body class="home-body">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $page = "H&C";
                        include "headerX.php"; ?>

                        <div class="col-12">
                            <div class="row">
                                <div class="cover-image mt-1 col-12 mx-auto d-flx" style="background-image: url('resources/hc.jpg'); height: 350px;">
                                    <div class="col-12  mb-2">
                                        <div class="row">
                                            <div class="offset-lg-4 col-12 col-lg-4  rounded-4 my-3">
                                                <div class="row ">
                                                    <div class="col-1 d-none d-lg-block col-lg-2  m-lg-0 my-lg-3 ms-3 my-3 p-md-2 bg-body bg-opacity-50 rounded-circle">
                                                        <div class="contain-image fs-1" style="height: 100%;background-image: url('resources/gmw.png')"></div>
                                                    </div>
                                                    <div class="col-10 text-center offset-1 offset-lg-0">
                                                        <p class="fs-1 text-black-50 fw-bold mt-3 p-md-2 rounded-pill bg-body bg-opacity-50">Help & Contact</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                                        <input type="text" class="form-control bg-black bg-opacity-50 text-white" placeholder="Search Gaming World Help and Articles..." readonly>
                                                    </div>
                                                    <div class="col-12 col-lg-2 mb-3 d-grid">
                                                        <button class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 bg-black bg-opacity-50">
                                    <div class="row">
                                        <div class="col-12 mt-5">
                                            <div class="row ">

                                                <div class="col-12 col-lg-6 px-0 px-lg-5">
                                                    <div class="row gap-2">
                                                        <div class="col-12 text-center">
                                                            <p class="text-light fw-bold fs-4">How Can We Help?</p>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <p class="text-light">"We're here to help you with any questions or concerns you may have. Our customer support team is available 24/7 to assist you. Please feel free to reach out to us via email, phone, or live chat. We strive to respond to all inquiries within 24 hours. If you prefer self-service, you can also check out our FAQ section for commonly asked questions and answers. We value your feedback and always welcome suggestions on how we can improve our services. Thank you for choosing us."</p>
                                                        </div>
                                                        <div class="col-12 mt-4">
                                                            <p class="text-light">*You can consider these topics before asking a questions*</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light">1. Account Management: Topics such as creating an account, password reset, account security, and updating account information.</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light">2. Billing and Payments: Information on purchasing games, subscriptions, and handling billing disputes.</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light">3. Refunds and Cancellations: Information on how to request a refund or cancel a purchase or subscription.</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light">4. Contact Information: Details on how to contact support through email, phone, or live chat.</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light">5. Product Update: Request to add new categories, brands or other changes related to product.</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 col-lg-6">
                                                    <div class="row gap-3">

                                                        <div class="col-12 text-center">
                                                            <p class="text-light fw-bold fs-4"> Let's Start a Conversation</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="col-12 text-danger" id="hcfX"></div>
                                                            <div class="col-12 form-floating">
                                                                <input type="text" id="hcf" class="form-control bg-black bg-opacity-50 text-light" placeholder="First Name">
                                                                <label class="form-label text-light bgt">First Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="col-12 form-floating">
                                                                <input type="text" id="hcl" class="form-control bg-black bg-opacity-50 text-light" placeholder="Last Name">
                                                                <label class="form-label text-light">Last Name(Optional)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="col-12 text-danger" id="hceX"></div>
                                                            <div class="col-12 form-floating">
                                                                <input type="email" id="hce" class="form-control bg-black bg-opacity-50 text-light" placeholder="Email">
                                                                <label class="form-label text-light">Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-floating">
                                                            <select class="form-select bg-black bg-opacity-50 text-light" placeholder="Topic" id="hct">
                                                                <option value="1">Account Management</option>
                                                                <option value="2">Billing and Payments</option>
                                                                <option value="3">Refunds and Cancellations</option>
                                                                <option value="4">Contact Information</option>
                                                                <option value="5">Product Update</option>
                                                            </select>
                                                            <label class="form-label text-light">Topic</label>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="col-12 text-danger" id="hcmX"></div>
                                                            <textarea name="" id="hcm" cols="30" rows="10" placeholder="your Message......" class="form-control bg-black bg-opacity-50 text-light"></textarea>
                                                        </div>
                                                        <div class="col-12 text-danger" id="hcX"></div>
                                                        <div class="col-12 d-grid mb-2">
                                                            <button class="btn btn-primary " onclick="savHc();">Send</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include "footer.php"; ?>
                    </div>
                </div>

                <script src="bs/bootstrap.bundle.js"></script>
                <script src="script.js"></script>
            </body>

            </html>
            <!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->