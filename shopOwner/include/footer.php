<?php 
                                    $id = $_SESSION["userID"];

                                    $stmt = $admin -> ret("SELECT * FROM `users` WHERE `userID` = '$id' " );

                                    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

                                    ?>

 <footer class="main-footer">
    <strong> 2022 <a style="text-transform: uppercase" href="#"><?php echo $row['userName']; ?></a>.</strong>
     All Rights Reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>