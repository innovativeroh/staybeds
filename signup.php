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
            $sql = "INSERT INTO `users`(`id`, `name`, `email`, `mobile`, `password`, `profile_picture`, `ip_address`, `country`) VALUES (null,'$name','$email','','$hashedPwd','','$ip_address','')";
            $query = mysqli_query($conn, $sql);
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
        <center><p>Already have account? <a href='login.php' class='reg-class'>Login</a><p></center>
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