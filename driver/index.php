<?php
    
define('DIR','../');
require_once DIR .'config.php';

$control =new Controller();

$admin = new Admin();

include"refresh.php";

if(!(isset($_SESSION["driverID"])))
{
header("location:login.php");
}
else{
    $driverID = $_SESSION["driverID"];
    $stms =$admin ->ret("SELECT * FROM `driverDetail` WHERE `driverID` = '$driverID'");
    $rows=$stms ->fetch(PDO::FETCH_ASSOC);

    $driverStatusID = $rows['driverStatusID'] ;



    if ($driverStatusID == 3) {
        $link = '<a href="#" data-menu="ad-timed-2" data-timed-ad="5"
                    class="btn btn-l btn-full rounded-s shadow-xl text-uppercase font-900 bg-highlight me-3 ms-3 mb-2">NEW ORDER!</a>';

    $stmtz = $admin ->ret("SELECT * FROM `orderDetail` WHERE `orderDriverID` = '$driverID' AND `orderStatusID` = 2 ");
    $rowts = $stmtz ->fetch(PDO::FETCH_ASSOC);

    $orderRequestID = $rowts['orderRequestID'];
    $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
    $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

    $requestUserID = $rowsh['requestUserID'];
    $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$requestUserID' ");
    $rowh =$stmh ->fetch(PDO::FETCH_ASSOC);

    $shopEmail = $rowh['userEmail'];
    $stme =$admin ->ret("SELECT * FROM `shopDetail` WHERE `shopEmail` = '$shopEmail' ");
    $rowe =$stme ->fetch(PDO::FETCH_ASSOC);
    }

    if ($driverStatusID == 4) {

        $stmtz = $admin ->ret("SELECT * FROM `orderDetail` WHERE `orderDriverID` = '$driverID' AND `orderStatusID` != 8 ");
        $rowts = $stmtz ->fetch(PDO::FETCH_ASSOC);

        $orderRequestID = $rowts['orderRequestID'];
        $stmsh =$admin ->ret("SELECT * FROM `request` WHERE `requestID` = '$orderRequestID' ");
        $rowsh =$stmsh ->fetch(PDO::FETCH_ASSOC);

        $requestUserID = $rowsh['requestUserID'];
        $stmh =$admin ->ret("SELECT * FROM `users` WHERE `userID` = '$requestUserID' ");
        $rowh =$stmh ->fetch(PDO::FETCH_ASSOC);

        $shopEmail = $rowh['userEmail'];
        $stme =$admin ->ret("SELECT * FROM `shopDetail` WHERE `shopEmail` = '$shopEmail' ");
        $rowe =$stme ->fetch(PDO::FETCH_ASSOC);

        $orderStatusID = $rowts['orderStatusID'];
        if($orderStatusID == 3 ){
            $reachShop = '<a href="#" data-menu="ad-reach-shop" data-timed-ad="5"
                    class="btn btn-l btn-full rounded-s shadow-xl text-uppercase font-900 bg-highlight me-3 ms-3 mb-2">Reach Shop</a>';
        }


        if($orderStatusID == 5 ){
            $picked = '<a href="#" data-menu="ad-pick-order" data-timed-ad="5"
                    class="btn btn-l btn-full rounded-s shadow-xl text-uppercase font-900 bg-highlight me-3 ms-3 mb-2">Pick order</a>';
        }

        if($orderStatusID == 6 ){
            $reachDrop = '<a href="#" data-menu="ad-reach-drop" data-timed-ad="5"
                    class="btn btn-l btn-full rounded-s shadow-xl text-uppercase font-900 bg-highlight me-3 ms-3 mb-2">Drop location</a>';
        }

        if($orderStatusID == 7 ){
            $deliveried = '<a href="#" data-menu="ad-deliveried-order" data-timed-ad="5"
                    class="btn btn-l btn-full rounded-s shadow-xl text-uppercase font-900 bg-highlight me-3 ms-3 mb-2">Finished Unloading</a>';
        }
        
    }
}


?>

<!DOCTYPE HTML>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Mak Delivery</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALpNEbKlw13lflR5DS34WX2mJ86eyvj6U&callback=initMap"></script>

