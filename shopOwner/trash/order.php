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
            <h1 class="m-0">Orders </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Orders </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />


<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->
<thead><!-- thead Starts -->
<tr>
<th>#</th>
<th>Order ID</th>
<th>Name</th>
<th>Email-iD</th>
<th>Amount</th>
<th>Status</th>
<th>Ordered Date</th>
<th>View Details</th>
<th>Action</th>
</tr>
</thead><!-- thead Ends -->
<tbody><!-- tbody Starts -->
<?php
$i=0;
$pos = 0;
$stmt = $admin -> ret("SELECT * FROM `orders` ORDER BY `or_id` DESC");
while($row= $stmt -> fetch(PDO::FETCH_ASSOC)){
$i++;
?>
<tr>
<td><?= $i; ?></td>
<td><?= $row['or_id']; ?></td>
<td><?= $row['fname']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['total_ammount']; ?></td>
<td><?= $row['o_stutus']; ?></td>

<td><?= $row['o_date']; ?></td>
  <td><a href="vieworderdet.php?orderid=<?= $row['or_id']; ?>"><button name="dlt" class="btn btn-success">View Details</button></a></td>
  <td><a href="../Controller/admin/delete.php?dltorder=<?= $row['or_id']; ?>"><button name="dlt" class="btn btn-danger">DELETE</button></a></td>
</tr>
<?php 
$pos++;

} ?>
</tbody><!-- tbody Ends -->

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



    
<script>

function changestutus(id,pos) {

var stutus = document.getElementsByName("stutus")[pos].value;
window.location.href="../Controller/admin/stutus.php?id="+id+"&orderstutus="+stutus;

//window.location.href="checkout.php?id="+uid+"&ta="+totammount;

}

</script>

      
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
