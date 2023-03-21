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
                  <span class="info-box-icon bg-info elevation-1"><i class="fa fa-cog"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Orders</span>
                    <span class="info-box-number">
                      <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `orderDetail`");
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
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Cart</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `cart`");
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
                    <span class="info-box-text">Reviews</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `review`");
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
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-pencil-square-o"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pet Sellers</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `sellAnimal`");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);

                      $stmts = $admin -> ret("SELECT COUNT(*) FROM `sellBird`");
                      $rows = $stmts -> fetch(PDO::FETCH_ASSOC);
                      $num1 = implode($row);
                      $num2 = implode($rows);
                      $num3 = $num1 + $num2;
                      echo $num3;
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
            <!-- /.row -->

          

            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <div class="col-md-8">
                <!-- MAP & BOX PANE -->
               
                <!-- /.card -->
                <div class="row">

                <div class="col-md-6">
     <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="fa fa-tag"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Animals</span>
                    <span class="info-box-number"><?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `animal`");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
             
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-danger">
                  <span class="info-box-icon"><i class="fa fa-dashboard"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Birds</span>
                    <span class="info-box-number"><?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `users` WHERE `userGroup` = 2");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number"><?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `Product`");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                      echo implode($row);
                      ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </div>
                  
                  <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Latest Members</h3>

                        <div class="card-tools">
                       
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <ul class="users-list clearfix">
                        <?php
                        $stmt = $admin -> ret("SELECT * FROM `users` WHERE `userGroup` = 2 ORDER BY `userID` DESC LIMIT 16");
                        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                        ?>

                          <li>
                            <a class="users-list-name" href="#"><?= $row['userName']?></a>
                            <span class="users-list-date"><?php echo $row['userEmail'] ; ?></span>
                          </li>

                          <?php
                          }
                          ?>
                         
                        </ul>
                        <!-- /.users-list -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer text-center">
                        <a href="#">View All Users</a>
                      </div>
                      <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Orders</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Payment Status</th>
                          <th>Delivery Status</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $stmt = $admin -> ret("SELECT * FROM `orderDetail` ");
                              while($rows = $stmt -> fetch(PDO::FETCH_ASSOC)){
                                $rowcount = $stmt ->rowCount();

                                $orderDeliveryStatusID = $rows['orderDeliveryStatusID'];
                                $orderPaymentStatusID = $rows['orderPaymentStatusID'];
                                $orderCustomerID = $rows['orderCustomerID'];
                                $orderUserCartID = $rows['orderUserCartID'];
                                
                                $stmts = $admin -> ret("SELECT * FROM `deliveryStatus` where `deliveryStatusID` = '$orderDeliveryStatusID'");
                                $row = $stmts -> fetch(PDO::FETCH_ASSOC);

                                $stmtp = $admin -> ret("SELECT * FROM `paymentStatus` where `paymentStatusID` = '$orderPaymentStatusID'");
                                $rowp = $stmtp -> fetch(PDO::FETCH_ASSOC);

                                $stmto = $admin -> ret("SELECT * FROM `users` where `userID` = '$orderCustomerID'");
                                $rowo = $stmto -> fetch(PDO::FETCH_ASSOC);

                          ?>

                        <tr>
                          <td><?php echo $rows['orderID'] ?></td>
                          <td><?php echo $rowo['userName'] ?></td>
                          <td><?php echo $rowp['paymentStatusName'] ?></td>
                          <td><?php echo $row['deliveryStatusName'] ?></td>
                           
                        </tr>
                      <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <a href="manage-order-detail.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->  






              </div>
              <!-- /.col -->

              <div class="col-md-4">
                <!-- Info Boxes Style 2 -->

                <!-- PRODUCT LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recently Added Products</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">


                  <?php
                        $stmt = $admin -> ret("SELECT * FROM `product` ORDER BY `productID` DESC LIMIT 4");
                        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="admincontroller/productImage/<?php echo $row['productImage'] ?>" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title"><?= $row['productName']?>
                            <span class="badge badge-warning float-right"><?php echo  $row['productSellingPrice']; echo " .00/-" ?></span></a>
                          <span class="product-description">
                           <?= $row['productDescription']?>
                          </span>
                        </div>
                      </li>
                        <?php
                          }
                        ?>


                      <!-- /.item -->
                    
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="manage-product.php" class="uppercase">View All Products</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->

              <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
              

                <!-- Animal LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recently Added Animal</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">


                  <?php
                        $stmt = $admin -> ret("SELECT * FROM `animal` ORDER BY `animalID` DESC LIMIT 4");
                        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                          $animalBreedID = $row['animalBreedID'];

                        $stmts = $admin -> ret("SELECT * FROM `animalBreed` WHERE `animalBreedID` = '$animalBreedID'");
                        $rows = $stmts -> fetch(PDO::FETCH_ASSOC); 
                        ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="admincontroller/animalImage/<?php echo $row['animalImage'] ?>" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title"><?= $rows['animalBreedName']?>
                            <span class="badge badge-warning float-right"><?php echo  $row['animalSellingPrice']; echo " .00/-" ?></span></a>

                          <div class="card-body p-0">
                            <div class="table-responsive">
                              <table class="table m-0">
                                <thead>
                                <tr>
                                  <th>Height</th>
                                  <th>Weight</th>
                                  <th>Age</th>
                                  <th>Fur</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                  <th><?= $row['animalHeight']?></th>
                                  <th><?= $row['animalWeight']?></th>
                                  <th><?= $row['animalAge']?></th>
                                  <th><?= $row['animalFur']?></th>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </li>
                        <?php
                          }
                        ?>


                      <!-- /.item -->
                    
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="manage-animal.php" class="uppercase">View All Animal</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <!-- Info Boxes Style 2 -->


                <!-- Bird LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recently Added Birds</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">


                  <?php
                        $stmt = $admin -> ret("SELECT * FROM `bird` ORDER BY `birdID` DESC LIMIT 4");
                        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                          $birdCategoryID = $row['birdCategoryID'];

                        $stmts = $admin -> ret("SELECT * FROM `birdCategory` WHERE `birdCategoryID` = '$birdCategoryID'");
                        $rows = $stmts -> fetch(PDO::FETCH_ASSOC); 
                        ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="admincontroller/birdImage/<?php echo $row['birdImage'] ?>" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title"><?= $rows['birdCategoryName']?>
                            <span class="badge badge-warning float-right"><?php echo  $row['birdSellingPrice']; echo " .00/-" ?></span></a>

                          <div class="card-body p-0">
                            <div class="table-responsive">
                              <table class="table m-0">
                                <thead>
                                <tr>
                                  <th>Weight</th>
                                  <th>Age</th>
                                  <th>feather colour</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                  <th><?= $row['birdWeight']?></th>
                                  <th><?= $row['birdAge']?></th>
                                  <th><?= $row['birdFeatherColour']?></th>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </li>
                        <?php
                          }
                        ?>


                      <!-- /.item -->
                    
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="manage-birds.php" class="uppercase">View All Birds</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
              

                
              

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
