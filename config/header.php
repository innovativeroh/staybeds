<?php include_once("connection.php"); ?>
<link rel="stylesheet" href="./assets/css/main.css" type="text/css">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

<link rel="icon" type="image/png" href="./assets/img/favicon.png" />
<header>
    <div id="wrapper">
    <div class="header-flex-box">
            <div class="header-flex-area">
                <a href="index.php"><img src="./assets/img/logo-wide.png" width="140px" style="padding: 10px;"></a>
            </div>
            <div class="header-flex-area mobile_hide">
                <div style="position: relative;">
                <form action="search.php" method="GET">
                    <input type="text" name="q" placeholder="Search by city, pg or property name" id="header_search">
                    <button type="submit" name="go" id="search_button"><i class="fas fa-search"></i></button>
                </form>
                </div>
            </div>
            <div class="header-flex-area mobile_hide">
                
                <?php if (isset($_SESSION['username'])) {?>
                    <div style='position: relative;'>
                    <div class='profile_section' style='padding: 6px 10px;' onclick="dropdown_trigger()">
                        <div>
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div>
                        <p style='font-size: 10px;'>Hello,
                        <p style='font-size: 12px;'><?=$global_name?></p>
                    </div>
                    </div>
                    <div class="dropdown_menu">
                            <button><i class="fa-solid fa-user"></i>&nbsp; Edit Profile</button><br>
                            <button><i class="fa-solid fa-message"></i> Queries</button><br>
                            <a href='logout.php'><button><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class='profile_section' onclick="location.href='login.php';">
                        <div>
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div>
                        <p>Login/Signup</p>
                    </div>
                    </div>
                        <?php } ?>
                        <button class="header_button" style='margin-right: 10px;'><i class="fa-solid fa-bell"></i></button>
                        <button chref="" data-modaal-content-source="#loginer" data-modaal-type="inline" data-modaal-animation="fade" class="header_button modaal" style='margin-right: 10px;'><i class="fa-solid fa-circle-plus" style='color: #4ca64c;'></i></button>
                    </div>
        </div>
    </div>
</header>

<div id="loginer" style="display:none;">
            <div class="modal-body">
                <div class="modal-content">
                    <div id="loginMobile">
                        <h2>Post Property</h2>
                        <p class='label_area'>Tell us something about yourself?</p>
                        <?php
                            $author = @$_POST['author'];
                            $city = @$_POST['city'];
                            $pg_name = @$_POST['pg_name'];
                            $date = date('d-m-y');
                            if(isset($_POST['create_pg'])) {
                                
                                function generateRandomString($length = 6) {
                                    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
                                }
                                $token = generateRandomString();
                            $sql = "INSERT INTO `pages`(`id`, `name`, `price`, `bio`, `token`, `city`, `address`, `zip_code`, `admin`, `author`, `date`, `deleted`) VALUES (null,'$pg_name','','','$token','$city','','','$global_id','$author','$date','0')";
                            $query = mysqli_query($conn, $sql);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=edit.php?code=$token\">";
                    exit();
                        }
                        ?>
                        <form action='index.php' method='POST'>
                        <div class='radio_container'>
                        <input type='radio' name='author' value='Owner' id='one' checked>
                            <label for="one">Owner</label>
                            <input type='radio' name='author' value='Agent' id='two' >
                            <label for="two">Agent</label>
                        </div>
                        <hr style='margin: 20px 0px; height: 1px; border: 0 none; background: #f1f1f1;'>
                        <p class='label_area'>Select City your property is located in</p>
                        <select name='city' class='city_selector' required>
                        <option value=''>Select City</option>
                        <?php
                    $sql = "SELECT * FROM `config_city` ORDER BY `value`";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $value = $rows['value'];
                        echo "<option value='$value'>$value</option>";
                    }
                ?>
                        </select>
                        <hr style='margin: 20px 0px; height: 1px; border: 0 none; background: #f1f1f1;'>
                        <p class='label_area'>What do you call your PG / Hostel?</p>
                        <input type='text' name='pg_name' placeholder='Atelier' class='huge_input' required>
<br><br>
                        <button type="submit" name="create_pg" class="button_styler">Create <i class="fa-sharp fa-solid fa-arrow-right"></i></button>
                </form>
                    </div>
                    </div>
                    </div>
                    </div>

<div class="mobile_header_nav">
    <div class="mobile_nav_flex_but">
        <button><i class="fa-solid fa-house"></i>
        <p>Home</p>
        </button>
        <button><i class="fa-solid fa-magnifying-glass"></i>
        <p>Search</p></button>
        <button><i class="fa-solid fa-user"></i>
        <p>Profile</p></button>
        <button><i class="fa-solid fa-circle-plus"></i>
        <p>Add</p></button>
        <button><i class="fa-solid fa-gear"></i>
        <p>Config</p></button>
    </div>
</div>
<script>
    let dropdown_area = document.querySelector('.dropdown_menu');
    function dropdown_trigger() {
        if(dropdown_area.style.display == 'none') {    
        dropdown_area.style.display = 'block';
    } else {
        dropdown_area.style.display = 'none';
    }
    }
</script>
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script src="
https://cdn.jsdelivr.net/npm/modaal@0.4.4/dist/js/modaal.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/modaal@0.4.4/dist/css/modaal.min.css
" rel="stylesheet">
<script>
$('.inline').modaal({
	content_source: '#inline'
});
  </script>

<script src="https://kit.fontawesome.com/70edc5e2f3.js" crossorigin="anonymous"></script>