<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new animal category
if(isset($_POST['insertNewCatergory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `birdCategory` (`birdCategoryName`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-bird-category');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$birdCategoryID = $_POST['birdCategoryID'];

	$stmt = $admin->cud("UPDATE `birdCategory` SET `birdCategoryName` = '$updateCategoryName' WHERE `birdCategoryID` = '$birdCategoryID'","updated");
    $admin ->redirect('../manage-bird-category');

}

//delete bird category 
if(isset($_GET['birdCategoryID'])){
    $birdCategoryID = $_GET['birdCategoryID'];
    $stmt = $admin -> cud("DELETE FROM `birdCategory` WHERE `birdCategoryID` = '$birdCategoryID'","deleted");
	$admin ->redirect('../manage-bird-category');

}
?>