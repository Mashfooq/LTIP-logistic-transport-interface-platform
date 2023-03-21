<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }

    if(isset($_GET['sellBirdID'])){
      $sellBirdID = $_GET['sellBirdID'];
    }
    else{
      header("location:manage-buy-bird.php");
    }
    
    $stms = $admin->ret("SELECT * FROM `sellBird` WHERE `sellBirdID` = '$sellBirdID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    $userID = $row['userID'];
    $birdCategoryID = $row['sellBirdCategoryID'];
    $sellBirdStatusID = $row['sellBirdStatusID'];
    $sellBirdPrice = $row['sellBirdPrice'];


    $stmtu = $admin->ret("SELECT * FROM `users` WHERE `userID` = '$userID'");
    $rowsu = $stmtu->fetch(PDO::FETCH_ASSOC);


    $stmtc = $admin->ret("SELECT * FROM `birdCategory` WHERE `birdCategoryID` = '$birdCategoryID'");
    $rowsc = $stmtc->fetch(PDO::FETCH_ASSOC);

    $stmts = $admin->ret("SELECT * FROM `sellAnimalStatus` WHERE `sellAnimalStatusID` = '$sellBirdStatusID'");
    $rowss = $stmts->fetch(PDO::FETCH_ASSOC);

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

  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
            <h1 class="m-0">View Sell Bird's Detail </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View Detail </li>
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
      <td scope="col">User Name</td>
      <td><?php echo $rowsu['userName'] ?></td>
    </tr>
    <tr>
      <td scope="col">User Email</td>
      <td><?php echo $rowsu['userEmail'] ?></td>
    </tr>
    <tr>
      <td scope="col">Category</td>
      <td><?php echo $rowsc['birdCategoryName'] ?></td>
    </tr>
    <tr>
      <td scope="col">Image</td>
      <td><img src="../user/usercontroller/birdImage/<?php echo $row['sellBirdImage']  ?>" height="100px" max-width="200px"></td>
    </tr>
    <tr>
      <td scope="col">Price</td>
      <td><?php echo $row['sellBirdPrice'] ?>/-</td>
    </tr>
    <tr>
      <td scope="col">Description</td>
      <td><?php echo $row['sellBirdDiscription'] ?></td>
    </tr>
    <tr>
      <td scope="col">Weight</td>
      <td><?php echo $row['sellBirdWeight'] ?></td>
    </tr>
    <tr>
      <td scope="col">Age</td>
      <td><?php echo $row['sellBirdAge'] ?></td>
    </tr>
    <tr>
    <tr>
      <td scope="col">Feather Colour</td>
      <td><?php echo $row['sellBirdFeatherColour'] ?></td>
    </tr>
    <tr>
      <td scope="col">Status</td>
      <td><?php echo $rowss['sellAnimalStatusName'] ?></td>
    </tr>
    <tr>
      <td scope="col">Action</td>
      <td>
        <?php 
          if($sellBirdStatusID < 2 ){ 
            ?>
        <a class="btn btn-success btn-sm" href="admincontroller/manage-buy-bird.php?acceptSellBirdID=<?php echo $row['sellBirdID'] ?>">Accept</a>
        <a class="btn btn-danger btn-sm" href="admincontroller/manage-buy-bird.php?rejectSellBirdID=<?php echo $row['sellBirdID'] ?>">Reject</a> 
          <?php } ?>
           <?php 
          if( $sellBirdStatusID == 2  ){
          if ($sellBirdStatusID != 5 ) {
            ?> 
        <a class="btn btn-success btn-sm" href="manage-UPI-bird.php?sellBirdID=<?php echo $row['sellBirdID'] ?>">Pay Now</a>
      <?php  } }

          if($sellBirdStatusID == 5 ){ 
            if($sellBirdStatusID != 3){
            ?> 
        <a class="btn btn-success btn-sm" href="admincontroller/manage-buy-bird.php?deliveried=<?php echo $row['sellBirdID'] ?>">Delivered</a>
        <?php } } ?>
    </tr>

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
