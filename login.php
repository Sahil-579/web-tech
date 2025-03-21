<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'f078');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($con, $_POST['Uname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if username and password match
    $query = "SELECT * FROM customer WHERE Uname='$uname' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['Uname'] = $uname;
        echo "Login successful! <a href='dashboard.html'>Go to Dashboard</a>";
    } else {
        echo "Invalid username or password. <a href='login.html'>Try again</a>";
    }
}

mysqli_close($con);
?>
