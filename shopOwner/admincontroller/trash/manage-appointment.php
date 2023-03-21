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
if(isset($_GET['acceptAppointmentID'])){
    $acceptAppointmentID = $_GET['acceptAppointmentID'];

    $appointmentStatusID = 2;

    $stmt = $admin->cud("UPDATE `appointment` SET `appointmentStatusID` = '$appointmentStatusID' WHERE `appointmentID` = '$acceptAppointmentID'","updated");

	$admin ->redirect('../manage-appointments');
}


//reject 
if(isset($_GET['rejectAppointmentID'])){
    $rejectAppointmentID = $_GET['rejectAppointmentID'];

    $appointmentStatusID = 3;

    $stmt = $admin->cud("UPDATE `appointment` SET `appointmentStatusID` = '$appointmentStatusID' WHERE `appointmentID` = '$rejectAppointmentID'","updated");

    $admin ->redirect('../manage-appointments');
}

?>