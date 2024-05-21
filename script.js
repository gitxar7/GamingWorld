function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");
    var bgi1 = document.getElementById("bgi1");
    var bgi2 = document.getElementById("bgi2");
    var dot3 = document.getElementById("dot3");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
    bgi1.classList.toggle("d-lg-block");
    bgi2.classList.toggle("d-lg-block");
    dot3.className = "d-none";
}

function signUp() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");
    var bgi1 = document.getElementById("bgi1");
    var bgi2 = document.getElementById("bgi2");
    var dot3 = document.getElementById("dot3");
    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");
    var fx = document.getElementById("fx");
    var lx = document.getElementById("lx");
    var ex = document.getElementById("ex");
    var px = document.getElementById("px");
    var mx = document.getElementById("mx");
    var alx = document.getElementById("alx");
    var email = document.getElementById("emailX");
    var password = document.getElementById("passwordX");

    var form = new FormData;

    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;

            if (text == "success") {
                signUpBox.classList.toggle("d-none");
                signInBox.classList.toggle("d-none");
                bgi1.classList.toggle("d-lg-block");
                bgi2.classList.toggle("d-lg-block");
                dot3.className = "text-danger fw-bold d-block";
                email.value = e.value;
                password.focus();
                setTimeout(dis3, 1500);
            } else {
                if (text == "1") {
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    fx.innerHTML = "** Please enter your First Name **";
                    f.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "2") {
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    fx.innerHTML = "** First Name must contain less than 50 characters **";
                    f.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "3") {
                    fx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    lx.innerHTML = "** Please enter your Last Name **";
                    l.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "4") {
                    fx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    lx.innerHTML = "** Last Name must contain less than 50 characters **";
                    l.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "5") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    ex.innerHTML = "** Please enter your Email **";
                    e.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "6") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    ex.innerHTML = "** Email must contain less than 100 characters **";
                    e.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "7") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    ex.innerHTML = "** invalid Email **";
                    e.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "8") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    px.innerHTML = "** Please enter your Password **";
                    p.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "9") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "";
                    px.innerHTML = "** Password must be between 5-20 characters **";
                    p.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "10") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    alx.innerHTML = "";
                    mx.innerHTML = "** Please enter your Mobile **";
                    m.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "11") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    alx.innerHTML = "";
                    mx.innerHTML = "** Mobile must contain 10 characters **";
                    m.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "12") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    alx.innerHTML = "";
                    mx.innerHTML = "** invalid Mobile **";
                    m.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "13") {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "** User with the same Email or Mobile already exists **";
                    m.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    e.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                } else {
                    fx.innerHTML = "";
                    lx.innerHTML = "";
                    ex.innerHTML = "";
                    px.innerHTML = "";
                    mx.innerHTML = "";
                    alx.innerHTML = "** " + text + " **";
                    m.classList = "form-control bg-black bg-opacity-50 text-light";
                    l.classList = "form-control bg-black bg-opacity-50 text-light";
                    f.classList = "form-control bg-black bg-opacity-50 text-light";
                    p.classList = "form-control bg-black bg-opacity-50 text-light";
                    e.classList = "form-control bg-black bg-opacity-50 text-light";
                }

            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

function dis3() {
    var dot3 = document.getElementById("dot3");
    dot3.classList = "text-danger fw-bold dis3";
}

