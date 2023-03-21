<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();


if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}

if(!(isset($_GET['productID']))){
header("location:manage-product.php");
}
$productID = $_GET['productID'];
$stms= $admin->ret("SELECT * FROM `product` WHERE `productID` = '$productID'");
$rows= $stms->fetch(PDO::FETCH_ASSOC);
$categoryID = $rows['productCategoryID'];

$stm= $admin->ret("SELECT * FROM `categories` WHERE `categoryID` = '$categoryID'");
$row= $stm->fetch(PDO::FETCH_ASSOC);
$categoryName = $row['categoryName'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ababil - Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include"sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include"header.php" ?>
                <!-- End of Topbar -->
                <div>
                   <div class="card shadow mb-4"> 
                        <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary"><a href="index.php">HOME</a> / <a href="manage-product.php">MANAGE</a> / PRODUCTS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr >
                          <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">NAME</th>
                            <td style="font-size: 1.4em;"><?php echo $rows['productName'] ?></td>
                        </tr>
                        <tr >
                          <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">CATEGORY</th>
                            <td style="font-size: 1.4em;"><?php echo $categoryName;?></td>
                        </tr>
                        <tr >
                          <th scope="col" style="background-color: #21468b;color: whitesmoke;">IMAGE</th>
                          <td><img src="admincontroller/productImg/<?php echo $rows['productImage']  ?>" height="400px" max-width="500px"></td>
                        
                        </tr>
                        <tr >
                          <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">GRADE</th>
                            <td style="font-size: 1.4em;"><?php echo $rows['productGrade'] ?></td>
                        </tr>
                        <tr >
                          <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">POSITION</th>
                            <td style="font-size: 1.4em;"><?php echo $rows['productPosition'] ?></td>
                        </tr>
                        <tr >
                          <th scope="col" style="background-color: #21468b;color: whitesmoke;width: 150px;">DISCRIPTION</th>
                            <td style="font-size: 1.4em;"><?php echo $rows['productDiscription'] ?></td>
                        </tr>
                      </thead>
                  
                     
                    
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