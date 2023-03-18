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
                    <a href='edit-config.php?code=<?=$token?>'><button><i class="fa-solid fa-gear"></i> Config</button></a>
                    
                    <a href='page.php?code=<?=$token?>'><button><i class="fa-solid fa-eye"></i> View Page</button></a>
                </div>
            </div>
            <div class='flex settings' style='flex: 7.5;'>
                <div style='width: 100%; background: #fff; box-sizing: border-box; border-radius: 10px; padding: 10px 30px;'>
                    <button chref="" data-modaal-content-source="#add_room" data-modaal-type="inline" data-modaal-animation="fade" class="modaal add_button"><i class="fa-solid fa-circle-plus" style='color: #4ca64c;'></i> Add Room</button>
                    <h2>Rooms Management</h2>
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
                                <form action='edit-rooms.php?code=<?=$token?>' method='POST'>
                                                <?php
                        if(isset($_POST['delete'.$data_id])) {
                            $sql = "DELETE FROM `pages_room` WHERE id='$data_id'";
                            $query = mysqli_query($conn, $sql);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-rooms.php?code=$token\">";
                            exit();
                        }
                    ?>
                                <button chref="" data-modaal-content-source="#add_images<?=$data_id?>" data-modaal-type="inline" data-modaal-animation="fade" class="modaal delete_box_area">Edit Images</button>

                                <button type='submit' name='delete<?=$data_id?>' class='delete_box_area'>Delete</button>
                            </form>
                            </p>
                            </div>
                    </div>
                    <div id="add_images<?=$data_id?>" style="display:none;">
            <div class="modal-body">
                <div class="modal-content">
                    <div id="loginMobile">
                        <h2><?=$data_sharing_type?> Images</h2>
                        <p class='label_area'>There Should Be Two Images Uploaded!</p>
                        <?php
                            if(isset($_POST['upload_img'.$data_id])) {
                                if (((@$_FILES["img1"]["type"] == "image/jpeg") || (@$_FILES["img1"]["type"] == "image/png") || (@$_FILES["img1"]["type"] == "image/gif")) && (@$_FILES["img1"]["size"] < 10048576) AND ((@$_FILES["img2"]["type"] == "image/jpeg") || (@$_FILES["img2"]["type"] == "image/png") || (@$_FILES["img2"]["type"] == "image/gif")) && (@$_FILES["img2"]["size"] < 10048576)) {
                                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                $rand_dir_name = substr(str_shuffle($chars), 0, 15);
                                mkdir("data/rooms/$rand_dir_name");
                                if (file_exists("data/rooms/$rand_dir_name/" . @$_FILES['img1']['name']) AND file_exists("data/rooms/$rand_dir_name/" . @$_FILES['img2']['name'])) {
                                    $error = "Image Already Exists!";
                                } else {
                                    move_uploaded_file(@$_FILES['img1']['tmp_name'], "data/rooms/$rand_dir_name/" . $_FILES['img1']['name']);
                                    move_uploaded_file(@$_FILES['img2']['tmp_name'], "data/rooms/$rand_dir_name/" . $_FILES['img2']['name']);
                                    $image_2 = "$rand_dir_name/" . @$_FILES['img1']['name'];
                                    $image_1 = "$rand_dir_name/" . @$_FILES['img2']['name'];
                                    $sql = "UPDATE `pages_room` SET `img_1`='$image_1',`img_2`='$image_2' WHERE `id`='$data_id'";
                                    $query = mysqli_query($conn, $sql);
                                   
                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-rooms.php?code=$token\">";
                                    exit();
                                }
                                }
                            }
                        ?>
                        <form action='edit-rooms.php?code=<?=$token?>' method='POST' enctype='multipart/form-data'>
                            <input type='file' name='img1' class='choose_file_style'>
                            <input type='file' name='img2' class='choose_file_style'><br><br>
                            <input type='submit' name='upload_img<?=$data_id?>' value='Upload' class='button_styler'>
                        </form>
                    </div>
                    </div>
                    </div>
                    </div>
                                <?php
                            }
                        } else {
                     ?>
                     <div 
                     <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <center><lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_cgfdhxgx.json"  background="transparent"  speed="1"  style="width: 40%;" autoplay></lottie-player>
    <br><h2 style='color: #b4bcc9;'>No rooms are avaliable!</h4><br>
                     <?php
                        }
                    ?>
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
                            $pg_amenities = @$_POST['amenities'];
                            if(isset($_POST['save_pg'])) {    
                            if($ac_rent_cont == '') {
                                $ac_rent_cont = "0";
                            }
                                if($electricity_water_cont == '') {
                                $electricity_water_cont = "0";
                            }
                            if($dth_cont == '') {
                                $dth_cont = "0";
                            }
                                $sql = "INSERT INTO `pages_room`(`id`, `number_of_room`, `ac_cont`, `electricity_water_cont`, `dth_cable_cont`, `security_deposit`, `monthly_rent`, `sharing_type`, `amenities`, `connection`) VALUES (null,'$num_of_room','$ac_rent_cont','$electricity_water_cont','$dth_cont','$pg_security_deposit','$pg_month_rent','$sharing_type','$pg_amenities','$id')";
                            $query = mysqli_query($conn, $sql);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-rooms.php?code=$token\">";
                            }
                        ?>
                        <form action='edit-rooms.php?code=<?=$token?>' method='POST'>
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
                <input type='checkbox' name='ac_rent_cont' value='1'> AC Charges Included?<br>
                <input type='checkbox' name='electricity_water_cont' value='1'> Electricity and water charges included<br>
                <input type='checkbox' name='dth_cont' value='1'> DTH cable charges included
                <hr style='margin: 20px 0px; height: 1px; border: 0 none; background: #f1f1f1;'>
                <p class='label_area'>Monthly Rent <span style='color: red; display: inline;'>*</span></p>
                <input type='number' name='pg_month_rent' placeholder='3000' class='huge_input' required>