function signIn() {

    var email = document.getElementById("emailX");
    var password = document.getElementById("passwordX");
    var rememberMe = document.getElementById("rememberMeX");
    var alyx = document.getElementById("alyx");
    var emx = document.getElementById("emx");
    var pwx = document.getElementById("pwx");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "home.php";
            } else {
                if (text == "1") {
                    emx.innerHTML = "** Please enter your Email **";
                    pwx.innerHTML = "";
                    alyx.innerHTML = "";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    password.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "2") {
                    emx.innerHTML = "** Email must have less than 100 characters **";
                    pwx.innerHTML = "";
                    alyx.innerHTML = "";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    password.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "3") {
                    emx.innerHTML = "** Invalid Email **";
                    pwx.innerHTML = "";
                    alyx.innerHTML = "";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    password.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "4") {
                    emx.innerHTML = "";
                    pwx.innerHTML = "** Please enter your Password **";
                    alyx.innerHTML = "";
                    password.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "5") {
                    emx.innerHTML = "";
                    pwx.innerHTML = "** Invalid Password **";
                    alyx.innerHTML = "";
                    password.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (text == "7") {
                    emx.innerHTML = "";
                    pwx.innerHTML = "";
                    alyx.innerHTML = "** Invalid Username or Password **";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    password.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                } else if (text == "6") {
                    emx.innerHTML = "";
                    pwx.innerHTML = "";
                    alyx.innerHTML = "** Your account has been blocked, go to <a href='hc.php' class='text-decoration-none'>h&c page</a> for more inquiries **";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                    password.classList = "form-control bg-black bg-opacity-50 text-light";
                } else {
                    emx.innerHTML = "";
                    pwx.innerHTML = "";
                    alyx.innerHTML = "** Unknown error!!! refresh and try again **";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                    password.classList = "form-control bg-black bg-opacity-50 text-light";
                }
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

var bm;

function forgetPassword() {

    var email = document.getElementById("emailX");
    var alyx = document.getElementById("alyx");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            alyx.innerHTML = ""
            var t = r.responseText;
            if (t == "Success") {

                alert("Verification code has sent to your Email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(t);
            }

        } else {
            alyx.innerHTML = "Loading....."
        }
    }
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword() {

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {

        np.type = "password";
        npb.innerHTML = "Show";

    }

}

function showPassword2() {

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {

        rnp.type = "password";
        rnpb.innerHTML = "Show";

    }

}

function resetPassword() {

    var email = document.getElementById("emailX");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alert("Your Password Updated");
                bm.hide();
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);

}

function signOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location.reload();
            }
        }
    };

    r.open("GET", "signOutProcess.php", true);
    r.send();

}

function changeImage() {
    var view = document.getElementById("vwImg");
    var file = document.getElementById("profileImg");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function updProfile() {
    var fname = document.getElementById("myF");
    var lname = document.getElementById("myL");
    var mobile = document.getElementById("myM");
    var image = document.getElementById("profileImg");

    var f = new FormData();

    if (image.files.length == 0) {

        confirm("Are you sure you don not want to update Profile Image?");

    } else {
        f.append("image", image.files[0]);
    }

    f.append('fn', fname.value);
    f.append('ln', lname.value);
    f.append('m', mobile.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f)
}

function changeStatus(id) {

    var product_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated" || t == "activated") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "changeStatusProcess.php?p=" + product_id, true);
    r.send();

}

function sendId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "updateProduct.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "sendIdProcess.php?id=" + id, true);
    r.send();

}

function sort1(x) {

    var search = document.getElementById("s");
    var time = "0";

    if (document.getElementById("n").checked) {
        time = "1";
    } else if (document.getElementById("o").checked) {
        time = "2";
    }

    var qty = "0";

    if (document.getElementById("h").checked) {
        qty = "1";
    } else if (document.getElementById("l").checked) {
        qty = "2";
    }

    var platform = "0";

    if (document.getElementById("p").checked) {
        platform = "1";
    } else if (document.getElementById("c").checked) {
        platform = "2";
    } else if (document.getElementById("m").checked) {
        platform = "3";
    }

    var f = new FormData();
    f.append("s", search.value);
    f.append("t", time);
    f.append("q", qty);
    f.append("p", platform);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("sort").innerHTML = t;
        }

    }

    r.open("POST", "sortProcess.php", true);
    r.send(f);

}

function clearSort() {
    window.location.reload();
}

function changeProductImage() {

    var image = document.getElementById("imageUploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }

        } else {
            alert(file_count + " files. You are proceed to upload only 3 or less than 3 files.");
        }

    }

}

