<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new animal category
if(isset($_POST['insertNewBreed']))
{
	$newBreedName = $_POST['newBreedName'];
	$animalCategoryID = $_POST['animalCategoryID'];

	$stmt =$admin -> cud("INSERT INTO `animalBreed` (`animalBreedName`,`animalCategoryID`) VALUES('".$newBreedName."','".$animalCategoryID."')","saved");
    $admin ->redirect('../manage-animal-breed');
}

//update category name
if(isset($_POST['update']))
{
	$updateBreedName = $_POST['updateBreedName'];
	$animalBreedID = $_POST['animalBreedID'];

	$stmt = $admin->cud("UPDATE `animalBreed` SET `animalBreedName` = '$updateBreedName' WHERE `animalBreedID` = '$animalBreedID'","updated");
    $admin ->redirect('../manage-animal-breed');
}

//delete animal category 
if(isset($_GET['animalBreedID'])){
    $animalBreedID = $_GET['animalBreedID'];
    $stmt = $admin -> cud("DELETE FROM `animalBreed` WHERE `animalBreedID` = '$animalBreedID'","deleted");
	$admin ->redirect('../manage-animal-breed');

}
?>