<?php include_once("config/header.php"); ?>
<?php
if (isset($_SESSION['username'])) {
	echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
	exit();
} else {
}
?>
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
    <?php
            $uid = @$_POST['email'];
            $pwd = @$_POST['password'];
            if (isset($_POST['sign_in'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($uid) || empty($pwd)) {
                    echo "<div class='alert-danger'>Username & Password is Invalid!</div><br>";
                } else {
                    $sql = "SELECT * FROM users WHERE email='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        echo "<div class='alert-danger'>Email is Incorrect!</div><br>";
                    } else {
                        
                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['email'];
                            $password_login = $row['password'];
                            //dehashing the password        
                            $hashedPwdCheck = password_verify($pwd, $row['password']);
                            if ($hashedPwdCheck == false) {
                                echo "<div class='alert-danger'>Wrong password credentials!</div><br>";
                            } 
                            elseif ($hashedPwdCheck == true) {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['username'] = $username_login;
                                $_SESSION['password'] = $password_login;
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                                exit();
                            }
                        }
                    }
                }
            }
    ?>
    <form action="login.php" method="POST" style="display: inline;">
        <input type="email" name="email" placeholder="Email Address" class="input_styler" required><br>   
        <input type="password" name="password" placeholder="Password" class="input_styler" required>
        <input type="submit" name="sign_in" value="Login" class="button_styler">
        <center><a href='login.php' class='reg-class' style='font-size: 13.5px;'>Forgot Your Password?</a></center>
    </form>
    <a href="signup.php"><button class="button_styler_2">Create new account</button></a>
</div>
</div>
</div>
<?php include_once("config/footer.php"); ?>