function addProduct() {
    var name = document.getElementById("nameAdd");
    var title = document.getElementById("titleAdd");
    var brand = document.getElementById("brandAdd");

    var cost = document.getElementById("costAdd");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageUploader");

    var f = new FormData();

    if (document.getElementById("PC").checked) {
        f.append("PC", true);
    }
    if (document.getElementById("Console").checked) {
        f.append("Console", true);
    }
    if (document.getElementById("Mobile").checked) {
        f.append("Mobile", true);
    }


    if (document.getElementById("Action").checked) {
        f.append("Action", true);
    }
    if (document.getElementById("Adventure").checked) {
        f.append("Adventure", true);
    }
    if (document.getElementById("Racing").checked) {
        f.append("Racing", true);
    }
    if (document.getElementById("Sports").checked) {
        f.append("Sports", true);
    }
    if (document.getElementById("RolePlaying").checked) {
        f.append("RolePlaying", true);
    }
    if (document.getElementById("Puzzle").checked) {
        f.append("Puzzle", true);
    }
    if (document.getElementById("Simulation").checked) {
        f.append("Simulation", true);
    }
    if (document.getElementById("Arcade").checked) {
        f.append("Arcade", true);
    }


    f.append("b", brand.value);
    f.append("n", name.value);
    f.append("t", title.value);
    f.append("cost", cost.value);
    f.append("desc", desc.value);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {

        f.append("image" + x, image.files[x]);

    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t.includes("Product images saved successfully")) {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);
}

function updateProduct() {
    var title = document.getElementById("titleUpd");
    var description = document.getElementById("descUpd");
    var images = document.getElementById("imageUploader");

    var f = new FormData();

    if (document.getElementById("PC").checked) {
        f.append("PC", true);
    }
    if (document.getElementById("Console").checked) {
        f.append("Console", true);
    }
    if (document.getElementById("Mobile").checked) {
        f.append("Mobile", true);
    }

    f.append("t", title.value);
    f.append("d", description.value);

    var file_count = images.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t.includes("Product has been updated!")) {
                window.location = "myProducts.php";
                alert(t);
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProcess.php", true);
    r.send(f);

}

function basicSearch(x, y, z) {
    var txt = document.getElementById("basic_search_txt");
    var select = document.getElementById("basic_search_select");

    var f = new FormData();

    if (y == undefined || y == 0) {
        f.append("s", select.value);
    } else {
        f.append("s", y);
    }
    if (z != undefined) {
        f.append("b", z);
    } else {
        f.append("b", "not");
    }

    f.append("t", txt.value);
    f.append("page", x);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);

}

function advancedSearch(x) {
    var txt = document.getElementById("t");
    var category = document.getElementById("c");
    var brand = document.getElementById("b");
    var platform = document.getElementById("p");
    var from = document.getElementById("pf");
    var to = document.getElementById("pt");
    var sort = document.getElementById("s");

    var f = new FormData();

    f.append("t", txt.value);
    f.append("c", category.value);
    f.append("p", platform.value);
    f.append("pf", from.value);
    f.append("to", to.value);
    f.append("s", sort.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(f);

}

function addToCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
}

function deleteFromCart(id) {

    if (confirm("Are you sure you want to remove the product from Cart?")) {
        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;

                if (t == "Product has been removed") {
                    alert(t);
                    window.location.reload();
                } else {
                    alert(t);
                }
            }
        }

        r.open("GET", "removeCartProcess.php?id=" + id, true);
        r.send();
    }
}

function addToWishlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "added" || t == "removed") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToWishlistProcess.php?id=" + id, true);
    r.send();

}

function removeFromWishlist(id) {
    if (confirm("Are you sure you want to remove the product from Wishlist??")) {
        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {
                    window.location.reload();
                } else {
                    alert(t);
                }

            }
        }

        r.open("GET", "removeWishlistProcess.php?id=" + id, true);
        r.send();
    }
}

function removeFromProduct(id) {

    if (confirm("Are you sure you want to remove the product?")) {
        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "Product has been removed") {
                    window.location.reload();
                } else {
                    alert(t);
                }

            }
        }

        r.open("GET", "removeProductProcess.php?id=" + id, true);
        r.send();
    }
}

function removeFromHistory(id) {

    if (confirm("Are you sure you want to delete history?")) {
        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {
                    window.location.reload();
                } else {
                    alert(t);
                }

            }
        }

        r.open("GET", "removeHistoryProcess.php?id=" + id, true);
        r.send();
    }
}

var fdm;

function addFeedback(id) {
    var feedbackModal = document.getElementById("feedbackModal" + id);
    fdm = new bootstrap.Modal(feedbackModal);
    fdm.show();
}

