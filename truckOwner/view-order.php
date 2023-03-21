<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();


if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}

if(!(isset($_GET['orderID']))){
header("location:manage-order.php");
}
$orderID = $_GET['orderID'];
$stms= $admin->ret("SELECT * FROM `orderDetail` WHERE `orderDetailID` = '$orderID'");
$rows= $stms->fetch(PDO::FETCH_ASSOC);

$orderRequestID = $rows['orderRequestID'];
$driverID = $rows['orderDriverID'];
$orderStatusID = $rows['orderStatusID'];

$stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
$rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

$stsh =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID' ");
$rosh =$stsh ->fetch(PDO::FETCH_ASSOC);

$shopUserID = $rowsh['requestUserID'];
$stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
$rowh =$stmh ->fetch(PDO::FETCH_ASSOC);

$shopEmail = $rowh['userEmail'];
    $stme =$admin ->ret("SELECT * FROM `shopDetail` WHERE `shopEmail` = '$shopEmail' ");
    $rowe =$stme ->fetch(PDO::FETCH_ASSOC);

$stmes =$admin ->ret("SELECT * FROM `orderStatus` WHERE `orderStatusID` = '$orderStatusID' ");
    $rowes =$stmes ->fetch(PDO::FETCH_ASSOC);


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
                                <h4 class="m-0 font-weight-bold text-primary"><a href="index.php">HOME</a> / <a href="manage-order.php">MANAGE ORDER</a> / VIEW</h4>
                        </div>
                        <div class="card-body">
                            <center>
                                <span  style="margin-bottom:100px;padding:10px 30px;background-color: #21468b;color: whitesmoke;width: 600px;">ORDER DETAILS</span>
                            </center>
                            <div class="table-responsive mt-3" >
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                        <thead>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">ORDER</th>
                                <td style="font-size: 1.4em;"><?php echo $rowes['orderStatusName'] ?></td>
                            </tr>
                        </thead>
                    </table>

                            <center>
                                <span  style="margin-bottom:100px;padding:10px 30px;background-color: #21468b;color: whitesmoke;width: 600px;">REQUEST DETAILS</span>
                            </center>
                            <div class="table-responsive mt-3" >
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                        <thead>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">Name</th>
                                <td style="font-size: 1.4em;"><?php echo $rowsh['requestName'] ?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">CONTACT</th>
                                <td style="font-size: 1.4em;"><?php echo $rowsh['requestPhone'] ?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">DATE</th>
                                <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">DATE</th>
                                <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">TIME</th>
                                <td style="font-size: 1.4em;"><?php echo $rowsh['requestTime'];?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;">DROP LOCATION</th>
                              <td style="font-size: 1.4em;"><?php echo $rowsh['requestDestination'];  ?></td>
                            
                            </tr>
                        </thead>
                    </table>

                        <center>
                                <span  style="margin-bottom:100px;padding:10px 30px;background-color: #21468b;color: whitesmoke;width: 600px;">SHOP DETAILS</span>
                            </center>
                            <div class="table-responsive mt-3" >
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                        <thead>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">DATE</th>
                                <td style="font-size: 1.4em;"><?php echo $rowe['shopName'] ?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">TIME</th>
                                <td style="font-size: 1.4em;"><?php echo $rowe['shopEmail'];?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;">DROP LOCATION</th>
                              <td style="font-size: 1.4em;"><?php echo $rowe['shopPhone'];  ?></td>
                            
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;">DROP LOCATION</th>
                              <td style="font-size: 1.4em;"><?php echo $rowe['shopAddress'];  ?></td>
                            
                            </tr>
                        </thead>
                    </table>

                        <center>
                                <span  style="margin-bottom:100px;padding:10px 30px;background-color: #21468b;color: whitesmoke;width: 600px;">DRIVER DETAILS</span>
                            </center>
                            <div class="table-responsive mt-3" >
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                        <thead>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">DATE</th>
                                <td style="font-size: 1.4em;"><?php echo $rosh['driverName'] ?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">TIME</th>
                                <td style="font-size: 1.4em;"><?php echo $rosh['driverEmail'];?></td>
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;">DROP LOCATION</th>
                              <td style="font-size: 1.4em;"><?php echo $rosh['driverPhone'];  ?></td>
                            
                            </tr>
                            <tr >
                              <th scope="col" style="background-color: #21468b;color: whitesmoke;">DROP LOCATION</th>
                              <td style="font-size: 1.4em;"><?php echo $rosh['driverAddress'];  ?></td>
                            
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
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