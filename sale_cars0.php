<?php
include './dbconfigur.php';
if (!empty($user_id)) {
    $error = "";
    //Code for saving category
    if (isset($_POST['btnsubmit'])) {
        extract($_POST);
        if (empty($brands)) {
            $error = "Please Select brands.";
        }
        $current_image = $_FILES['imagepath']['name'];
        $path = "uploads/";
        $time = date("fYhis");
        $comImagePath = "";
        //upload profile images
        $profile_image = $_FILES['imagepath']['name'];
        if ($profile_image != '') {
            $extension = substr(strrchr($profile_image, '.'), 1); //filethumgimg
            $comImagePath = $path . "/" . $time . "." . $extension;
            $action = copy($_FILES['imagepath']['tmp_name'], $comImagePath);
        }

        $current_image = $_FILES['imagepath2']['name'];
        $path = "uploads/";
        $time = date("fYhis");
        $comImagePath2 = "";
        //upload profile images
        $profile_image = $_FILES['imagepath2']['name'];
        if ($profile_image != '') {
            $extension = substr(strrchr($profile_image, '.'), 1); //filethumgimg
            $comImagePath2 = $path . "/" . $time . "." . $extension;
            $action = copy($_FILES['imagepath2']['tmp_name'], $comImagePath2);
        }

         $current_image = $_FILES['imagepath3']['name'];
        $path = "uploads/";
        $time = date("fYhis");
        $comImagePath3 = "";
        //upload profile images
        $profile_image = $_FILES['imagepath3']['name'];
        if ($profile_image != '') {
            $extension = substr(strrchr($profile_image, '.'), 1); //filethumgimg
            $comImagePath3 = $path . "/" . $time . "." . $extension;
            $action = copy($_FILES['imagepath3']['tmp_name'], $comImagePath3);
        }
        echo $sql_query = "INSERT INTO cars(user_id,brands,car_type,car_engine,car_fuel,car_yom,car_km,description,sales_price,imagepath,imagepath2,imagepath3,created)"
        . "VALUES('" . $user_id . "','" . $brands . "','" . $car_type . "','" . $car_engine . "','" . $car_fuel . "','" . $car_yom . "','" . $car_km . "','" . $description . "','" . $sales_price . "','" . $comImagePath . "','" . $comImagePath2 . "','".$comImagePath3."','" . date('Y-m-d') . "')";
        $result = $conn->query($sql_query);
        if ($result) {
            $ads_id = mysqli_insert_id($conn);
            header("location:sale_cars.php?carid=" . $car_id);
        } else {
            $error = "Data has not been saved.";
        }
    }
    ?>
    <html>
        <head>
            <title>Sales Cars  - Car Sales Purchase</title>
            <?php include 'title.php'; ?>
            <script type="text/javascript">
                function formValidation() {

                    var category = document.getElementById('brands').value;
                    if (category.trim() == "") {
                        alert('Please select Car brands');
                        return false;
                    }

                    var ads_for = document.getElementById('car_type').value;
                    if (ads_for.trim() == "") {
                        alert('Please select car type.');
                        return false;
                    }


                    var no_of_day = document.getElementById('car_engine').value;
                    if (no_of_day.trim() == "") {
                        alert('Please enter Engine CC.');
                        return false;
                    }

                    var start_date = document.getElementById('car_fuel').value;
                    if (start_date.trim() == "") {
                        alert('Please enter Fuel Type.');
                        return false;
                    }
                    var title = document.getElementById('car_yom').value;
                    if (title.trim() == "") {
                        alert('Please enter Year of Manufacture');
                        return false;
                    }
                    var ads_img = document.getElementById('car_km').value;
                    if (ads_img.trim() == "") {
                        alert('Please enter car Kilometers Run.');
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
        <body>
            <?php
            include 'header.php';
            ?>
            <header id="head" class="secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1>Sales Cars</h1>
                        </div>
                    </div>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                            if (!empty($error)) {
                                echo '<div class="style">' . $error . '</div>';
                            }
                            if (isset($_GET['status']) && $_GET['status'] == "success") {
                                echo '<div class="style">Sales Car has been successfuly added.</div>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Car Brands:</label>
                                        <select name="brands" id="brands" class="form-control"  required="">
                                            <option> - - - - Select - - - - </option>
                                            <?php
                                            $sql = "SELECT * FROM brands ORDER BY id ASC";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['brands'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Car Type:</label>
                                            <select name="car_type" id="car_type" class="form-control"  required="">
                                            <option> - - - - Select - - - - </option>
                                            <?php
                                            $sql = "SELECT * FROM brands ORDER BY id ASC";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['car_type'] ?>"><?php echo $row['car_type'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Engine CC:</label>
                                        <input type="text" name="car_engine" id="car_engine" required="" maxlength="12"  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fuel Type:</label>
                                        <input type="text" name="car_fuel" id="car_fuel" required="" maxlength="20"  class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Year of Manufacture:</label>
                                        <input type="text" name="car_yom" id="car_yom" required=""  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kilometers Run:</label>
                                        <input type="text" name="car_km" id="car_km" required="" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Other Description:</label>
                                        <input type="text" name="description" id="description" required=""  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price:</label>
                                        <input type="text" name="sales_price" id="sales_price" required="" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <input type="file" name="imagepath" id="imagepath" required=""  class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Image:</label>
                                        <input type="file" name="imagepath2" id="imagepath2" required=""  class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <input type="file" name="imagepath3" id="imagepath3" required=""  class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-two">Submit</button><p><br/></p>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </body>
    </html>
    <?php
} else {
    header("location:login.php?msg=login");
    ob_flush();
}

mysqli_close($conn);
?>
