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
        $pg_category = $rows['category'];
        $pgtype = $rows['pg_type'];
        $pggender = $rows['pg_gender'];
        $pgminimum = $rows['pg_minimum'];
        $pgnotice = $rows['pg_notice'];
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
                    <a href='edit.php?code=<?=$token?>'><button><i class="fa-solid fa-gauge"></i> Dashboard</button></a>
                    <a href='edit-rooms.php?code=<?=$token?>'><button class='active'><i class="fa-solid fa-people-roof"></i> Rooms</button></a>
                    <a href='page.php?code=<?=$token?>'><button><i class="fa-solid fa-eye"></i> View Page</button></a>
                </div>
            </div>
            <div class='flex settings' style='flex: 7.5;'>
                <div style='width: 100%; background: #fff; box-sizing: border-box; border-radius: 10px; padding: 10px 30px;'>
                    <button chref="" data-modaal-content-source="#add_room" data-modaal-type="inline" data-modaal-animation="fade" class="modaal add_button"><i class="fa-solid fa-circle-plus" style='color: #4ca64c;'></i> Add Room</button>
                    <h2>Rooms Management</h2>
                    
                </div>
            </div>
            <div id="add_room" style="display:none;">
            <div class="modal-body">
                <div class="modal-content">
                    <div id="loginMobile">
                        <?php
                            $sharing_type = @$_POST['sharing_type'];
                            $num_of_room = @$_POST['num_of_room'];
                            $ac_rent_cont = @$_POST['ac_rent_cont'];
                            $electricity_water_cont = @$_POST['electricity_water_cont'];
                            $dth_cont = @$_POST['dth_cont'];
                            $pg_month_rent = @$_POST['pg_month_rent'];
                            $pg_security_deposit = @$_POST['pg_security_deposit'];
                        ?>
                    <div class='current_page_cont'>
                    <h2>Add Rooms To Property</h2>
                    <p class='label_area'>Sharing Type <span style='color: red; display: inline;'>*</span></p>
                    <select name='sharing_type' class='city_selector' required>
                        <option value='Single Occupancy'>Single Occupancy</option>
                        <option value='Double Occupancy'>Double Occupancy</option>
                        <option value='Triple Occupancy'>Triple Occupancy</option>
                        <option value='Quadruple Occupancy'>Quadruple Occupancy</option>
                        <option value='Quimtuple Occupancy'>Quintuple Occupancy</option>
                        <option value='Dormitory'>Dormitory</option>
                        <option value='Others'>Others</option>
                    </select>
                <div class='settings'>
                    <p class='label_area'>Number Of Room <span style='color: red; display: inline;'>*</span></p>
                    <div class='radio_container3'>
                    <input type='radio' name='num_of_room' value='1' id='1'>
                    <label for="1">1</label>
                    <input type='radio' name='num_of_room' value='2' id='2'>
                    <label for="2">2</label>
                    <input type='radio' name='num_of_room' value='3' id='3'>
                    <label for="3">3</label>
                    <input type='radio' name='num_of_room' value='4' id='4'>
                    <label for="4">4</label>
                    <input type='radio' name='num_of_room' value='5' id='5'>
                    <label for="5">5</label>
                    <input type='radio' name='num_of_room' value='6' id='6'>
                    <label for="6">6</label>

                    <input type='radio' name='num_of_room' value='7' id='7'>
                    <label for="7">7</label>   
                    <input type='radio' name='num_of_room' value='8' id='8'>
                    <label for="8">8</label>   
                    <input type='radio' name='num_of_room' value='8+' id='8+'>
                    <label for="8+">8+</label>
                </div>
                <hr style='margin: 20px 0px; height: 1px; border: 0 none; background: #f1f1f1;'>
                <input type='checkbox' name='ac_rent_cont'> AC Charges Included?<br>
                <input type='checkbox' name='electricity_water_cont'> Electricity and water charges included<br>
                <input type='checkbox' name='dth_cont'> DTH cable charges included
                <hr style='margin: 20px 0px; height: 1px; border: 0 none; background: #f1f1f1;'>
                <p class='label_area'>Monthly Rent <span style='color: red; display: inline;'>*</span></p>
                <input type='number' name='pg_month_rent' placeholder='3000' class='huge_input' required>
<br><br>

<p class='label_area'>Security Deposit <span style='color: red; display: inline;'>*</span></p>
                <input type='number' name='pg_security_deposit' placeholder='1500' class='huge_input' required>
<br><br>
<p class='label_area'>Amenities <span style='color: red; display: inline;'>*</span></p>
                <input type='text' name='amenities' class='huge_input' onclick='change_page_fun()' placeholder='Select Amentities'>
                <br><br>
<button type="submit" name="save_pg" class="button_styler">Save</button>
</div>
</div>
<div class='other_page_cont' style='display: none;'>
<h2><button class='config_back_btn' onclick='change_page_func()'><i class="fa-solid fa-arrow-left-long"></i></button> Select Amenities</h2>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-tv"></i> Television</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Television' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-fan"></i> Fan</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Fan' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-snowflake"></i> Air Conditioner</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Fan' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-wifi"></i> Wifi Internet</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Fan' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-mattress-pillow"></i> Matress</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Fan' class='checkbox_inp'>
    </div>
</div>
<br>
<button type="button" name="save_pg" class="button_styler" onclick='selection_button()'>Select</button>
</div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
let current_cont = document.querySelector(".current_page_cont");
let other_cont = document.querySelector(".other_page_cont");
function change_page_fun() {
    current_cont.style.display = 'none';
    other_cont.style.display = 'block';
}
function change_page_func() {
    current_cont.style.display = 'block';
    other_cont.style.display = 'none';
}
function selection_button() {
    current_cont.style.display = 'block';
    other_cont.style.display = 'none';
}
</script>