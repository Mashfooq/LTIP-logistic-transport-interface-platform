<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }

    if(isset($_GET['orderID'])){
      $orderID = $_GET['orderID'];
    }
    else{
      header("location:manage-order-detail.php");
    }
    
    $stms = $admin->ret("SELECT * FROM `orderDetail` WHERE `orderID` = '$orderID'");
    $rows = $stms->fetch(PDO::FETCH_ASSOC);
    $orderDeliveryStatusID = $rows['orderDeliveryStatusID'];
    $orderPaymentModeID = $rows['orderPaymentModeID'];
    $orderPaymentStatusID = $rows['orderPaymentStatusID'];
    $orderCustomerID = $rows['orderCustomerID'];
    $orderUserCartID = $rows['orderUserCartID'];

    $stmts = $admin -> ret("SELECT * FROM `deliveryStatus` where `deliveryStatusID` = '$orderDeliveryStatusID'");
    $row = $stmts -> fetch(PDO::FETCH_ASSOC);

    $stmtp = $admin -> ret("SELECT * FROM `paymentStatus` where `paymentStatusID` = '$orderPaymentStatusID'");
    $rowp = $stmtp -> fetch(PDO::FETCH_ASSOC);

    $stmtm = $admin -> ret("SELECT * FROM `paymentMode` where `paymentModeID` = '$orderPaymentModeID'");
    $rowm = $stmtm -> fetch(PDO::FETCH_ASSOC);

    $stmtb = $admin -> ret("SELECT * FROM `billingDetail` where `billingCustomerID` = '$orderCustomerID'");
    $rowsb = $stmtb -> fetch(PDO::FETCH_ASSOC);

    $stmtu = $admin -> ret("SELECT * FROM `users` where `userID` = '$orderCustomerID'");
    $rowsu = $stmtu -> fetch(PDO::FETCH_ASSOC);

    $stmtu = $admin -> ret("SELECT * FROM `userCart` where `userCartID` = '$orderUserCartID'");
    $rowu = $stmtu -> fetch(PDO::FETCH_ASSOC);

    $animalID = $rowu['userCartAnimalID'];
    $birdID = $rowu['userCartBirdID'];
    $productID = $rowu['userCartProductID'];

    if($animalID != 0){
        $stmta = $admin -> ret("SELECT * FROM `animal` where `animalID` = '$animalID'");
        $rowa = $stmta -> fetch(PDO::FETCH_ASSOC);

        $animalBreedID = $rowa['animalBreedID'];
        $animalCategoryID = $rowa['animalCategoryID'];

        $stmtc = $admin -> ret("SELECT * FROM `animalCategory` where `animalCategoryID` = '$animalCategoryID'");
        $rowc = $stmtc -> fetch(PDO::FETCH_ASSOC);

        $stmtb = $admin -> ret("SELECT * FROM `animalBreed` where `animalBreedID` = '$animalBreedID'");
        $rowb = $stmtb -> fetch(PDO::FETCH_ASSOC);

        $name = $rowb['animalBreedName'];
    }

    if($birdID != 0){
        $stmta = $admin -> ret("SELECT * FROM `bird` where `birdID` = '$birdID'");
        $rowa = $stmta -> fetch(PDO::FETCH_ASSOC);

        $birdCategoryID = $rowa['birdCategoryID'];

        $stmtb = $admin -> ret("SELECT * FROM `birdCategory` where `birdCategoryID` = '$birdCategoryID'");
        $rowb = $stmtb -> fetch(PDO::FETCH_ASSOC);


        $name = $rowb['birdCategoryName'];
    }

    if($productID != 0){
        $stmta = $admin -> ret("SELECT * FROM `product` where `productID` = '$productID' ");
        $rowa = $stmta -> fetch(PDO::FETCH_ASSOC);
        $name = $rowa['productName'];

        $productCategoryID = $rowa['productCategoryID'];

        $stmtb = $admin -> ret("SELECT * FROM `productCategory` where `productCategoryID` = '$productCategoryID'");
        $rowb = $stmtb -> fetch(PDO::FETCH_ASSOC);
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
            <h1 class="m-0">View Detail </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="manage-order-detail.php">Manage Pending Order</a></li>
              <li class="breadcrumb-item active">View Detail </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php 
          if($animalID != 0){
            ?>
      <div class="container-fluid">
        <center>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Order Animal Details</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </center>
<hr style="border-color:white;padding-top: 8px;" />
         <table class="table">
          <thead class="thead-dark">
            <tr>
              <td scope="col" width="400px">Animal ID</td>
              <td><?php echo $rowa['animalID'] ?></td>
            </tr>
            <tr>
              <td scope="col">Category</td>
              <td><?php echo $rowc['animalCategoryName'] ?></td>
            </tr>
            <tr>
              <td scope="col">Breed</td>
              <td><?php echo $rowb['animalBreedName'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Image</td>
              <td><img src="admincontroller/animalImage/<?php echo $rowa['animalImage']  ?>" height="100px" max-width="200px"></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Position</td>
              <td><?php echo $rowa['animalPosition'] ?></td>
            </tr>
            <tr>
              <td scope="col">Distribution Price</td>
              <td><?php echo $rowa['animalDistributionPrice'] ?></td>
            </tr>
            <tr>
              <td scope="col">Selling Price</td>
              <td><?php echo $rowa['animalSellingPrice'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Height</td>
              <td><?php echo $rowa['animalHeight'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Weight</td>
              <td><?php echo $rowa['animalWeight'] ?></td>
            </tr>
            <tr>
              <td scope="col">Age</td>
              <td><?php echo $rowa['animalAge'] ?></td>
            </tr>
            <tr>
              <td scope="col">Fur Colour</td>
              <td><?php echo $rowa['animalFur'] ?></td>
            </tr>
          </thead>
          <tbody>
        </table>
      </div><!--/. container-fluid -->

    <?php } ?>
    <?php 
          if($birdID != 0){
            ?>
      <div class="container-fluid"> 
        <center>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Order Bird Details</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </center>
       <hr style="border-color:white;padding-top: 8px;" />     
         <table class="table">
          <thead class="thead-dark">
            <tr>
              <td scope="col" width="400px">Bird ID</td>
              <td><?php echo $rowa['birdID'] ?></td>
            </tr>
            <tr>
              <td scope="col">Category</td>
              <td><?php echo $rowb['birdCategoryName'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Image</td>
              <td><img src="admincontroller/birdImage/<?php echo $rowa['birdImage']  ?>" height="100px" max-width="200px"></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Position</td>
              <td><?php echo $rowa['birdPosition'] ?></td>
            </tr>
            <tr>
              <td scope="col">Distribution Price</td>
              <td><?php echo $rowa['birdDistributionPrice'] ?></td>
            </tr>
            <tr>
              <td scope="col">Selling Price</td>
              <td><?php echo $rowa['birdSellingPrice'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Weight</td>
              <td><?php echo $rowa['birdWeight'] ?></td>
            </tr>
            <tr>
              <td scope="col">Age</td>
              <td><?php echo $rowa['birdAge'] ?></td>
            </tr>
            <tr>
              <td scope="col">Feather Colour</td>
              <td><?php echo $rowa['birdFeatherColour'] ?></td>
            </tr>
          </thead>
          <tbody>
        </table>
      </div><!--/. container-fluid -->

    <?php } ?>
    <?php 
          if($productID != 0){
            ?>
      <div class="container-fluid"> 
        <center>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Order Product's Details</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </center>
            <hr style="border-color:white;padding-top: 8px;" />
         <table class="table">
          <thead class="thead-dark">
            <tr>
              <td scope="col" width="400px">Bird ID</td>
              <td><?php echo $rowa['productID'] ?></td>
            </tr>
            <tr>
              <td scope="col">Category</td>
              <td><?php echo $rowb['productCategoryName'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Image</td>
              <td><img src="admincontroller/productImage/<?php echo $rowa['productImage']  ?>" height="100px" max-width="200px"></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Position</td>
              <td><?php echo $rowa['productPosition'] ?></td>
            </tr>
            <tr>
              <td scope="col">MRP Price</td>
              <td><?php echo $rowa['productMRP'] ?></td>
            </tr>
            <tr>
              <td scope="col">Selling Price</td>
              <td><?php echo $rowa['productSellingPrice'] ?></td>
            </tr>
            <tr>
              <td scope="col" width="400px">Discription</td>
              <td><?php echo $rowa['productDescription'] ?></td>
            </tr>
          </thead>
          <tbody>
        </table>
      </div><!--/. container-fluid -->

    <?php } ?>
      <div class="container-fluid">
        <center>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">User Details</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </center>
<hr style="border-color:white;padding-top: 8px;" />
         <table class="table">
          <thead class="thead-dark">
            <tr>
              <td scope="col" width="400px">User ID</td>
              <td><?php echo $rowsu['userID'] ?></td>
            </tr>
            <tr>
              <td scope="col">User Name</td>
              <td><?php echo $rowsu['userName'] ?></td>
            </tr>
            <tr>
              <td scope="col">User Email</td>
              <td><?php echo $rowsu['userEmail'] ?></td>
            </tr>
          </thead>
          <tbody>
        </table>
      </div><!--/. container-fluid -->

      <div class="container-fluid"> 
        <center>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Order Status</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </center>
<hr style="border-color:white;padding-top: 8px;" />

         <table class="table">
          <thead class="thead-dark">
            <tr>
              <td scope="col" width="400px">Order ID</td>
              <td><?php echo $rows['orderID'] ?></td>
            </tr>
            <tr>
              <td scope="col">Order Recieved Date</td>
              <td><?php echo $rows['orderDate'] ?></td>
            </tr>
            <tr>
              <td scope="col">Order Payment Mode</td>
              <td><?php echo $rowm['paymentModeName'] ?></td>
            </tr>
            <tr>
              <td scope="col">Order Payment Status</td>
              <td><?php echo $rowp['paymentStatusName'] ?></td>
            </tr>
            <tr>
              <td scope="col">Order Delivery Status</td>
              <td><?php echo $row['deliveryStatusName'] ?></td>
            </tr>
          </thead>
          <tbody>
        </table>
      </div><!--/. container-fluid -->

      <div class="container-fluid"> 
        <center>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Biiling Detail</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </center>
<hr style="border-color:white;padding-top: 8px;" />
         <table class="table">
          <thead class="thead-dark">
            <tr>
              <td scope="col" width="400px">Name</td>
              <td><?php echo $rowsb['billingFirstName'] ?> <?php echo $rowsb['billingFirstName'] ?></td>
            </tr>
            <tr>
              <td scope="col">Address </td>
              <td><?php echo $rowsb['billingAddress'] ?></td>
            </tr>
            <tr>
              <td scope="col">Country</td>
              <td><?php echo $rowsb['billingCountry'] ?></td>
            </tr>
            <tr>
              <td scope="col">Town / City</td>
              <td><?php echo $rowsb['billingTownCity'] ?></td>
            </tr>
            <tr>
              <td scope="col">House / Street</td>
              <td><?php echo $rowsb['billingHouseStreet'] ?></td>
            </tr>
            <tr>
              <td scope="col">Pincode</td>
              <td><?php echo $rowsb['billingPincode'] ?></td>
            </tr>
            <tr>
              <td scope="col">Phone</td>
              <td><?php echo $rowsb['billingPhone'] ?></td>
            </tr>
            <tr>
              <td scope="col">Additional Information</td>
              <td><?php echo $rowsb['billingAdditionalInfo'] ?></td>
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
