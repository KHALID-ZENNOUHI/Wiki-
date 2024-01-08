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
    <title>Calendar</title>

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

    <!-- FullCalendar -->
    <link href='vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <style type="text/css">
    /* force class color to override the bootstrap base rule
       NOTE: adding 'url: #' to calendar makes this unneeded
     */
    .fc-event, .fc-event:hover {
          color: #fff !important;
          text-decoration: none;
    }
    </style>

</head>

<!-- animsition overrides all click events on clickable things like a,
      since calendar doesn't add href's be default,
      it leads to odd behaviors like loading 'undefined'
      moving the class to menus lead to only the menu having the effect -->
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
                        <div class="d-flex justify-content-between">
                            <h3 class="title-5 m-b-35">data SubCategory</h3>
                            <a href="#addsubcategoryModal" class="btn btn-success m-b-35" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New SubCategory</span></a>
                        </div>
                        <div class="row">
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                require 'connection.php';
                                $querysub = "SELECT * FROM subcategory natural join category;";
                                $sqliquerysub = mysqli_query($conn,$querysub);
                                while($row = mysqli_fetch_assoc($sqliquerysub)){
                                $subcategoryid = $row['SubcategoryID'];  
                                ?>
                                <tr>
                                <td><?php echo $row['subcategoryNom'];?></td>
                                <td><?php echo $row['CategoryNom'];?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="#EditsubcategoryModal<?php echo $subcategoryid ?>" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                        </button></a>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <a href="subcategory.php?idsubcategory=<?php echo $subcategoryid?>" class="delete"><i class="zmdi zmdi-delete"></i></a>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
            </div>
        </div>

    </div>
<!-- Add SubCategories Modal  -->
<div id="addsubcategoryModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Subcategories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>subcategory</label>
                        <input type="text" name="subcategoryName" class="form-control" required>
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
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="addsubcategory" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Categories Modal  -->
<?php 
    require 'connection.php';
    $querysub = "SELECT * FROM subcategory natural join category;";
    $sqliquerysub = mysqli_query($conn,$querysub);
    while($row = mysqli_fetch_assoc($sqliquerysub)){
    $subcategoryid = $row['SubcategoryID'];  
    $categoryid = $row['CategoryID'];
?>
<div id="EditsubcategoryModal<?php echo $subcategoryid ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>subcategory</label>
                        <input type="text" name="subcategoryName" value = '<?php echo $row['subcategoryNom'];?>' class="form-control" required>
                        <input type="hidden" name="idsubcategory" value = '<?php echo $subcategoryid;?>' >
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="CategoryID">
                            <?php
                            $querycategory = "SELECT * FROM category;";
                            $conncategory = mysqli_query($conn, $querycategory);
                            while ($row = mysqli_fetch_assoc($conncategory)) {
                                ?>
                                <option value="<?php echo $row['CategoryID']?>" <?php if($row['CategoryID'] == $categoryid) echo "selected";?>><?php echo $row['CategoryNom']?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="editsubcategory" class="btn btn-success" value="Edit">
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
    <script src="vendor/select2/select2.min.js"></script>

    <!-- full calendar requires moment along jquery which is included above -->
    <script src="vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script src="vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script type="text/javascript">
$(function() {
  // for now, there is something adding a click handler to 'a'
  var tues = moment().day(2).hour(19);

  // build trival night events for example data
  var events = [
    {
      title: "Special Conference",
      start: moment().format('YYYY-MM-DD'),
      url: '#'
    },
    {
      title: "Doctor Appt",
      start: moment().hour(9).add(2, 'days').toISOString(),
      url: '#'
    }

  ];

  var trivia_nights = []

  for(var i = 1; i <= 4; i++) {
    var n = tues.clone().add(i, 'weeks');
    console.log("isoString: " + n.toISOString());
    trivia_nights.push({
      title: 'Trival Night @ Pub XYZ',
      start: n.toISOString(),
      allDay: false,
      url: '#'
    });
  }

  // setup a few events
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    events: events.concat(trivia_nights)
  });
});
    </script>


</body>

</html>
<!-- end document-->
