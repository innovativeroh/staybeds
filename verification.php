<?php include_once("config/header.php"); ?>
<?php
if (isset($_SESSION['username'])) {
    if ($global_verified == "0") {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        exit();
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Staybeds | Login to your dashboard!</title>
</head>
<body>
    <br>
<div class="login-box">
<center><img src='./assets/img/logo-wide.png' width="150px"></center><br><br>
    <h2 style='line-height: 0px;'>Verify</h2>
    <p style='font-size: 13.5px; color: #444;'>Need to verify your account first!</p><br>
    <?php
$verify = @$_POST['sign_in'];
if ($verify) {
    $otp = strip_tags(@$_POST['otp']);
    if ($otp == $global_otp) {
        $query = "UPDATE `verification` SET `verified`='1' WHERE `user_id`='$global_id'";
        $sql = mysqli_query($conn, $query);

        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        exit();
    } else {
        echo "<center><div style='padding: 10px; color: #fff; border: 1px solid #e06666; background: #e06666; border-radius: 4px;'>OTP is Incorrect!</div></center><br>";
    }
}
    ?>
    <center><img src='./assets/img/otp_verify.svg' width='40%'></center><br>
    <form action="verification.php" method="POST" style="display: inline;">
        <input type="number" maxlength="6" name="otp" placeholder="Enter 6 Digit OTP" class="input_styler" required><br>   
        <input type="submit" name="sign_in" value="Confirm" class="button_styler">
    </form>
</div>