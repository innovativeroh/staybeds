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
        $address = $rows['address'];
        $zip_code = $rows['zip_code'];
        $admin = $rows['admin'];
        
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
    <br><br><br>
            <div class="more_wrapper">
                <div style="padding: 20px; box-sizing: border-box;">
                <br>
                <h1 style='font-weight: 500; font-size: 28px; line-height: 0px; display: inline;'><?=$name?>
                <?php if($global_id == $admin) {
                ?>
                <a href='edit.php?code=<?=$token?>'><button style='float: right;' class='page_edit_btn'><i class="fa-solid fa-pen-to-square"></i> Edit</button></h1></a>
                <?php
            }
                ?>
                <div style='clear: both'></div>
                <a href='#' style='color: #000; font-size: 14px;'><i class="fa-solid fa-location-crosshairs"></i> <?=$city.", ".$zip_code?></a>
                <br><br>
            <div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true, "pageDots": false }'>
  <?php
    $sql = "SELECT * FROM `pages_media` WHERE `connection`='$id'";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $image = $row['url'];
        echo '<div class="carousel-cell" style="width: 100%; height: 400px; background-color: #317431; background-image: url('.$image.'); background-size: cover;">
        <div class="carousel-overlay2">
          </div>
        </div>';
    }
  ?>
</div>
<div class="flex_container_page">
    <div class="flex" style='flex: 7; background: #fff; margin: 20px 10px; border-radius: 10px;'>
        <h3>Description</h3>
        <p><?=$bio?></p>
        <br><hr></hr><br>
        <div class='inner_flex'>
            <div class='inner_flex_area'>
        <h3><i class="fa-solid fa-user"></i> Contact Person</h3>
        <p><?=$admin_name?></p>
</div>                <div class='inner_flex_area'>
        <h3><i class="fa-solid fa-qrcode"></i> Unique Code</h3>
        <p><?=$token?></p>
</div>    
<div class='inner_flex_area'>
        <h3><i class="fa-solid fa-qrcode"></i> City</h3>
        <p><?=$city?></p>
</div>    
    </div>
    <br><hr></hr><br>
    <h3>Address</h3>
    <p> <?=$address?></p>    
    <br><hr></hr><br>
    <div style="width: 100%"><iframe class="map" style="border-radius: 12px;" width="100%" height="520" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=520&amp;hl=en&amp;q=<?=$address?>+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe></div>
</div>
    <div class="flex" style='padding: 0px; flex: 3; margin: 20px 10px; border-radius: 10px;'>
        <div class='booking_area'>
        <h3 style='line-height: 25px;'>Enquire Now!</h3>
        <?php if (isset($_SESSION['username'])) {?>
            <?php
            $success = "0";
                if(isset($_POST['send'])) {
                $e_date = @$_POST['date_selection'];
                $e_query = @$_POST['query'];
                $sql = "INSERT INTO `page_enquiry`(`id`, `date`, `bio`, `user`, `connection`) VALUES (null,'$e_date','$e_query','$global_id','$id')";
                $query = mysqli_query($conn, $sql);
                $success = "1";
            }
            if(!$success == "1") {
            ?>
            <form action="page.php?code=<?=$token?>" method="POST">
            <label for="date_selection">BOOKING DATE</label>
            <input type="date" onfocus="this.showPicker()" min="<?=date('Y-m-d');?>" value="<?=date('Y-m-d');?>" name="date_selection" class="input">
<br><br>
            <label for="date_selection">Your Query?</label>
            <textarea name="query" class="query"></textarea>
            <button type="submit" name="send">Send</button>
        </div>
        </form>
<?php } else {
    ?>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <center><lottie-player src="https://assets6.lottiefiles.com/packages/lf20_zwkm4xbs.json"  background="transparent"  speed="1"  style="width: 150px; height: 150px;" autoplay></lottie-player>
    <p>Your Enquiry Has Been Sent!</p>
</center>
    <?php
}} else { ?>
    <p style='line-height: 20px;'>You must be logged in before enqiring!
    <a href='login.php'><button>Login / Sign Up</button></a><p>
<?php } ?>
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
        $sql2 = "SELECT * FROM `pages_media` ORDER BY `id` LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
        $url = $row['url'];
    ?><div  onclick="location.href='page.php?code=<?=$token?>';" class="carousel-cell" style="background-color: #317431; background-image: url(<?=$url?>); background-size: cover;">
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
        <div class="carousel-cell" style="background-color: #317431; background-image: url('assets/img/room (1).jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Himanshu's PG</h3>
        <p style='display: inline; color: #fff;'><i class="fa-solid fa-location-crosshairs"></i> Udaipur</p><span>₹3,000</span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="background-color: #317431; background-image: url('assets/img/room (2).jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Himanshu's PG</h3>
        <p style='display: inline; color: #fff;'><i class="fa-solid fa-location-crosshairs"></i> Udaipur</p><span>₹3,000</span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="background-color: #317431; background-image: url('assets/img/room (3).jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Himanshu's PG</h3>
        <p style='display: inline; color: #fff;'><i class="fa-solid fa-location-crosshairs"></i> Udaipur</p><span>₹3,000</span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="background-color: #317431; background-image: url('assets/img/room (4).jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Himanshu's PG</h3>
        <p style='display: inline; color: #fff;'><i class="fa-solid fa-location-crosshairs"></i> Udaipur</p><span>₹3,000</span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="background-color: #317431; background-image: url('assets/img/room (5).jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Himanshu's PG</h3>
        <p style='display: inline; color: #fff;'><i class="fa-solid fa-location-crosshairs"></i> Udaipur</p><span>₹3,000</span>
    </div>
    </div>
  </div>
  </div>
            </div>
        </div>
</div>

<br><br>
<?php include_once("config/footer.php"); ?>
