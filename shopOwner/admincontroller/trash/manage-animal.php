<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['addAnimal']))
{

	$animalCategoryID = $_POST['animalCategoryID'];
	$animalBreedID = $_POST['animalBreedID'];

	$animalPosition = $_POST['animalPosition'];
	$animalWeight = $_POST['animalWeight'];
	$animalHeight = $_POST['animalHeight'];
	$animalAge = $_POST['animalAge'];
	$animalFur = $_POST['animalFur'];
	$animalDistributionPrice = $_POST['animalDistributionPrice'];
	$animalSellingPrice = $_POST['animalSellingPrice'];

	$imagepath=basename($_FILES['Image']['name']);

	if(empty($imagepath)){
		$imagepath = "default.jpeg";
	}
	else{
		$targetDir="animalImage/";
		$image=$targetDir.basename($_FILES['Image']['name']);
		move_uploaded_file($_FILES['Image']['tmp_name'], $image);
	}


	$stmt =$admin -> cud("INSERT INTO `animal` (`animalBreedID`,`animalCategoryID`,`animalPosition`,`animalWeight`,`animalHeight`,`animalAge`,`animalFur`,`animalDistributionPrice`,`animalSellingPrice`,`animalImage`) VALUES('".$animalBreedID."','".$animalCategoryID."','".$animalPosition."','".$animalWeight."','".$animalHeight."','".$animalAge."','".$animalFur."','".$animalDistributionPrice."','".$animalSellingPrice."','".$imagepath."')","saved");

	$admin ->redirect('../manage-animal');
	
}

if(isset($_POST['updateAnimal']))
{
	$animalID = $_POST['animalID'];
	$animalImage = $_POST['animalImage'];
	
	$animalPosition = $_POST['animalPosition'];
	$animalWeight = $_POST['animalWeight'];
	$animalHeight = $_POST['animalHeight'];
	$animalAge = $_POST['animalAge'];
	$animalFur = $_POST['animalFur'];
	$animalDistributionPrice = $_POST['animalDistributionPrice'];
	$animalSellingPrice = $_POST['animalSellingPrice'];

	$imagepath=basename($_FILES['Image']['name']);

	if(empty($imagepath)){
		$imagepath = $animalImage;
	}
	else{
		$targetDir="animalImage/";
		$image=$targetDir.basename($_FILES['Image']['name']);
		move_uploaded_file($_FILES['Image']['tmp_name'], $image);
	}

	$admin -> cud("UPDATE `animal` SET `animalImage` = '$imagepath',`animalPosition` = '$animalPosition',`animalWeight` = '$animalWeight',`animalHeight` = '$animalHeight',`animalAge` = '$animalAge',`animalFur` = '$animalFur',`animalDistributionPrice` = '$animalDistributionPrice',`animalSellingPrice` = '$animalSellingPrice' WHERE `animalID` = '$animalID'","updated");
	
		$_SESSION['animalID'] = $animalID;
		$admin ->redirect('../manage-animal');
}

//delete animal category 
if(isset($_GET['animalID'])){
    $animalID = $_GET['animalID'];
    $stmt = $admin -> cud("DELETE FROM `animal` WHERE `animalID` = '$animalID'","deleted");
	$admin ->redirect('../manage-animal');

}
?>