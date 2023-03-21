<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();
if(isset($_POST['insert']))
{
	$shopName = $_POST['shopName'];
	$shopEmail = $_POST['shopEmail'];
	$shopAddress = $_POST['shopAddress'];
	$shopPhone = $_POST['shopPhone'];
	$newhashedpass = base64_encode($shopEmail);
	$userGroup = 2;

    $stmt =$admin -> cud("INSERT INTO `shopDetail` (`shopName`, `shopEmail`, `shopPhone`, `shopAddress`) VALUES('".$shopName."','".$shopEmail."','".$shopPhone."','".$shopAddress."')","saved");

    $stmtU =$admin -> cud("INSERT INTO `users` (`userName`, `userEmail`, `userPassword`, `userGroup`) VALUES('".$shopName."','".$shopEmail."','".$newhashedpass."','".$userGroup."')","saved");

    $admin ->redirect('../manage-shop');

}


if(isset($_POST['update']))
{
	$shopName = $_POST['shopName'];
	$shopEmail = $_POST['shopEmail'];
	$shopAddress = $_POST['shopAddress'];
	$shopPhone = $_POST['shopPhone'];
	$shopID = $_POST['shopID'];

	$admin -> cud("UPDATE `shopDetail` SET `shopName` = '$shopName',`shopEmail` = '$shopEmail',`shopAddress` = '$shopAddress',`shopPhone` = '$shopPhone'   WHERE `shopID` = '$shopID'","updated");

	$admin ->redirect('../manage-shop');
}


if(isset($_GET['shopID']))
{
	$del = $_GET['shopID'];

	$stmt =$admin -> cud("DELETE FROM `shopDetail`WHERE `shopID` = '$del'","DELETED");
	$admin ->redirect('../manage-shop');
}

?>