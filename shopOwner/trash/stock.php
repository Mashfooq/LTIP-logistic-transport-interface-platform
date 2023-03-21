<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['uid'])){
	    $admin -> redirect('../admin/login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HENNA ON WAY</title>

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
            <h1 class="m-0">Stock </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Stock </li>
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
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Occasion</th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Quantity</th>
      <th scope="col">Added Date</th>
      <th width="100" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

<?php 
  $stmt = $admin -> ret("SELECT * FROM `products` ORDER BY `products`.`p_id` DESC");
  $i = 0;
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
      $pcid = $row['pc_id'];
      $ocid = $row['oc_id'];

      $astmt = $admin -> ret("SELECT * FROM `product_category` WHERE `pc_id` = '$pcid' ");
      $bstmt = $admin -> ret("SELECT * FROM `occasion` WHERE `oc_id` = '$ocid' ");

      $arow = $astmt -> fetch(PDO::FETCH_ASSOC);
      $brow = $bstmt -> fetch(PDO::FETCH_ASSOC);
?>
  <tr>

    <td><?= ++$i; ?></td>
    <td><img src="../Controller/admin/<?= $row['p_image']?>" height="50px" width="50px" alt=""></td>
    <td><?= $row['p_name']; ?></td>
    <td><?= $arow['pc_name']; ?></td>
    <td><?= $brow['oc_name'] ?></td>
    <td><?= $row['p_price'] ?></td>
    <td><?= $row['quantity'] ?></td>
    <td><?= $row['p_discount'] ?></td>
    <td><?= $row['p_date'] ?></td>
    <td><a href="proupdate.php?updtproduct=<?= $row['p_id']; ?>"><button name="dlt" class="btn btn-success">Update</button></a></td>
   
  </tr>
 
  <?php
    }
  ?>
  </tbody>
  	<?php
				if ($i == 0) {
                            ?>
                            <tr>
                                <td colspan="100%" class="alert alert-danger text-center">
                                    No records
                                </td>
                            </tr>
                        <?php } ?>
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
