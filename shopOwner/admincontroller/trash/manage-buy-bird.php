<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//reject 
if(isset($_GET['rejectSellBirdID'])){
    $rejectSellBirdID = $_GET['rejectSellBirdID'];

    $sellBirdStatusID = 3;

    $stmt = $admin->cud("UPDATE `sellBird` SET `sellBirdStatusID` = '$sellBirdStatusID' WHERE `sellBirdID` = '$rejectSellBirdID'","updated");

	$admin ->redirect('../manage-buy-bird');
}


//accept
if(isset($_GET['acceptSellBirdID'])){
    $acceptSellBirdID = $_GET['acceptSellBirdID'];

    $sellBirdStatusID = 2;

    $stmt = $admin->cud("UPDATE `sellBird` SET `sellBirdStatusID` = '$sellBirdStatusID' WHERE `sellBirdID` = '$acceptSellBirdID'","updated");

	$admin ->redirect('../manage-buy-bird');
}


if(isset($_SESSION['sellBirdID'])){
    $sellBirdID = $_SESSION['sellBirdID'];

    $sellBirdStatusID = 5;

    $stmt = $admin->cud("UPDATE `sellBird` SET `sellBirdStatusID` = '$sellBirdStatusID' WHERE `sellBirdID` = '$sellBirdID'","updated");

    unset($_SESSION['sellBirdID']);

    $admin ->redirect('../manage-buy-bird');
}

//accept
if(isset($_GET['deliveried'])){
    $sellBirdID = $_GET['deliveried'];

    $sellBirdStatusID = 4;

    $stmt = $admin->cud("UPDATE `sellBird` SET `sellBirdStatusID` = '$sellBirdStatusID' WHERE `sellBirdID` = '$sellBirdID'","updated");



    $stms = $admin->ret("SELECT * FROM `sellBird` WHERE `sellBirdID` = '$sellBirdID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);

    $birdCategoryID = $row['sellBirdCategoryID'];

    $birdWeight = $row['sellBirdWeight'];
    $birdAge = $row['sellBirdAge'];
    $birdFeatherColour = $row['sellBirdFeatherColour'];
    $birdDistributionPrice = $row['sellBirdPrice'];
    $birdImage = "default.jpeg";
    $birdPosition = 3;

    $stmt =$admin -> cud("INSERT INTO `bird` (`birdCategoryID`,`birdWeight`,`birdPosition`,`birdAge`,`birdFeatherColour`,`birdDistributionPrice`,`birdSellingPrice`,`birdImage`) VALUES('".$birdCategoryID."','".$birdWeight."','".$birdPosition."','".$birdAge."','".$birdFeatherColour."','".$birdDistributionPrice."','".$birdDistributionPrice."','".$birdImage."')","saved");

    $admin ->redirect('../manage-buy-bird');
}

?>