<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();
if(isset($_POST['insert']))
{
	$driverName = $_POST['driverName'];
	$driverEmail = $_POST['driverEmail'];
	$driverAddress = $_POST['driverAddress'];
	$driverPhone = $_POST['driverPhone'];
	$driverStatusID = 1;

	$newhashedpass = base64_encode($driverEmail);
	$userGroup = 3;


    $stmt =$admin -> cud("INSERT INTO `driverDetail` (`driverName`, `driverEmail`, `driverPhone`, `driverAddress`,`driverStatusID`) VALUES('".$driverName."','".$driverEmail."','".$driverPhone."','".$driverAddress."','".$driverStatusID."')","saved");

    $stmtD =$admin -> cud("INSERT INTO `users` (`userName`, `userEmail`, `userPassword`, `userGroup`) VALUES('".$driverName."','".$driverEmail."','".$newhashedpass."','".$userGroup."')","saved");

}


if(isset($_POST['update']))
{
	$driverName = $_POST['driverName'];
	$driverEmail = $_POST['driverEmail'];
	$driverAddress = $_POST['driverAddress'];
	$driverPhone = $_POST['driverPhone'];
	$driverID = $_POST['driverID'];

	$admin -> cud("UPDATE `driverDetail` SET `driverName` = '$driverName',`driverEmail` = '$driverEmail',`driverAddress` = '$driverAddress',`driverPhone` = '$driverPhone'   WHERE `driverID` = '$driverID'","updated");

	$admin ->redirect('../manage-driver');
}


if(isset($_GET['driverID']))
{
	$del = $_GET['driverID'];

	$stmt =$admin -> cud("DELETE FROM `driverDetail`WHERE `driverID` = '$del'","DELETED");
	//$admin ->redirect('../manage-driver');
}

?>