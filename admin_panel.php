<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin.html");
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'f078');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM appointments";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel - View Appointments</h1>

    <table border="1">
        <tr>
            <th>Username</th>
            <th>Date</th>
            <th>Time</th>
            <th>Doctor</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['Uname']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        <td>{$row['doctor']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No appointments found.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
mysqli_close($con);
?>
