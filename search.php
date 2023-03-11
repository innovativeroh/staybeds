<?php include_once("config/header.php"); ?>
<?php
    $term = @$_GET['q'];
    $city_term = @$_GET['city'];
?>
<link rel="stylesheet" href="./assets/css/search.css" type="text/css">
<title>Eventos Hub - Search</title>
<br>
<div id="wrapper">
    <div class="search-flex-container">
        <div class="search-filter-area">
        <p class="filter-title-king"><i class="fa-solid fa-arrow-up-z-a"></i> Filter</p>
        <hr style="background: #f1f1f1; border: 0 none; height: 1px; margin-top: 10px; margin-bottom: 10px;"></hr>
        <form action="search.php?q=<?=@$_GET['q']?>">
            <input type="hidden" value="<?=@$_GET['q']?>" name="q">
            <p class="filter-title">City</p>
            <select name="city" class="search_filter_textarea">
            <option name='<?=$city_term?>'>Select</option>
                <?php
                    $sql = "SELECT * FROM `config_city` ORDER BY `value`";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $value = $rows['value'];
                        echo "<option name='$value'>$value</option>";
                    }
                ?>
            </select>
            <br><br>
                <button type="submit" class="filter_btn">Filter <i class="fa-solid fa-arrow-right"></i></button>
        </form>
        </div>
        <div class="search-area">
            <div class="search-card-container">
            <?php
                    $sql = "SELECT * FROM `pages` WHERE (`name` LIKE '%$term%') AND (`city` LIKE '%$city_term%') AND `deleted`='0' ORDER BY `id` ASC";
                    $query = mysqli_query($conn, $sql);
                    $search_count = mysqli_num_rows($query);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $city = $rows['city'];
                        $price = $rows['price'];
                        $token = $rows['token'];
                        $sql2 = "SELECT * FROM `pages_room` WHERE `connection`='$id' ORDER BY `id` LIMIT 1";
                        $query2 = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_assoc($query2);
                        $img_1 = $row['img_1'];
                        if($img_1 == "") {
                            $img_final = "assets/img/default_cover.jpg";
                        } else {
                            $img_final = "data/rooms/".$img_1;
                        }
            ?>
            <div class="search-card" onclick="location.href='page.php?code=<?php echo $url; ?>';">
                <img src="<?=$img_final?>" width="100%" height="140px">       
                <div style="padding-left: 10px; padding-bottom: 10px;">
                    <a href="page.php?code=<?=$token?>" class="title"><?=$name?></a>
                    <p class="location"><i class='fa fa-location'></i> <?=$city?></p>
                    <span><?=$token?></span><span>₹<?=$price?></span>
                </div>

            </div>
<?php
}?>
        </div>
        <?php
if($search_count == 0) {
    ?>
<center><lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lwnuxmxm.json"  background="transparent"  speed="1"  style="width: 60%; height: 400px;"  loop autoplay></lottie-player>
<br><p style="font-weight: bold; font-size: 16px; color: #333;">Uh! Oh! All empty here...</p>
<p style="font-size: 28px; color: #111; font-weight: bold;"><i class="fa fa-search" style="font-weight: bold; padding-right: 5px;"></i>"<?=$term?>"</p>
</center>
    <?php
}
?>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://kit.fontawesome.com/70edc5e2f3.js" crossorigin="anonymous"></script>
