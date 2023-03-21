<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();


if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}

// session_destroy();

// unset($_SESSION["a_id"]);
$blogID = $_GET['blogID'];
$stms =$admin ->ret("SELECT * FROM `blog` WHERE `blogID` = '$blogID'");
$rows=$stms ->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../user/css/style.css">
    

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
<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-left">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Update Blog</h1>
                                    </div>
                                    <form action="admincontroller/manage-blog.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputText" name="blogName"
                                                placeholder="Enter Blog Title..." value="<?php echo $rows['blogName']  ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputText" name="blogAuthor"
                                                placeholder="Enter Blog Author..." value="<?php echo $rows['blogAuthor']  ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputText" name="blogPosition"
                                                placeholder="Enter Blog Position..." value="<?php echo $rows['blogPosition']  ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control form-control-user"
                                                id="exampleInputText" name="blogDiscription"
                                                placeholder="Enter Discription..."   required ><?php echo $rows['blogDiscription']  ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <img src="admincontroller/blogThumb/<?php echo $rows['blogThumb']  ?>" height="100px" max-width="200px">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control form-control-user"
                                                id="exampleInputText" name="Image" aria-describedby="emailHelp"
                                                placeholder="choose image Name..." >
                                        </div>
                                        <input type="hidden" name="blogImg" value="<?php echo $rows['blogImg']  ?>">
                                        <input type="hidden" name="blogID" value="<?php echo"$blogID" ?>">
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