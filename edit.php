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
<br><br><br><br>
<div id='more_wrapper'>
    <div class='edit_container'>
        <div class='flex_cont'>
            <div class='flex' style='flex: 2.5;'>
                <div style='width: 100%; background: #fff; box-sizing: border-box; border-radius: 10px; padding: 10px 20px;'>
                    <div class='info_card_cont'>
                        <div class='flex' style='flex: 1;'>
                        <center><i class="fa-solid fa-hotel"></i></center>
                        </div>
                        <div class='flex' style='flex: 8;'>
                            <p style='line-height: 10px; font-size: 13.5; font-weight: 500;'><?=$name?></p>
                            <p style='line-height: 10px; font-size: 12px; color: #555;'>Owner</p>
                        </div>
                    </div>
                    <hr style='height: 1px; background: #eee; border: 0 none;'>
                    <p style='font-weight: 600; letter-spacing: 1px; color: #333;'>Settings</p>
                    <a href='#'><button class='active'><i class="fa-solid fa-gauge"></i> Dashboard</button></a>
                    <a href='#'><button><i class="fa-solid fa-people-roof"></i> Rooms</button></a>
                    <a href='page.php?code=<?$token?>'><button><i class="fa-solid fa-eye"></i> View Page</button></a>
                </div>
            </div>
            <div class='flex settings' style='flex: 7.5;'>
                <div style='width: 100%; background: #fff; box-sizing: border-box; border-radius: 10px; padding: 10px 30px;'>
                    <h2>Property Dashboard</h2>
                    <p class='label_area'>You will categories your property as?</p>
                    <div class='radio_container2'>
                        <input type='radio' name='categories' value='PG' id='PG' checked>
                        <label for="PG">PG</label>
                        <input type='radio' name='categories' value='Hostel' id='Hostel'>
                        <label for="Hostel">Hostel</label>
                        <input type='radio' name='categories' value='Co-Living' id='Co-Living'>
                        <label for="Co-Living">Co-Living</label>
                    </div>
                    <p class='label_area'>What do you call your PG / Hostel?</p>
                    <input type='text' name='pg_name' placeholder='Atelier' value='<?=$name?>' class='huge_input' required>
                    <br><br>
                    <p class='label_area'>PG/Hostel Building Type <span style='color: red; display: inline;'>*</span></p>
                    <div class='radio_container3'>
                    <input type='radio' name='pt_type' value='Apartments' id='Apartments' checked>
                    <label for="Apartments">Apartments</label>
                    <input type='radio' name='pt_type' value='Builder Floor' id='Builder Floor'>
                    <label for="Builder Floor">Builder Floor</label>
                    <input type='radio' name='pt_type' value='House/Villa' id='House/Villa'>
                    <label for="House/Villa">House/Villa</label>
                    <input type='radio' name='pt_type' value='Penthouse' id='Penthouse'>
                    <label for="Penthouse">Penthouse</label>
                    <input type='radio' name='pt_type' value='Farmhouse' id='Farmhouse'>
                    <label for="Farmhouse">Farmhouse</label>
                    </div>
                    <br>
                    <p class='label_area'>What is the sole location? <span style='color: red; display: inline;'>*</span></p>
                    <select name='city' class='city_selector' required>
                        <option value='<?=$city?>'><?=$city?></option>
                        <?php
                    $sql = "SELECT * FROM `config_city` ORDER BY `value`";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($query)) {
                        $value = $rows['value'];
                        echo "<option value='$value'>$value</option>";
                    }
                ?>
                        </select>
                        <p class='label_area'>Which city your property is located? <span style='color: red; display: inline;'>*</span></p>
                    <input type='text' name='pg_address' onkeypress='sole_location()' placeholder='4 BHK Apartment, Sirsi Road, Jaipur' class='huge_input' id='location_inp' required><br>
                    <iframe class="map" id="location_show" style="border-radius: 12px; margin-top: 20px;" width="100%" height="280" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=520&amp;hl=en&amp;q=<?=$address.", ".$city?>+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe>
                        <br>
                        <br>
                    <p class='label_area'>Preferred Gender <span style='color: red; display: inline;'>*</span></p>
                    <div class='radio_container3'>
                    <input type='radio' name='pt_gender' value='Male' id='Male' checked>
                    <label for="Male">Male</label>
                    <input type='radio' name='pt_gender' value='Female' id='Female'>
                    <label for="Female">Female</label>
                    <input type='radio' name='pt_gender' value='Unisex' id='Unisex'>
                    <label for="Unisex">Unisex</label>
                    </div>
                    <br>
                    <p class='label_area'>Minimum Stay Period (In months) <span style='color: red; display: inline;'>*</span></p>
<div class='radio_container3'>
                    <input type='radio' name='pt_miminum' value='None' id='None' checked>
                    <label for="None">None</label>
                    <input type='radio' name='pt_miminum' value='1' id='1'>
                    <label for="1">1</label>
                    <input type='radio' name='pt_miminum' value='2' id='2'>
                    <label for="2">2</label>
                    <input type='radio' name='pt_miminum' value='3' id='3'>
                    <label for="3">3</label>
                    <input type='radio' name='pt_miminum' value='4' id='4'>
                    <label for="4">4</label>
                    <input type='radio' name='pt_miminum' value='5' id='5'>
                    <label for="5">5</label>
                    <input type='radio' name='pt_miminum' value='6' id='6'>
                    <label for="6">6</label>                    
            </div>
            <br>
            <p class='label_area'>Select Notice Period <span style='color: red; display: inline;'>*</span></p>
<div class='radio_container3'>
<input type='radio' name='pt_notice' value='No Notice Period' id='No Notice Period' checked>
                    <label for="No Notice Period">No Notice Period</label>
                    <input type='radio' name='pt_notice' value='1 Week' id='1 Week' checked>
                    <label for="1 Week">1 Week</label>
                    <input type='radio' name='pt_notice' value='15 Days' id='15 Days' checked>
                    <label for="15 Days">15 Days</label>
                    <input type='radio' name='pt_notice' value='1 Month' id='1 Month' checked>
                    <label for="1 Month">1 Month</label>
                    <input type='radio' name='pt_notice' value='2 Months' id='2 Months' checked>
                    <label for="2 Months">2 Months</label>
                    </div>
                    <br><br>
                    <button type="submit" name="create_pg" class="button_styler">Save</button>
                    <br><br>    
                </div>