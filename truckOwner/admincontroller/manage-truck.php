<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();
if(isset($_POST['insert']))
{
	$truckName = $_POST['truckName'];
	$truckRegNumber = $_POST['truckRegNumber'];
	$truckDriverID = $_POST['truckDriverID'];

    $stmt =$admin -> cud("INSERT INTO `truckDetail` (`truckName`, `truckRegNumber`, `truckDriverID`) VALUES('".$truckName."','".$truckRegNumber."','".$truckDriverID."')","saved");

    $admin ->redirect('../manage-truck');

}


if(isset($_POST['update']))
{
	$truckName = $_POST['truckName'];
	$truckRegNumber = $_POST['truckRegNumber'];
	$truckDriverID = $_POST['truckDriverID'];
	$truckID = $_POST['truckID'];

	$admin -> cud("UPDATE `truckDetail` SET `truckName` = '$truckName',`truckRegNumber` = '$truckRegNumber',`truckDriverID` = '$truckDriverID'   WHERE `truckID` = '$truckID'","updated");

	$admin ->redirect('../manage-truck');
}


if(isset($_GET['truckID']))
{
	$del = $_GET['truckID'];

	$stmt =$admin -> cud("DELETE FROM `truckDetail`WHERE `truckID` = '$del'","DELETED");
	$admin ->redirect('../manage-truck');
}

?>