<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();


//delete product category 
if(isset($_GET['productID'])){
    $productID = $_GET['productID'];
    $stmt = $admin -> cud("DELETE FROM `product` WHERE `productID` = '$productID'","deleted");
	$admin ->redirect('../manage-product');

}
?>