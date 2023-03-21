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
        $pre_address = $rows['pre_address'];
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
                    <a href='edit-rooms.php?code=<?=$token?>'><button><i class="fa-solid fa-people-roof"></i> Rooms</button></a>
                    <a href='edit-config.php?code=<?=$token?>'><button><i class="fa-solid fa-gear"></i> Config</button></a>
                    <a href='edit-booking.php?code=<?=$token?>'><button class='active'><i class="fa-solid fa-users"></i> Bookings</button></a>
                    <a href='page.php?code=<?=$token?>'><button><i class="fa-solid fa-eye"></i> View Page</button></a>
                </div>
            </div>
            <div class='flex settings' style='flex: 7.5;'>
                <div style='width: 100%; background: #fff; box-sizing: border-box; border-radius: 10px; padding: 10px 30px;'>
                    <h2>Property Bookings</h2>
                     <?php
                        $sql = "SELECT * FROM `bookings` WHERE `page`='$id'";
                        $query = mysqli_query($conn, $sql);
                        while($rows = mysqli_fetch_assoc($query)) {
                            $user = $rows['user'];
                            $category = $rows['category'];
                            $booking_date = $rows['booking_date'];
                            $final_booking_date = date("D, jS M Y", strtotime($booking_date));
                            $sql2 = "SELECT * FROM `users` WHERE `id`='$user'";
                            $query2 = mysqli_query($conn, $sql2);
                            while($row = mysqli_fetch_assoc($query2)) {
                                $booking_name = $row['name'];
                            }
                            ?>
                        <div class='property_booking_list'>
                        <div class='flex' style='flex: 0.2;'>
                            <img src='./assets/img/default_user.png' width='45px' height='45px'>
                        </div>
                        <div class='flex' style='flex: 9.8;'>
                            <p style='display: inline;'><strong><?=$booking_name?></strong> added a query to Your PG</p><span class='booking_date'><i>21-03-2022</i></span>
                            <br><p style='display: inline; line-height: 40px; color: #111;'><i class="fa-solid fa-star"></i> <?=$category?> <i class="fa-solid fa-calendar-days" style='margin-left: 10px;'></i> <?=$final_booking_date?> <!--<i class="fa-solid fa-phone" style='margin-left: 10px;'></i>+91 7742648700--></p>
                        </div>
                    </div>
                        <?php
                        }
                     ?>
                </div>
            </div>