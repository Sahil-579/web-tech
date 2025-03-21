<?php
$con = mysqli_connect('localhost', 'root', '', 'f078');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($con, $_POST['Uname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if username already exists
    $check_query = "SELECT * FROM customer WHERE Uname='$uname'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different one.";
    } else {
        // Insert into database
        $query = "INSERT INTO customer (Uname, password) VALUES ('$uname', '$password')";
        if (mysqli_query($con, $query)) {
            echo "Registration successful! <a href='login.html'>Login here</a>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>
