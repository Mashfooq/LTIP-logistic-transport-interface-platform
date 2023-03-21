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
            <h1 class="m-0">Appointments </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Appointments </li>
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
							<th scope="col"> Name</th>
							<th scope="col"> Phone</th>
							<th scope="col"> Email</th>
							<th scope="col">Address</th>
							<th scope="col">Service</th>
							<th scope="col">Date</th>
							<th scope="col">Time</th>
							<th scope="col">Status</th>
							<th scope="col">Complete Status</th>
							<th width="250" scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
					  <?php
          $stmt = $admin -> ret("SELECT * FROM `apoint` ORDER BY `ap_id` DESC");
          $i = 0;
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
         
        ?>
							<td><?= ++$i  ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['phone'] ?></td>
							<td><?= $row['email'] ?></td>
							<td><?= $row['address'] ?></td>
							<td><?= $row['service'] ?></td>
							<td><?= $row['date'] ?></td>
							<td><?= $row['time']  ?></td>
							<td><?= $row['stutus']?></td>
							<td>
                           <?php
                                if($row['stutus'] == "Completed"){ ?>
                                    <button class="btn btn-success">Completed</button>
                                <?php }else{ ?>
                                         <a href="app.php?id=<?= $row['ap_id']?>" class="btn btn-warning">Complete</a>
                            
                               <?php }
                            ?>
                            </td>
							<td><a href="../Controller/admin/delete.php?dltappp=<?= $row['ap_id']; ?>"><button name="dlt" class="btn btn-danger">DELETE</button></a></td>
   
						</tr>
						
						<?php
							}
						?>
						</tbody>
                        <?php 
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $astmt = $admin -> cud("UPDATE `apoint` SET `stutus` = 'Completed' WHERE `apoint`.`ap_id` = '$id'","saved");
                                $admin -> redirect('app');
                            }
                        ?>
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
