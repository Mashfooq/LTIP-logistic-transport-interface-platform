<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new animal category
if(isset($_POST['insertNewCategory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `appointmentSession` (`appointmentSessionSlot`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-appointment-session');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$appointmentSessionID = $_POST['appointmentSessionID'];

	$stmt = $admin->cud("UPDATE `appointmentSession` SET `appointmentSessionSlot` = '$updateCategoryName' WHERE `appointmentSessionID` = '$appointmentSessionID'","updated");
    $admin ->redirect('../manage-appointment-session');

}

//delete bird category 
if(isset($_GET['appointmentSessionID'])){
    $appointmentSessionID = $_GET['appointmentSessionID'];
    $stmt = $admin -> cud("DELETE FROM `appointmentSession` WHERE `appointmentSessionID` = '$appointmentSessionID'","deleted");
	$admin ->redirect('../manage-appointment-session');

}
?>