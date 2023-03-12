<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "staybeds";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");
$global_id = "";
//Checking User Session
session_start();
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    $sql = "SELECT * FROM `users` WHERE email='$user'";
    $query = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_assoc($query)) {
        $global_id = $rows['id'];
        $global_name = $rows['name'];
    }
    $sql2 = "SELECT * FROM `verification` WHERE `user_id`='$global_id'";
    $query2 = mysqli_query($conn, $sql2);
    while($rowss = mysqli_fetch_assoc($query2)) {
        $global_otp = $rowss['otp'];
        $global_verified = $rowss['verified'];
    }
}
?>