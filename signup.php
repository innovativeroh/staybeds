<?php include_once("config/header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Staybeds | Login to your dashboard!</title>
</head>
<body>

<div class="login-area">
    <div class="login-form">
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
        $current_timestamp =  $_SERVER["REQUEST_TIME"];
        $mins_timestamp = $current_timestamp + 600;

        if(isset($_POST['login'])) {
        $name = @$_POST['name'];
        $email = @$_POST['email'];
        $password = @$_POST['password'];
        $r_password = @$_POST['r_password'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        if($password == $r_password) {
            $e_check = "SELECT email from users WHERE email='$email'";
            $result2 = mysqli_query($conn, $e_check);
            $result_check2 = mysqli_num_rows($result2);
            if (!$result_check2 > 0) {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            $generate_otp = sprintf("%06d", mt_rand(1, 999999));


            $sql = "INSERT INTO `users`(`id`, `name`, `email`, `mobile`, `password`, `profile_picture`, `ip_address`, `country`) VALUES (null,'$name','$email','','$hashedPwd','','$ip_address','')";
            $query = mysqli_query($conn, $sql);

            $origin_id = mysqli_insert_id($conn);

            $sql2 = "INSERT INTO `verification`(`id`, `user_id`, `otp`, `verified`, `expire`) VALUES (null,'$origin_id','$generate_otp','0', '$mins_timestamp')";
            $query2 = mysqli_query($conn, $sql2);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'staybeds.in@gmail.com';                     //SMTP username
    $mail->Password   = 'auiqrjbrttlpbtti';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('staybeds.in@outlook.com', 'Team Staybeds');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome To Staybeds';
    $mail->Body    = 'Hi, ' . $name . ',<br> Welcome to Staybeds, your 6-digit OTP is <b>' . $generate_otp . '</b> <br><br> Team Staybeds<br>www.staybeds.in';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

            echo "<div class='alert-success'>Successfully Registered! Redirecting...</div>
            <meta http-equiv=\"refresh\" content=\"2; url=login.php\">";
            } else
            {
                echo "<div class='alert-danger'>Email already exist!</div>";
            }
        } else {
            echo "<div class='alert-danger'>Both passwords doesn't match!</div>";
        }
        }
    ?>
    <h2>Register</h2>
    <p>Easiest way to book any PG's Online!</p>
    <form action="signup.php" method="POST">
        <label for="name"><span>Full Name <f style='color: red;'>*</f></span>
        <input type="text" name="name" placeholder="Full Name" class="input_styler" required><br>       
        </label>
        <label for="name"><span>Email <f style='color: red;'>*</f></span>
        <input type="email" name="email" placeholder="someone@something.com" class="input_styler" required><br>      
        <label for="name"><span>Password <f style='color: red;'>*</f></span> 
        <input type="password" name="password" placeholder="Password" class="input_styler" required>
        <label for="name"><span>Repeat Password <f style='color: red;'>*</f></span> 
        <input type="password" name="r_password" placeholder="Repeat Password" class="input_styler" required>
        <input type="submit" name="login" value="Login" class="button_styler">
        <center>Already have account? <a href='login.php' class='reg-class'>Login</a></center>
    </form>
    </div>
</div>
    <div class="login-banner">
        <div class="login-banner-overlay">
            <div style="position: absolute; bottom: 180px;">
                <h1>Welcome to Staybeds!</h1>
                <p style="">Staybeds directory is a platform that allows users to search and book accommodation options, <br>such as private homes and paying guest accommodations, in various locations.</p>
            </div>
        </div>
    </div>
</body>