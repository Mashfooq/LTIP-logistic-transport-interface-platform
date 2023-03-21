<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['addRequest']))
{
	$requestName = $_POST['requestName'];
	$requestPhone = $_POST['requestPhone'];
	$requestDate = $_POST['requestDate'];
	$requestTime = $_POST['requestTime'];
	$requestDestination = $_POST['requestDestination'];
	$requestUserID = $_POST['userID'];
	$requestStatusID = 1;

	$stmt =$admin -> cud("INSERT INTO `request` (`requestName`,`requestPhone`,`requestDate`,`requestTime`,`requestDestination`,`requestUserID`,`requestStatusID`) VALUES('".$requestName."','".$requestPhone."','".$requestDate."','".$requestTime."','".$requestDestination."','".$requestUserID."','".$requestStatusID."')","saved");

	$admin ->redirect('../manage-order-detail');
	
}

if(isset($_POST['updateRequest']))
{
	$requestName = $_POST['requestName'];
	$requestPhone = $_POST['requestPhone'];
	$requestDate = $_POST['requestDate'];
	$requestTime = $_POST['requestTime'];
	$requestDestination = $_POST['requestDestination'];
	$requestID = $_POST['requestID'];


	$admin -> cud("UPDATE `request` SET `requestName` = '$requestName',`requestPhone` = '$requestPhone',`requestDate` = '$requestDate',`requestTime` = '$requestTime',`requestDestination` = '$requestDestination' WHERE `requestID` = '$requestID'","updated");

	echo $requestPhone;
	
	$admin ->redirect('../manage-order-detail');
}

//delete product category 
if(isset($_GET['cancelID'])){
    $cancelID = $_GET['cancelID'];
    $requestStatusID = 4;

    $admin -> cud("UPDATE `request` SET `requestStatusID` = '$requestStatusID' WHERE `requestID` = '$cancelID'","updated");

	$admin ->redirect('../manage-order-detail');

}
?>