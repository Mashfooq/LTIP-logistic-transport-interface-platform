<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }

    if(isset($_GET['reviewID'])){
      $reviewID = $_GET['reviewID'];
    }
    elseif(isset($_SESSION['reviewID'])){
      $reviewID = $_SESSION['reviewID'];
    }
    else{
      header("location:index.php");
    }
    
    $stms = $admin->ret("SELECT * FROM `review` WHERE `reviewID` = '$reviewID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    
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
            <h1 class="m-0">View Products </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View Products </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />

 <table class="table">
  <thead class="thead-dark">
    <tr>
      <td scope="col">Name</td>
      <td><?php echo $row['reviewName'] ?></td>
    </tr>
    <tr>
      <td scope="col">Email</td>
      <td><?php echo $row['reviewEmail'] ?></td>
    </tr>
    <tr>
      <td scope="col">Comment</td>
      <td><?php echo $row['reviewComment'] ?></td>
    </tr>
    <tr>
      <td scope="col">Ratings</td>
      <td><?php echo $row['reviewStar'] ?></td>
    </tr>
    <tr>
      <td scope="col">Date</td>
      <td><?php echo $row['reviewDate'] ?></td>
    </tr>
    <?php 
      if($row['reviewAnimalID'] != 0 ){
    ?>
    <tr>
      <td scope="col">Animal Detail</td>
      <td><a class="btn btn-primary btn-sm" href="view-animal.php?animalID=<?php echo $row['reviewAnimalID'] ?>">VIEW</a></td>
    </tr>
  <?php } ?>
  <?php 
      if($row['reviewBirdID'] != 0 ){
    ?>
    <tr>
      <td scope="col">Bird Detail</td>
      <td><a class="btn btn-primary btn-sm" href="view-bird.php?birdID=<?php echo $row['reviewBirdID'] ?>">VIEW</a></td>
    </tr>
  <?php } ?>
  <?php 
      if($row['reviewProductID'] != 0 ){
    ?>
    <tr>
      <td scope="col">Product Detail</td>
      <td><a class="btn btn-primary btn-sm" href="view-product.php?productID=<?php echo $row['reviewProductID'] ?>">VIEW</a></td>
    </tr>
  <?php } ?>
    
  </thead>
  <tbody>
</table>



    


      
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
