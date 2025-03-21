<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'f078');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_user = mysqli_real_escape_string($con, $_POST['admin_user']);
    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

    // Set admin credentials (change as needed)
    $valid_admin_user = "admin";
    $valid_admin_pass = "admin123";

    if ($admin_user === $valid_admin_user && $admin_pass === $valid_admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Invalid credentials. <a href='admin.html'>Try again</a>";
    }
}

mysqli_close($con);
?>
