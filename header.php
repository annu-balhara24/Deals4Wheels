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
     </nav>
   </div>
 </header>
