<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();


if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}
if(!(isset($_GET['shopID']))){
header("location:manage-shop.php");
}
$shopID = $_GET['shopID'];

$stm1 =$admin ->ret("SELECT * FROM `shopDetail` WHERE `shopID` = '$shopID'");
$row1=$stm1 ->fetch(PDO::FETCH_ASSOC)
// session_destroy();

// unset($_SESSION["a_id"]);

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
                    <div>
                    <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary"><a href="index.php">HOME</a> / <a href="manage-products.php">MANAGE</a> / UPDATE</h4>
            </div>
<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-left">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Update Shop Details</h1>
                                    </div>
                                    <form action="admincontroller/manage-shop.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputText" name="shopName" aria-describedby="emailHelp"
                                                placeholder="Enter Shop Name..." value="<?php echo $row1['shopName']  ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputText" name="shopEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Shop Email..." value="<?php echo $row1['shopEmail']  ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputText" name="shopPhone" aria-describedby="emailHelp"
                                                placeholder="Enter Shop Phone..." value="<?php echo $row1['shopPhone']  ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control form-control-user" id="exampleInputText" name="shopAddress" aria-describedby="emailHelp"
                                                placeholder="Enter Shop Address..."  required><?php echo $row1['shopAddress']  ?></textarea>
                                        </div>
                                        <input type="hidden" name="shopID" value="<?php echo "$shopID" ?>">
                                        
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="update" >Update</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

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

</body>

</html>