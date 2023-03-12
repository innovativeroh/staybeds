<?php include_once("config/header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Staybeds | Reset Your Account!</title>
</head>
<body>
    <br>
<div class="login-box">
<center><img src='./assets/img/logo-wide.png' width="150px"></center><br><br>
    <?php
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
                require 'vendor/autoload.php';
                
                    $email = @$_POST['email'];
                    if(isset($_POST['sign_in'])) {
                    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
                    $query = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($query);
                    while($row = mysqli_fetch_assoc($query)) {
                        $current_id = $row['id'];
                        $ext_email = $row['email'];
                    }
                    if($count > 0) {
                    //Generating The Token!
                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $token = substr(str_shuffle($chars), 0, 15);       
                    $timestamp = time();

                    $sql = "INSERT INTO `password_tokens`(`id`, `token`, `connection`, `status`, `timestamp`) VALUES (null,'$token','$current_id','0','$timestamp')";
                    $query = mysqli_query($conn, $sql);

                    
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
    $mail->Subject = 'Staybeds - Reset Your Password!';

    $body = 'Hey,<br><br>
                        Fogot Your Password?<br>
                        We received a request to reset the password for your account.
                        <br><br>
                        To reset your password, click on the url below<br>
                        <a href="http://staybeds.in/reset.php?token='.$token.'">http://staybeds.in/reset.php?token='.$token.'</a>';                    
                        $mail->Body = $body;
                        $mail->send();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    
                    echo "<br><div class='alert-success'>Reset Link Has Been Shared To Email...</div><br>
                    <meta http-equiv=\"refresh\" content=\"2; url=login.php\">";
                    

                    } else {
                        echo "<div style='padding: 10px; color: #fff; border: 1px solid #e06666; background: #e06666; border-radius: 4px;'>Email not registered!</div><br>";
                    }
                }
    ?>

    <h2 style='line-height: 0px;'>Forgot Password</h2>
    <p style='font-size: 13.5px; color: #444;'>We'll share the reset link to your email</p><br>
    <center><img src='./assets/img/otp_verify.svg' width='40%'></center><br>
    <form action="forgot-password.php" method="POST" style="display: inline;">
        <input type="email" name="email" placeholder="What's your email address!" class="input_styler" required><br>   
        <input type="submit" name="sign_in" value="Send Reset Link!" class="button_styler">
    </form>
</div>