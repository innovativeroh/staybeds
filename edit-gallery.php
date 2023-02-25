<?php include_once("config/header.php"); ?>
<?php
    $code = @$_GET['code'];
    $sql = "SELECT * FROM `pages` WHERE `token`='$code'";
    $query = mysqli_query($conn, $sql);
    while($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $name = $rows['name'];
        $city = $rows['city'];
        $bio = $rows['bio'];
        $zip_code = $rows['zip_code'];
        $address = $rows['address'];
        $token = $rows['token'];
        $price = $rows['price'];
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/css/edit.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Staybeds</title>
</head>
<br><br><br>
<div id='more_wrapper'>
    <div class='edit_container'>
        <div class='flex_cont'>
            <div class='flex' style='flex: 2.5;'>
                <p class='review_alert'>Unpublished</p>
                <hr style='border: 0 none; background: #eee; height: 1px;'></hr>
                <button class='sidebar_btn'><a href='edit.php?code=<?=$token?>'><i class="fa-solid fa-gauge" style='padding-right: 10px;'></i> Dashbaord</a></button>
                <button class='sidebar_btn'><a href='edit-gallery.php?code=<?=$token?>'><i class="fa-solid fa-image" style='padding-right: 10px;'></i> Gallery</a></button>
                <button class='sidebar_btn'><a href='page.php?code=<?=$token?>'><i class="fa-solid fa-eye" style='padding-right: 10px;'></i> View Page</a></button>
            </div>
            <div class='flex' style='flex: 7.5;'>
            <?php
                echo mysqli_uploaderd;
            ?>
        </div>
    </div>
</div>
</div>
<br>
<?php include_once("config/footer.php"); ?>
