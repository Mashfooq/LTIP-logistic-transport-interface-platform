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
                                <h4 class="m-0 font-weight-bold text-primary"><a href="index.php">HOME</a> / ORDER</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="btn-group w-100 mb-2" role="group" aria-label="Basic example">
                                  <button id="pending-btn" type="button" class="btn btn-primary mr-2 " onclick="showContent('pending')">Assigned</button>
                                  <button id="accept-btn" type="button" class="btn btn-success mr-2" onclick="showContent('accept')">Accepted</button>
                                  <button id="decline-btn" type="button" class="btn btn-danger mr-2" onclick="showContent('decline')">Declined</button>
                                  <button id="cancelled-btn" type="button" class="btn btn-warning mr-2" onclick="showContent('cancelled')">In Progress</button>
                                  <button id="delivered-btn" type="button" class="btn btn-info mr-2" onclick="showContent('delivered')">Delivered</button>
                                </div>

                            <div id="pending-content" class="content-block">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >DRIVER NAME</th>
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >CUSTOMER NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                            <th scope="col" class="text-center" style="width:150px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `orderDetail` WHERE `orderStatusID` = 2 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $orderRequestID = $rows['orderRequestID'];
                                    $driverID = $rows['orderDriverID'];

                                    $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

                                    $stsh =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID' ");
                                    $rosh =$stsh ->fetch(PDO::FETCH_ASSOC);

                                    $shopUserID = $rowsh['requestUserID'];
                                    $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowh =$stmh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rosh['driverName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDestination'] ?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-primary btn-sm" href="view-order.php?orderID=<?php echo $rows['orderDetailID'] ?>">View</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="accept-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >DRIVER NAME</th>
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >CUSTOMER NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                            <th scope="col" class="text-center" style="width:150px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `orderDetail` WHERE `orderStatusID` = 3 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $orderRequestID = $rows['orderRequestID'];
                                    $driverID = $rows['orderDriverID'];

                                    $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

                                    $stsh =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID' ");
                                    $rosh =$stsh ->fetch(PDO::FETCH_ASSOC);

                                    $shopUserID = $rowsh['requestUserID'];
                                    $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowh =$stmh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rosh['driverName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDestination'] ?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-primary btn-sm" href="view-order.php?orderID=<?php echo $rows['orderDetailID'] ?>">View</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="decline-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >DRIVER NAME</th>
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >CUSTOMER NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                            <th scope="col" class="text-center" style="width:150px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `orderDetail` WHERE `orderStatusID` = 4 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $orderRequestID = $rows['orderRequestID'];
                                    $driverID = $rows['orderDriverID'];

                                    $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

                                    $stsh =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID' ");
                                    $rosh =$stsh ->fetch(PDO::FETCH_ASSOC);

                                    $shopUserID = $rowsh['requestUserID'];
                                    $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowh =$stmh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rosh['driverName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDestination'] ?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-primary btn-sm" href="view-order.php?orderID=<?php echo $rows['orderDetailID'] ?>">View</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="cancelled-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >DRIVER NAME</th>
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >CUSTOMER NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                            <th scope="col" >ORDER STATUS</th>
                                            <th scope="col" class="text-center" style="width:150px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `orderDetail` WHERE `orderStatusID` > 4 AND `orderStatusID` <= 7 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $orderRequestID = $rows['orderRequestID'];
                                    $driverID = $rows['orderDriverID'];
                                    $orderStatusID = $rows['orderStatusID'];

                                    $st =$admin ->ret("SELECT * FROM `orderStatus` WHERE `orderStatusID` = '$orderStatusID' ");
                                    $ro =$st ->fetch(PDO::FETCH_ASSOC);

                                    $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

                                    $stsh =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID' ");
                                    $rosh =$stsh ->fetch(PDO::FETCH_ASSOC);

                                    $shopUserID = $rowsh['requestUserID'];
                                    $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowh =$stmh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rosh['driverName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDestination'] ?></td>
                                            <td style="font-size: 1.4em;"><center><span class="btn btn-warning btn-sm"><?php echo $ro['orderStatusName'] ?></span></center></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-primary btn-sm" href="view-order.php?orderID=<?php echo $rows['orderDetailID'] ?>">View</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="delivered-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >DRIVER NAME</th>
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >CUSTOMER NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                            <th scope="col" class="text-center" style="width:150px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `orderDetail` WHERE `orderStatusID` = 8 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $orderRequestID = $rows['orderRequestID'];
                                    $driverID = $rows['orderDriverID'];

                                    $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

                                    $stsh =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID' ");
                                    $rosh =$stsh ->fetch(PDO::FETCH_ASSOC);

                                    $shopUserID = $rowsh['requestUserID'];
                                    $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowh =$stmh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rosh['driverName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['requestDestination'] ?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-primary btn-sm" href="view-order.php?orderID=<?php echo $rows['orderDetailID'] ?>">View</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

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
    <script type="text/javascript">
    function showContent(id) {
      // Hide all content blocks
      var contentBlocks = document.getElementsByClassName("content-block");
      for (var i = 0; i < contentBlocks.length; i++) {
        contentBlocks[i].style.display = "none";
      }
      
      // Show the content block with the matching ID
      var content = document.getElementById(id + "-content");
      if (content) {
        content.style.display = "block";
      }
    }

    </script>

</body>

</html>