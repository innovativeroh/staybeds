<?php include_once("config/header.php"); ?>
<?php
    $token = @$_GET['code'];
    $sql = "SELECT * FROM `pages` WHERE `token`='$token'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if($count == "1") {
        while($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $name = $rows['name'];
        $price = $rows['price'];
        $bio = $rows['bio'];
        $token = $rows['token'];
        $city = $rows['city'];
        $pre_address = $rows['pre_address'];
        $address = $rows['address'];
        $zip_code = $rows['zip_code'];
        $admin = $rows['admin'];

        $pg_type = $rows['pg_type'];
        $category = $rows['category'];

        $gender = $rows['pg_gender'];
        
        $sql2 = "SELECT * FROM `users` WHERE `id`='$admin'";
        $query2 = mysqli_query($conn, $sql2);
        while($rows2 = mysqli_fetch_assoc($query2)) {
            $admin_name = $rows2['name'];
        }
        
        $date = $rows['date'];
        $deleted = $rows['deleted'];
        if($deleted == "1") {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
	        exit();
        }
    }
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
	    exit();
    }
?>
<title>Whispering Pines PG - Jaipur - Staybeds</title>
<link rel="stylesheet" href="./assets/css/page.css" type="text/css">
<br>
            <div class="more_wrapper" style='margin-top: 80px;'>
                <div style="padding: 20px; box-sizing: border-box;">
                <br>
                <h1 style='font-weight: 500; font-size: 28px; line-height: 0px; display: inline;'><?=$name?> - <?=$category?>
                <?php if($global_id == $admin) {
                
                ?>
                <a href='edit.php?code=<?=$token?>'><button style='float: right;' class='page_edit_btn'><i class="fa-solid fa-pen-to-square"></i> Edit</button></h1></a>
                <?php
            } else {
                ?>
<a href='index.php'><button style='float: right;' class='page_edit_btn'><i class="fa-sharp fa-solid fa-arrow-left"></i> Go Back</button></h1></a>
                
                <?php
}
                ?>
                <div style='clear: both'></div>
                <a href='#' style='color: #000; font-size: 14px;'><i class="fa-solid fa-location-crosshairs"></i> <?=$city.", ".$zip_code?></a>
                <br><br>
            <div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true, "pageDots": false }'>
  <?php
    $sql = "SELECT * FROM `pages_room` WHERE `connection`='$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if($count > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        $final_image = "data/rooms/".$img_1 = $row['img_1'];
        $final_image_2 = "data/rooms/".$img_2 = $row['img_2'];
        if($final_image == "data/rooms/") {
            $final_image = "assets/img/default_cover.jpg";
        } else {
            $final_image = $final_image;
        }
        if($final_image_2 == "data/rooms/") {
            $final_image_2 = "assets/img/default_cover.jpg";
        } else {
            $final_image_2 = $final_image_2;
        }
?>
<div class="carousel-cell" style="width: 100%; height: 400px; background-image: url('<?=$final_image?>'); background-size: cover;">
        <div class="carousel-overlay2">
          </div>
        </div>
        <div class="carousel-cell" style="width: 100%; height: 400px; background-image: url('<?=$final_image_2?>'); background-size: cover;">
        <div class="carousel-overlay2">
          </div>
        </div>
<?php
    }
} else {
  ?>
<div class="carousel-cell" style="width: 100%; height: 400px; background-image: url('./assets/img/default_cover.jpg'); background-size: cover;">
        <div class="carousel-overlay2">
          </div>
        </div>
  <?php
}
  ?>
</div>
<div class="flex_container_page">
    <div class="flex" style='flex: 6; background: #fff; margin: 20px 10px; border-radius: 10px;'>
    <h3>General Information</h3>
    <div class='inner_flex'>
    <div class='inner_flex_area'>
        <h3><i class="fa-solid fa-venus-mars"></i> Gender</h3>
        <p><?=$gender?></p>
</div>
    <div class='inner_flex_area'>
        <h3><i class="fa-solid fa-star"></i> Category</h3>
        <p><?=$category?></p>
</div>                <div class='inner_flex_area'>
        <h3><i class="fa-solid fa-people-roof"></i> Building</h3>
        <p><?=$pg_type?></p>
</div>    
<div class='inner_flex_area'>
        <h3><i class="fa-solid fa-location-crosshairs"></i> City</h3>
        <p><?=$city?></p>
</div>    
    </div>

    <br><hr></hr><br>
    <h3>Address</h3>
    <p><?=$pre_address?></p>    
    <p><?=$address?></p>    
    <div style="width: 100%"><iframe class="map" style="border-radius: 12px;" width="100%" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=520&amp;hl=en&amp;q=<?=$address?>+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe></div>
        <br><hr></hr>
    <br><h3>Gallery</h3>
        <?php
    $sql = "SELECT * FROM `pages_room` WHERE `connection`='$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    while($row = mysqli_fetch_assoc($query)) {
        $final_image = "data/rooms/".$img_1 = $row['img_1'];
        if($final_image == "data/rooms/") {
            $final_image_arr = "";
        } else {
            $final_image_arr = "<img src='".$final_image."' width='200px' height='200px' style='object-fit: cover; margin-right: 20px;'>";
        }
        $final_image_2 = "data/rooms/".$img_2 = $row['img_2'];
        if($final_image_2 == "data/rooms/") {
            $final_image_arr2 = "";
        } else {
            $final_image_arr2 = "<img src='".$final_image_2."' width='200px' height='200px' style='object-fit: cover; margin-right: 20px;'>";
        }
