<?php 
define('DIR','../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

if($_POST['type'] == ""){

	$stmt = $admin -> ret("SELECT * FROM `animalCategory`");

	$str = "";
	while ($rows=$stmt ->fetch(PDO::FETCH_ASSOC)){
		$str .="<option value='{$rows['animalCategoryID']}'>{$rows['animalCategoryName']}</option>";
	}

	echo $str;
}

else if($_POST['type'] == "subData"){
	$stm = $admin -> ret("SELECT * FROM `animalBreed` WHERE `animalCategoryID` = '{$_POST['id']}' ");

	$str = "";
	while ($row =$stm ->fetch(PDO::FETCH_ASSOC)){
		$str .="<option value='{$row['animalBreedID']}'>{$row['animalBreedName']}</option>";
	}

	echo $str;
}
?>