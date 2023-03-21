<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['uid'])){
	    $admin -> redirect('../admin/login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HENNA ON WAY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
   

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
            <h1 class="m-0">Orders </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Orders </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />

        <div class="justify-content-center">
    <div class="card ">
      
        <div class="card-body">
            <div class="row justify-content-between mb-3">
                <div class="col-auto">
                    <h6 class="color-1 mb-0 change-color">Order Details</h6>
                </div>
               
            </div>
            <div class="">
            <?php
            $atprice = 0;
            $oid = $_GET['orderid'];
                    $stmt = $admin -> ret("SELECT * FROM `orders` WHERE `or_id` = '$oid'");
                    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                       $oid = $row['or_id'];
                       $fname = $row['fname'];
                       $lname = $row['lname'];
                       $email = $row['email'];
                       $add1 = $row['add1'];
                       $add2 = $row['add2'];
                       $district = $row['district'];
                       $zip = $row['zip'];
                       // $shipping_method = $row['shipping_method'];
                       $total_ammount = $row['total_ammount'];
                       $o_stutus = $row['o_stutus'];
                       $o_date = $row['o_date'];

                     $bstmt = $admin -> ret("SELECT * FROM `pending_order`  WHERE `o_id` = '$oid'");
                      while($brow = $bstmt -> fetch(PDO::FETCH_ASSOC)){ 
                       $pid = $brow['p_id'];
                       $att_id = $brow['att_id'];
                       $astmt = $admin -> ret("SELECT * FROM `products` WHERE `p_id` = '$pid' ");
                       $arow = $astmt -> fetch(PDO::FETCH_ASSOC);
                       $pcid = $arow['pc_id'];
                       // $ocid = $arow['oc_id'];
                        $cstmt = $admin -> ret("SELECT * FROM `product_category` WHERE `pc_id` = '$pcid' ");
                       $crow = $cstmt -> fetch(PDO::FETCH_ASSOC);
                     
                    ?>

                <div class="">
                    <div class="card ">
                        <div class="card-body">
                            <div class="media">
                                <div class="sq align-self-center "> <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="../Controller/admin/<?= $arow['p_image']?>" width="135" height="135" /> </div>
                                <div class="media-body my-auto text-right">
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto">
                                            <h6 class="mb-0"> <?= $fname;?></h6>
                                        </div>
                                        <div class="col my-auto"> <small>Category : <?= $crow['pc_name']?></small></div>
                                        <div class="col my-auto"> <small>Qty : <?= $brow['quantity']?></small></div>
                                       
                                    <?php
                                      if($att_id == "NULL"){ ?>
 <!-- <div class="col my-auto"> <small>Extra : NULL</small></div> -->
                                      
                                    <?php  }else{ 
                    $attstmt = $admin -> ret("SELECT * FROM `attribution` WHERE `at_id` = '$att_id'");
                    $attrow = $attstmt -> fetch(PDO::FETCH_ASSOC);
                   $atprice = $atprice + $attrow['v_price'];
                                      ?>
 <div class="col my-auto"> <small>Extra : <?= $attrow['variation']?> - <?= $attrow['v_price']?> /-</small></div>
                                      
                                   <?php    }
                                    ?>
                                      <div class="col my-auto">
                                            <h6 class="mb-0">&#8377;<?php echo $price =  $arow['p_price'] + $atprice - $arow['p_discount'] ; echo " .00/-" ?></h6>   
                                        </div>
                                    </div>
                                    <br>
                                        
                                    
                                </div>
                            </div>
                            <hr class="my-3 ">
                          
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                
                ?>


            </div>
     
          
            <div class="row invoice ">
                <div class="col">
                    <p class="mb-1"> Name of Customer &nbsp; : <?= $fname." ".$lname?></p>
                    <p class="mb-1">Email-ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                    <?= $email ?></p>
                    <p class="mb-1">Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $add1?></p>
                    <p class="mb-1">Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $add2?></p>
                    <p class="mb-1">District&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $district?></p>
                    <p class="mb-1">ZIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $zip?></p>
                    
                    <p class="mb-1">Ordered Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $o_date?></p>
                    <p class="mb-1">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $o_stutus?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="jumbotron-fluid">
                <div class="row justify-content-between ">
                    <div class="col-sm-auto col-auto my-auto"></div>
                    <div class="col-auto my-auto ">
                        <h5 class="mb-0 font-weight-bold">TOTAL AMOUNT</h5>
                    </div>
                    <div class="col-auto my-auto ml-auto">
                        <h4 class="display-3 ">&#8377; <?= $total_ammount + $atprice?></h4>
                    </div>
                </div>
                <div class="row mb-3 mt-3 mt-md-0">
                    <div class="col-auto border-line"> <small class="text-white">PAN:AA02hDW7E</small></div>
                   <div class="col-auto "><small class="text-white">GSTN:268FD07EXX </small> </div>
                </div>
                <small class="text-white">Total amount is including GST and if Total Amount is greater than 150 shipping charge will be added &#8377; 50 INR. </small>
            </div>
        </div>
    </div>
</div>


    


      
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
