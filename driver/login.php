<!DOCTYPE html> 

<html> 

<head> 

  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <title></title> 
  <link rel="stylesheet" href="css/estilos.css"> 
  <!-- Google Fonts --> 
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600&family=Poiret+One&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head> 
<body> 
  <div class="container-login"> 
    <div class="wrap-login"> 
      <form action="driverController/driver-login.php" method="post"> 

        <!-- LOGO --> 
        <span class="login-form-title">Driver Login</span> 
        <!--<img class="avatar"src="img/user.svg" alt="" align="center"> -->
        <!-- <img class="avatar"src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" alt="" align="center"> -->

        <svg class="avatar" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#c6d936;" cx="254" cy="254" r="254"></circle> <path style="fill:#2C9984;" d="M438,428.8c-45.6,48-110,78.4-181.6,79.2l0,0c-0.8,0-1.6,0-2.4,0c-72.4,0-138-30.4-184-79.2l0,0 c17.2-59.6,54.8-63.6,54.8-63.6c49.2-23.6,78.8-57.2,80.4-59.2h97.2c1.6,2,31.2,35.6,80.8,59.2C383.2,365.2,421.2,369.2,438,428.8z"></path> <path style="fill:#bca15c;" d="M307.2,437.2v-126c-3.6-2.4-6.8-6-8.4-10c-1.2-2.4-2-5.2-2.4-8.4l-4-53.6h-76.8l-2.8,40.4l0,0 l-0.8,13.2c-0.4,8-5.2,14.8-11.6,18.8v125.2l53.6,60.4L307.2,437.2z"></path> <path style="fill:#c8903c;" d="M298.8,301.2L298.8,301.2c-64.4,50.8-85.6-19.2-86-21.6l0,0l2.8-40.4h77.2l4,53.6 C296.8,296,297.2,298.8,298.8,301.2z"></path> <polygon style="fill:#E6E9EE;" points="312,432.4 312,338 196,338 196,432.4 254,500 "></polygon> <polygon style="fill:#F1543F;" points="264.8,355.2 270.4,338 237.6,338 243.2,355.2 "></polygon> <polygon style="fill:#FF7058;" points="291.2,450.8 264.8,355.2 243.2,355.2 216.8,450.8 254,494.8 "></polygon> <path style="fill:#4CDBC4;" d="M329.2,436l-14.4-33.2h39.6c-10-46-36.8-80-49.6-94.4c-1.2-1.6-2.4-2.4-2.4-2.8H300 c4,10.4,10.8,39.6-8.8,82c0,0-20.4,58.8-37.6,106.4C236.4,446.4,216,387.6,216,387.6c-19.6-42.4-12.4-71.6-8.8-82h-2.4 c-0.4,0.4-1.2,1.2-2.4,2.8c-12.4,14-39.2,48.4-49.6,94.4h39.6L178,436c25.2,13.6,67.2,66.4,71.6,72c1.2,0,2.4,0,4,0 c0.8,0,1.6,0,2.4,0l0,0c0.4,0,0.8,0,1.2,0C262.4,502,304,449.6,329.2,436z"></path> <path style="fill:#2B3B4E;" d="M334.8,200.8c2.8-8.4,4.4-17.2,4.4-26.4c0-46.4-38.4-84-85.2-84c-47.2,0-85.2,37.6-85.2,84 c0,9.2,1.6,18,4.4,26.4H334.8z"></path> <path style="fill:#bca15c;" d="M338.8,185.6c-3.2-1.6-7.2-0.8-10.8,2c-0.8-49.6-33.6-67.6-74-67.6s-73.2,18-73.6,67.6 c-4-2.8-7.6-3.6-10.8-2c-6.4,3.6-7.2,15.6-2,27.6c4.8,10.8,12.8,17.2,18.8,16c11.2,38.8,37.2,73.6,67.6,73.6s56.4-35.2,67.6-73.6 c6,1.2,14.4-5.2,18.8-16C346,201.2,344.8,188.8,338.8,185.6z"></path> <ellipse style="fill:#2B3B4E;" cx="254" cy="139.6" rx="70.4" ry="34.4"></ellipse> <path style="fill:#4CDBC4;" d="M176,119.2h156.4c15.6-6,27.6-14.4,32.4-24C378,68,330,40.8,254,40.8S130,68.4,143.6,95.2 C148.4,104.8,160.4,113.2,176,119.2z"></path> <g> <path style="fill:#2C9984;" d="M176,119.2c50-16.4,106.4-16.4,156.4,0c0,7.2,0,14.4,0,21.6c-52,0-104.4,0-156.4,0 C176,133.6,176,126.4,176,119.2z"></path> <circle style="fill:#2C9984;" cx="254" cy="77.6" r="17.6"></circle> </g> <g> <path style="fill:#FFFFFF;" d="M298.8,301.6c0,0-3.2,18-44.8,36.4c0,0,30.8,19.2,36.4,34.8C290.4,372.8,318.8,334,298.8,301.6z"></path> <path style="fill:#FFFFFF;" d="M209.6,301.6c0,0,3.2,18,44.4,36.4c0,0-30.8,19.2-36.4,34.8C217.6,372.8,189.2,334,209.6,301.6z"></path> </g> <path style="fill:#c6d936;" d="M254,250.4c-14-7.2-19.6,14.4-42,2c0,0,8.8,24.4,42,9.6c33.2,14.4,42-9.6,42-9.6 C273.6,264.8,268,243.2,254,250.4z"></path> </g></svg>
          <!-- USUARIO --> 
        <div class="wrap-input100"> 
          <input class="input100" type="email" name="userEmail" placeholder="Email">   
          <span class="focus-efecto"></span> 
        </div> 
        <!-- CONTRASEÑA --> 
        <div class="wrap-input100"> 
          <input class="input100" type="password" name="userPassword" placeholder="Password"> 
          <span class="focus-efecto"></span> 
        </div> 
        <!-- BOTÓN --> 
        <div class="container-login-form-btn"> 
          <div class="wrap-login-form-btn"> 
            <div class="login-form-bgbtn"></div> 
            <button type="submit" name="btnLogin" class="login-form-btn">ENTER</button> 
          </div> 
        </div> 
      </form> 
    </div> 
  </div> 
</body> 

</html>