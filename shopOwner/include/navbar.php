 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
 <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div  id="google_translate_element"></div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link"data-target="#changepass" data-toggle="modal" href="#" role="button">
          <i class="fa fa-key" aria-hidden="true"></i> &nbsp; Change Password
        </a>
      </li> -->
    </ul>
  </nav>

                <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       <h4 class="modal-title" id="exampleModalLabel">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                      </div>
                      <div class="modal-body">
                        <form action="admincontroller/adminlogin.php" method="POST">
                          <div class="form-group">
                            <label for="name" class="control-label">Current Password :</label>
                             <input type="text" class="form-control" name="currentPass" id="" required>
                          </div>
                            <div class="form-group">
                            <label for="name" class="control-label">New Password :</label>
                             <input type="text" class="form-control" name="newPassword" id="" required>
                          </div>
                           <div class="form-group">
                            <label for="name" class="control-label">Confirm Password :</label>
                             <input type="text" class="form-control" name="confirmPassword" id="" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="changepass" value="Change Password" class="btn btn-success">
                          </div>
                         </form>
                      </div>
                      
                        
                    </div>
                  </div>
                </div>