<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'f078');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($con, $_POST['Uname']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $doctor = mysqli_real_escape_string($con, $_POST['doctor']);

    // Insert appointment details into database
    $query = "INSERT INTO appointments (Uname, date, time, doctor) VALUES ('$uname', '$date', '$time', '$doctor')";
    
    if (mysqli_query($con, $query)) {
        echo "Appointment booked successfully! <a href='dashboard.html'>Go to Dashboard</a>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
