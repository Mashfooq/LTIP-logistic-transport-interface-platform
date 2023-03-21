<?php
    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(isset($_SESSION['userID'])){
        session_destroy();
        unset($_SESSION['userID']);
        $admin ->redirect('../login');
    } 

?>