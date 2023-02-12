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
}
?>