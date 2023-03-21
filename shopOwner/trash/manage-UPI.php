<?php 
define('DIR','../');
require_once DIR .'config.php';

$control = new Controller();

$admin = new Admin();

if(!(isset($_SESSION["userID"])))
{
header("location:login.php");
}

if(isset($_GET['sellAnimalID'])){
      $sellAnimalID = $_GET['sellAnimalID'];
      $_SESSION['sellAnimalID'] = $sellAnimalID;
    }
    else{
      header("location:manage-buy-animal.php");
    }



$stms = $admin->ret("SELECT * FROM `sellAnimal` WHERE `sellAnimalID` = '$sellAnimalID'");
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    $userID = $row['userID'];
    $animalCategoryID = $row['sellAnimalCategoryID'];
    $animalBreedID = $row['sellAnimalBreedID'];
    $sellAnimalStatusID = $row['sellAnimalStatusID'];
    $sellAnimalPrice = $row['sellAnimalPrice'];


    $stmtu = $admin->ret("SELECT * FROM `users` WHERE `userID` = '$userID'");
    $rowsu = $stmtu->fetch(PDO::FETCH_ASSOC);


    $stmtc = $admin->ret("SELECT * FROM `animalCategory` WHERE `animalCategoryID` = '$animalCategoryID'");
    $rowsc = $stmtc->fetch(PDO::FETCH_ASSOC);

    $stmtb = $admin->ret("SELECT * FROM `animalBreed` WHERE `animalBreedID` = '$animalBreedID'");
    $rowsb = $stmtb->fetch(PDO::FETCH_ASSOC);

    $stmts = $admin->ret("SELECT * FROM `sellAnimalStatus` WHERE `sellAnimalStatusID` = '$sellAnimalStatusID'");
    $rowss = $stmts->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="en">


<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>THE PET'S EMPORIUM</title>

	<meta name="description" content="Organio - Organic Food Store HTML Templae ">

	<meta name="keywords" content="	farm, food, fresh, fruit, nutrition, organic, organic farm, organic food store, organic shop, organic store, organic theme, store, vegetable, woocommerce">

	<meta name="author" content="Themexriver">

	<link rel="shortcut icon" href="../user/assets/favicon/favicon.ico" type="image/x-icon">

	<!-- Mobile Specific Meta -->



	<link rel="stylesheet" href="../user/assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="../user/assets/css/fontawesome-all.css">

	<link rel="stylesheet" href="../user/assets/css/flaticon.css">

	<link rel="stylesheet" href="../user/assets/css/animate.css">

	<link rel="stylesheet" href="../user/assets/css/video.min.css">

	<link rel="stylesheet" href="../user/assets/css/jquery.mCustomScrollbar.min.css">

	<link rel="stylesheet" href="../user/assets/css/rs6.css">

	<link rel="stylesheet" href="../user/assets/css/slick.css">

	<link rel="stylesheet" href="../user/assets/css/slick-theme.css">

	<link rel="stylesheet" href="../user/assets/css/style.css">

	<style type="text/css">
		
		.button-85 {
			  padding: .5em 1em;
			  border: none;
			  outline: none;
			  color: rgb(255, 255, 255);
			  background: #111;
			  cursor: pointer;
			  position: relative;
			  z-index: 0;
			  border-radius: 10px;
			  user-select: none;
			  -webkit-user-select: none;
			  touch-action: manipulation;
			  font-size: 1em;
			}

			.button-85:before {
			  content: "";
			  background: linear-gradient(
			    45deg,
			    #ff0000,
			    #ff7300,
			    #fffb00,
			    #48ff00,
			    #00ffd5,
			    #002bff,
			    #7a00ff,
			    #ff00c8,
			    #ff0000
			  );
			  position: absolute;
			  top: -2px;
			  left: -2px;
			  background-size: 400%;
			  z-index: -1;
			  filter: blur(5px);
			  -webkit-filter: blur(5px);
			  width: calc(100% + 4px);
			  height: calc(100% + 4px);
			  animation: glowing-button-85 20s linear infinite;
			  transition: opacity 0.3s ease-in-out;
			  border-radius: 10px;
			}

			@keyframes glowing-button-85 {
			  0% {
			    background-position: 0 0;
			  }
			  50% {
			    background-position: 400% 0;
			  }
			  100% {
			    background-position: 0 0;
			  }
			}

			.button-85:after {
			  z-index: -1;
			  content: "";
			  position: absolute;
			  width: 100%;
			  height: 100%;
			  background: #222;
			  left: 0;
			  top: 0;
			  border-radius: 10px;
			}

	</style>

	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body class="organio-wrapper">

	<!-- <div id="preloader"></div> -->

	<div class="up">

		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>

	</div>



