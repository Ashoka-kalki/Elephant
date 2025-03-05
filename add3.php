<?php
$servername = "localhost:3306";
$username = "myadmin";
$password = "admin";
$dbname = "elephant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO elephant_add3(SL_NO, Elephant_Name, Age, Mavootha) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isis", $SL_NO, $Elephant_Name, $Age, $Mavootha);

// Set parameters and execute
$SL_NO = $_POST['SL_NO'];
$Elephant_Name = $_POST['Elephant_Name'];
$Age = $_POST['Age'];
$Mavootha = $_POST['Mavootha'];

if ($stmt->execute()) {
    echo "Elephant added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
