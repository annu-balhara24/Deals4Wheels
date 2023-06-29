<?php
//ob_start();
//session_start();
$showAlert = false;
include './dbconfigur.php';

if (isset($_POST['btnsubmit'])) {

    $error = "";

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $error = "Please enter your email";
    }
    if (empty($password)) {
        $error = "Please enter your password";
    }

    if (empty($error)) {

        $query = "Select id,name,email,user_type,imgpath from users where email = '$email' AND password = '$password'";
        $result = $conn->query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $_SESSION['map_user_id'] = $row['id'];
            $_SESSION['map_user_name'] = $row['name'];
            $_SESSION['map_user_type'] = $row['user_type'];
            header('location:myaccount.php');
        }
        else{
            $showAlert= true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/reg-style.css">
</head>

<body class="register">
  <?php

      if($showAlert) {

          echo ' <div class="alert alert-danger
              alert-dismissible fade show" role="alert">

              <strong>Invalid!</strong> E-mail Id or Password.
              <button type="button" class="close"
                  data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div> ';
      }
      ?>
      <div class="register">

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
              <img src="images/D4W12.png">
             <h3>Welcome</h3>
             <p>If you haven't already registered, then click on the Register button to continue.</p>

              <a href="./register.php" class="btn button-left">REGISTER</a>
          </div>
          <div class="col-md-9 register-right">

              <h3 class="register-heading">Log In</h3>


              <form action="login.php" method="POST" role="form">
                <?php
                if (!empty($error)) {
                    echo '<div class="text"><label class="error">' . $error . '</label></div>';
                }

                if (isset($_GET['msg']) && $_GET['msg'] == "login") {
                    echo '<div class="text"><label class="error">You must be login.</label></div>';
                }
                ?>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
                    </div>
                </div>
<br>

              <div class="row">

                  <div class="col-md-12">
                      <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                      </div>
                  </div>

              </div>


               <input type="submit" class="btn btn-primary btnRegister"  value="LOG IN"/ name="btnsubmit" onclick="return loginFormValidation()">

              </form>
          </div>
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

</body>
</html>
