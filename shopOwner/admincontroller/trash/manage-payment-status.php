<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['insertNewCatergory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `paymentStatus` (`paymentStatusName`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-payment-status');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$paymentStatusID = $_POST['paymentStatusID'];

	$stmt = $admin->cud("UPDATE `paymentStatus` SET `paymentStatusName` = '$updateCategoryName' WHERE `paymentStatusID` = '$paymentStatusID'","updated");
    $admin ->redirect('../manage-payment-status');
}

//delete payment category 
if(isset($_GET['paymentStatusID'])){
    $paymentStatusID = $_GET['paymentStatusID'];
    $stmt = $admin -> cud("DELETE FROM `paymentStatus` WHERE `paymentStatusID` = '$paymentStatusID'","deleted");
	$admin ->redirect('../manage-payment-status');

}
?>