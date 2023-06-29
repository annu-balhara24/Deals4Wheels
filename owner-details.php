<?php
include './dbconfigur.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Owner Details</title>
        <?php include 'title.php'; ?>
        <link rel="manifest" href="/site.webmanifest">
<link rel="stylesheet" href="css/styles.css">
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
                <section class="col-sm-12 maincontent" style="min-height: 550px; ">

                    <div class="row">
                        <h3>Cars Pictures</h3>
                        <?php
                        $car_owner_id = "";
                        $sql_contact = "SELECT * FROM cars where  id='" . $id . "'";
                        $res_contact = mysqli_query($conn, $sql_contact);
                        if (mysqli_num_rows($res_contact) > 0) {
                            $row = mysqli_fetch_array($res_contact);
                            $car_owner_id = $row['user_id'];
                            ?>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                                    <img src="<?php echo $row['imagepath'] ?>" height="150" width="80%" />
                                </div>
                                <div class="col-sm-4">
                                    <img src="<?php echo $row['imagepath2'] ?>" height="150" width="80%" />
                                </div>
                                <div class="col-sm-4">
                                    <img src="<?php echo $row['imagepath3'] ?>" height="150" width="80%" />
                                </div>
                                <div class="col-sm-9">
                                    <br/>  </div>
                                    <br><br>
                                <div class="col-sm-4">
                                  <p><strong>Company Name</strong><p/>
                                    <p><strong>Car Type</strong><p/>
                                    <p><strong>Engine CC</strong><p/>
                                    <p><strong>Fuel Type</strong><p/>
                                    <p><strong>Year of Manufacture</strong><p/>
                                    <p><strong>Kilometers Run</strong><p/>
                                    <p><strong>Sales Price</strong><p/>
                                    <p><strong>Other Description</strong><p/><br/>
                                       <a href="payments.php?product_id=<?php echo $row ['id']; ?>">  <input type="submit"  class="btn btn-primary btnRegister"  value="Book Test Drive"/></a>


                                </div>
                                <div class="col-sm-4">
                                  <p><?php echo $row['brands'] ?></p>
                                    <p><?php echo $row['car_type'] ?></p>
                                    <p><?php echo $row['car_engine'] ?></p>
                                    <p><?php echo $row['car_fuel'] ?></p>
                                    <p><?php echo $row['car_yom'] ?></p>
                                    <p><?php echo $row['car_km'] ?></p>
                                    <p><?php echo $row['sales_price'] ?></p>
                                    <p><?php echo $row['description'] ?></p>
                                </div>
                            </div>
                            <div class="col-sm-3"style="margin-top: -65px;">
                                <h3>Owner Details</h3>
                                <?php
                                $sql_contact = "SELECT * FROM users where id = '" . $car_owner_id . "'";
                                $res_contact = mysqli_query($conn, $sql_contact);
                                if (mysqli_num_rows($res_contact) > 0) {
                                    $row = mysqli_fetch_array($res_contact);
                                    ?>
                                    <p><strong>Name</strong> - <?php echo $row['name'] ?></p>
                                    <p><strong>Email</strong> - <?php echo $row['email'] ?></p>
                                    <p><strong>Contact</strong> - <?php echo $row['phone_no'] ?></p>
                                    <p><strong>Address</strong> - <?php echo $row['address'] ?></p>
                                    <p><strong>City</strong> - <?php echo $row['city'] ?></p>
                                    <p><strong>State</strong> - <?php echo $row['state'] ?></p>
                                    <p><strong>Pin No.</strong> - <?php echo $row['pin_no'] ?></p>

                                    <?php
                                } else {
                                    echo '<div class="col-sm-12" style="padding:20px;">Data not found.</div>';
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            echo '<div class="col-sm-12" style="padding:20px;">Data not found.</div>';
                        }
                        ?>
                    </div>
                </section>
            </div>
        </section>

<br><br><br><br><br><br>

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
