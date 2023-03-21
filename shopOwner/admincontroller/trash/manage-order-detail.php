<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//update delivery category 
if(isset($_GET['deliveryID'])){
    $deliveryID = $_GET['deliveryID'];

    $orderDeliveryStatusID = 2;

    $admin -> cud("UPDATE `orderDetail` SET `orderDeliveryStatusID` = '$orderDeliveryStatusID' WHERE `orderID` = '$deliveryID'","updated");

	$admin ->redirect('../manage-order-detail');

}

if(isset($_GET['paymentID'])){
    $paymentID = $_GET['paymentID'];

    $orderPaymentStatusID = 2;

    $admin -> cud("UPDATE `orderDetail` SET `orderPaymentStatusID` = '$orderPaymentStatusID' WHERE `orderID` = '$paymentID'","updated");

	$admin ->redirect('../manage-order-detail');

}
?>