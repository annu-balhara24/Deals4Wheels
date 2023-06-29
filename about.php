<?php
include './dbconfigur.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>About Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link href="css/styles.css" rel="Stylesheet" type="text/css" />
  <link href="css/aboutstyles.css" rel="Stylesheet" type="text/css" />
  <link rel="icon" href="favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Google font link -->
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&family=Montserrat:wght@500&family=Sacramento&display=swap" rel="stylesheet">

<!-- fontawesome link -->
<script src="https://kit.fontawesome.com/7be8933c0a.js" crossorigin="anonymous"></script>
</head>

<body>

  <header>
     <div class="flex">
       <div class="logo">
         <a href="index.php"> <img src="images/D4W.png" alt=""> </a>
       </div>
       <nav>
         <button id="nav-toggle" class="hamburger-menu">
           <span class="strip"></span>
           <span class="strip"></span>
           <span class="strip"></span>
         </button>
         <ul id="nav-menu-container">
           <li><a href="index.php">HOME</a></li>
           <li><a href="about.php">ABOUT US</a></li>
           <li><a href="contact.php">CONTACT US</a></li>
           <li><a href="buycars.php">BUY CARS</a></li>
           <?php
           if (!empty($user_id)) {
               ?>
               <li><a href="myaccount.php">MY ACCOUNT</a></li>
               <?php
           } else {
               ?>
               <li><a href="register.php">REGISTER</a></li>
               <li><a href="login.php">LOG IN</a></li>
               <?php
           }
           ?>
         </ul>
       </nav>
     </div>
   </header>
  <h1 align="center">ABOUT</h1>
  <div class="skill-row">
    <img class="aboutlogo" src="images/aboutlogo.png" alt="">
    <p class="about"><strong>Deals 4 Wheels</strong> is India's used car search venture that helps users buy
   cars that are right for them. Its website and app carry rich automotive content
such as detailed desciption and pictures of all cars that are listed in our website.</p>
 <br>
  <!-- <p class="about">Car Sale Purchase has launched many innovative features to ensure that users get an
immersive experience of the car model before visiting a dealer showroom. These
include a Feel The Car tool that gives 360-degree interior/exterior views with sounds
of the car and explanations of features with videos; search and comparison by make,
model, price, features; and live offers and promotions in all cities.
<br>The platform also has used car classifieds wherein users can upload their cars for sale, <br>
and find used cars for buying from individuals and used car dealers.</p> -->

  </div>
<br><br><br>
  <div class="skill-row">
    <h3 align="center">OUR GOALS</h3>
<p class="about">Our <b>'Deals 4 Wheels’</b> website is meant to give people a better and trustworthy platform
where they can sell and buy cars of their choices and obviously on their own terms and
conditions. With the help of Internet and Computer systems a man and woman from remote
area can buy or sell his/her car. </p>

  </div>
   <h3 align="center"> DEVELOPERS</h3>
  <!-- <div class="skill-row">
    <img class="developerpic" src="images/developerpic.png" alt="">
    <h3 class="skill1">PRIYANSHI SINGH</h3>
    <p class="about">Hey There! I am the front end developer of this website which is built using different web technologies langauges like HTML, CSS, Javascript and Bootstrap.
I love listening music playing cricket and swimming. Apart from that if you want to know more about me then you can follow me on my social media platforms.
    </p>
    <div class="container-fluid">
         <a href="https://www.facebook.com/profile.php?id=100010064672478" class="icon"><i class="social-icon fab fa-facebook-f"></i></a>
      <a href="https://twitter.com/piyush_dalmia11" class="icon"><i class="social-icon fab fa-twitter"></i></a>
    <a href="https://www.instagram.com/its.piyushdalmia/" class="icon"> <i class="social-icon fab fa-instagram"></i></a>
    <a href="https://www.linkedin.com/in/piyush-dalmia-7448121a4/" class="icon"> <i class="social-icon fab fa-linkedin-in size:3x"></i></a>
    <a href="https://www.youtube.com/channel/UCF_mDfupuiK5WkPxkSfQRHw" class="icon"><i class="social-icon fab fa-youtube"></i></a>
    <a href="mailto:piyushdalmia9900@gmail.com" class="icon"><i class="social-icon fas fa-envelope"></i></a>

    </div>
  </div>  -->
  <br>
  <div class="skill-row">
    <img class="developerpic1" src="images/developerpic.png" alt="">
    <h3 class="skill2">ANNU BALHARA</h3>
    <p class="about">Hey There!  I am the front end developer of this website which is built using different web technologies langauges like HTML, CSS, Javascript and Bootstrap.
      I love playing chess and bycycle riding. Apart from that if you want to know more about me then you can follow me on my social media platforms.</p>
    <!-- <a href="https://www.facebook.com/sushant.chaudhary.7359" class="icon"><i class="social-icon fab fa-facebook-f"></i></a>
    <a href="https://twitter.com/Sushant20217841?s=08" class="icon"><i class="social-icon fab fa-twitter"></i></a>
  <a href="https://www.instagram.com/sushant.choudhary_1/" class="icon"> <i class="social-icon fab fa-instagram"></i></a> -->
  <a href="#" class="icon"> <i class="social-icon fab fa-linkedin-in size:3x"></i></a>
  <a href="mailto:annubalhara1224@gmail.com" class="icon"><i class="social-icon fas fa-envelope"></i></a>
  </div>

<br><br><br><br>

  <footer>
    <div class="flex">
      <small>Copyright &copy; 2022 All rights reserved | Deals 4 Wheels</small>
      <ul id="nav-menu-container">
        <li><a href="index.php">HOME</a></li>
        <li><a href="about.php">ABOUT US</a></li>
        <li><a href="contact.php">CONTACT US</a></li>
        <li><a href="buycars.php">BUY CARS</a></li>
        <?php
        if (!empty($user_id)) {
            ?>
            <li><a href="myaccount.php">My ACCOUNT</a></li>
            <?php
        } else {
            ?>
            <li><a href="register.php">REGISTER</a></li>
            <li><a href="login.php">LOGIN</a></li>
            <?php
        }
        ?>
      </ul>
    </div>

  </footer>

</body>
</html>
