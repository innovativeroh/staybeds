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
                $update = "0";
                $update = @$_GET['update'];
                if(isset($_POST['save'])) {
                    $data_name = @$_POST['pg_name'];
                    $data_bio = @$_POST['pg_description'];
                    $data_city = @$_POST['pg_city'];
                    $data_zip_code = @$_POST['pg_zip_code'];
                    $data_address = @$_POST['address'];
                    $data_price = @$_POST['pg_price'];

                    $sql = "UPDATE `pages` SET `name`='$data_name',`price`='$data_price',`bio`='$data_bio', `city`='$data_city', `address`='$data_address', `zip_code`='$data_zip_code' WHERE `token`='$token'";
                    $query = mysqli_query($conn, $sql); 
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=edit.php?code=$token&update=1\">";
                    exit();
                }
                if($update == "1") {
                    echo "<p style='display: block; padding: 10px; background: #317431; color: #fff; font-size: 12.5px; font-weight: 500;'>Your Details Has Been Updated!</p>";
                }
            ?>
            <form action='edit.php?code=<?=$token?>' method='POST'>
                <span>Name</span>
                <input type='text' name='pg_name' value='<?=$name?>' placeholder='What is the name of PG'><br><br>
                <hr style='border: 0 none; height: 1px; background: #eee;'><br>
                <span>Price / per month</span>
                <input type='number' name='pg_price' value='<?=$price?>' placeholder='Cost per month!'><br><br>
                <hr style='border: 0 none; height: 1px; background: #eee;'><br>
                <span>Tell us something about?</span>
                <textarea name='pg_description' class='description-input'><?=$bio?></textarea> 
                <br><br>
                    <hr style='border: 0 none; height: 1px; background: #eee;'><br>
                    <div class='flex_contt'>
                        <span>Amenities</span>
                    <div style='flex: 1;'>
                    <?php
                    $sql = "SELECT * FROM `config_amenities`";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $id = $rows['id'];
                        $value = $rows['value'];
                        echo "<input type='checkbox' name='$value'>$value";
                    }
?>
</div>
                </div>
                <br><br>
                    <hr style='border: 0 none; height: 1px; background: #eee;'><br>
                    <div class='flex_contt'>
                    <div style='flex: 1;'>
                        <span>Preferred Gender</span>
                        <select name='pg_city'>
                            <option value="Male">Male</option>
                            <option value="Male">Female</option>
                            <option value="Unisex">Unisex</option>
                        </select>
                    </div>
                    <div style='flex: 1;'>
                        <span>Minimum Stay Periods (In Month's)</span>
                        <select name='pg_city'>
                        <option value="Male">None</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
            </select>
                    </div>
                </div>
                <br><br>
                    <hr style='border: 0 none; height: 1px; background: #eee;'><br>
                    <div class='flex_contt'>
                    <div style='flex: 1;'>
                        <span>City</span>
                        <select name='pg_city'>
                            <option name="<?=$city?>"><?=$city?></option>
                        <?php
                    $sql = "SELECT * FROM `config_city` ORDER BY `value`";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $value = $rows['value'];
                        echo "<option name='$value'>$value</option>";
                    }
                ?>
                        </select>
                    </div>
                    <div style='flex: 1;'>
                        <span>Zip Code</span>
                        <input type='text' name='pg_zip_code' value='<?=$zip_code?>' placeholder='Example 302012'><br><br>
                    </div>
                </div>
                <span>Where it is located?</span>
                <textarea name='address'><?=$address?></textarea> <br><br>
                <button type="submit" name="save" class="button_styler" style='border-radius: 0;'>Save</button>
            </div>
                </form>
        </div>
    </div>
</div>
<br>
<script src="./assets/js/ckeditor.js"></script>
<script>
        ClassicEditor
            .create(document.querySelector('.description-input'))
            .catch(error => {
                console.error(error);
            });
            </script>
<?php include_once("config/footer.php"); ?>
