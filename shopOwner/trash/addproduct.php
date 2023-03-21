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
            <h1 class="m-0">Add New product </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New product </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />

        <form action="../Controller/admin/add.php" enctype="multipart/form-data" method="POST">
        <!-- form-group Starts -->
          <div class="row form-group" >
            <label class=" control-label" > Product Name : </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-md-4" >
                    <input type="text" required placeholder="Enter Name" name="pname" class="form-control" id="">
                </div>&nbsp;&nbsp;&nbsp;



            <label class="control-label" > Product Category :  </label>&nbsp;
                <div class="col-md-4" >
                <select name="product_cat" required class="form-control" >
                    <option value=""> Select Product Category </option>
                    <?php
                    $stmt = $admin -> ret("SELECT * FROM `product_category`");
                    while ($row= $stmt -> fetch(PDO::FETCH_ASSOC)) {
                    ?><option value="<?php echo $row['pc_id'] ; ?>" ><?php echo $row['pc_name']; ?></option>
                    <?php } ?>
                </select>
                </div>
         </div>
        <!-- form-group Ends -->
        <hr>
         <!-- form-group Starts -->
          <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" > Product Price &nbsp;: </label> &nbsp;&nbsp;
                      <input type="number" placeholder="Enter Price" required class="form-control" name="price" id="">
                </div>

                <div class="col-md-3" >
                    <label class=" control-label" > Product Discount &nbsp;: </label> &nbsp;&nbsp;
                    <input type="number" placeholder="Enter Discount INR" required class="form-control" name="disc" id="">
                </div>

                <div class="col-md-3" >
                    <label class=" control-label" > Product Quantity &nbsp;: </label> &nbsp;&nbsp;
                    <input type="number" placeholder="Enter Quantity" required class="form-control" name="quant" id="">
                </div>
         </div>
        <!-- form-group Ends --> 

        <hr>

         <!-- form-group Starts -->
           <label class=" control-label" > Product Image &nbsp;: </label> &nbsp;&nbsp;
          <div class="row form-group" >
          
                <div class="col-md-3" >
                      <input type="file" required class="form-control" name="img1" id="">
                </div>
             
         </div>
        <!-- form-group Ends -->
         <br>
         <hr>

           <div class="col-md-6" >
                    <label for="message-text" class="control-label">Product Description :</label>
                <textarea name="prodesc" required placeholder="Enter Discription About Product"  rows="4" class="form-control" id="" cols="30" ></textarea>     
                </div>
                <input type="submit"  name="addpro" value="Add Product" class="btn btn-success ">
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
