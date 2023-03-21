<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>THE PET'S EMPORIUM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../user/css/style.css">
    
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
   

  <!-- Navbar -->
  <?php include 'include/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

   <?php include 'include/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Add New Bird </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New Bird </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />

        <form action="admincontroller/manage-bird.php" enctype="multipart/form-data" method="POST">
        <!-- form-group Starts -->
         <div class="row form-group" >
                <div class="col-md-3" >
                <label class="control-label" > Bird Category   </label>&nbsp;
                <select name="birdCategoryID" id="category" required class="form-control" >
                    <option value=""> Select Bird Category </option>
                    <?php
                    $stmt = $admin -> ret("SELECT * FROM `birdCategory`");
                    while ($row= $stmt -> fetch(PDO::FETCH_ASSOC)) {
                    ?><option value="<?php echo $row['birdCategoryID'] ; ?>" ><?php echo $row['birdCategoryName']; ?></option>
                    <?php } ?>
                </select>
                </div>
         </div>
          <div class="row form-group" >
                <div class="col-md-3" >
                      <label class=" control-label" >Bird Image  </label> 
                      <input type="file" class="form-control" name="Image" id="">
                </div>
             
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" > Bird Position </label> 
                      <input type="number" placeholder="Enter Position" required class="form-control" name="birdPosition" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Weight </label> 
                      <input type="number" placeholder="Enter Weight in kg" required class="form-control" name="birdWeight" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Bird Age </label> 
                      <input type="number" placeholder="Enter Age" required class="form-control" name="birdAge" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Bird Feather </label> 
                      <input type="text" placeholder="Enter Feather colour" required class="form-control" name="birdFeatherColour" id="">
                </div>
         </div>
        
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Bird Distribution Price  </label> 
                      <input type="number" placeholder="Enter Distribution Price" required class="form-control" name="birdDistributionPrice" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Bird Selling Price  </label> 
                      <input type="number" placeholder="Enter Selling Price" required class="form-control" name="birdSellingPrice" id="">
                </div>
         </div>

         <div class="row form-group" >
                <div class="col-md-3" >
                     <input type="submit"  name="addBird" value="Add Bird" class="btn btn-success ">
                </div>
         </div>
        </form>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include 'include/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>

</body>
</html>
