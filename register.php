<?php
$num= false;
$showAlert = false;
$showError = false;
$exists=false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the
    // Database Connection.
    include 'dbconfigur.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $password = $_POST["password"];
    $confpassword = $_POST["confpassword"];


    $sql = "Select * from users where email='$email'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    // This sql query is use to check if
    // the username is already present
    // or not in our Database
    if($num == 0) {
        if(($password == $confpassword) && $exists==false) {



            // Password Hashing is used here.
            $sql = "INSERT INTO users(name,email,phone_no,password,adding_date)"
                    . "VALUES('" . $name . "','" . $email . "','" . $phone_no . "','" . $password . "','" . date('Y-m-d h:i:s') . "')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
            }
        }
        else {
            $showError = "Passwords do not match";
        }
    }// end if

   if($num>0)
   {
      $exists="You have already registered with this email id";
   }

}//end if

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/reg-style.css">

</head>
<body class="register">
  <?php

      if($showAlert) {

          echo ' <div class="alert alert-success
              alert-dismissible fade show" role="alert">

              <strong>Success!</strong> Your account is
              now created and you can login.
              <button type="button" class="close"
                  data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div> ';
      }

      if($showError) {

          echo ' <div class="alert alert-danger
              alert-dismissible fade show" role="alert">
          <strong>Error!</strong> '. $showError.'

         <button type="button" class="close"
              data-dismiss="alert aria-label="Close">
              <span aria-hidden="true">×</span>
         </button>
       </div> ';
     }

      if($exists) {
          echo ' <div class="alert alert-danger
              alert-dismissible fade show" role="alert">

          <strong>Error!</strong> '. $exists.'
          <button type="button" class="close"
              data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
         </div> ';
       }

  ?>
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
  <div class="container-fluid ">
      <div class="row">
          <div class="col-md-3 register-left">
              <img src="images/d4W12.png">
             <h3>Welcome</h3>
             <p>If you have already a registered user then click on the login button to continue.</p>

              <a href="./login.php" class="btn button-left">LOG IN</a>
          </div>
          <div class="col-md-9 register-right">

              <h3 class="register-heading">REGISTER NOW!</h3>

              <form action="register.php" method="POST" id="register-form" >
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Full Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Full Name" required>
                      </div>
                  </div>


      </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
                      </div>
                  </div>


</div>
<div class="row">
  <div class="col-md-12">
      <div class="form-group">
        <label>Contact Number</label>
    <input type="text" id="phone_no" name="phone_no"class="form-control" placeholder="Contact number"maxlength="10"  onkeyup="checkForIntegers(this)" >
      </div>
  </div>


</div>

              <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Confirm Password</label>
                          <input type="password" id="confpassword" name="confpassword" class="form-control" placeholder="Confirm Password" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <input type="submit" class="btn btn-primary btnRegister"  value="REGSITER"/ name="create"  onClick="return regFormValidation()">
                    </div>
                </div>
</div>

              </form>
          </div>
      </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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

  </body>
  </html>
