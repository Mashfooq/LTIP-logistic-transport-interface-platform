<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();


if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}

$id = $_SESSION["userID"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'include/links.php'; ?>
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>

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
                <h1 class="m-0">Dashboard </h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard </li>
                                  

                

                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fa fa-share-alt"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">REQUEST SENT</span>
                    <span class="info-box-number">
                      <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `request`");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              
              <!-- /.col -->

              <!-- fix for small devices only -->

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-comments"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">REQUEST PENDING</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `request` WHERE `requestStatusID` = 1 ");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-comments"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">REQUEST ACCEPTED</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `request` WHERE `requestStatusID` = 2");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">REQUEST COMPLETED</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `request` WHERE `requestStatusID` = 6");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
              <!-- /.col -->
              
                
              

            </div>
            <!-- /.row -->
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
