<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(!isset($_SESSION['userID'])){
	    $admin -> redirect('../admin/login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>THE PET'S EMPORIUM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../user/css/style.css">
    
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
            <h4 class="m-0">Add New Animal </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New Animal </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> <hr />

        <form action="admincontroller/manage-animal.php" enctype="multipart/form-data" method="POST">
        <!-- form-group Starts -->
         <div class="row form-group" >
                <div class="col-md-3" >
                <label class="control-label" > Animal Category   </label>&nbsp;
                <select name="animalCategoryID" id="category" required class="form-control" >
                    <option value=""> Select Animal Category </option>
                </select>
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                <label class="control-label" > Animal Breed   </label>&nbsp;
                <select name="animalBreedID" id="subCategory" required class="form-control" >
                    <option value=""> Select Animal Breed </option>
                </select>
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" > Animal Position </label> 
                      <input type="number" placeholder="Enter Animal Position" required class="form-control" name="animalPosition" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Weight </label> 
                      <input type="number" placeholder="Enter Weight in kg" required class="form-control" name="animalWeight" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Height </label> 
                      <input type="number" placeholder="Enter Height in cm" required class="form-control" name="animalHeight" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Age </label> 
                      <input type="number" placeholder="Enter Age" required class="form-control" name="animalAge" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Fur </label> 
                      <input type="text" placeholder="Enter Fur colour" required class="form-control" name="animalFur" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                      <label class=" control-label" >Animal Image  </label> 
                      <input type="file" class="form-control" name="Image" id="">
                </div>
             
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Distribution Price  </label> 
                      <input type="number" placeholder="Enter Distribution Price" required class="form-control" name="animalDistributionPrice" id="">
                </div>
         </div>
         <div class="row form-group" >
                <div class="col-md-3" >
                         <label class=" control-label" >Animal Selling Price  </label> 
                      <input type="number" placeholder="Enter Selling Price" required class="form-control" name="animalSellingPrice" id="">
                </div>
         </div>

         <div class="row form-group" >
                <div class="col-md-3" >
                     <input type="submit"  name="addAnimal" value="Add Animal" class="btn btn-success ">
                </div>
         </div>
        </form>
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

<script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript">
  $(document).ready(function(){
    function loadData(type, category_id){
        $.ajax({
            url : "load-cs-animal.php",
            type : "POST",
            data: {type : type, id : category_id},
            success : function(data){
                if(type == "subData"){
                    $("#subCategory").html(data);
                }else{
                    $("#category").append(data);
                }
                
            }
        });
    }

    loadData();

    $("#category").on("change",function(){
        var category = $("#category").val();

        if(category != ""){
            loadData("subData", category);
        }else{
            $("#subCategory").html("");
        }

        
    })
  });
</script>


</body>
</html>
