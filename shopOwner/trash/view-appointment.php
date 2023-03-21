<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }

    if(isset($_GET['appointmentID'])){
      $appointmentID = $_GET['appointmentID'];
    }
    elseif(isset($_SESSION['appointmentID'])){
      $appointmentID = $_SESSION['appointmentID'];
    }
    else{
      header("location:manage-appointments.php");
    }
    
    $stms = $admin->ret("SELECT * FROM `appointment` WHERE `appointmentID` = '$appointmentID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    $appointmentCategoryID = $row['appointmentCategoryID'];
    $appointmentSessionID = $row['appointmentSessionID'];
    $appointmentStatusID = $row['appointmentStatusID'];

    $stmt = $admin->ret("SELECT * FROM `appointmentCategory` WHERE `appointmentCategoryID` = '$appointmentCategoryID'");
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmtses = $admin->ret("SELECT * FROM `appointmentSession` WHERE `appointmentSessionID` = '$appointmentSessionID'");
    $rowses = $stmtses->fetch(PDO::FETCH_ASSOC);

    $stmtst = $admin->ret("SELECT * FROM `appointmentStatus` WHERE `appointmentStatusID` = '$appointmentStatusID'");
    $rowst = $stmtst ->fetch(PDO::FETCH_ASSOC);

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
            <h1 class="m-0">View Appointment Details </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View Appointments </li>
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
      <td><?php echo $row['appointmentFirstName'] ?>&nbsp;<?php echo $row['appointmentSecondName'] ?></td>
    </tr>
    <tr>
      <td scope="col">Email</td>
      <td><?php echo $row['appointmentEmail'] ?></td>
    </tr>
    <tr>
      <td scope="col">Category</td>
      <td><?php echo $rows['appointmentCategoryName'] ?></td>
    </tr>
    <tr>
      <td scope="col">session</td>
      <td><?php echo $rowses['appointmentSessionSlot'] ?></td>
    </tr>
    <tr>
      <td scope="col">Phone</td>
      <td><?php echo $row['appointmentBookedDate'] ?></td>
    </tr>
    <tr>
      <td scope="col">Phone</td>
      <td><?php echo $row['appointmentPhone'] ?></td>
    </tr>
    
    <tr>
      <td scope="col">Registered On</td>
      <td><?php echo $row['appointmentRegisterDate'] ?></td>
    </tr>
    <tr>
      <td scope="col">Position</td>
      <td><?php echo $rowst['appointmentStatusName'] ?></td>
    </tr>
    
      <td scope="col">Action</td>
      <td>
        <?php 
          if($appointmentStatusID < 2 ){ 
            ?>
        <a class="btn btn-success btn-sm" href="admincontroller/manage-appointment.php?acceptAppointmentID=<?php echo $row['appointmentID'] ?>">Accept</a>
        <a class="btn btn-danger btn-sm" href="admincontroller/manage-appointment.php?rejectAppointmentID=<?php echo $row['appointmentID'] ?>">Reject</a>
           <?php } ?>

        

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
</bird