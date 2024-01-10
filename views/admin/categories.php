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
    <title>Charts</title>

    <!-- Fontfaces CSS-->
    <link href="assets/assetsAdmin/css/font-face.css" rel="stylesheet" media="all">
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
            <div class="main-content">
            <div class="row m-t-5 m-l-30 m-r-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class = "table-data__tool">
                                <h3 class="title-5 m-b-35">data ressources</h3>
                                <a href="#addCategorie" class="btn btn-success m-b-35" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Categories</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Categories</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($categories as $categorie) {;?>
                                        <tbody>
                                                <tr>
                                                    <td><?= $categorie->categorie?></td>
                                                    <td><?= $categorie->c_description?></td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="#editCategorie<?= $categorie->id?>" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="/deleteCategorie?id=<?= $categorie->id?>" class="delete"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>
                                                </td>
                                                <!-- Edit Modal HTML -->
                                                <div id="editCategorie<?= $categorie->id?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method = "POST" action = "/updatecategorie" >
                                                                <div class="modal-header">						
                                                                    <h4 class="modal-title">Edit Categorie</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Categorie:</label>
                                                                        <input type="text" value = "<?= $categorie->categorie?>" name = "categorie" class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description:</label>
                                                                        <textarea name="description" id="" class="form-control"  cols="30" rows="10"><?= $categorie->c_description?></textarea>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" value = "<?= $categorie->id?>" name ="id">
                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                        <input type="submit" name = "updatecategorie" class="btn btn-success" value="Edit">
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </tr>
                                        </tbody>
                                        <?php };?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                    <!-- END DATA TABLE-->
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>                                        
    </div>
<!-- Add Modal  -->
<div id="addCategorie" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/addcategorie">
                <div class="modal-header">
                    <h4 class="modal-title">Add Categorie</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Categorie:</label>
                        <input type="text" name="categorie" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="addcategorie" class="btn btn-success" value="Add">
                </div>
            </form>
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
