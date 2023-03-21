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
                                <h4 class="m-0 font-weight-bold text-primary"><a href="index.php">HOME</a> / REQUEST</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="btn-group w-100 mb-2" role="group" aria-label="Basic example">
                                  <button id="pending-btn" type="button" class="btn btn-primary mr-2 " onclick="showContent('pending')">Pending</button>
                                  <button id="accept-btn" type="button" class="btn btn-success mr-2" onclick="showContent('accept')">Accept</button>
                                  <button id="decline-btn" type="button" class="btn btn-danger mr-2" onclick="showContent('decline')">Decline</button>
                                  <button id="cancelled-btn" type="button" class="btn btn-warning mr-2" onclick="showContent('cancelled')">Cancelled</button>
                                  <button id="delivered-btn" type="button" class="btn btn-info mr-2" onclick="showContent('delivered')">Delivered</button>
                                </div>

                            <div id="pending-content" class="content-block">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >CUSTOMER NAME</th>
                                            <th scope="col" >CONTACTS</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                            <th scope="col" class="text-center" style="width:210px;" >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `request` WHERE `requestStatusID` = 1 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $shopUserID = $rows['requestUserID'];
                                    $stmsh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestPhone'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDestination'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleAccept<?php echo $rows['requestID'] ?>">ACCEPT</button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $rows['requestID'] ?>">DECLINE</button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleAccept<?php echo $rows['requestID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select driver before accepting this order .</div>
                                                    <form action="admincontroller/manage-request.php" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group mx-3 ">
                                                            <select class="form-control form-control-user"
                                                                id="exampleInputText" name="truckDriverID" aria-describedby="emailHelp"
                                                             required>

                                                             <option value="" selected disabled>--Choose Driver--</option>
                                                             <?php 
                                                                $stmz =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverStatusID` = 2 ");
                                                                while ($rowz=$stmz ->fetch(PDO::FETCH_ASSOC)) {
                                                             ?>
                                                             <option value="<?php echo $rowz['driverID'] ?>"><?php echo $rowz['driverName'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="requestID" value="<?php echo $rows['requestID'] ?>">
                                                        <div class="form-group mx-3 ">
                                                            <button class="btn btn-success btn-user btn-block" type="submit" name="insert" >Accept</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="exampleModal<?php echo $rows['requestID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Decline" below if you want to decline this order .</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-danger" href="admincontroller/manage-request.php?declineID=<?php echo $rows['requestID'] ?>">Decline</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="accept-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >REQUEST NAME</th>
                                            <th scope="col" >CONTACTS</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `request` WHERE `requestStatusID` = 2 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $shopUserID = $rows['requestUserID'];
                                    $stmsh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestPhone'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDestination'] ?></td>
                                        </tr>
                                        
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="decline-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `request` WHERE `requestStatusID` = 3 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $shopUserID = $rows['requestUserID'];
                                    $stmsh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDestination'] ?></td>
                                            
                                        </tr>
                                        
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="cancelled-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `request` WHERE `requestStatusID` = 4 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $shopUserID = $rows['requestUserID'];
                                    $stmsh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDestination'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="delivered-content" class="content-block" style="display:none;">
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #21468b;color: whitesmoke;">
                                            <th scope="col" >SHOP NAME</th>
                                            <th scope="col" >DATE</th>
                                            <th scope="col" >TIME</th>
                                            <th scope="col" >DESTINATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stms =$admin ->ret("SELECT * FROM `request` WHERE `requestStatusID` = 6 ");
                                    while ($rows=$stms ->fetch(PDO::FETCH_ASSOC)) {

                                    $shopUserID = $rows['requestUserID'];
                                    $stmsh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$shopUserID' ");
                                    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4em;"><?php echo $rowsh['userName'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDate'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestTime'] ?></td>
                                            <td style="font-size: 1.4em;"><?php echo $rows['requestDestination'] ?></td>
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