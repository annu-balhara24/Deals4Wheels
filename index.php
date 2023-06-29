<?php
 include './dbconfigur.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Deals 4 Wheels</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="css/styles.css" rel="Stylesheet" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

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

  <main>
    <section id="hero-image">
      <div class="hero-marketing-text">
          <img class="title-image" src="images/logo2.png" alt="Deals 4 Wheels" id="title" class="title-image skill-row">
        <h1>The Best <span>Cars</span> Out There</h1>

        <a href="about.php" class="button">Read More</a>
      </div>
    </section>


    <!-- Slider code -->
    <section class="colored-section" id="testimonials">

      <div id="testimonial-carousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner">
          <div class="carousel-item active container-fluid">
            <img class="testimonial-image" src="images/homecarslider.png" alt="CAR IMAGE">

            <h2 class="testimonial-text"> <br><br><br><br>FIND YOUR BEST CARS WITH BEST DEALS WITH NUMEROUS OPTIONS AVAILABLE.</h2>

          </div>
          <div class="carousel-item container-fluid">
            <img class="testimonial-image" src="images/homecarslider.png" alt="CAR IMAGE">

            <h2 class="testimonial-text"><br><br><br><br>FIRST TEST DRIVE YOUR CAR AND CHOOSE ACCORDINGLY.</h2>
            <!-- <em>Beverly, Illinois</em> -->
          </div>
        </div>
        <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon"></span>
        </a>
      </div>

    </section>
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

  <script>
    document.getElementById('nav-toggle').addEventListener('click', function() {
      let navMenu = document.getElementById('nav-menu-container');
      navMenu.style.display = navMenu.offsetParent === null ? 'block' : 'none';
    });
  </script>
</body>

</html>


 <script>
   document.getElementById('nav-toggle').addEventListener('click', function() {
     let navMenu = document.getElementById('nav-menu-container');
     navMenu.style.display = navMenu.offsetParent === null ? 'block' : 'none';
   });
 </script>
  </body>
</html>
