
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
        <div class="page-content header-clear-small">
            <div class="card card-style">
                <div id="map"></div>
            </div>
        </div>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script type="text/javascript" src="scripts/bootstrap.min.js" defer></script>
    <script type="text/javascript" src="scripts/custom.js" defer></script>
</body>
</html>