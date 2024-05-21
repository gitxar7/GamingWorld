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
    <title>GamingWorld</title>
</head>

<body class="log-bg">
    <div class="container-fluid vh-90 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12 mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img src="resources/gamepad.png" alt="" class="gamepad">
                    </div>
                    <div class="col-12">
                        <p class="text-center welcomeTxt">Welcome to Gaming World</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12 p-3">
                <div class="row">

                    <!-- admin -->
                    <div class="offset-lg-3 offset-0 col-12 col-lg-6 rounded-2 px-2 py-3 bg-black bg-opacity-50 d-none" id="ad" style="box-shadow: -0.3vh -0.3vh 1vh 0.6vh rgb(50, 0, 0), 0.3vh 0.3vh 1vh 0.6vh rgb(0, 0, 0);">
                        <div class="row">
                            <div class="offset-4 col-4 d-flex justify-content-center">
                                <img src="resources/manager.png" alt="" style="height: 100px;">
                            </div>
                            <div class="offset-1 col-10">
                                <h2 class="text-danger text-center fw-bold">Gaming World Admins</h2>
                            </div>
                            <div class="col-12 text-danger" id="adX"></div>
                            <div class="col-12 form-floating mt-1 input-group mb-2">
                                <input type="email" class="form-control text-light bg-danger bg-opacity-25" id="emailAdmin"  placeholder="Email">
                                <label class="form-label text-light ms-2"> Admin Id or Email</label>
                                <button class="btn btn-outline-danger border-light" type="button" onclick="adminSignInX();">Verify</button>
                            </div>
                            <div class="col-12 form-floating mt-1">
                                <input type="password" class="form-control disabled text-light bg-danger bg-opacity-25" id="vCodeAdmin" placeholder="Password">
                                <label class="form-label text-light ms-2">Verification Code or Admin Code</label>
                            </div>
                            <div class="col-12 text-danger py-1 text-center" id="adX"></div>
                            <div class="col-12  d-grid mt-1">
                                <button class="btn btn-primary" onclick="adminSignInVerify();">Sign In</button>
                            </div>
                            <div class="col-12  d-grid mt-1">
                                <button class="btn btn-outline-danger " onclick="window.location ='index.php'">Sign In as an User</button>
                            </div>
                        </div>
                    </div>
                    <!-- admin -->
                    <!-- sign in -->
                    <div class="col-12 col-lg-6" id="si">
                        <div class="row">
                            <div class="col-12 bgi contain-image d-none d-lg-block" id="bgi1"></div>

                            <div class="col-12 mt-5 d-none" id="signInBox">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <p class="text-danger fw-bold d-none" id="dot3">●●●Sign In to continue</p>
                                        <p class="text-light fw-bold fs-4">Sign In</p>
                                    </div>
                                    <?php

                                    $email = "";
                                    $password = "";

                                    if (isset($_COOKIE["email"])) {
                                        $email = $_COOKIE["email"];
                                    }

                                    if (isset($_COOKIE["password"])) {
                                        $password = $_COOKIE["password"];
                                    }

                                    ?>
                                    <div class="col-12 text-danger" id="alyx"></div>

                                    <div class="col-12">
                                        <div class="col-12 text-danger" id="emx"></div>
                                        <div class="col-12 form-floating">
                                            <input type="email" class="form-control bg-black bg-opacity-50 text-light" id="emailX" placeholder="Email" value="<?php echo $email; ?>">
                                            <label class="form-label text-light">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-12 text-danger" id="pwx"></div>
                                        <div class="col-12 form-floating">
                                            <input type="password" class="form-control bg-black bg-opacity-50 text-light" id="passwordX" placeholder="Password" value="<?php echo $password; ?>" >
                                            <label class="form-label text-light">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input bg-danger shadow-none border-0" type="checkbox" id="rememberMeX" checked>
                                            <label class="form-check-label text-light">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="#" class="link-info link-danger" onclick="forgetPassword();">Forget Password</a>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-danger" onclick="changeView();">New to NewTech?Join Now</button>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button class="btn btn-outline-warning fw-bold" onclick="adminSignIn();">⁎ Sign In as an Admin ⁎</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sign in -->
                    <!-- sign up -->
                    <div class="col-12 col-lg-6" id="su">
                        <div class="row">
                            <div class="col-12 bgi contain-image d-none" id="bgi2" style="transform: scaleX(-1);"></div>
                            <div class="col-12 d-block" id="signUpBox">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <p class="text-light fw-bold fs-4">Create New Account</p>
                                    </div>
                                    <div class="col-12 text-danger" id="alx"></div>
                                    <div class="col-6">
                                        <div class="col-12 text-danger" id="fx"></div>
                                        <div class="col-12 form-floating">
                                            <input type="text" class="form-control bg-black bg-opacity-50 text-light" id="f" placeholder="First Name">
                                            <label class="form-label text-light bgt">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12 text-danger" id="lx"></div>
                                        <div class="col-12 form-floating">
                                            <input type="text" class="form-control bg-black bg-opacity-50 text-light" id="l" placeholder="Last Name">
                                            <label class="form-label text-light">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-12 text-danger" id="ex"></div>
                                        <div class="col-12 form-floating">
                                            <input type="email" class="form-control bg-black bg-opacity-50 text-light" id="e" placeholder="Email">
                                            <label class="form-label text-light">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-12 text-danger" id="px"></div>
                                        <div class="col-12 form-floating">
                                            <input type="password" class="form-control bg-black bg-opacity-50 text-light" id="p" placeholder="Password">
                                            <label class="form-label text-light">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12 text-danger" id="mx"></div>
                                        <div class="col-12 form-floating">
                                            <input type="text" class="form-control bg-black bg-opacity-50 text-light" id="m" placeholder="Mobile">
                                            <label class="form-label text-light">Mobile</label>
                                        </div>
                                    </div>

                                    <div class="col-6 form-floating">
                                        <select class="form-select bg-black bg-opacity-50 text-light" id="g" placeholder="Gender">
                                            <?php

                                            require "connection.php";

                                            $rs = Database::search("SELECT * FROM `gender`");

                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender"]; ?></option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                        <label class="form-label text-light">Gender</label>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-dark" onclick="changeView();">Already have an account?Sign In</button>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button class="btn btn-outline-warning fw-bold" onclick="adminSignIn();">⁎ Sign In as an Admin ⁎</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sign up -->

                </div>
            </div>
            <!-- content -->

             <!-- modal -->

             <div class="modal bg-black bg-opacity-25" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content bg-black">
                        <div class="modal-header">
                            <h5 class="modal-title">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control bg-transparent text-light" id="np"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword();">Show</button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control bg-transparent text-light" id="rnp"/>
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control bg-transparent text-light" id="vc"/>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- footer -->
            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center text-light">&copy; 2022 GamingWorld.lk || All Right Reserved</p>
            </div>
            <!-- footer -->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bs/bootstrap.js"></script>
</body>

</html>
<!-- Mohamed Hanas Abdur Rahman | @nxt.genar7@gmail.com | hssxar7 -->