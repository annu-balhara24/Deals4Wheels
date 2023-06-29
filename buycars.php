<?php
include './dbconfigur.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Buy Cars</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/changepassword.css">
        <script type="text/javascript" src="js/validation.js"></script>

    </head>
    <body class="register">
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
                   <li><a href="login.php">LOGIN</a></li>
                   <?php
               }
               ?>
             </ul>
           </nav>
         </div>
       </header>
        <!-- container -->
        <section class="container">
            <div class="row">
                <!-- main content -->
                <section class="col-sm-12 maincontent" style="min-height: 450px;">
                    <h3>Buy Cars</h3>
                    <div class="row">
                        <?php
                        $sql_contact = "SELECT * FROM cars where astatus = 'Active' order by id desc";
                        $res_contact = mysqli_query($conn, $sql_contact);
                        if (mysqli_num_rows($res_contact) > 0) {
                            while ($row = mysqli_fetch_array($res_contact)) {
                                ?>
                                <div class="col-sm-3">
                                    <a href="buycars_details.php?id=<?php echo $row ['id']; ?>"> <img src="<?php echo $row['imagepath'] ?>" height="150" width="100%"/><br/>
                                        <strong><?php echo $row['brands'] ?></strong>
                                        <p><?php echo $row['sales_price'] ?></p>
                                    </a>
                                </div>
                                <?php
                            }
                        } else {
                            echo '<div class="col-sm-12" style="padding:20px;">Data not found.</div>';
                        }
                        ?>
                    </div>
                </section>
            </div>
        </section>

<br><br><br><br>

        <footer class = "fixed-bottom" >
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
                  <li><a href="myaccount.php">MY ACCOUNT</a></li>
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