</head>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
        <div id="footer-bar" class="footer-bar-1">
            <a href="index.php" class="active-nav"><i class="fa fa-home"></i><span>Home</span></a>
            <!-- <a href="index-components.html"><i class="fa fa-star"></i><span>Features</span></a> -->
            <!-- <a href="index-pages.html"><i class="fa fa-heart"></i><span>Pages</span></a>
            <a href="index-search.html"><i class="fa fa-search"></i><span>Search</span></a> -->
            <a href="#" data-menu="menu-settings"><i class="fa fa-cog"></i><span>Settings</span></a>
        </div>
        <div id="menu-cookie-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s"
            data-menu-height="250" data-menu-width="310" data-menu-effect="menu-over"
            data-menu-select="page-components">

            <div class="px-3 text-center">
                <h1 class="text-center mt-4 mb-0">Are you sure? </h1>
                <p class="text-center font-12 color-highlight" style="margin-top: -30px;">You are currently offline</p>
                <p style="margin-top: -10px;">
                    By clicking "Go online" you'll be active<br> to receive order.
                </p>

                <form action="driverController/manage-status.php" method="POST">
                    <button style="margin-top: -10px;" class="close-menu mb-1 btn btn-m btn-center-xl rounded-s shadow-m bg-highlight text-uppercase font-900 bg-green-dark" name="online" >Go online</button> 
                </form>
            </div>
        </div>

        <div id="menu-cookie-modal-offline" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s"
            data-menu-height="250" data-menu-width="310" data-menu-effect="menu-over"
            data-menu-select="page-components">

            <div class="px-3 text-center">
                <h1 class="text-center mt-4 mb-0">Are you sure? </h1>
                <p class="text-center font-12 color-highlight" style="margin-top: -30px;">You are currently online</p>
                <p style="margin-top: -10px;">
                    By clicking "Go offline" you'll be Inactive<br> to receive order.
                </p>

                <form action="driverController/manage-status.php" method="POST">
                    <button style="margin-top: -10px;" class="close-menu mb-1 btn btn-m btn-center-xl rounded-s shadow-m bg-highlight text-uppercase font-900" name="offline" >Go Offline</button> 
                </form>
            </div>
        </div>

        <div class="page-content header-clear-small">

            <!-- offline -->
            <?php if($driverStatusID == 1){

            ?>
            <div class="card card-style mb-3">
                <div class="content mt-3 mb-0">
                    <div class="container">
                        <div class="column mt-1">
                            <span style="font-size: x-large;font-weight: bold;">Offline</span>
                        </div>
                        <div class="column">
                            <a href="#" data-menu="menu-cookie-modal" class="border-0">
                            <label class="onoffbtn">
                                <input type="checkbox" name="online" ></label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- online -->
            <?php if($driverStatusID == 2){

            ?>
            <div class="card card-style mb-3">
                <div class="content mt-3 mb-0">
                    <div class="container">
                        <div class="column mt-1">
                            <span style="font-size: x-large;font-weight: bold;">Online</span>
                        </div>
                        <div class="column">
                            <a href="#" data-menu="menu-cookie-modal-offline" class="border-0">
                            <label class="onoffbtn active">
                                <input type="checkbox" name="offline" ></label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($driverStatusID == 2){

            ?>
            <div class="card card-style mb-3 bg-danger">
                <div class="content mt-3 mb-0">
                    <h1 class="text-center animated-silver">Waiting for new order</h1>
                </div>
            </div>
            <?php } ?>

            <!-- order received -->
            <?php if($driverStatusID == 3){

            ?>
            <div class="card card-style mb-3">
                <div class="content mt-3 mb-0">
                    <div class="container">
                        <div class="column mt-1">
                            <span style="font-size: x-large;font-weight: bold;">Order received</span>
                        </div>
                        <div class="column">
                            <label class="onoffbtn inorder">
                                <input type="checkbox" name="offline" ></label>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php 

            if ($driverStatusID == 3) {
                echo $link; 
            }
            ?>

            <!-- order received -->
            <?php if($driverStatusID == 4){

            ?>
            <div class="card card-style mb-3">
                <div class="content mt-3 mb-0">
                    <div class="container">
                        <div class="column mt-1">
                            <span style="font-size: x-large;font-weight: bold;">In order</span>
                        </div>
                        <div class="column">
                            <label class="onoffbtn inorder">
                                <input type="checkbox" name="offline" ></label>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div id="ad-timed-2" class="menu menu-box-modal menu-box-modal-full">
                <div class="card m-0 bg-17" style="height:100vh; width:100vw;">
                    <div class="card-top">
                        <a href="#" class="close-menu no-click ad-time-close color-highlight"><i
                                class="fa fa-times disabled"></i><span></span></a>
                    </div>
                    <!-- <div class="card-top no-click">
                        <span class="color-white bg-black font-10 opacity-70 pb-1 pt-1 ps-2 pe-2 ms-1">Sponsored Content</span>
                    </div> -->
                    <div class="card-center ms-5 me-5">
                        <h1 class="color-white text-center mb-3 font-40">New Order!</h1>
                        <div class="content mt-3 mb-0">
                            <div class="containercopy">
                                <div class="column" >
                                    <span style="font-size: x-small;font-weight:normal;">Shop Name</span>
                                    <br>
                                    <span style="font-size: x-small;font-weight: bold;"><?php echo $rowe['shopName']; ?></span>
                                </div>
                                <hr style="border-left: 1px solid lightblue;height: 100px;">
                                <div class="column" >
                                    <span style="font-size: x-small;font-weight:normal;">Shop Address</span>
                                    <br>
                                    <span style="font-size:x-small;font-weight: bold;"><?php echo $rowe['shopAddress']; ?></span>
                                </div>
                            </div>
                        </div>
                        <center>
                            <form action="driverController/manage-status.php" method="POST">
                                <input type="hidden" name="orderDetailID" value="<?php echo $rowts['orderDetailID']; ?>">
                                <button class="ml-3 me-3 ms-3 mt-5 btn btn-m rounded-s shadow-xl text-uppercase font-50 bg-green-dark" name="accept">Click to accept order</button>
                            </form>
                        </center>
                    </div>
                    <div class="card-overlay bg-black opacity-90"></div>
                </div>
            </div>

            <?php
            if ($driverStatusID == 4 && $orderStatusID == 3 ) {
                echo $reachShop; 
            }
            ?>
            <div id="ad-reach-shop" class="menu menu-box-modal menu-box-modal-full">
                <div class="header header-fixed header-logo-center">
                    <a href="index.php" class="header-title">Reach Shop</a>
                    <a href="index.php" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
                    <a href="#" class="close-menu no-click ad-time-close color-highlight"><i
                                class="fa fa-times disabled"></i><span></span></a>
                </div>
                <div class="card m-0 bg-17" style="height:100vh; width:100vw;">
                    
                    <!-- <div class="card-top no-click">
                        <span class="color-white bg-black font-10 opacity-70 pb-1 pt-1 ps-2 pe-2 ms-1">Sponsored Content</span>
                    </div> -->
                    <div class="card-center ms-5 me-5">
                        <h1 class="color-red-light text-center mb-3 font-20">Shop Details</h1> 
                        <div class="content mt-3 mb-0 color-white">
                            <div class="containercopy">
                                <div class="column" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Shop Name</span>
                                    <br>
                                    <span style="font-size: x-small;font-weight: bold;"><?php echo $rowe['shopName']; ?></span>
                                </div>
                                <hr style="border-left: 1px solid lightblue;height: 100px;">
                                <div class="column" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Shop Address</span>
                                    <br>
                                    <span style="font-size:x-small;font-weight: bold;"><?php echo $rowe['shopAddress']; ?></span>
                                </div>
                            </div>
                            <div class="containercopy">
                                <div class="column" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Shop Email</span>
                                    <br>
                                    <span style="font-size: x-small;font-weight: bold;"><?php echo $rowe['shopEmail']; ?></span>
                                </div>
                                <hr style="border-left: 1px solid lightblue;height: 100px;">
                                <div class="column" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Shop Contacts</span>
                                    <br>
                                    <span style="font-size:x-small;font-weight: bold;"><?php echo $rowe['shopPhone']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-bottom mb-4">
                        <center>
                            <form action="driverController/manage-status.php" method="POST">
                                <input type="hidden" name="orderDetailID" value="<?php echo $rowts['orderDetailID']; ?>">
                                <button class="ml-3 me-3 ms-3 mt-5 btn btn-m shadow-xl text-uppercase font-50 bg-green-dark" name="reachShop">Reached shop for pickup</button>
                            </form>
                        </center>
                    </div>
                    <div class="card-overlay bg-black opacity-90"></div>
                </div>
            </div>

            <?php
            if ($driverStatusID == 4 && $orderStatusID == 5 ) {
                echo $picked; 
            }
            ?>

            <div id="ad-pick-order" class="menu menu-box-modal rounded-m">
                <div class="card mb-0 bg-17" data-card-height="300">
                    <div class="card-top">
                        <a href="#" class="close-menu no-click ad-time-close color-highlight"><i
                                class="fa fa-times disabled"></i><span></span></a>
                    </div>
                    <!-- <div class="card-top no-click">
                        <span class="color-white bg-black font-10 opacity-70 pb-1 pt-1 ps-2 pe-2 ms-1">Sponsored
                            Content</span>
                    </div> -->
                    <div class="card-center ms-2 me-2">
                        <h1 class="color-white text-center mb-3">Pick Order</h1>
                        <p class="color-white text-center opacity-50 mt-n1 mb-0">Click on "Picked order" to mark order Picked.</p>
                        <center>
                            <form action="driverController/manage-status.php" method="POST">
                                <input type="hidden" name="orderDetailID" value="<?php echo $rowts['orderDetailID']; ?>">
                                <button class="ml-3 me-3 ms-3 mt-5 btn btn-m rounded-s shadow-xl text-uppercase font-50 bg-green-dark" name="picked">Picked Order</button>
                            </form>
                        </center>
                    </div>
                    <div class="card-overlay bg-black opacity-90"></div>
                </div>
            </div>

            <?php
            if ($driverStatusID == 4 && $orderStatusID == 6 ) {
                echo $reachDrop; 
            }
            ?>

            <div id="ad-reach-drop" class="menu menu-box-modal menu-box-modal-full">
                <div class="header header-fixed header-logo-center">
                    <a href="index.php" class="header-title">Reach Shop</a>
                    <a href="index.php" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
                    <a href="#" class="close-menu no-click ad-time-close color-highlight"><i
                                class="fa fa-times disabled"></i><span></span></a>
                </div>
                <div class="card m-0 bg-17" style="height:100vh; width:100vw;">
                    <!-- <div class="card-top no-click">
                        <span class="color-white bg-black font-10 opacity-70 pb-1 pt-1 ps-2 pe-2 ms-1">Sponsored Content</span>
                    </div> -->
                    <div class="card-center ms-5 me-5">
                        <h1 class="color-red-light text-center font-30">Drop location</h1> 
                        <div class="content color-white text-center">
                            <div>
                                <div class="mb-3"  >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Name</span>
                                    <br>
                                    <span style="font-size: small;font-weight: bold;"><?php echo $rowsh['requestName']; ?></span>
                                </div>
                                <div class="mb-3"  >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Contatact</span>
                                    <br>
                                    <span style="font-size: small;font-weight: bold;"><?php echo $rowsh['requestPhone']; ?></span>
                                </div>
                                <div class="mb-3" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Drop Location</span>
                                    <br>
                                    <span style="font-size:small;font-weight: bold;"><?php echo $rowsh['requestDestination']; ?></span>
                                </div>
                                <div class="mb-3" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Reach Date</span>
                                    <br>
                                    <span style="font-size:small;font-weight: bold;"><?php echo $rowsh['requestDate']; ?></span>
                                </div>
                                <div class="mb-3" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Reach Time</span>
                                    <br>
                                    <span style="font-size:small;font-weight: bold;"><?php echo $rowsh['requestTime']; ?></span>
                                </div>
                                <div class="mb-3" >
                                    <span class="color-red-light" style="font-size: x-small;font-weight:normal;">Shop Contacts</span>
                                    <br>
                                    <span style="font-size:small;font-weight: bold;"><?php echo $rowe['shopPhone']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-bottom mb-4">
                        <center>
                            <form action="driverController/manage-status.php" method="POST">
                                <input type="hidden" name="orderDetailID" value="<?php echo $rowts['orderDetailID']; ?>">
                                <button class="ml-3 me-3 ms-3 mt-5 btn btn-m shadow-xl text-uppercase font-50 bg-green-dark" name="reachDrop">Reached drop location</button>
                            </form>
                        </center>
                    </div>
                    <div class="card-overlay bg-black opacity-90"></div>
                </div>
            </div>

            <?php
            if ($driverStatusID == 4 && $orderStatusID == 7 ) {
                echo $deliveried; 
            }
            ?>

            <div id="ad-deliveried-order" class="menu menu-box-modal rounded-m">
                <div class="card mb-0 bg-17" data-card-height="300">
                    <div class="card-top">
                        <a href="#" class="close-menu no-click ad-time-close color-highlight"><i
                                class="fa fa-times disabled"></i><span></span></a>
                    </div>
                    <!-- <div class="card-top no-click">
                        <span class="color-white bg-black font-10 opacity-70 pb-1 pt-1 ps-2 pe-2 ms-1">Sponsored
                            Content</span>
                    </div> -->
                    <div class="card-center ms-2 me-2">
                        <h1 class="color-white text-center mb-3">Order deliveried</h1>
                        <p class="color-white text-center opacity-50 mt-n1 mb-0">Click on "Mark order deliveried"<br> to confirm order deliveried.</p>
                        <!-- <a href="#" data-menu="menu-cookie-bottom">
                            <i class="fa font-14 fa-arrow-up color-green-dark"></i>
                            <span>Menu box - Cookie Policy View</span>
                            <i class="fa fa-angle-right"></i>
                        </a> -->
                        <center>
                            <button data-menu="menu-cookie-deliveried" class="ml-3 me-3 ms-3 mt-5 btn btn-m rounded-s shadow-xl text-uppercase font-50 bg-green-dark" >Mark order deliveried</button>
                        </center>
                    </div>
                    <div class="card-overlay bg-black opacity-90"></div>
                </div>
            </div>

            <div id="menu-cookie-deliveried" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s" data-menu-height="250" data-menu-width="310" data-menu-effect="menu-over" data-menu-select="page-components">
                <div class="px-3 text-center">
                    <h1 class="text-center mt-4 mb-0">Are you sure? </h1>
                    <p class="text-center font-12 color-highlight" style="margin-top: -30px;">Order delivery </p>
                    <p style="margin-top: -10px;">
                        By clicking "Yes! Im sure" order will be marked deliveried.
                    </p>

                    <form action="driverController/manage-status.php" method="POST">
                        <button style="margin-top: -10px;" class="close-menu mb-1 btn btn-m btn-center-xl rounded-s shadow-m bg-highlight text-uppercase font-900 bg-green-dark" name="deliveried" >Yes! Im sure</button> 
                    </form>
                </div>
            </div>

            <!-- <div class="splide double-slider slider-no-arrows slider-no-dots" id="double-slider-home-1">
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide">
                            <div data-card-height="250" class="card mx-3 rounded-m shadow-l bg-13">
                                <div class="card-bottom text-center">
                                    <h2 class="color-white font-900 mb-0">EazyMobile</h2>
                                    <p class="text-center mb-3">
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                    </p>
                                    <a href="#"
                                        class="btn btn-s btn-full text-uppercase font-900 bg-highlight rounded-s me-2 ms-2 mb-2">Purchase</a>
                                </div>
                                <div class="card-overlay bg-gradient"></div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="250" class="card mx-3 rounded-m shadow-l bg-27">
                                <div class="card-bottom text-center">
                                    <h2 class="color-white font-900 mb-0">UltraMobile</h2>
                                    <p class="text-center mb-3">
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                    </p>
                                    <a href="#"
                                        class="btn btn-s btn-full text-uppercase font-900 bg-highlight rounded-s me-2 ms-2 mb-2">Purchase</a>
                                </div>
                                <div class="card-overlay bg-gradient"></div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="250" class="card mx-3 rounded-m shadow-l bg-17">
                                <div class="card-bottom text-center">
                                    <h2 class="color-white font-900 mb-0">KolorMobile</h2>
                                    <p class="text-center mb-3">
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                        <i class="fa fa-star color-yellow-dark"></i>
                                    </p>
                                    <a href="#"
                                        class="btn btn-s btn-full text-uppercase font-900 bg-highlight rounded-s me-2 ms-2 mb-2">Purchase</a>
                                </div>
                                <div class="card-overlay bg-gradient"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="card card-style">
                <div class="content mb-4">
                    <h1 class="text-center mb-0">Care & Quality</h1>
                    <p class="text-center color-highlight font-11 mt-n1 pb-0">No stone left unturned, no aspect
                        overlooked.</p>
                    <p class="text-center font-20 mt-n2">
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                    </p>
                    <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-home-quotes">
                        <div class="splide__track">
                            <div class="splide__list">
                                <div class="splide__slide">
                                    <h2 class="text-center font-300 line-height-xl content mb-0 mt-0">
                                        The code is always great with any Enabled template, the customer support that
                                        wins me over always.
                                    </h2>
                                </div>
                                <div class="splide__slide">
                                    <h2 class="text-center font-300 line-height-xl content mb-0 mt-0">
                                        The best support I have ever had, it's so good I purchased another theme.
                                        Highlighy Recommended.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="btn btn-m btn-center-l text-uppercase font-900 bg-highlight rounded-sm shadow-xl mt-4 mb-0">More
                        Testimonials</a>
                </div>
            </div> -->
           <!--  <div class="splide double-slider slider-no-arrows slider-no-dots" id="double-slider-home-2">
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide">
                            <div data-card-height="180" class="card mx-3 rounded-m shadow-l bg-18">
                                <div class="card-top ms-3 mt-3">
                                    <i class="fa fa-bolt fa-4x color-red-dark"></i>
                                </div>
                                <div class="card-bottom ms-3">
                                    <h2 class="color-white font-900 mb-0">Performance</h2>
                                    <p class="color-white font-11 mt-n1 mb-2">Fast and feature filled</p>
                                </div>
                                <div class="card-overlay bg-black opacity-80"></div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="180" class="card mx-3 rounded-m shadow-l bg-14">
                                <div class="card-top ms-3 mt-3">
                                    <i class="fa fa-trophy fa-4x color-blue-dark"></i>
                                </div>
                                <div class="card-bottom ms-3">
                                    <h2 class="color-white font-900 mb-0">Elite Care</h2>
                                    <p class="color-white font-11 mt-n1 mb-2">Built by the Best for You</p>
                                </div>
                                <div class="card-overlay bg-black opacity-80"></div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="180" class="card mx-3 rounded-m shadow-l bg-3">
                                <div class="card-top ms-3 mt-3">
                                    <i class="fa fa-star fa-4x color-yellow-dark"></i>
                                </div>
                                <div class="card-bottom ms-3">
                                    <h2 class="color-white font-900 mb-0">Quality</h2>
                                    <p class="color-white font-11 mt-n1 mb-2">Built with Care and Detail</p>
                                </div>
                                <div class="card-overlay bg-black opacity-80"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="card card-style">
                <div class="content mb-0">
                    <h1 class="text-center mb-0">Get Sticky Today</h1>
                    <p class="text-center color-highlight font-11 mt-n1 pb-0">Tons of Awesome Features just for You.</p>
                    <p class="boxed-text-xl mt-n3">
                        Fast, easy to use and filled with features. Get Sticky Today and give your site the Mobile
                        Feeling it deserves.
                    </p>
                    <a href="#"
                        class="btn btn-m btn-center-l text-uppercase font-900 bg-highlight rounded-sm shadow-xl mb-4">Purchase
                        Now - $25</a>
                </div>
            </div> -->
            <!-- <div class="footer card card-style">
                <a href="#" class="footer-title"><span class="color-highlight">StickyMobile</span></a>
                <p class="footer-text"><span>Made with <i class="fa fa-heart color-highlight font-16 ps-2 pe-2"></i> by
                        Enabled</span><br><br>Powered by the best Mobile Website Developer on Envato Market. Elite
                    Quality. Elite Products.</p>
                <div class="text-center mb-3">
                    <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-phone"><i class="fa fa-phone"></i></a>
                    <a href="#" data-menu="menu-share" class="icon icon-xs rounded-sm me-1 shadow-l bg-red-dark"><i
                            class="fa fa-share-alt"></i></a>
                    <a href="#" class="back-to-top icon icon-xs rounded-sm shadow-l bg-dark-light"><i
                            class="fa fa-angle-up"></i></a>
                </div>
                <p class="footer-copyright">Copyright &copy; Enabled <span id="copyright-year">2017</span>. All Rights
                    Reserved.</p>
                <p class="footer-links"><a href="#" class="color-highlight">Privacy Policy</a> | <a href="#"
                        class="color-highlight">Terms and Conditions</a> | <a href="#"
                        class="back-to-top color-highlight"> Back to Top</a></p>
                <div class="clear"></div>
            </div> -->
            <div class="card card-style">
                <div id="map"></div>
            </div>
        </div>


        <div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-0 pt-0">
                <h1>Settings</h1>
                <p class="color-highlight">   </p>
                <a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="list-group list-custom-small">
                    <a href="#" data-toggle-theme data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                        <i class="fa font-12 fa-moon rounded-s bg-green-dark color-white me-3"></i>
                        <span>Dark Mode</span>
                        <div class="custom-control scale-switch ios-switch">
                            <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark-mode">
                            <label class="custom-control-label" for="switch-dark-mode"></label>
                        </div>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="list-group list-custom-large">
                    <a data-menu="menu-cookie-logout" href="#">
                        <i class="fa font-14 bg-red-dark fa-power-off rounded-s"></i>
                        <span>Log Out</span>
                        <strong class="color-green">You are currently online.</strong>
                        <!-- <span class="badge bg-highlight color-white">HOT</span> -->
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a data-menu="menu-backgrounds" href="#" class="border-0">
                        <i class="fa font-14 fa-cog bg-blue-dark rounded-s"></i>
                        <span>Background Color</span>
                        <strong>10 Page Gradients Included</strong>
                        <!-- <span class="badge bg-highlight color-white">--</span> -->
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>


        <div id="menu-cookie-logout" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s"
            data-menu-height="250" data-menu-width="310" data-menu-effect="menu-over"
            data-menu-select="page-components">

            <div class="px-3 text-center">
                <h1 class="text-center mt-4 mb-0">Are you sure? </h1>
                <p class="text-center font-12 color-highlight" style="margin-top: -30px;">You are currently online</p>
                <p style="margin-top: -10px;">
                    By clicking "Logout" you'll be offline and logged out.
                </p>

                <form action="driverController/driver-login.php" method="POST">
                    <button style="margin-top: -10px;" class="close-menu mb-1 btn btn-m btn-center-xl rounded-s shadow-m bg-highlight text-uppercase font-900 bg-red-dark" name="logout" >Logout</button> 
                </form>
            </div>
        </div>

        <!-- <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Highlights</h1>
                <p class="color-highlight">Any Element can have a Highlight Color</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="highlight-changer">
                    <a href="#" data-change-highlight="blue"><i class="fa fa-circle color-blue-dark"></i><span
                            class="color-blue-light">Default</span></a>
                    <a href="#" data-change-highlight="red"><i class="fa fa-circle color-red-dark"></i><span
                            class="color-red-light">Red</span></a>
                    <a href="#" data-change-highlight="orange"><i class="fa fa-circle color-orange-dark"></i><span
                            class="color-orange-light">Orange</span></a>
                    <a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span
                            class="color-pink-dark">Pink</span></a>
                    <a href="#" data-change-highlight="magenta"><i class="fa fa-circle color-magenta-dark"></i><span
                            class="color-magenta-light">Purple</span></a>
                    <a href="#" data-change-highlight="aqua"><i class="fa fa-circle color-aqua-dark"></i><span
                            class="color-aqua-light">Aqua</span></a>
                    <a href="#" data-change-highlight="teal"><i class="fa fa-circle color-teal-dark"></i><span
                            class="color-teal-light">Teal</span></a>
                    <a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span
                            class="color-mint-light">Mint</span></a>
                    <a href="#" data-change-highlight="green"><i class="fa fa-circle color-green-light"></i><span
                            class="color-green-light">Green</span></a>
                    <a href="#" data-change-highlight="grass"><i class="fa fa-circle color-green-dark"></i><span
                            class="color-green-dark">Grass</span></a>
                    <a href="#" data-change-highlight="sunny"><i class="fa fa-circle color-yellow-light"></i><span
                            class="color-yellow-light">Sunny</span></a>
                    <a href="#" data-change-highlight="yellow"><i class="fa fa-circle color-yellow-dark"></i><span
                            class="color-yellow-light">Goldish</span></a>
                    <a href="#" data-change-highlight="brown"><i class="fa fa-circle color-brown-dark"></i><span
                            class="color-brown-light">Wood</span></a>
                    <a href="#" data-change-highlight="night"><i class="fa fa-circle color-dark-dark"></i><span
                            class="color-dark-light">Night</span></a>
                    <a href="#" data-change-highlight="dark"><i class="fa fa-circle color-dark-light"></i><span
                            class="color-dark-light">Dark</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                    to Settings</a>
            </div>
        </div> -->

        <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Backgrounds</h1>
                <p class="color-highlight">Change Page Color Behind</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="background-changer">
                    <a href="#" data-change-background="default"><i class="bg-theme"></i><span
                            class="color-dark-dark">Default</span></a>
                    <a href="#" data-change-background="plum"><i class="body-plum"></i><span
                            class="color-plum-dark">Plum</span></a>
                    <a href="#" data-change-background="magenta"><i class="body-magenta"></i><span
                            class="color-dark-dark">Magenta</span></a>
                    <a href="#" data-change-background="dark"><i class="body-dark"></i><span
                            class="color-dark-dark">Dark</span></a>
                    <a href="#" data-change-background="violet"><i class="body-violet"></i><span
                            class="color-violet-dark">Violet</span></a>
                    <a href="#" data-change-background="red"><i class="body-red"></i><span
                            class="color-red-dark">Red</span></a>
                    <a href="#" data-change-background="green"><i class="body-green"></i><span
                            class="color-green-dark">Green</span></a>
                    <a href="#" data-change-background="sky"><i class="body-sky"></i><span
                            class="color-sky-dark">Sky</span></a>
                    <a href="#" data-change-background="orange"><i class="body-orange"></i><span
                            class="color-orange-dark">Orange</span></a>
                    <a href="#" data-change-background="yellow"><i class="body-yellow"></i><span
                            class="color-yellow-dark">Yellow</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                    to Settings</a>
            </div>
        </div>

        <!-- <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-n1">
                <h1>Share the Love</h1>
                <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#"
                    class="close-menu"><i class="fa fa-times"></i></a>
            </div>
            <div class="content mb-0">
                <div class="divider mb-0"></div>
                <div class="list-group list-custom-small list-icon-0">
                    <a href="auto_generated.html" class="shareToFacebook external-link">
                        <i class="font-18 fab fa-facebook-square color-facebook"></i>
                        <span class="font-13">Facebook</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated.html" class="shareToTwitter external-link">
                        <i class="font-18 fab fa-twitter-square color-twitter"></i>
                        <span class="font-13">Twitter</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated.html" class="shareToLinkedIn external-link">
                        <i class="font-18 fab fa-linkedin color-linkedin"></i>
                        <span class="font-13">LinkedIn</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated.html" class="shareToWhatsApp external-link">
                        <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                        <span class="font-13">WhatsApp</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated.html" class="shareToMail external-link border-0">
                        <i class="font-18 fa fa-envelope-square color-mail"></i>
                        <span class="font-13">Email</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div> -->

        <!-- <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l">
            <div class="boxed-text-l mt-4 pb-3">
                <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90">
                <h4 class="mt-3">Add Sticky on your Home Screen</h4>
                <p>
                    Install Sticky on your home screen, and access it just like a regular app. It really is that simple!
                </p>
                <a href="#"
                    class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Add to
                    Home Screen</a><br>
                <a href="#"
                    class="pwa-dismiss close-menu color-gray-dark text-uppercase font-900 opacity-60 font-10 pt-2">Maybe
                    later</a>
                <div class="clear"></div>
            </div>
        </div>

        <div id="menu-install-pwa-ios" class="menu menu-box-bottom menu-box-detached rounded-l">
            <div class="boxed-text-xl mt-4 pb-3">
                <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90">
                <h4 class="mt-3">Add Sticky on your Home Screen</h4>
                <p class="mb-0 pb-0">
                    Install Sticky, and access it like a regular app. Open your Safari menu and tap "Add to Home
                    Screen".
                </p>
                <div class="clearfix pt-3"></div>
                <a href="#" class="pwa-dismiss close-menu color-highlight text-uppercase font-700">Maybe later</a>
            </div>
        </div> -->

        
    </div>
    <script>
    
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: { lat: -34.397, lng: 150.644 },
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        map.setCenter(pos);
                        const marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            title: "Your Location",
                        });
                    },
                    function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }


    </script>
    <script>
      // Wait for the page to finish loading
      window.onload = function() {

            initMap();
        // Find the "Show Full Ad" link and trigger a click event on it
        var link = document.querySelector('a[data-menu="ad-timed-2"]');
        if (link) {
          link.click();
        }

        var reachShop = document.querySelector('a[data-menu="ad-reach-shop"]');
        if (reachShop) {
          reachShop.click();
        }

        var picked = document.querySelector('a[data-menu="ad-pick-order"]');
        if (picked) {
          picked.click();
        }

        var reachDrop = document.querySelector('a[data-menu="ad-reach-drop"]');
        if (reachDrop) {
          reachDrop.click();
        }

      };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--     <script>
        $(document).ready(function () {
            $('.onoffbtn').on('click', function () {
                var isChecked = $(this).children().is(':checked');
                if (isChecked) {
                    $(this).addClass('active');
                    
                } else {
                    $(this).removeClass('active');
                    
                }
            });
        });

    </script> -->
    <script type="text/javascript" src="scripts/bootstrap.min.js" defer></script>
    <script type="text/javascript" src="scripts/custom.js" defer></script>
</body>