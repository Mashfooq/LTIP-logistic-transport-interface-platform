  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php 
                                    $id = $_SESSION["userID"];

                                    $stmt = $admin -> ret("SELECT * FROM `users` WHERE `userID` = '$id' " );

                                    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

                                    ?>
    <a href="index.php" class="brand-link">
      <img src="dist/img/admin.png" alt="<?php echo $row['userName']; ?>" class="brand-image  elevation-3">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <span class="brand-text font-weight-light" style="color: orange;font-size: x-large;font-family: fantasy;">
            
                                    <?php echo $row['userName']; ?></span>

          </span>
        </div>
      </div>

 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="nav-icon  fa fa-share-alt"></i>
                    <span>Request's</span>
                </a>
                
                <div id="collapseOrder" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white collapse-inner ">
                        <a href="manage-order-detail.php" class="nav-link">
                        <i class="nav-icon  fa fa-pencil-square-o"></i>
                        <p>
                          Manage Request's
                        </p>
                      </a>
                    </div>
                    <div class="bg-white collapse-inner ">
                        <a href="manage-pending-order.php" class="nav-link">
                        <i class="nav-icon  fa fa-pencil-square-o"></i>
                        <p>
                          Pending Request
                        </p>
                      </a>
                    </div>
                    <div class="bg-white collapse-inner ">
                        <a href="manage-completed-order.php" class="nav-link">
                        <i class="nav-icon  fa fa-pencil-square-o"></i>
                        <p>
                          Completed Request
                        </p>
                      </a>
                    </div>
                    <div class="bg-white collapse-inner ">
                        <a href="manage-cancelled-order.php" class="nav-link">
                        <i class="nav-icon  fa fa-pencil-square-o"></i>
                        <p>
                          Cancelled Request
                        </p>
                      </a>
                    </div>
                </div>
              </li>
              
              <li class="nav-item">
                <a href="admincontroller/logout.php" class="nav-link">
                  <i class="nav-icon  fa fa-sign-out"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li> 


          <!-- <li class="nav-item">
            <a href="procat.php" class="nav-link">
              <i class="nav-icon  fa fa-pencil-square-o"></i>
              <p>
                Product Category
              
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="addproduct.php" class="nav-link">
              <i class="nav-icon  fa fa-plus-circle"></i>
              <p>
                 Add Product
              
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="viewproduct.php" class="nav-link">
              <i class="nav-icon fa fa-eye"></i>
              <p>
                 View Products
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="app.php" class="nav-link ">
              <i class="nav-icon fa fa-map"></i>
              <p>
                Appointments
              </p>
            </a>
           
          </li>
            
             <li class="nav-item">
            <a href="order.php" class="nav-link">
              <i class="nav-icon 	fa fa-cart-plus"></i>
              <p>
                 Orders 
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="customer.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Customers 
              </p>
            </a>
          </li>
                <li class="nav-item">
            <a href="payment.php" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                 Payments
              </p>
            </a>
          </li>
          
            
             <li class="nav-item">
            <a href="queries.php" class="nav-link">
              <i class="nav-icon fa fa-comments"></i>
              <p>
                Queries
              </p>
            </a>
          </li> 
         
           


         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitis"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="nav-icon  fa fa-plus-circle"></i>
                    <span>Products</span>
                </a>
                <div id="collapseUtilitis" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white collapse-inner ">
                        <a href="procat.php" class="nav-link">
                        <i class="nav-icon  fa fa-pencil-square-o"></i>
                        <p>
                          Manage Categories
                        </p>
                      </a>
                    </div>
                    <div class="bg-white collapse-inner ">
                      <a href="procat.php" class="nav-link">
                        <i class="nav-icon  fa fa-pencil-square-o"></i>
                        <p>
                          Manage Products
                        </p>
                      </a>
                    </div>
                </div>
              </li> -->