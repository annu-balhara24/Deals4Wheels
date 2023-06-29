<?php
 include './dbconfigur.php';
$showAlert = false;
if (isset($_POST['btnsubmit'])) {
    $error = "";
    extract($_POST);
    if (empty($name)) {
        $error = "Please enter name.";
    }
    if (empty($email)) {
        $error = "Please enter email.";
    }
    if (empty($phone_no)) {
        $error = "Please enter phone_no.";
    }
    if (empty($subject)) {
        $error = "Please enter subject.";
    }
    if (empty($message)) {
        $error = "Please enter your message.";
    }
    if (empty($error)) {
        $sql_query = "INSERT INTO contact(name,email,phone_no,subject,message,adding_date)"
                . "VALUES('" . $name . "','" . $email . "','" . $phone_no . "','" . $subject . "','" . $message . "','" . date('Y-m-d h:i:s') . "')";
        $result = $conn->query($sql_query);
        if ($result) {
            $showAlert = true;
        } else {
            $error = "Data has not been saved.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/reg-style.css">

    <script type="text/javascript">
       //check for integer
       function checkForIntegers(i)
       {
           if (i.value.length > 0)
           {
               i.value = i.value.replace(/[^\d]+/g, '');

           }
       }

   </script>
  </head>
  <body class="register">
    <?php

        if($showAlert) {

            echo ' <div class="alert alert-success
                alert-dismissible fade show" role="alert">

                <strong>Success!</strong> Your Query/Response has been submitted successfully.
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
                 <li><a href="login.php">LOGIN</a></li>
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
                <img src="images/contact.png">
                <br><br><br>

            </div>
            <div class="col-md-9 register-right">

                <h3 class="register-heading">CONTACT US</h3>

                <form class="form-light mt-20" role="form"  method="POST" action="contact.php">
                    <?php
                    if (!empty($error)) {
                        echo '<div class="style">' . $error . '</div>';
                    }

                    if (isset($_GET['reg']) && $_GET['reg'] == "success") {
                        echo '<div class="style">Your contact form has been successfuly submitted.</div>';
                    }
                    ?>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name" maxlength="100" required>
                    </div>
                  </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" maxlength="125" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text"id="phone_no" name="phone_no" class="form-control" placeholder="Phone number" maxlength="10"  onkeyup="checkForIntegers(this)" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" maxlength="500" required>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Write you message here..." style="height:100px;" maxlength="1000" required></textarea>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                    <div class="form-group">

                    <input type="submit" name="btnsubmit" class="btn btn-primary btnRegister" onClick="return contactFormValidation()" value="Send message" ><p><br/></p>
</div>
</div>
</div>

                </form>
              </div>

<br><br><br><br><br><br>
              <footer class="fixed-bottom">
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