<!-- Start of razor pay section

	============================================= -->

	<section id="or-popular-category" class="or-popular-category-section">

		<div class="container">

			<div class="or-popular-category-top-content d-flex justify-content-between align-items-end">

				<div class="or-section-title-3 text-center pera-content headline-2">
					<br><br><br><br>
					<h2><span>UPI</span></h2>

					<p>We believe in Unified Payments Interface (UPI) and Razor Pay is our payment partner.</p>

				</div>

			</div>

			

			<center>

				<div class="or-popular-category-slider-wrap">

					<div class="or-popular-cat-slider">

						<div class="organio-inner-item">

							<div class="or-p-cat-innerbox headline-2">

								<div class="or-p-cat-img">

									<img src="https://incevio.com/storage/images/79Kx4XS1MriIJPYzX9uCSpf9pKt8vPr2ZslrmbQ1.png" alt="">

								</div>
								<br>
								<button type="submit" class="button-85" id="rzp-button1" name="payment">Click Here</button>

							</div>

						</div>

					</div>

				</div>

			</center>

		</div>

	</section>

<!-- End of Razor pay section

	============================================= -->




<!-- Start of Footer  section

	============================================= -->

	<section id="or-footer-3" class="or-footer-section-3" data-background="assets/img/bg/h5-bg-footer.jpg">

		<div class="or-footer-copyright-wrapper">

			<div class="container">

				<div class="or-footer-copyright-wrapper  d-flex justify-content-between align-items-center">

					<div class="or-footer-copyright-3">

						@ Copyright 2022. <a href="#">The Pet's Emporium.</a>

					</div>

					<div class="footer-payment">

						<img src="assets/img/bg/f3-payment.png" alt="">

					</div>

				</div>

			</div>

		</div>

	</section>

<!-- End of Footer  section

	============================================= -->															
<script>
var options = {
    "key": "rzp_test_1kJUPehOrSmSWJ", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $sellAnimalPrice*100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "The Pet's Emporium",
    "description": "Online Payment",
    "image": "https://incevio.com/storage/images/79Kx4XS1MriIJPYzX9uCSpf9pKt8vPr2ZslrmbQ1.png", 
    "id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert('Your payment is successful !!');
      window.location.href='admincontroller/manage-buy-animal.php'
    },
    "prefill": {
        "name": "<?php echo $rowsu['userName']; ?>",
        "email": "<?php echo $rowsu['userEmail']; ?>",
        "contact": "9288837298"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>


	

	<!-- For Js Library -->

	<script src="assets/js/jquery.min.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/popper.min.js"></script>

	<script src="assets/js/jquery.magnific-popup.min.js"></script>

	<script src="assets/js/appear.js"></script>

	<script src="assets/js/slick.js"></script>

	<script src="assets/js/jquery.counterup.min.js"></script>

	<script src="assets/js/waypoints.min.js"></script>

	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

	<script src="assets/js/wow.min.js"></script>

	<script src="assets/js/imagesloaded.pkgd.min.js"></script>

	<script src="assets/js/parallax-scroll.js"></script>

	<script src="assets/js/rbtools.min.js"></script>

	<script src="assets/js/rs6.min.js"></script>

	<script src="assets/js/script.js"></script>

</body>

</html>	