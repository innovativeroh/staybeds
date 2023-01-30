<?php include_once("config/header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Staybeds | Login to your dashboard!</title>
</head>
<body>
<div class="desktop_back">
<div class="login-banner-overlay">
    <br>
<div class="login-box"> 
    <center><img src='./assets/img/logo-wide.png' width="150px"></center><br><br>
    <h2 style='line-height: 0px;'>Login</h2>
    <p style='font-size: 13.5px; color: #444;'>Enter your credentials to continue!</p>
    <form action="signup.php" method="POST" style="display: inline;">
        <input type="email" name="email" placeholder="Email Address" class="input_styler" required><br>   
        <input type="password" name="password" placeholder="Password" class="input_styler" required>
        <input type="submit" name="login" value="Login" class="button_styler">
        <center><a href='login.php' class='reg-class'>Forgot Your Password?</a></center>
    </form>
    <a href="signup.php"><button class="button_styler_2">Create new account</button></a>
</div>
</div>
</div>
<?php include_once("config/footer.php"); ?>
