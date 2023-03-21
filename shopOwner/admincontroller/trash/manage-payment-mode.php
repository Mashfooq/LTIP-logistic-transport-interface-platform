<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['insertNewCatergory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `paymentMode` (`paymentModeName`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-payment-mode');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$paymentModeID = $_POST['paymentModeID'];

	$stmt = $admin->cud("UPDATE `paymentMode` SET `paymentModeName` = '$updateCategoryName' WHERE `paymentModeID` = '$paymentModeID'","updated");
    $admin ->redirect('../manage-payment-mode');
}

//delete payment category 
if(isset($_GET['paymentModeID'])){
    $paymentModeID = $_GET['paymentModeID'];
    $stmt = $admin -> cud("DELETE FROM `paymentMode` WHERE `paymentModeID` = '$paymentModeID'","deleted");
	$admin ->redirect('../manage-payment-mode');

}
?>