?>
    <?=$final_image_arr?>
    <?=$final_image_arr2?>
<?php
    }
  ?>
    </div>
    <div class="flex" style='padding: 0px; flex: 4; margin: 20px 10px; border-radius: 10px;'>
        <div class='booking_area'>
        <?php
                        $sql = "SELECT * FROM `pages_room` WHERE `connection`='$id'";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        if($count > "0") {
                            while($rows = mysqli_fetch_assoc($query)) {
                                $data_id = $rows['id'];
                                $data_nor = $rows['number_of_room'];
                                $data_ac_cont = $rows['ac_cont'];
                                if($data_ac_cont == '1') {
                                    $data_ac_cont = '<i class="fa-solid fa-snowflake"></i>';
                                } else {
                                    $data_ac_cont = '';
                                }
                                $data_electricity_water_cont = $rows['electricity_water_cont'];
                                if($data_electricity_water_cont == '1') {
                                    $data_electricity_water_cont = '<i class="fa-solid fa-faucet"></i> <i class="fa-solid fa-bolt"></i>';
                                } else {
                                    $data_electricity_water_cont = '';
                                }
                                $data_dth_cont = $rows['dth_cable_cont'];
                                if($data_dth_cont == '1') {
                                    $data_dth_cont = '<i class="fa-solid fa-tv"></i>';
                                } else {
                                    $data_dth_cont = '';
                                }
                                $data_security_deposit = $rows['security_deposit'];
                                $data_monthly_rent = $rows['monthly_rent'];
                                $data_sharing_type = $rows['sharing_type'];
                                $data_amenities = $rows['amenities'];
                                ?>
                    <div class='room_box_area'>
                            <div class='flex_box'>    
                            <p style='font-size: 14px; font-weight: 500; color: #333;'><?=$data_sharing_type?></p>
                            <?php
                                $split = explode(',', $data_amenities);
                                for($i=0; $i<sizeof($split); $i++){
                                    echo "<p class='spilited_comma'>".$split[$i]."</p>";
                                }
                                ?>
                                <p style='font-size: 12px; color: #888;'>Available from today</p>
                                <p style='color: #222; font-weight: 700; font-size: 14px;'><?=$data_nor?> <f style='font-weight: 300;'> Rooms</f>
                            </div>
                            <div class='flex_box'>
                                <p style='color: #222; font-weight: 700; font-size: 14px;'>₹ <?=$data_monthly_rent?> <f style='font-weight: 300;'>/ monthly rent</f>
                                <p style='color: #222; font-weight: 700; font-size: 14px;'>₹ <?=$data_security_deposit?> <f style='font-weight: 300;'>/ security deposit</f>
                                <p style='font-size: 14px; font-weight: 500; color: #333;' title='There are included!'><?=$data_ac_cont?> <?=$data_electricity_water_cont?> <?=$data_dth_cont?></p>
                            <button chref="" data-modaal-content-source="#bookinger<?=$data_id?>" data-modaal-type="inline" data-modaal-animation="fade" class="book_button modaal">Book</button>
                            </p>
                    </div>
                    </div>

                    <div id="bookinger<?=$data_id?>" style="display:none;">
            <div class="modal-body">
                <div class="modal-content">
                    <div id="loginMobile">
                    <?php
if (isset($_SESSION['username'])) {
?>
                        <h2>Book Now</h2>
                        <p class='label_area'>Booking Type</p>

                        <input type='text' name='booking_sharing_type' value='<?=$data_sharing_type?>' class='huge_input' disabled='disabled'>
                        <br><br>
                        <p class='label_area'>Select Date</p>
                        <input type='date' name='booking_sharing_type' class='huge_input'>
                        <br><br>
                        <button type="submit" name="create_pg" class="button_styler">Book Now <i class="fa-sharp fa-solid fa-arrow-right"></i></button>

<?php
} else {
    ?>
    <h2>Login </h2>
                        <p class='label_area'>To become a part of this room</p>
                        <a href='login.php'><button name="create_pg" class="button_styler">Login <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>

    <?php
}
?>
                    </div>
                            </div>
                            </div>
                            </div>

                                <?php
                            }
                        }
                     ?>
</div>
</div>
</div>
</div>



<div id="wrapper">
<h2 style="color: #222;">Find <f style='font-weight: 300;'>More</f></h2>
        <div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true}'>
  <?php
    $sql = "SELECT * FROM `pages` WHERE `deleted`='0' ORDER BY `id` ASC";
    $query = mysqli_query($conn, $sql);
    while($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $name = $rows['name'];
        $price = $rows['price'];
        $token = $rows['token'];
        $sql2 = "SELECT * FROM `pages_room` WHERE `connection`='$id' ORDER BY `id` LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $count = mysqli_num_rows($query2);
        if($count > 0) {
        $row = mysqli_fetch_assoc($query2);
        $img_1 = $row['img_1'];
        }
    ?>
    <div  onclick="location.href='page.php?code=<?=$token?>';" class="carousel-cell" style="background-color: #317431; background-image: url('data/rooms/<?=$img_1?>'); background-size: cover;">
        <div class="carousel-overlay">
          <div class="name-location">
              <h3><?=$name?></h3>
              <p style="display: inline; color: #fff;"><i class="fa-solid fa-location-crosshairs"></i><?=$city?></p><span><?=$price?></span>
          </div>
          </div>
        </div>
    <?php
    }
  ?>
  </div>
            </div>
        </div>
</div>

<br><br>
<?php include_once("config/footer.php"); ?>
