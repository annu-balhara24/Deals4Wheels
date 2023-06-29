<?php
$showAlert = false;
  $email = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

   $con = new mysqli("localhost","root","","deals4wheels");
   if($con->connect_error){
       die("Failed to connect : ".$con->connect_error);
   }
   else{
       $stmt = $con->prepare("Select * from users where email = ?");
       $stmt->bind_param('s' , $email);
       $stmt->execute();
       $stmt_result = $stmt->get_result();

       if($stmt_result->num_rows > 0){
           $data = $stmt_result->fetch_assoc();
           if($data['password'] == $password){
               echo "Login Successfully";
               $_SESSION['map_user_id'] = $row['id'];
               $_SESSION['map_user_name'] = $row['name'];
               $_SESSION['map_user_type'] = $row['user_type'];
           } else{
              $showAlert= true;
           }

       } else{
             // $showAlert = true;
       }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Game Kraft</title>
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
               <li><a href="index.php">Home</a></li>
               <li><a href="about.php">About Us</a></li>
               <li><a href="contact.php">Contact Us</a></li>
               <li><a href="news.html">Buy Cars</a></li>
               <?php
               if (!empty($user_id)) {
                   ?>
                   <li><a href="myaccount.php">My Account</a></li>
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
  <div class="container-fluid ">
      <div class="row">
          <div class="col-md-3 register-left">
              <img src="gamekraft.png">
             <h3>Welcome</h3>
             <p>If you haven't already registered, then click on the Sign Up button to continue.</p>

              <a href="./registration.php" class="btn button-left">SIGN UP</a>
          </div>
          <div class="col-md-9 register-right">

              <h3 class="register-heading">Log In</h3>


              <form action="login1.php" method="POST">
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


               <input type="submit" class="btn btn-primary btnRegister"  value="LOG IN"/ name="create">

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

</body>
</html>
