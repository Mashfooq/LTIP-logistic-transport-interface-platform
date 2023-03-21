<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();


if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include"include/links.php" ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include"include/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include"include/header.php" ?>
                <!-- End of Topbar -->
                <div>
                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary"><a href="index.php">HOME</a> / TRUCK<a class="btn btn-primary" style="margin-left: 70%;" href="add-truck.php">Add Truck</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >TRUCK NAME</th>
                                            <th scope="col" >REG NUMBER</th>
                                            <th scope="col" >DRIVER</th>
                                            <th scope="col" class="text-center" style="width:210px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                <?php
                $stms =$admin ->ret("SELECT * FROM `truckDetail`");
                while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {
                ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rows['truckName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['truckRegNumber'] ?></td>

                                            <?php 
                                                $driverID = $rows['truckDriverID'];
                                                $stm =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID'");
                                                $row=$stm ->fetch(PDO::FETCH_ASSOC); 
                                             ?>
                                            <td style="font-size: 1.4em;"><?php echo $row['driverName'] ?></td>
                                            <td>
                                            <a class="btn btn-info btn-sm" href="update-truck.php?truckID=<?php echo $rows['truckID'] ?>"  >EDIT</a> 

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $rows['truckID'] ?>">DELETE</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal<?php echo $rows['truckID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Delete" below if you want to delete this record .</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-danger" href="admincontroller/manage-truck.php?truckID=<?php echo $rows['truckID'] ?>">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        
                        <!-- /.container-fluid -->
                        </div>
                    <!-- End of Main Content -->
                    </div>
                <!-- End of Content Wrapper -->
                </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>