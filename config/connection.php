<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "staybeds";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");
?>