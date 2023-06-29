<?php
include './dbconfigur.php';
if (!empty($user_id)) {
    ?>
    <html>
        <head>
            <title>Bokked Car List</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/myaccount.css">
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
                        <form class="form-light mt-20" role="form" method="post" action="contact_list.php">
                            <table class="table_list" >
                                <tr>
                                    <th class="grid_heading">S.No</th>
                                    <td class="grid_heading">Image</td>
                                    <td class="grid_heading">Car Type</td>
                                    <td class="grid_heading">Fuel Type</td>
                                    <td class="grid_heading">Engine</td>
                                    <td class="grid_heading">Card Type</td>
                                    <td class="grid_heading">Name</td>
                                    <td class="grid_heading">Email</td>
                                </tr>
                                <?php
                                $i = 0;
                                $sql_contact = "";
                                if ($user_type == "admin") {
                                    $sql_contact = "SELECT p.*,c.*,u.* FROM cars c JOIN payments p ON c.id=p.product_id JOIN users u ON u.id = p.user_id";
                                } else {
                                    $sql_contact = "SELECT p.*,c.*,u.* FROM cars c JOIN payments p ON c.id=p.product_id JOIN users u ON u.id = p.user_id WHERE c.user_id = '".$user_id."'";
                                }

                                $res_contact = mysqli_query($conn, $sql_contact);
                                if (mysqli_num_rows($res_contact) > 0) {
                                    while ($row = mysqli_fetch_array($res_contact)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td class="grid_label" align="center"><?php echo $i; ?></td>
                                            <td class="grid_label" align="center">
                                                <img src="<?php echo $row['imagepath'] ?>" height="80" width="80"/>
                                            </td>
                                            <td class="grid_label">
                                                <?php echo $row['car_type'] ?><br/>
                                            </td>
                                            <td class="grid_label">
                                                <?php echo $row['car_fuel'] ?><br/>
                                            </td>
                                            <td class="grid_label">
                                                <?php echo $row['car_engine'] ?><br/>
                                            </td>
                                            <td class="grid_label">
                                                <?php echo $row['card_type'] ?>
                                            </td>
                                            <td class="grid_label">
                                                <?php echo $row['name'] ?>
                                            </td>
                                            <td class="grid_label">
                                                <?php echo $row['email'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7">Data not found.</td></tr>';
                                }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

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
?>
