<?php include_once("config/header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Staybeds</title>
</head>
<br>
        <div class="search_container">
            <div class="overlay">
            <div class="inner_wrapper">
            <br><br>
            <h1 style='line-height: 0px;'>Discover</h1>
            <p style='font-size: 13.5px;'>Discover a wide range of affordable and convenient PG options across the city with just a few clicks</p>
            <form action="search.php">
            <div class="search_input_container">
                    <div class="seach_input_flex" style='flex: 6;'>
                    <input type="text" name="q" class="search_main_inp" placeholder="What are you looking for?">
                    </div>
                    <div class="seach_input_flex" style='flex: 2;'>
                    <select name="city" class="search_main_inp">
                        <option value="Delhi">Delhi</option>
                        <option value="Mumbai">Mumbai</option>
                    </select>
                </div>
                    <div class="seach_input_flex" style='flex: 1.5;'>
                        <button type="submit" class="search_main_inp_btn">Search</button>
                    </div>
                    </div>
        </form>
        <br><br>
            </div>
</div>
        </div>
        <div id="wrapper">
        <br>
        <h2 style="color: #222;">Top <f style='font-weight: 300;'>Ratings </f> <i class="fa-solid fa-arrow-trend-up"></i></h2>
        <div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true }'>
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
<br><br>
  <div class="app_area">
      <div class="flex_container">
        <div class="flex_box">
            <center><img src='./assets/img/landing_img.svg' width="60%">
            <h3>Your Content Here</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus sagittis eros sed suscipit. Sed in laoreet tellus. Aenean suscipit lacus vel ante sollicitudin ullamcorper. Maecenas ut leo et lorem blandit scelerisque vel id neque. Sed gravida nibh diam, at bibendum enim placerat quis. Aliquam faucibus pellentesque nunc, non laoreet turpis ultricies ac. Donec pellentesque erat quis massa cursus, vitae aliquam risus tempus. Fusce hendrerit enim nisi, </p>
            </center>
        </div>
        <div class="flex_box">
        <center><img src='./assets/img/landing_img2.svg' width="40%">
            <h3>Your Content Here</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus sagittis eros sed suscipit. Sed in laoreet tellus. Aenean suscipit lacus vel ante sollicitudin ullamcorper. Maecenas ut leo et lorem blandit scelerisque vel id neque. Sed gravida nibh diam, at bibendum enim placerat quis. Aliquam faucibus pellentesque nunc, non laoreet turpis ultricies ac. Donec pellentesque erat quis massa cursus, vitae aliquam risus tempus. Fusce hendrerit enim nisi, </p>
            </center>
        </div>
        <div class="flex_box">
        <center><img src='./assets/img/landing_img3.svg' width="60%">
            <h3>Your Content Here</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus sagittis eros sed suscipit. Sed in laoreet tellus. Aenean suscipit lacus vel ante sollicitudin ullamcorper. Maecenas ut leo et lorem blandit scelerisque vel id neque. Sed gravida nibh diam, at bibendum enim placerat quis. Aliquam faucibus pellentesque nunc, non laoreet turpis ultricies ac. Donec pellentesque erat quis massa cursus, vitae aliquam risus tempus. Fusce hendrerit enim nisi, </p>
            </center>
        </div>
    </div>
  </div>
  <h2 style="color: #222;">Dis<f style='font-weight: 300;'>counts</f> <i class="fa-solid fa-arrow-trend-up"></i></h2>
        <div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true }'>
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
  </div><br><br><br>
  <h2 style="color: #222;">Discover Our Beautiful <f style='font-weight: 300;'>India</f> <i class="fa-solid fa-arrow-trend-up"></i></h2>
  <div class="carousel" data-flickity='{ "autoPlay": true, "freeScroll": true,
"contain": true,
"prevNextButtons": false,
"pageDots": false }'>
  <div class="carousel-cell" style="width: 20%; background-color: #317431; background-image: url('assets/img/delhi.jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Delhi</h3>
        <p style='display: inline; color: #fff;'>Heart Of India</p></span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="width: 20%; background-color: #317431; background-image: url('assets/img/mumbai.jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Mumbai</h3>
        <p style='display: inline; color: #fff;'>Experience the Vibrant Energy of Mumbai</p></span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="width: 20%; background-color: #317431; background-image: url('assets/img/chennai.jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Chennai</h3>
        <p style='display: inline; color: #fff;'>Embrace the Culture and Charm of Chennai</p></span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="width: 20%; background-color: #317431; background-image: url('assets/img/bihar.jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Bihar</h3>
        <p style='display: inline; color: #fff;'>Explore the Rich Heritage of Bihar</p></span>
    </div>
    </div>
  </div>
  <div class="carousel-cell" style="width: 20%; background-color: #317431; background-image: url('assets/img/rajasthan.jpg'); background-size: cover;">
  <div class="carousel-overlay">
    <div class="name-location">
        <h3>Rajasthan</h3>
        <p style='display: inline; color: #fff;'>Discover the Magic of Rajasthan</p></span>
    </div>
    </div>
  </div>
  </div>
  <br><br>
</div>
    </div>
    <div class='pre-footer'>
        <div id='wrapper'>
            <div class="flex-container">
                <div class="flex-box"><br>
                    <h2 style='line-height: 2px;'>Download App Now!</h2>
                    <p style='color: #888;'>Get India's #1 Instant PG Booking App, join happy members</p>
                </div>
                <div class="flex-box">
                <a href="#" style="float: right; text-decoration: none; color: #fff; font-size: 16px; font-weight: 300; background: #4ca64c; border-radius: 10px; border: 1px solid #4ca64c; padding: 10px; margin-top: 30px;"><i class="fa-solid fa-circle-down"></i> Download Now</a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("config/footer.php"); ?>
<body>