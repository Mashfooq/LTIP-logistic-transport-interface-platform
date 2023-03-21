<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

if(isset($_POST['insert']))
{
	$requestID = $_POST['requestID'];
	$truckDriverID = $_POST['truckDriverID'];

	$admin -> cud("UPDATE `request` SET `requestStatusID` = 2   WHERE `requestID` = '$requestID'","updated");

	$orderStatusID = 2;

    $stmt =$admin -> cud("INSERT INTO `orderDetail` (`orderRequestID`,`orderDriverID`,`orderStatusID`) VALUES('".$requestID."','".$truckDriverID."','".$orderStatusID."')","saved");
    
    $admin -> cud("UPDATE `driverDetail` SET `driverStatusID` = 3   WHERE `driverID` = '$truckDriverID'","updated");

    $admin ->redirect('../manage-request');

}



if(isset($_GET['declineID']))
{
	$declineID = $_GET['declineID'];

	$admin -> cud("UPDATE `request` SET `requestStatusID` = 3   WHERE `requestID` = '$declineID'","updated");

	$admin ->redirect('../manage-request');
}

?>