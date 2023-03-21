<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }
    $rowcount = 0;
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script>$('#myModal').on('shown.bs.modal', function() {
  $('#myInput').focus()
})</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!--JS below-->

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
            <h5 class="m-0">Manage Order Details</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
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
      <th scope="col">Order Number</th>
      <th scope="col">Order Item</th>
      <th scope="col">Date</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Delivery Status</th>
      <th width="100" scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>

<?php 
  $stmt = $admin -> ret("SELECT * FROM `orderDetail` WHERE `orderDeliveryStatusID` =  1 ");
  while($rows = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $rowcount = $stmt ->rowCount();

    $orderDeliveryStatusID = $rows['orderDeliveryStatusID'];
    $orderPaymentStatusID = $rows['orderPaymentStatusID'];
    $orderCustomerID = $rows['orderCustomerID'];
    $orderUserCartID = $rows['orderUserCartID'];
    
    $stmts = $admin -> ret("SELECT * FROM `deliveryStatus` where `deliveryStatusID` = '$orderDeliveryStatusID'");
    $row = $stmts -> fetch(PDO::FETCH_ASSOC);

    $stmtp = $admin -> ret("SELECT * FROM `paymentStatus` where `paymentStatusID` = '$orderPaymentStatusID'");
    $rowp = $stmtp -> fetch(PDO::FETCH_ASSOC);

    $stmtu = $admin -> ret("SELECT * FROM `userCart` where `userCartID` = '$orderUserCartID'");
    $rowu = $stmtu -> fetch(PDO::FETCH_ASSOC);

    $animalID = $rowu['userCartAnimalID'];
    $birdID = $rowu['userCartBirdID'];
    $productID = $rowu['userCartProductID'];

    if($animalID != 0){
        $stmta = $admin -> ret("SELECT * FROM `animal` where `animalID` = '$animalID'");
        $rowa = $stmta -> fetch(PDO::FETCH_ASSOC);

        $animalBreedID = $rowa['animalBreedID'];

        $stmtb = $admin -> ret("SELECT * FROM `animalBreed` where `animalBreedID` = '$animalBreedID'");
        $rowb = $stmtb -> fetch(PDO::FETCH_ASSOC);

        $name = $rowb['animalBreedName'];
    }

    if($birdID != 0){
        $stmta = $admin -> ret("SELECT * FROM `bird` where `birdID` = '$birdID'");
        $rowaz = $stmta -> fetch(PDO::FETCH_ASSOC);

        $birdCategoryID = $rowaz['birdCategoryID'];

        $stmtb = $admin -> ret("SELECT * FROM `birdCategory` where `birdCategoryID` = '$birdCategoryID'");
        $rowb = $stmtb -> fetch(PDO::FETCH_ASSOC);


        $name = $rowb['birdCategoryName'];
    }

    if($productID != 0){
        $stmta = $admin -> ret("SELECT * FROM `product` where `productID` = '$productID' ");
        $rowa = $stmta -> fetch(PDO::FETCH_ASSOC);
        $name = $rowa['productName'];
    }

?>
  <tr>
    <td><?php echo $rows['orderID'] ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $rows['orderDate'] ?></td>
    <td><?php echo $rowp['paymentStatusName'] ?>
      <?php if( $rowp['paymentStatusID'] == 1){ ?>
      <a class="btn btn-success btn-sm" href="admincontroller/manage-order-detail.php?paymentID=<?php echo $rows['orderID'] ?>">Paid </a>
    <?php } ?>
    </td>
    <td><?php echo $row['deliveryStatusName'] ?>
      <?php if( $rowp['paymentStatusID'] != 1){ ?>
      <a class="btn btn-success btn-sm" href="admincontroller/manage-order-detail.php?deliveryID=<?php echo $rows['orderID'] ?>">Delivered </a>
    <?php } ?>
    </td>
    <td><a class="btn btn-primary btn-sm" href="view-order-detail.php?orderID=<?php echo $rows['orderID'] ?>">DETAILS </a></td>
  </tr>
 
  <?php
}
    
  ?>
  <?php
        if ($rowcount == 0) {
                            ?>
                            <tr>
                                <td colspan="100%" class="alert alert-danger text-center">
                                    No records
                                </td>
                            </tr>
                        <?php } ?>
  </tbody>
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
