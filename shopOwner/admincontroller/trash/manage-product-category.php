<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['insertNewCatergory']))
{
	$newCategoryName = $_POST['newCategoryName'];

	$stmt =$admin -> cud("INSERT INTO `productCategory` (`productCategoryName`) VALUES('".$newCategoryName."')","saved");
    $admin ->redirect('../manage-product-category');
}

//update category name
if(isset($_POST['update']))
{
	$updateCategoryName = $_POST['updateCategoryName'];
	$productCategoryID = $_POST['productCategoryID'];

	$stmt = $admin->cud("UPDATE `productCategory` SET `productCategoryName` = '$updateCategoryName' WHERE `productCategoryID` = '$productCategoryID'","updated");
    $admin ->redirect('../manage-product-category');
}

//delete product category 
if(isset($_GET['productCategoryID'])){
    $productCategoryID = $_GET['productCategoryID'];
    $stmt = $admin -> cud("DELETE FROM `productCategory` WHERE `productCategoryID` = '$productCategoryID'","deleted");
	$admin ->redirect('../manage-product-category');

}
?>