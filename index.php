<?php include_once("config/header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Staybeds</title>
</head>
<br>
<div id="wrapper">
        <div class="search_container">
            <div class="overlay">
            <div class="inner_wrapper">
            <p style='line-height: 20px; display: inline;'>- Hospitality making your guests feel like they're at home, even if you wish they were.</p><br>
            <p style='line-height: 60px; display: inline; font-size: 42px; font-weight: 700;'>Justine Vogt</p>
            <div class='searcher'>
<form action="search.php" method='GET' style='display: inline;'>
            <div class="search_input_container">
                    <div class="seach_input_flex" style='flex: 8;'>
                    <input type="text" name="q" class="search_main_inp" style='font-size: 18px; font-weight: 300;' placeholder="What are you looking for?">
                    </div>
                    <div class="seach_input_flex" style='flex: 4; border-bottom: 2px solid #666;'>
                    <select name="city" class="search_main_inp">
                    <option name='<?=$city_term?>'>Location</option>
                <?php
                    $sql = "SELECT * FROM `config_city` ORDER BY `value`";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $value = $rows['value'];
                        echo "<option name='$value'>$value</option>";
                    }
                ?>
            </select>
                    </select>
                </div>
                    <div class="seach_input_flex" style='flex: 1;'>
                        <button type="submit" class="search_main_inp_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    </div>
        </form>
            </div>
          </div>
</div>
        </div>

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
<br><br>
  </div>
  <div class="app_area">
    <div id='wrapper'>
      <div class="flex_container">
        <div class="flex_box">
            <center><img src='./assets/img/landing (1).png' width="100%">
            <h3>About Us</h3>
            <p>Welcome to Staybeds, the premier online platform for booking paying guest accommodations. Our mission is to make it easy for travelers and students to find safe, comfortable, and affordable accommodations that meet their needs and budget.</p>
            </center>
        </div>
        <div class="flex_box">
        <center><img src='./assets/img/landing (2).png' width="100%">
            <h3>Travel and Technology</h3>
            <p>Founded by a team of travel and technology enthusiasts, Staybeds was created to address the growing demand for flexible and convenient accommodation options. Our team has a wealth of experience in the travel and technology industries and a passion for providing our users with the best possible experience.</p>
            </center>
        </div>
        <div class="flex_box">
        <center><img src='./assets/img/landing (3).png' width="100%">
            <h3>Features</h3>
            <p>With Staybeds, you can search and compare paying guest accommodations across multiple cities, view detailed property information, and book your stay with just a few clicks. Our user-friendly platform and advanced search filters make it easy to find the perfect accommodation to suit your needs, whether you're looking for a short-term stay or a long-term stay</p>
            </center>
        </div>
    </div>
  </div>
  </div>
  <div id='wrapper'>
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
        $sql2 = "SELECT * FROM `pages_room` WHERE `connection`='$id' ORDER BY `id` LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $count = mysqli_num_rows($query2);
        if($count > 0) {
        $row = mysqli_fetch_assoc($query2);
        $img_1 = $row['img_1'];
    }
    ?><div  onclick="location.href='page.php?code=<?=$token?>';" class="carousel-cell" style="background-color: #317431; background-image: url('data/rooms/<?=$img_1?>'); background-size: cover;">
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