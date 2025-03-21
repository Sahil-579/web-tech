<?php
$host = "localhost";  // Change this if using an online server
$user = "root";       // Your MySQL username
$pass = "";           // Your MySQL password
$db = "f078";         // Your database name

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
