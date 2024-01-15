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
    <title>Wiki™</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/assetsAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/assetsAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <script src="sweetalert2.all.min.js"></script>
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
        <!-- HEADER MOBILE-->
        <?php include(__DIR__ . '/../partials/partialsAdmin/headerMobile.php'); ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include(__DIR__ . '/../partials/partialsAdmin/menuSidebar.php'); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include(__DIR__ . '/../partials/partialsAdmin/headerDescktop.php'); ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
                <div class="main-content d-flex flex-wrap">
                    <?php foreach ($wikis as $wiki) {?>
                    <div class="card m-3" style="width: 31rem;">
                        <img class="card-img-top" src="assets/assetsClient/images/<?= $wiki->image_path?>" width="416px" height="256px" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title"><?= $wiki->title?></h5>
                        <p class="card-text"><?= $wiki->description?></p>
                        <a href="archived?id=<?= $wiki->id?>" class="btn btn-primary">Desarchive wiki</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                           
                        
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
