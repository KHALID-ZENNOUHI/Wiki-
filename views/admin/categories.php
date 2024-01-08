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
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

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
                                <a href="#addRessourcesModal" class="btn btn-success m-b-35" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ressources</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Resource</th>
                                                <th>Categroy</th>
                                                <th>Subcategory</th>
                                                <th>Squad</th>
                                                <th>Project</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'connection.php';
                                            $sql = "SELECT *
                                                    FROM resources
                                                    NATURAL JOIN squad
                                                    NATURAL JOIN projects
                                                    NATURAL JOIN (
                                                        SELECT *
                                                        FROM subcategory
                                                        NATURAL JOIN category
                                                    ) AS subcat_cat;";
                                            $mysqliresources = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($mysqliresources)) {
                                                $RessourcesID = $row['ResourceID'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['ressourceName']; ?></td>
                                                    <td><?php echo $row['CategoryNom']; ?></td>
                                                    <td><?php echo $row['subcategoryNom']; ?></td>
                                                    <td><?php echo $row['SquadName']; ?></td>
                                                    <td class="process"><?php echo $row['ProjectNom']; ?></td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="#editRessourcesModal<?php echo $RessourcesID ?>" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="Ressources.php?idressource=<?php echo $RessourcesID?>" class="delete"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
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
<!-- Add Ressources Modal  -->
<div id="addRessourcesModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="Ressources.php">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ressources</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ressource</label>
                        <input type="text" name="ressourceName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="CategoryID">
                            <option selected>Choose a category</option>
                            <?php
                            $querycategory = "SELECT * FROM category;";
                            $conncategory = mysqli_query($conn, $querycategory);
                            while ($row = mysqli_fetch_assoc($conncategory)) {
                                echo "<option value='{$row['CategoryID']}'>{$row['CategoryNom']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SubCategory</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="SubcategoryID">
                            <option selected>Choose a SubCategory</option>
                            <?php
                            $querysubcategory = "SELECT * FROM subcategory;";
                            $connsubcategory = mysqli_query($conn, $querysubcategory);
                            while ($rowsubcategory = mysqli_fetch_assoc($connsubcategory)) {
                                echo "<option value='{$rowsubcategory['SubcategoryID']}'>{$rowsubcategory['subcategoryNom']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Projects</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="ProjectID">
                            <option selected>Choose a Project</option>
                            <?php
                            $queryprojects = "SELECT * FROM projects;";
                            $connprojects = mysqli_query($conn, $queryprojects);
                            while ($rowproject = mysqli_fetch_assoc($connprojects)) {
                                echo "<option value='{$rowproject['ProjectID']}'>{$rowproject['ProjectNom']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="addressource" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<?php
    require 'connection.php';
    $sql = "SELECT *
            FROM resources
            NATURAL JOIN squad
            NATURAL JOIN projects
            NATURAL JOIN (
                SELECT *
                FROM subcategory
                NATURAL JOIN category
            ) AS subcat_cat;";
    $mysqliresources = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($mysqliresources)) {
    $RessourcesID = $row['ResourceID'];
    $categoryid = $row['CategoryID'];
    $subcategoryID = $row['SubcategoryID'];
    $projectID = $row['ProjectID'];
?>
<div id="editRessourcesModal<?php echo $RessourcesID?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method = "POST" >
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Ressources</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ressource</label>
                        <input type="text" value = "<?php echo $row['ressourceName'];?>" name = "ressourceName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "categoryRessource" required>
                            <?php 
                                require 'connection.php';
                                $query = "SELECT * FROM category";
                                $queryconn = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($queryconn)) {
                                $categoryID = $row['CategoryID'];
                            ?>
                            <option value="<?php echo $row['CategoryID']?>" <?php if($categoryID == $categoryid) echo "selected"; ?>><?php echo $row['CategoryNom']?></option>
                            <?php } ?>
                        </select>
                    </div
                    <div class="form-group">
                        <label>Subcategory</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "subcategoryRessource" required>
                            <?php 
                                require 'connection.php';
                                $querysub = "SELECT * FROM subcategory natural join category;";
                                $sqliquerysub = mysqli_query($conn,$querysub);
                                while($row = mysqli_fetch_assoc($sqliquerysub)){
                                $subcategoryid = $row['SubcategoryID'];  
                            ?>
                            <option value="<?php echo $subcategoryid?>" <?php if($subcategoryid == $subcategoryID) echo "selected"; ?>><?php echo $row['subcategoryNom']?></option>
                            <?php } ?>
                        </select>
                    </div>	
                    <div class="form-group">
                        <label>Project</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "projectRessource" required>
                            <?php 
                                require 'connection.php';
                                $queryproject = "SELECT * FROM projects;";
                                $sqliqueryproject = mysqli_query($conn,$queryproject);
                                while($row = mysqli_fetch_assoc($sqliqueryproject)){
                                $projectid = $row['ProjectID'];  
                            ?>
                            <option value="<?php echo $projectid?>" <?php if($projectid == $projectID) echo "selected"; ?>><?php echo $row['ProjectNom']?></option>
                            <?php } ?>
                        </select>
                    </div>		
                    <div class="modal-footer">
                        <input type="hidden" value = "<?php echo $RessourcesID ?>" name ="ressourceID">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name = "updatressource" class="btn btn-success" value="Edit">
                    </div>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
<?php } ?>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
