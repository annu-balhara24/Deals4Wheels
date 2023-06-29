<div class=" container-fluid">
  <div class="row">
      <div class="col-md-3 register-left">
    <ul style="min-height: 400px;" style="list-style-type:none;">
        <?php
        if ($user_type == "admin") {
            ?>

            <li><a href="user_list.php" class="btn button-left">User List</a></li>
            <li><a href="cars_list.php" class="btn button-left">Car List</a></li>
            <li><a href="booked_car_list.php" class="btn button-left">Book Test Drive</a></li>
            <li><a href="contact_list.php" class="btn button-left">Contact List</a></li>
            <li><a href="changepassword.php" class="btn button-left">Change Password</a></li>
            <li><a href="logout.php" class="btn button-left">Logout</a></li>
            <?php
        } else {
            ?>
            <li><a href="sale_cars.php" class="btn button-left">Sell a Car</a></li>
              <li><a href="booked_car_list.php" class="btn button-left">Booked Car List</a></li> 
            <li><a href="sales_list.php" class="btn button-left">Sales List</a></li>
            <li><a href="changepassword.php" class="btn button-left">Change Password</a></li>
            <li><a href="logout.php" class="btn button-left">Logout</a></li>
        <?php } ?>

    </ul>
</div>
</div>
</div>
&nbsp; &nbsp;
