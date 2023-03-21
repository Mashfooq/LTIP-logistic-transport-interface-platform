<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['addBird']))
{

	$birdCategoryID = $_POST['birdCategoryID'];

	$birdPosition = $_POST['birdPosition'];
	$birdWeight = $_POST['birdWeight'];
	$birdAge = $_POST['birdAge'];
	$birdFeatherColour = $_POST['birdFeatherColour'];
	$birdDistributionPrice = $_POST['birdDistributionPrice'];
	$birdSellingPrice = $_POST['birdSellingPrice'];

	$imagepath=basename($_FILES['Image']['name']);
	if(empty($imagepath)){
		$imagepath = "default.jpeg";
	}
	else{
		$targetDir="birdImage/";
		$image=$targetDir.basename($_FILES['Image']['name']);
		move_uploaded_file($_FILES['Image']['tmp_name'], $image);
	}


	$stmt =$admin -> cud("INSERT INTO `bird` (`birdCategoryID`,`birdPosition`,`birdWeight`,`birdAge`,`birdFeatherColour`,`birdDistributionPrice`,`birdSellingPrice`,`birdImage`) VALUES('".$birdCategoryID."','".$birdPosition."','".$birdWeight."','".$birdAge."','".$birdFeatherColour."','".$birdDistributionPrice."','".$birdSellingPrice."','".$imagepath."')","saved");

	$admin ->redirect('../manage-birds');
	
}

if(isset($_POST['updateBird']))
{
	$birdID = $_POST['birdID'];
	$birdImage = $_POST['birdImage'];
	
	$birdPosition = $_POST['birdPosition'];
	$birdWeight = $_POST['birdWeight'];
	$birdAge = $_POST['birdAge'];
	$birdFeatherColour = $_POST['birdFeatherColour'];
	$birdDistributionPrice = $_POST['birdDistributionPrice'];
	$birdSellingPrice = $_POST['birdSellingPrice'];

	$imagepath=basename($_FILES['Image']['name']);

	if(empty($imagepath)){
		$imagepath = $birdImage;
	}
	else{
		$targetDir="birdImage/";
		$image=$targetDir.basename($_FILES['Image']['name']);
		move_uploaded_file($_FILES['Image']['tmp_name'], $image);
	}

	$admin -> cud("UPDATE `bird` SET `birdImage` = '$imagepath',`birdPosition` = '$birdPosition',`birdWeight` = '$birdWeight',`birdAge` = '$birdAge',`birdFeatherColour` = '$birdFeatherColour',`birdDistributionPrice` = '$birdDistributionPrice',`birdSellingPrice` = '$birdSellingPrice' WHERE `birdID` = '$birdID'","updated");
	
		$_SESSION['birdID'] = $birdID;
		$admin ->redirect('../manage-birds');
}

//delete bird category 
if(isset($_GET['birdID'])){
    $birdID = $_GET['birdID'];
    $stmt = $admin -> cud("DELETE FROM `bird` WHERE `birdID` = '$birdID'","deleted");
	$admin ->redirect('../manage-birds');
}
?>