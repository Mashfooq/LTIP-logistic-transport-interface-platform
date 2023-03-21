<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new animal category
if(isset($_POST['insertNewCategory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `appointmentCategory` (`appointmentCategoryName`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-appointment-category');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$appointmentCategoryID = $_POST['appointmentCategoryID'];

	$stmt = $admin->cud("UPDATE `appointmentCategory` SET `appointmentCategoryName` = '$updateCategoryName' WHERE `appointmentCategoryID` = '$appointmentCategoryID'","updated");
    $admin ->redirect('../manage-appointment-category');

}

//delete bird category 
if(isset($_GET['appointmentCategoryID'])){
    $appointmentCategoryID = $_GET['appointmentCategoryID'];
    $stmt = $admin -> cud("DELETE FROM `appointmentCategory` WHERE `appointmentCategoryID` = '$appointmentCategoryID'","deleted");
	$admin ->redirect('../manage-appointment-category');

}
?>