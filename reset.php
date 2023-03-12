<?php include_once("config/header.php"); ?>
<?php
    $token = @$_GET['token'];
    $sql = "SELECT * FROM `password_tokens` WHERE `token`='$token'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if(!$count == "0") {
        while($row = mysqli_fetch_assoc($query)) {
            $glo_connection = $row['connection'];
            $glo_status = $row['status'];
        }
    } else {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
            exit();
    }
    if(!$glo_status == "0") {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
?>
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
    <h2 style='line-height: 0px;'>Recover Your Password</h2>
    <?php
                    $password = @$_POST['pass_1'];
                    $rpassword = @$_POST['pass_2'];
                    if(isset($_POST['recover'])) {
                    if($password == $rpassword) {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE `users` SET `password`='$hashedPwd' WHERE `id`='$glo_connection'";
                        $query = mysqli_query($conn, $sql);

                        $sql2 = "UPDATE `password_tokens` SET `status`='1' WHERE `token`='$token'";
                        $query2 = mysqli_query($conn, $sql2);

                        
                        echo "<div style='padding: 10px; color: #fff; border: 1px solid #e06666; background: #e06666; border-radius: 4px;'>Password Has Been Recovered! Redirecting...</div><br>";
                        echo "<meta http-equiv=\"refresh\" content=\"3; url=login.php\">";
                        exit();
                    } else {
                        echo "<br><div style='padding: 10px; color: #fff; border: 1px solid #e06666; background: #e06666; border-radius: 4px;'>Both Password Dont Match!</div><br>";
                    }
                }
                ?>
    <center><img src='./assets/img/otp_verify.svg' width='40%'></center><br>
    <form action="reset.php?token=<?php echo $token;?>" method="POST" style="display: inline;">
        <input type="password" name="pass_1" placeholder="Password" class="input_styler" required><br>   
        <input type="password" name="pass_2" placeholder="Repeat Password" class="input_styler" required><br>   

        <input type="submit" name="recover" value="Recover Now!" class="button_styler">
    </form>
</div>