<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="assets/assetsAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/assetsAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- assets/assetsAdmin/Vendor CSS-->
    <link href="assets/assetsAdmin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/assetsAdmin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <!-- <img src="assets/assetsAdmin/images/icon/logo.png" alt=""> -->
                                <h1>Wiki™</h1>
                                <?php if(!empty($_SESSION['error'])){?>
                                    <h1><?php echo $_SESSION['error'];?></h1>
                                <?php } ?>                               
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="/register" method="POST">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="cpassword" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name = "register">register</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="/login">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/assetsAdmin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/assetsAdmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/assetsAdmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- assets/assetsAdmin/Vendor JS       -->
    <script src="assets/assetsAdmin/vendor/slick/slick.min.js">
    </script>
    <script src="assets/assetsAdmin/vendor/wow/wow.min.js"></script>
    <script src="assets/assetsAdmin/vendor/animsition/animsition.min.js"></script>
    <script src="assets/assetsAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/assetsAdmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/assetsAdmin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/assetsAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/assetsAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/assetsAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/assetsAdmin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/assetsAdmin/js/main.js"></script>

</body>

</html>
<!-- end document-->