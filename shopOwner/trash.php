<div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-pencil-square-o"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">REQUEST COMPLETED</span>
                    <span class="info-box-number"> <?php
                      $stmt = $admin -> ret("SELECT COUNT(*) FROM `request`");
                      $row = $stmt -> fetch(PDO::FETCH_ASSOC);

                      echo implode($row);
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
              
