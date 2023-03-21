<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner's login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <!-- <video  style="position:fixed;" autoplay muted width="100%" loop >
      <source src="../assets/img/1.mp4" type=video/mp4>
    </video> -->
    <img style="position:fixed;" src="dist/img/logi.jpg">
<div class="login-box">
  <!-- /.login-logo -->
  <!-- <div class="card card-outline card-primary"> -->
    
    <div class="card-body">

      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <form action="admincontroller/adminlogin.php" method="post">
        <div class="card-header text-center">
          <a href="" class="h2" style="color: whitesmoke;font-family: serif;"><b>WELCOME BACK</a>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" autofocus name="userEmail" placeholder="Enter Email-ID" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="userPassword" placeholder="Enter Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
       </div>
         <div class="input-group mb-3" style="margin-left:120px;">
            <button type="submit" name="login" class="btn btn-primary">Sign In</button>
          </div>
       </center>
       
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
