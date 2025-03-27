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

// Fetch data from the database
$sql = "SELECT SL_NO, Elephant_Name, Age, Mavootha FROM Elephant_add5";
$result = $conn->query($sql);

$elephants = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $elephants[] = $row;
    }
} 

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($elephants);

$conn->close();
?>
