<?php
// Database connection parameters
$servername = "localhost"; // Usually localhost
$username = "myadmin"; // Your database username
$password = "admin"; // Your database password
$dbname = "elephant"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$elephant_id = $_POST['elephant_id'];
$new_name = $_POST['new_name'];
$new_age = $_POST['new_age'];
$new_maavootha = $_POST['new_maavootha'];

// Prepare and execute the update statement
$stmt = $conn->prepare("UPDATE Elephant_add SET Elephant_Name = ?, Age = ?, Mavootha = ? WHERE SL_NO = ?");
$stmt->bind_param("sisi", $new_name, $new_age, $new_maavootha, $elephant_id);

if ($stmt->execute()) {
    echo "Elephant updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
