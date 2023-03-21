<?php 
define('DIR','../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

if(isset($_SESSION['userID'])){
	session_destroy();
	unset($_SESSION['userID']);
  
 
	$admin -> redirect('login');

}
$row =0;
?>