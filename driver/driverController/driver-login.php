<?php 
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

$con = mysqli_connect("localhost","root","","casadb");

if(isset($_POST['btnLogin']))
{
    $userEmail = mysqli_real_escape_string($con,$_POST['userEmail']);
    $userPassword = mysqli_real_escape_string($con,$_POST['userPassword']);

    $Email = $_POST['userEmail'];
    $password = $_POST['userPassword'];
    
    // select all the id and password from database where it matches current email
    $stmt = $admin->ret("SELECT * FROM `users` WHERE userEmail = '$Email' AND `userGroup` = 3 ") ;
    $row = $stmt ->fetch(PDO::FETCH_ASSOC);
    
    // count number of rows which has same email id
    $num = $stmt ->rowCount();
    //if ther is matching email in database then it execute following code
    if($num>0){
      
        $hashedpass = $row['userPassword'];
        $decode = base64_decode($hashedpass);
        // check whether current password and hashedpassword of corresponding email matches
        if($decode == $password){
           $email = $row['userEmail'];

            $stmts = $admin->ret("SELECT * FROM `driverDetail` WHERE `driverEmail` = '$email'") ;
            $rows = $stmts ->fetch(PDO::FETCH_ASSOC);

            $driverID = $rows['driverID'];

            $_SESSION['driverID'] = $driverID;
            $admin -> redirect('../index');
        }
        // if doesnot match
        else{
            echo "<script>
        alert('Your password is wrong !!');
        window.location.href='../login.php';
        </script>";
        }  
    }
    // if email is not exist in database
    else{
        echo "<script>
        alert('Your Email-ID is not Registered Please Rigester.');
        window.location.href='../login.php';
        </script>";
    }

}

if(isset($_POST['changepass']))
{

   // $currentPass = mysqli_real_escape_string($con,$_POST['currentPass']);

    $currentPass = $_POST['currentPass'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $userID = $_SESSION['userID'];

    // select all the id and password from database where it matches current email
    $stmt = $admin->ret("SELECT * FROM `users` WHERE userID = '$userID' ") ;
    
    // count number of rows which has same email id
    $num = $stmt ->rowCount();

    // fetch the details and organise in row 
    $row = $stmt ->fetch(PDO::FETCH_ASSOC);

    //if ther is matching email in database then it execute following code
    if($num>0){
      
        $hashedpass = $row['userPassword'];
        $decode = base64_decode($hashedpass);
        // check whether current password and hashedpassword of corresponding email matches
        if($decode == $currentPass){
           if($newPassword == $confirmPassword){
                $newhashedpass = base64_encode($newPassword);
                //update password
                $admin -> cud("UPDATE `users` SET `userPassword` = '$newhashedpass' WHERE `userID` = '$userID'","updated");
                echo "<script>
                alert('Password is updated !!');
                window.location.href='../login.php';
                </script>";
               // $admin ->redirect('../login'); 
           }
           else{
            echo "<script>
                alert('Confirm password doesnot match!!');
                window.location.href='../login.php';
                </script>";
            }  
        }
        // if doesnot match
        else{
            echo "<script>
            alert('Your current password is wrong !!');
            window.location.href='../login.php';
            </script>";
        }  
    }

}

// if(isset($_POST['signup']))
// {
// $userEmail = $_POST['userEmail'];
// $userPassword = $_POST['userPassword'];
// $userFirstName = $_POST['userFirstName'];
// $userLastName = $_POST['userLastName'];
// $userGroup = 2;

// $hashedpass = base64_encode($userPassword);

// $stmt = $admin -> ret("SELECT * FROM `users` WHERE `userEmail` = '$email' ");
// $row = $stmt -> fetch(PDO::FETCH_ASSOC);

// $num = $stmt -> rowCount();
// if( $num > 0 ){
//     echo"<script>alert('Your email id already exists!!');
//     window.location.href='../login.php';
//     </script>"; 

// }
// else{
        
//     $stm =$admin -> cud("INSERT INTO `users` (`userEmail`,`userPassword`,`userFirstName`,`userLastName`,`userGroup`) VALUES('".$userEmail."','".$hashedpass."','".$userFirstName."','".$userLastName."','".$userGroup."')","saved");

//     $admin -> redirect('../login');

// }
// }


if(isset($_POST['logout']))
{
    $driverID = $_SESSION['driverID'];
    $driverStatusID = 1;
    $admin -> cud("UPDATE `driverDetail` SET `driverStatusID` = '$driverStatusID' WHERE `driverID` = '$driverID'","updated");
    
    unset($_SESSION['driverID']);
    session_destroy();
    $admin -> redirect('../login');
}

?>











