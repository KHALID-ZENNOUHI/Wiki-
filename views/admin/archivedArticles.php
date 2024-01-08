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
    <title>Tables</title>

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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data users</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <!-- <button class="au-btn au-btn-icon au-btn--green au-btn--small"> -->
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Users</span></a>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            require 'connection.php';
                                            $query = 'select * from users';
                                            $mysqliquery = mysqli_query($conn,$query);
                                            while ($resultusers = mysqli_fetch_assoc($mysqliquery)) {
                                            $UserID =   $resultusers['UserID'];
                                        ?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><?php echo $resultusers['UserName'];?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $resultusers['UserEmail'];?></span>
                                                </td>
                                                <td class="desc"><?php echo $resultusers['Role'];?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                    <a href="#editEmployeeModal<?php echo $UserID ?>" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="table.php?iduser=<?php echo $UserID?>" class="delete"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            
                                        </tbody>
                                        <?php
                                    }
                                    ?>
                                    </table>
                                    
                                </div>
                                <!-- END DATA TABLE -->
                           
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method = "POST" >
                <div class="modal-header">						
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name = "Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name = "Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "Role">
                            <option selected>Choisis son Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>	
                    <div class="form-group">
                        <label>SquadID</label>
                        <input type="number" name = "SquadID" class="form-control" required min = '1' max = '5'>
                    </div>				
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name = "adduser" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<?php
    require 'connection.php';
    $query = 'select * from users';
    $mysqliquery = mysqli_query($conn,$query);
    while ($resultusers = mysqli_fetch_assoc($mysqliquery)) {
    $UserID =   $resultusers['UserID'];
?>
<div id="editEmployeeModal<?php echo $UserID?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method = "POST" >
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value = "<?php echo $resultusers['UserName'];?>" name = "Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value = "<?php echo $resultusers['UserEmail'];?>"  name = "Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "Role" required>
                            <option selected>Choisis son Role</option>
                            <option value="Leader" <?php if($resultusers['Role'] == "Leader") echo "selected"; ?>>Leader</option>
                            <option value="Member" <?php if($resultusers['Role'] == "Member") echo "selected"; ?>>Member</option>
                        </select>
                    </div>	
                    <div class="form-group">
                        <label>SquadID</label>
                        <input type="number" value = "<?php echo $resultusers['SquadID'];?>"  name = "SquadID" class="form-control" required min = '0' max = '5'>
                    </div>				
                </div>
                <input type="hidden" value = "<?php echo $UserID ?>" name ="UserID">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name = "updateuser" class="btn btn-success" value="Edit">
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
