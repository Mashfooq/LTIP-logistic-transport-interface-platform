<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }

    if(isset($_GET['sellAnimalID'])){
      $sellAnimalID = $_GET['sellAnimalID'];
    }
    else{
      header("location:manage-buy-animal.php");
    }
    
    $stms = $admin->ret("SELECT * FROM `sellAnimal` WHERE `sellAnimalID` = '$sellAnimalID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    $userID = $row['userID'];
    $animalCategoryID = $row['sellAnimalCategoryID'];
    $animalBreedID = $row['sellAnimalBreedID'];
    $sellAnimalStatusID = $row['sellAnimalStatusID'];
    $sellAnimalPrice = $row['sellAnimalPrice'];


    $stmtu = $admin->ret("SELECT * FROM `users` WHERE `userID` = '$userID'");
    $rowsu = $stmtu->fetch(PDO::FETCH_ASSOC);


    $stmtc = $admin->ret("SELECT * FROM `animalCategory` WHERE `animalCategoryID` = '$animalCategoryID'");
    $rowsc = $stmtc->fetch(PDO::FETCH_ASSOC);

    $stmtb = $admin->ret("SELECT * FROM `animalBreed` WHERE `animalBreedID` = '$animalBreedID'");
    $rowsb = $stmtb->fetch(PDO::FETCH_ASSOC);

    $stmts = $admin->ret("SELECT * FROM `sellAnimalStatus` WHERE `sellAnimalStatusID` = '$sellAnimalStatusID'");
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
            <h1 class="m-0">View Sell Animal Detail </h1>
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
      <td><?php echo $rowsc['animalCategoryName'] ?></td>
    </tr>
    
    <tr>
      <td scope="col">Breed</td>
      <td><?php echo $rowsb['animalBreedName'] ?></td>
    </tr>
    <tr>
      <td scope="col">Image</td>
      <td><img src="../user/usercontroller/animalImage/<?php echo $row['sellAnimalImage']  ?>" height="100px" max-width="200px"></td>
    </tr>
    <tr>
      <td scope="col">Price</td>
      <td><?php echo $row['sellAnimalPrice'] ?>/-</td>
    </tr>
    <tr>
      <td scope="col">Description</td>
      <td><?php echo $row['sellAnimalDiscription'] ?></td>
    </tr>
    <tr>
      <td scope="col">Height</td>
      <td><?php echo $row['sellAnimalHeight'] ?></td>
    </tr>
    <tr>
      <td scope="col">Weight</td>
      <td><?php echo $row['sellAnimalWeight'] ?></td>
    </tr>
    <tr>
      <td scope="col">Age</td>
      <td><?php echo $row['sellAnimalAge'] ?></td>
    </tr>
    <tr>
    <tr>
      <td scope="col">Fur Colour</td>
      <td><?php echo $row['sellAnimalFur'] ?></td>
    </tr>
    <tr>
      <td scope="col">Status</td>
      <td><?php echo $rowss['sellAnimalStatusName'] ?></td>
    </tr>
    <tr>
      <td scope="col">Action</td>
      <td>
        <?php 
          if($sellAnimalStatusID < 2 ){ 
            ?>
        <a class="btn btn-success btn-sm" href="admincontroller/manage-buy-animal.php?acceptSellAnimalID=<?php echo $row['sellAnimalID'] ?>">Accept</a>
        <a class="btn btn-danger btn-sm" href="admincontroller/manage-buy-animal.php?rejectSellAnimalID=<?php echo $row['sellAnimalID'] ?>">Reject</a> 
          <?php } ?>
           <?php 
          if( $sellAnimalStatusID == 2  ){
          if ($sellAnimalStatusID != 5 ) {
            ?> 
        <a class="btn btn-success btn-sm" href="manage-UPI.php?sellAnimalID=<?php echo $row['sellAnimalID'] ?>">Pay Now</a>
      <?php  } }

          if($sellAnimalStatusID == 5 ){ 
            if($sellAnimalStatusID != 3){
            ?> 
        <a class="btn btn-success btn-sm" href="admincontroller/manage-buy-animal.php?deliveried=<?php echo $row['sellAnimalID'] ?>">Delivered</a>
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
<script>
var options = {
    "key": "rzp_test_1kJUPehOrSmSWJ", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $sellAnimalPrice*100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "The Pet's Emporium",
    "description": "Online Payment",
    "image": "https://incevio.com/storage/images/79Kx4XS1MriIJPYzX9uCSpf9pKt8vPr2ZslrmbQ1.png", 
    "id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert('Your payment is successful !!');
      window.location.href='manage-UPI.php'
    },
    "prefill": {
        "name": "<?php
         echo $rowsu['userName']; ?>",
        "email": "<?php echo $rowsu['userEmail']; ?>",
        "contact": "9288837298"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

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