function saveFeedback(id) {

    var type;

    if (document.getElementById(id + "type1").checked) {
        type = 1;
    } else if (document.getElementById(id + "type2").checked) {
        type = 2;
    } else if (document.getElementById(id + "type3").checked) {
        type = 3;
    }


    var feedback = document.getElementById(id + "feed");

    var f = new FormData();
    f.append("pid", id);
    f.append("t", type);
    f.append("feed", feedback.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                fdm.hide();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);

}

function savHc() {
    var fname = document.getElementById("hcf");
    var fnameError = document.getElementById("hcfX");
    var lname = document.getElementById("hcl");
    var email = document.getElementById("hce");
    var emailError = document.getElementById("hceX");
    var type = document.getElementById("hct");
    var msg = document.getElementById("hcm");
    var msgError = document.getElementById("hcmX");
    var error = document.getElementById("hcX");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("t", type.value);
    f.append("m", msg.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (r == "success") {
                alert(" Submitted, You will receive a reply via Email shortly");
                window.location.reload();
            } else {
                if (t == "1") {
                    fnameError.innerHTML = "** Please enter your First Name **";
                    emailError.innerHTML = "";
                    msgError.innerHTML = "";
                    error.innerHTML = "";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (t == "2") {
                    fnameError.innerHTML = "** First Name must contain less than 50 characters **";
                    emailError.innerHTML = "";
                    msgError.innerHTML = "";
                    error.innerHTML = "";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (t == "3") {
                    fnameError.innerHTML = "";
                    emailError.innerHTML = "** Please enter your Email **";
                    msgError.innerHTML = "";
                    error.innerHTML = "";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (t == "4") {
                    fnameError.innerHTML = "";
                    emailError.innerHTML = "** Email must contain less than 100 characters **";
                    msgError.innerHTML = "";
                    error.innerHTML = "";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (t == "5") {
                    fnameError.innerHTML = "";
                    emailError.innerHTML = "** Invalid Email **";
                    msgError.innerHTML = "";
                    error.innerHTML = "";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light";
                    email.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light";
                } else if (t == "6") {
                    fnameError.innerHTML = "";
                    emailError.innerHTML = "";
                    msgError.innerHTML = "** Enter Your Message **";
                    error.innerHTML = "";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light border-1 border-danger";
                } else if (t == "success") {
                    alert(" Submitted ");
                    window.location.reload();
                } else {
                    fnameError.innerHTML = "";
                    emailError.innerHTML = "";
                    msgError.innerHTML = "";
                    error.innerHTML = "** Server Error: reload your page or try again later **";

                    fname.classList = "form-control bg-black bg-opacity-50 text-light";
                    email.classList = "form-control bg-black bg-opacity-50 text-light";
                    msg.classList = "form-control bg-black bg-opacity-50 text-light";
                }
            }
        } else {
            error.innerHTML = "Loading....";
        }
    }

    r.open("POST", "saveHcProcess.php", true);
    r.send(f);
}

function viewMessages(email) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("chat_box").innerHTML = t;
        }
    }

    r.open("GET", "viewMsgProcess.php?e=" + email, true);
    r.send();
}

function send_msg() {
    var receiver_mail = document.getElementById("rmail");
    var msg_txt = document.getElementById("msg_txt");
    var snd = document.getElementById("sndAlert");
    var cb = document.getElementById("chat_box");

    var f = new FormData();
    f.append("rm", receiver_mail.innerHTML);
    f.append("mt", msg_txt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                snd.innerHTML = ""
                window.location.reload();
            } else {
                alert(t);
            }
        } else {
            snd.innerHTML = "Sending..."
        }
    }

    r.open("POST", "sendMsgProcess.php", true);
    r.send(f);
}

function adminSignIn() {

    var ad = document.getElementById("ad");
    var si = document.getElementById("si");
    var su = document.getElementById("su");

    ad.className = "offset-lg-3 offset-0 col-12 col-lg-6 rounded-2 px-2 py-3 bg-black bg-opacity-50";
    si.className = "d-none";
    su.className = "d-none";
}

function adminSignInX() {
    var email = document.getElementById("emailAdmin");
    var vcode = document.getElementById("vCodeAdmin");
    var adX = document.getElementById("adX");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            adX.innerHTML = ""
            var t = r.responseText;
            if (t == "Success") {

            } else {
                alert(t);
            }
        } else {
            adX.innerHTML = "Loading....."
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}

