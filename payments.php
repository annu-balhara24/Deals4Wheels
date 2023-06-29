<?php
include './dbconfigur.php';
$product_id = $_GET['product_id'];
if (!empty($user_id)) {

    $error = "";
    //Code for saving category
    if (isset($_POST['btnsubmit'])) {
        extract($_POST);
        $hash = password_hash($cvv, PASSWORD_DEFAULT);
        $hash_cardno = password_hash($card_no, PASSWORD_DEFAULT);

        echo $sql_query = "insert into payments (user_id,product_id,card_type,card_no,name_on_card,cvv,expiry_date,expiry_month) values('" . $user_id . "','" . $product_id . "','" . $card_type . "','" . $hash_cardno . "','" . $name_on_card . "','" . $hash . "','" . $expiry_date . "','" . $expiry_month . "')";
        $result = $conn->query($sql_query);
        if ($result) {
            header("location:payments.php?status=success");
        } else {
            $error = "Data has not been saved.";
        }
    }
    ?>
    <html>
        <head>
            <title>Payments</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
          <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/reg-style.css">
            <script type="text/javascript">
                function formValidation() {

                    var card_type = document.getElementById('card_type').value;
                    if (card_type.trim() == "") {
                        alert('Please select card type.');
                        return false;
                    }
                    var name_on_card = document.getElementById('name_on_card').value;
                    if (name_on_card.trim() == "") {
                        alert('Please enter your name on card.');
                        return false;
                    }

                    var alphaExp = /^[a-z A-Z]+$/;
                    if (!name_on_card.match(alphaExp)) {
                        alert("Name on Card shoud be alphabatic.");
                        return false;
                    }

                    var card_no = document.getElementById('card_no').value;
                    if (card_no.trim() == "") {
                        alert('Please enter your card no.');
                        return false;
                    }
                    // if (card_no.toString().length != 16) {
                    if(card_no.strlen() != 16) {
                        alert("Card No must be 16 digit long.");
                        return false;
                    }
                    var expiry_date = document.getElementById('expiry_date').value;
                    if (expiry_date.trim() == "") {
                        alert('Please select card expiry date.');
                        return false;
                    }
                    var expiry_month = document.getElementById('expiry_month').value;
                    if (expiry_month.trim() == "") {
                        alert('Please select card expiry date.');
                        return false;
                    }
                    var cvv = document.getElementById('cvv').value;
                    if (cvv.trim() == "") {
                        alert('Please enter your cvv.');
                        return false;
                    }
                    if (cvv.toString().length != 3) {
                        alert("CVV No must be 3 digit long.");
                        return false;
                    }


                }

                //check for integer
                function CheckInteger(i) {
                    if (i.value.length > 0) {
                        i.value = i.value.replace(/[^\d]+/g, '');
                    }
                }
            </script>
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

            <div class="container" style="min-height: 500px;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div>
                        <?php
                        include './leftmenu.php';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div>
                        <form action="" method="post">
                            <?php
                            if (!empty($error)) {
                                echo '<div class="style">' . $error . '</div>';
                            }

                            if (isset($_GET['status']) && $_GET['status'] == "success") {
                                echo '<div class="style">Your Payment have been successfully done. Seller will contact you soon, If you have any query you can contact  us.</div>';
                            }else{
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Card:</label>
                                        <select name="card_type" id="card_type" class="form-control" required>
                                            <option value="" selected=""></option>
                                            <option value="Credit">Credit Crad</option>
                                            <option value="Debit">Debit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name on Card:</label>
                                        <input type="hidden" name="pay_id" id="pay_id" value="<?php echo $_GET['adsid'] ?>" />
                                        <input type="text" name="name_on_card" id="name_on_card" required="" class="form-control"/>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Card No.:</label>
                                        <!-- <input type="number" name="card_no" id="card_no" required="" maxlength="16" onkeyup="CheckInteger(this)" class="form-control" pattern="[0-9]{16}" title="16 digits"/>
                                       -->
                                    <input type="number" id="card_no" name="card_no" onblur="cardValidate();" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Expiry Date:</label>
                                        <select name="expiry_date" id="expiry_date" class="form-control" required>
                                            <option value="" selected=""> </option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <select name="expiry_month" id="expiry_month" class="form-control" required>
                                        <option value="" selected=""></option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CVV:</label>
                                        <input type="text" name="cvv" id="cvv" required="" maxlength="3" onkeyup="CheckInteger(this)" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Amount:</label>
                                        <input type="text" name="amount" id="amount" required="" maxlength="3" onkeyup="CheckInteger(this)" class="form-control" placeholder="499" readonly />

                                    </div>
                                </div>
                            </div>
                            <!-- <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-two">Submit</button><p><br/></p> -->
                            <div class="row">
                              <div class="col-sm-9">
                                  <div class="form-group">
                            <input type="submit" class="btn btn-primary btnRegister"  value="PAY"/ name="btnsubmit" id="btnsubmit">
</div>
</div>
</div>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>

            <br><br><br><br>
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
    <?php
} else {
    header("location:login.php?msg=login");
    ob_flush();
}

mysqli_close($conn);
?>
