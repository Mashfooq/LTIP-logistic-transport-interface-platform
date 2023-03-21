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
   <?php include 'include/links.php'; ?>
   <script type="text/javascript">
  var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  
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
            <h5 class="m-0">Manage Completed Order</h5>
          </div>
        </div>
        <div class="row mb-2">
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
            </ol>
          </div>
          <div class="col-sm-6">
            <!-- Button trigger modal -->
<span class="btn btn-primary btn-sm float-right mr-3" data-toggle="modal" data-target="#exampleModal" >Send Request</span>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Request</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                              </div>

                              <div class="modal-body">
                                <form action="admincontroller/manage-request.php" enctype="multipart/form-data" method="POST">
                                  <div class="row form-group" >
                                    <div class="col-md-12" >
                                        <label class=" control-label" > Request Date </label> 
                                        <!-- <input type="date" placeholder="Set date" required class="form-control" name="requestDate" id="date_picker" > -->
                                        <input id="date_picker" type="date" placeholder="Set date" required class="form-control" name="requestDate">
          <script language="javascript">
              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth() + 1).padStart(2, '0');
              var yyyy = today.getFullYear();

              today = yyyy + '-' + mm + '-' + dd;
              $('#date_picker').attr('min',today);
          </script>
                                    </div>
                                    <div class="col-md-12" >
                                        <label class=" control-label" > Request Time </label> 
                                        <input type="time" placeholder="Set time" required class="form-control" name="requestTime" id="">
                                    </div>
                                    <div class="col-md-12" >
                                        <label class=" control-label" > Destination </label> 
                                        <textarea placeholder="Enter Destination" required class="form-control" name="requestDestination" id=""></textarea>
                                    </div>
                                    <div>
                                      <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">
                                    </div>
                                  </div>

                                  <div class="modal-footer">
                                        <input type="submit"  name="addRequest" value="Send Request" class="btn btn-success">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
    </div>


            <!-- /.col -->
        </div><!-- /.row -->

        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Request Number</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Destination</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

<?php 
$userID = $_SESSION['userID'];
  $stmt = $admin -> ret("SELECT * FROM `request` WHERE `requestUserID` = '$userID' AND `requestStatusID` = 6  ");
  while($rows = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $requestStatusID = $rows['requestStatusID'];

    $stmts = $admin -> ret("SELECT * FROM `requestStatus` where `requestStatusID` = '$requestStatusID'");
    $row = $stmts -> fetch(PDO::FETCH_ASSOC);

?>
  <tr>
    <td><?php echo $rows['requestID'] ?></td>
    <td><?php echo $rows['requestName'] ?></td>
    <td><?php echo $rows['requestPhone'] ?></td>
    <td><?php echo $rows['requestDate'] ?></td>
    <td><?php echo $rows['requestTime'] ?></td>
    <td><?php echo $rows['requestDestination'] ?></td>
    <td><?php echo $row['requestStatusTitle'] ?></td>
  </tr>
 
  <?php
}
    
  ?>
 
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
