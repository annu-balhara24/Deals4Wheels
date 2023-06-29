<?php
include './dbconfigur.php';
if (!empty($user_id)) {
    $error = "";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $userid = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "DELETE FROM users WHERE id='" . $userid . "'";
        $result = $conn->query($sql);
        $valueInsert = (int) $result;
        if ($valueInsert > 0) {
            header("location:user_list.php?status=success");
        } else {
            $error = "User has not been deleted.";
        }
    }
    ?>
    <html>
        <head>
            <title>User List </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
          <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/reg-style.css">
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
                       <li><a href="login.php">LOG IN</a></li>
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
                        <form class="form-light mt-20" role="form" method="post" action="user_list.php">
                            <table class="table_list">
                                <?php
                                if (isset($_GET['status']) && $_GET['status'] == "success") {
                                    echo '<tr><td colspan="4">User has been successfully deleted.</td></tr>';
                                }
                                if (!empty($error)) {
                                    echo '<tr><td colspan="4">' . $error . '</td></tr>';
                                }
                                ?>
                                <tr>
                                    <td class="grid_heading">S.No</td>
                                    <td class="grid_heading">Name</td>
                                    <td class="grid_heading">Email</td>
                                    <td class="grid_heading">Phone</td>
                                    <td class="grid_heading">Delete</td>
                                </tr>
                                <?php
                                $i = 0;
                                $sql = "SELECT * FROM users Where user_type = 'user' ORDER BY name ASC";
                                 $sql_user = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($sql_user) > 0) {
                                    while ($row = mysqli_fetch_array($sql_user)) {
                                        $i++;

                                        ?>
                                        <tr>
                                            <td class="grid_label"><?php echo $i; ?></td>
                                            <td class="grid_label"><?php echo $row['name'] ?></td>
                                            <td class="grid_label"><?php echo $row['email'] ?></td>
                                            <td class="grid_label"><?php echo $row['phone_no'] ?></td>
                                            <td class="grid_label"><a href="user_list.php?id=<?php echo $row ['id']; ?>">Delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>

<br><br><br><br><br><br>

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
}
?>
