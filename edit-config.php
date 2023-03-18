<?php include_once("config/header.php"); ?>
<?php
    $code = @$_GET['code'];
    $sql = "SELECT * FROM `pages` WHERE `token`='$code'";
    $query = mysqli_query($conn, $sql);
    while($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $name = $rows['name'];
        $token = $rows['token'];
        $admin = $rows['admin'];
        $mobile = $rows['mobile'];
    }
    $sql2 = "SELECT * FROM `users` WHERE `id`='$admin'";
    $query2 = mysqli_query($conn, $sql2);
    while($rowes = mysqli_fetch_assoc($query2)) {
        $email = $rowes['email'];
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
                    <a href='edit-rooms.php?code=<?=$token?>'><button><i class="fa-solid fa-people-roof"></i> Rooms</button></a>
                    <a href='edit-config.php?code=<?=$token?>'><button class='active'><i class="fa-solid fa-gear"></i> Config</button></a>
                    
                    <a href='page.php?code=<?=$token?>'><button><i class="fa-solid fa-eye"></i> View Page</button></a>
                </div>
            </div>
            <div class='flex settings' style='flex: 7.5;'>
                <div style='width: 100%; background: #fff; box-sizing: border-box; border-radius: 10px; padding: 10px 30px;'>
                    <h2>Property Config</h2>
                    <?php
                        if(isset($_POST['save_pg_mob'])) {
                            $mobile_inp = @$_POST['pg_mobile'];
                            $sql = "UPDATE `pages` SET `mobile`='$mobile_inp' WHERE `id`='$id'";
                            $query = mysqli_query($conn, $sql);
                            echo "<div style='padding: 10px; color: #fff; border: 1px solid #317431; background: #317431; border-radius: 4px;'>Verification has been done! Associating mobile number...</div><br>";
                            echo "<meta http-equiv=\"refresh\" content=\"2; url=edit-config.php?code=$token\">";
                        }
                    ?>
                    <p class='label_area'>Associated Email <span style='color: red; display: inline;'>*</span></p>
                    <input type='text' name='pg_email' placeholder='someone@something.com' value='<?=$email?>' class='huge_input' disabled="disabled">
                    <form action='edit-config.php?code=<?=$token?>' method='POST' onsubmit="run_form(initSendOTP(configuration))">
                    <p class='label_area'>Associated Mobile <span style='color: red; display: inline;'>*</span> <span style='font-size: 11px; font-weight: 500; color: #888;'>Enter Without Country Code</span></p>
                    <input type='tel' name='pg_mobile' placeholder='+91 8888555222' onkeypress="return onlyNumberKey(event)" value='<?=$mobile?>' class='huge_input' minlength="10" maxlength="10">
                        <br><br>
                    <button type="submit" name="save_pg_mob" id="save_pg_mob" style='display: none;'>Save</button>
</form>
                    <button type="button" name="save_pg" onclick="run_form(initSendOTP(configuration))" class="button_styler">Save</button>
                </div>

                <script>
let save_pg_mob = document.querySelector("#save_pg_mob");
function onlyNumberKey(evt) {
              
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
        var configuration = {
    widgetId: "336361764365313931373932",
    tokenAuth: "391621Tk3nnQ8l63ff846bP1",
    success: (data) => {
        console.log("Mobile Number Verified!");
        console.log('success response', data);
        save_pg_mob.click();
    },
    failure: (error) => {
        // handle error
        console.log('failure reason', error);
    }
};
        function run_form() {

        }
        $('form').bind("keypress", function(e) {
  if (e.keyCode == 13) {               
    e.preventDefault();
    return false;
  }
});
    </script>
    <script type="text/javascript" src="https://control.msg91.com/app/assets/otp-provider/otp-provider.js"> </script>