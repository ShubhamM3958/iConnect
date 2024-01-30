<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$servername = "118.139.160.140";
$username = "shubham_poco";
$password = "Shubham#Sql3958";
$database = "iconnect_test";
$table = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email FROM " . $table;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<html><head><title>Admin Panel</title></head><body>";
    echo "<h1>User Data</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Email</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<p><a href='logout.php'>Logout</a></p>";
    echo "</body></html>";
} else {
    echo "No records found";
}
// Close connection
$conn->close();
?>