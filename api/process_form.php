<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // Redirect to an error page or the form page
    header("Location: ../");
    exit();
}
// Assuming you have a MySQL database named "example"
$servername = "localhost";
$username = "root";
$password = "root";
$database = "iconnect_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$name = $_POST["name"];
$email = $_POST["email"];
// Check connection
if ($conn->connect_error or $name=='' or $email=='') {
    die("Connection failed: " . $conn->connect_error);
}



// Insert data into the database
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
