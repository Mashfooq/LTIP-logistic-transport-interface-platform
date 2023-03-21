<?php 
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

if(isset($_POST['online'])){

	$driverID = $_SESSION['driverID'];
	$driverStatusID = 2;
	$admin -> cud("UPDATE `driverDetail` SET `driverStatusID` = '$driverStatusID' WHERE `driverID` = '$driverID'","updated");
	$admin ->redirect('../index');
}

if(isset($_POST['offline'])){

	$driverID = $_SESSION['driverID'];
	$driverStatusID = 1;
	$admin -> cud("UPDATE `driverDetail` SET `driverStatusID` = '$driverStatusID' WHERE `driverID` = '$driverID'","updated");
	$admin ->redirect('../index');
}

// order status
if(isset($_POST['accept'])){

	$driverID = $_SESSION['driverID'];
	$driverStatusID = 4;
	$admin -> cud("UPDATE `driverDetail` SET `driverStatusID` = '$driverStatusID' WHERE `driverID` = '$driverID'","updated");

	$orderDetailID = $_POST['orderDetailID'];
	$orderStatusID = 3;
	$admin -> cud("UPDATE `orderDetail` SET `orderStatusID` = '$orderStatusID' WHERE `orderDetailID` = '$orderDetailID'","updated");
	$admin ->redirect('../index');
}


// order reachShop
if(isset($_POST['reachShop'])){

	$orderDetailID = $_POST['orderDetailID'];
	$orderStatusID = 5;
	$admin -> cud("UPDATE `orderDetail` SET `orderStatusID` = '$orderStatusID' WHERE `orderDetailID` = '$orderDetailID'","updated");
	$admin ->redirect('../index');
}

// order picked
if(isset($_POST['picked'])){

	$orderDetailID = $_POST['orderDetailID'];
	$orderStatusID = 6;
	$admin -> cud("UPDATE `orderDetail` SET `orderStatusID` = '$orderStatusID' WHERE `orderDetailID` = '$orderDetailID'","updated");
	$admin ->redirect('../index');
}

// order reachDrop
if(isset($_POST['reachDrop'])){

	$orderDetailID = $_POST['orderDetailID'];
	$orderStatusID = 7;
	$admin -> cud("UPDATE `orderDetail` SET `orderStatusID` = '$orderStatusID' WHERE `orderDetailID` = '$orderDetailID'","updated");
	$admin ->redirect('../index');
}

// order deliveried
if(isset($_POST['deliveried'])){

	$driverID = $_SESSION['driverID'];
	$stmtz = $admin ->ret("SELECT * FROM `orderDetail` WHERE `orderDriverID` = '$driverID' AND `orderStatusID` != 8 ");
    $rowts = $stmtz ->fetch(PDO::FETCH_ASSOC);

	$orderRequestID = $rowts['orderRequestID'];
	$requestStatusID = 6;
	$admin -> cud("UPDATE `request` SET `requestStatusID` = '$requestStatusID' WHERE `requestID` = '$orderRequestID'","updated");

	$orderDetailID = $rowts['orderDetailID'];
	$orderStatusID = 8;
	$admin -> cud("UPDATE `orderDetail` SET `orderStatusID` = '$orderStatusID' WHERE `orderDetailID` = '$orderDetailID'","updated");

	$driverStatusID = 2;
	$admin -> cud("UPDATE `driverDetail` SET `driverStatusID` = '$driverStatusID' WHERE `driverID` = '$driverID'","updated");

	$admin ->redirect('../index');
}

?>