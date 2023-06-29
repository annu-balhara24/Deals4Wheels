<?php
include './dbconfigur.php';
if (!empty($user_id)) {

    $error = "";
    if (isset($_POST['btnchangenow'])) {
        extract($_POST);

        if (empty($oldpwd)) {
            $error = "Please enter your current password.";
        }
        if (empty($newpwd)) {
            $error = "Please enter your new password.";
        }
        if (empty($conpwd)) {
            $error = "Please enter your confirm password.";
        }
        if ($newpwd != $conpwd) {
            $error = "<b>New password does not match with confirm password.</b>";
        }

        if (empty($error)) {

            $sql_change_pwd = "update users set password='" . $newpwd . "' where id='" . $user_id . "' AND password='" . $oldpwd . "'";
            $result_password = $conn->query($sql_change_pwd);
            $valueInsert = (int) $result_password;

            if ($valueInsert > 0) {
                header("location:changepassword.php?status=success");
            } else {
                $error = "Password has not been changed.";
            }
        }
    }
    ?>
    <html>
        <head>
            <title>Change Password</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/changepassword.css">
            <script type="text/javascript" src="js/validation.js"></script>
        </head>
        <body class="Register">
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

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div>
                        <?php
                        include './leftmenu.php';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div>
                        <form class="form-light mt-20" role="form" method="post" action="changepassword.php">
                            <?php
                            if (!empty($error)) {
                                echo '<div class="style">' . $error . '</div>';
                            }

                            if (isset($_GET['status']) && $_GET['status'] == "success") {
                                echo '<div class="style"><b>Your password has been successfuly changed.</b></div>';
                            }
                            ?>


                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" id="oldpwd" name="oldpwd" class="form-control" placeholder="Current Password">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" id="newpwd" name="newpwd" class="form-control" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="conpwd" name="conpwd" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="col-sm-9">
                              <div class="form-group">
                            <input type="submit" class="btn btn-primary btnRegister"  value="CHANGE NOW"/ name="btnchangenow" id = "btnchangenow" onClick="return changeFormValidation()"/>
                          </div>
                        </div>
                            <!-- <button type="submit" id="btnchangenow" name="btnchangenow" class="btn btn-one" onClick="return changeFormValidation()"/>Change Now</button><p><br/></p> -->
                        </form>
                    </div>
                </div>
            </div>

<br><br><br>

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


        </body>
    </html>
    <?php
} else {
    header("location:login.php?msg=login");
    ob_flush();
}
?>
