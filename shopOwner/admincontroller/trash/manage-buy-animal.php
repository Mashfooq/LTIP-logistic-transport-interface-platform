<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//reject 
if(isset($_GET['rejectSellAnimalID'])){
    $rejectSellAnimalID = $_GET['rejectSellAnimalID'];

    $sellAnimalStatusID = 3;

    $stmt = $admin->cud("UPDATE `sellAnimal` SET `sellAnimalStatusID` = '$sellAnimalStatusID' WHERE `sellAnimalID` = '$rejectSellAnimalID'","updated");

	$admin ->redirect('../manage-buy-animal');
}


//accept
if(isset($_GET['acceptSellAnimalID'])){
    $acceptSellAnimalID = $_GET['acceptSellAnimalID'];

    $sellAnimalStatusID = 2;

    $stmt = $admin->cud("UPDATE `sellAnimal` SET `sellAnimalStatusID` = '$sellAnimalStatusID' WHERE `sellAnimalID` = '$acceptSellAnimalID'","updated");

	$admin ->redirect('../manage-buy-animal');
}


if(isset($_SESSION['sellAnimalID'])){
    $sellAnimalID = $_SESSION['sellAnimalID'];

    $sellAnimalStatusID = 5;

    $stmt = $admin->cud("UPDATE `sellAnimal` SET `sellAnimalStatusID` = '$sellAnimalStatusID' WHERE `sellAnimalID` = '$sellAnimalID'","updated");

    unset($_SESSION['sellAnimalID']);

    $admin ->redirect('../manage-buy-animal');
}

//accept
if(isset($_GET['deliveried'])){
    $sellAnimalID = $_GET['deliveried'];

    $sellAnimalStatusID = 4;

    $stmt = $admin->cud("UPDATE `sellAnimal` SET `sellAnimalStatusID` = '$sellAnimalStatusID' WHERE `sellAnimalID` = '$sellAnimalID'","updated");



    $stms = $admin->ret("SELECT * FROM `sellAnimal` WHERE `sellAnimalID` = '$sellAnimalID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);

    $animalCategoryID = $row['sellAnimalCategoryID'];
    $animalBreedID = $row['sellAnimalBreedID'];

    $animalWeight = $row['sellAnimalWeight'];
    $animalHeight = $row['sellAnimalHeight'];
    $animalAge = $row['sellAnimalAge'];
    $animalFur = $row['sellAnimalFur'];
    $animalDistributionPrice = $row['sellAnimalPrice'];
    $animalImage = "default.jpeg";
    $animalPosition = 3;

    $stmt =$admin -> cud("INSERT INTO `animal` (`animalBreedID`,`animalCategoryID`,`animalPosition`,`animalWeight`,`animalHeight`,`animalAge`,`animalFur`,`animalDistributionPrice`,`animalSellingPrice`,`animalImage`) VALUES('".$animalBreedID."','".$animalCategoryID."','".$animalPosition."','".$animalWeight."','".$animalHeight."','".$animalAge."','".$animalFur."','".$animalDistributionPrice."','".$animalDistributionPrice."','".$animalImage."')","saved");

    $admin ->redirect('../manage-buy-animal');
}

?>