<br><br>

<p class='label_area'>Security Deposit <span style='color: red; display: inline;'>*</span></p>
                <input type='number' name='pg_security_deposit' placeholder='1500' class='huge_input' required>
<br><br>
<p class='label_area'>Amenities <span style='color: red; display: inline;'>*</span></p>
                <input type='text' name='amenities' id='amenities' class='huge_input' onclick='change_page_fun()' placeholder='Select Amentities'>
                <br><br>
<button type="submit" name="save_pg" class="button_styler">Save</button>
                        </form>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
<div class='other_page_cont' style='display: none;'>
<h2><button class='config_back_btn' onclick='change_page_func()'><i class="fa-solid fa-arrow-left-long"></i></button> Select Amenities</h2>
<div style='position: relative; width: 100%; height: 450px; overflow-y: scroll;'>
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
        <input type='checkbox' value='Air Conditioner' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-wifi"></i> Wifi Internet</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Wifi Internet' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-bed"></i> Matress</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Matress' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-mattress-pillow"></i> Pillow</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Pillow' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-toilet-portable"></i> Side Table</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Side Table' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-hot-tub-person"></i> Geyser</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Geyser' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-boxes-packing"></i> Storage Shelf</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Storage Shelf' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-regular fa-window-restore"></i> Windows</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Windows' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-shirt"></i> Iron</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Iron' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-fan"></i> Desert Cooler</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Desert Cooler' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-graduation-cap"></i> Study Table</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Study Table' class='checkbox_inp'>
    </div>
</div>
<div class='amenities_flex_cont'>
    <div id='flex'>
        <p><i class="fa-solid fa-bowl-food"></i> Food</p>
    </div>
    <div id='flex'>
        <input type='checkbox' value='Food' class='checkbox_inp'>
    </div>
</div>


</div>
<br>
<input type="text" name="text" id="pre_amenities" style="visibility: hidden;">
<script>
let $checks = $('.checkbox_inp');

$checks.on('click', function() {

  let values = $checks
    .filter(':checked')
    .map((k, box) => box.value)
    .toArray()
    .join(',');

  $("#pre_amenities").val(values);

});
    </script>
<button type="button" name="save_pg" class="button_styler" onclick='selection_button()'>Select</button>
</div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
let current_cont = document.querySelector(".current_page_cont");
let other_cont = document.querySelector(".other_page_cont");
let pre_amenities = document.querySelector("#pre_amenities");
let amenities = document.querySelector("#amenities");
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
    amenities.value = pre_amenities.value;
}
</script>
