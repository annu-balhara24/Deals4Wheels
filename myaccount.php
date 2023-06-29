<?php
include 'dbconfigur.php';
if (!empty($user_id)) {

    $error = "";
    if (isset($_POST['btnupdate'])) {
        extract($_POST);
        $query = "update users set name='" . $name . "',gender='$gender',dob='" . $dob . "', city='$city', state='$state', address='$address', country='$country', pin_no='$pin_no'  where id = '$user_id' ";
        $r = $conn->query($query);
        $num = (int) $r;
        if ($num > 0) {
            $error = "Your profile has been successfully updated.!!";
        } else {
            $error = "Your profile has not been updated.!!";
        }
    }

      $query1 = "SELECT name FROM users WHERE id = '" . $user_id . "' ";
      $details = $conn->query($query1)->fetch_assoc();
      $details['name'] = ($details['name']);
    ?>
    <html>
        <head>
            <title>My Account </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/myaccount.css">


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
                       <li><a href="register.php">Register</a></li>
                       <li><a href="login.php">Login</a></li>
                       <?php
                   }
                   ?>
                 </ul>
               </nav>
             </div>
           </header>
          <center>  <h3>Welcome<?php if($details['name']) echo ' '.$details['name'] ?>!</h3> </center>
            <div class="container">
            &nbsp; &nbsp;
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div>
                        <?php
                        include 'leftmenu.php';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div>
                        <form class="form-light mt-20 row g-3" role="form" method="post">
                            <?php
                                if (!empty($error)) {
                                    echo '<div class="style">' . $error . '</div>';
                                }
                                ?>
                            <?php
                            $i = 0;
                            $sql = "SELECT * FROM users WHERE id = '" . $user_id . "' ";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                ?>
                                <div class="form-group ">
                                    <label>Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" id="phone_no" name="phone_no" class="form-control" value="<?php echo $row['phone_no']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <input type="text" name="gender" id="gender" class="form-control" value="<?php echo $row['gender']; ?>">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" id="city" name="city" class="form-control" value="<?php echo $row['city']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" id="state" name="state" class="form-control" value="<?php echo $row['state']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="address" name="address" style="height:70px;"><?php echo $row['address']; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" id="country" name="country" class="form-control"value="<?php echo $row['country']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pin</label>
                                            <input type="text" id="pin_no" name="pin_no" class="form-control" value="<?php echo $row['pin_no']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                  <div class="form-group">
                                <input type="submit" class="btn btn-primary btnRegister"  value="UPDATE"/ name="btnupdate" id = "btnupdate" onclick="return myaccountFormValidation()"/>
                              </div>
                            </div>
                                <!-- <button type="submit" id="btnupdate" name="btnupdate" class="btn btn-one" onclick="return myaccountFormValidation()"/>Update</button><p><br/></p> -->
                                <?php } ?>
                        </form>
                    </div>
                </div>
            </div>

            <script src="
            https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="
            sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
            </script>

            <script src="
            https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity=
            "sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
            </script>

            <script src="
            https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity=
            "sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous">
            </script>

<br><br><br><br>

            <footer >
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
    <?php
} else {
    header("location:login.php?msg=login");
    ob_flush();
}
mysqli_close($conn);
?>