function adminSignInVerify() {
    var vcode = document.getElementById("vCodeAdmin");
    var email = document.getElementById("emailAdmin");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "verificationProcess.php?v=" + vcode.value + "&e=" + email.value, true);
    r.send();
}

function replyHc(id) {
    var msg = document.getElementById("msgReply" + id).value;
    var msgX = document.getElementById("msgReplyX" + id);

    var f = new FormData();
    f.append("id", id);
    f.append("msg", msg);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            msgX.innerHTML = "";
            var t = r.responseText;
            if (t == "Success") {
                alert("Email sent success");
                window.location.reload();
            } else {
                alert(t);
            }

        } else {
            msgX.innerHTML = "Sending....";
        }
    }
    r.open("POST", "hcReplyProcess.php", true);
    r.send(f);
}

function searchSh(x) {

    var start = document.getElementById("shStart").value;
    var end = document.getElementById("shEnd").value;

    var f = new FormData();
    f.append("page", x);

    if (start == "") {
        f.append("start", "2000-01-01 00:00:00");
    } else {
        f.append("start", start + " 00:00:00");
    }

    if (end == "") {
        f.append("end", "2100-01-01 00:00:00");
    } else {
        f.append("end", end + " 00:00:00");
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("searchSh").innerHTML = t;
        }

    }

    r.open("POST", "searchSHProcess.php", true);
    r.send(f);

}

function send_quick_msg(txt, r) {
    var message = document.getElementById("msg" + txt).value;
    var receiver = document.getElementById("msg" + txt).name;
    var f = new FormData();
    f.append("rm", receiver);
    f.append("mt", message);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendMsgProcess.php", true);
    r.send(f);
}

function searchAd(n) {
    var input;
    var page;
    if (n == "product") {
        input = document.getElementById("searchProductsAdTxt").value;
        page = document.getElementById("searchProductsAd");
    } else {
        input = document.getElementById("searchUsersAdTxt").value;
        page = document.getElementById("searchUsersAd");
    }

    var f = new FormData();
    f.append("input", input);
    f.append("name", n);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            page.innerHTML = t;
        }
    }

    r.open("POST", "searchAdProcess.php", true);
    r.send(f);
}

function blockUser(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated" || t == "activated") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "blockUserProcess.php?u=" + id, true);
    r.send();

}

function payNow(x) {
    var m = document.getElementById("paymentModal");
    bm = new bootstrap.Modal(m);
    bm.show();
}

function proceedPayment(total) {
    var email = document.getElementById("cardEmail").value;
    var name = document.getElementById("cardName").value;
    var number = document.getElementById("cardNumber").value;
    var expiry = document.getElementById("cardExpiry").value;
    var CVV = document.getElementById("cardCVV").value;
    var alertX = document.getElementById("cardAlert");

    var cvv_regex = /^[0-9]{3}$/;
    var expiry_regex = /^(0[1-9]|1[0-2]\/\d{2})$/;
    var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email != "" && name != "" && number != "" && expiry != "" && CVV != "") {

        if (email_regex.test(email)) {

            if (number == "4916 8012 3456 7890" || number == "4539 1456 7890 1256") {

                if (expiry_regex.test(expiry)) {

                    if (cvv_regex.test(CVV)) {
    
                        alertX.innerHTML = "";
                        if (confirm("Proceed to pay " + total + " LKR?")) {
                            bm.hide();
                            var r = new XMLHttpRequest();
                            r.open("GET", "removeCartProcess.php?id=all", true);
                            r.send();

                            window.location = "invoice.php";
                        }
    
                    } else {
                        alertX.innerHTML = "Unable to proceed. Invalid CVV";
                    }
                } else {
                    alertX.innerHTML = "Unable to proceed. Invalid expiry date";
                }
               
            } else {
                alertX.innerHTML = "Unable to proceed. Invalid card number";
            }
            
        } else {
            alertX.innerHTML = "Unable to proceed. Invalid email address";
        }

    } else {
        alertX.innerHTML = "Unable to proceed. Invalid card details";
    }
}

