<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new animal category
if(isset($_POST['insertNewCatergory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `animalCategory` (`animalCategoryName`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-animal-category');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$animalCategoryID = $_POST['animalCategoryID'];

	$stmt = $admin->cud("UPDATE `animalCategory` SET `animalCategoryName` = '$updateCategoryName' WHERE `animalCategoryID` = '$animalCategoryID'","updated");
    $admin ->redirect('../manage-animal-category');
}

//delete animal category 
if(isset($_GET['animalCategoryID'])){
    $animalCategoryID = $_GET['animalCategoryID'];
    $stmt = $admin -> cud("DELETE FROM `animalCategory` WHERE `animalCategoryID` = '$animalCategoryID'","deleted");
	$admin ->redirect('../manage-animal-category');

}
?>