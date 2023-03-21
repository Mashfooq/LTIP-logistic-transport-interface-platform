<?php
define('DIR','../../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

//insert new product category
if(isset($_POST['addProduct']))
{
	$productName = $_POST['productName'];
	$productCategoryID = $_POST['productCategoryID'];
	$productDescription = $_POST['productDescription'];
	$productMRP = $_POST['productMRP'];
	$productSellingPrice = $_POST['productSellingPrice'];
	$productQuantity = $_POST['productQuantity'];
	$productPosition = $_POST['productPosition'];

	$imagepath=basename($_FILES['Image']['name']);

	if(empty($imagepath)){
		$imagepath = "default.jpeg";
	}
	else{
		$targetDir="productImage/";
		$image=$targetDir.basename($_FILES['Image']['name']);
		move_uploaded_file($_FILES['Image']['tmp_name'], $image);
	}


	$stmt =$admin -> cud("INSERT INTO `product` (`productName`,`productCategoryID`,`productDescription`,`productMRP`,`productSellingPrice`,`productImage`,`productQuantity`,`productPosition`) VALUES('".$productName."','".$productCategoryID."','".$productDescription."','".$productMRP."','".$productSellingPrice."','".$imagepath."','".$productQuantity."','".$productPosition."')","saved");

	$admin ->redirect('../manage-product');
	
}

if(isset($_POST['updateProduct']))
{
	$productID = $_POST['productID'];
	$productImage = $_POST['productImage'];
	$productName = $_POST['productName'];
	$productDescription = $_POST['productDescription'];
	$productMRP = $_POST['productMRP'];
	$productSellingPrice = $_POST['productSellingPrice'];
	$productQuantity = $_POST['productQuantity'];
	$productPosition = $_POST['productPosition'];

	$imagepath=basename($_FILES['Image']['name']);

	if(empty($imagepath)){
		$imagepath = $productImage;
	}
	else{
		$targetDir="productImage/";
		$image=$targetDir.basename($_FILES['Image']['name']);
		move_uploaded_file($_FILES['Image']['tmp_name'], $image);
	}

	$admin -> cud("UPDATE `product` SET `productImage` = '$imagepath',`productName` = '$productName',`productDescription` = '$productDescription',`productMRP` = '$productMRP',`productSellingPrice` = '$productSellingPrice',`productQuantity` = '$productQuantity',`productPosition` = '$productPosition' WHERE `productID` = '$productID'","updated");
	
		$_SESSION['productID'] = $productID;
		$admin ->redirect('../view-product');
}

//delete product category 
if(isset($_GET['productID'])){
    $productID = $_GET['productID'];
    $stmt = $admin -> cud("DELETE FROM `product` WHERE `productID` = '$productID'","deleted");
	$admin ->redirect('../manage-product');

}
?>