<?php
$servername = "localhost";
$username = "myadmin";
$password = "admin";
$dbname = "elephant";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SL_NO = $_POST['elephant_id'];

    if (empty($SL_NO)) {
        die("SL_NO is empty.");
    }else
    {
        echo "Elephant deleted successfully";
    }

    // SQL query to delete the elephant record based on SL_NO
    $sql = "DELETE FROM elephant_add1 WHERE SL_NO = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $SL_NO);

    if ($stmt->execute()) {
        $response = array("message" => "Elephant deleted successfully.");
    } else {
        $response = array("error" => "Error deleting elephant: " . $stmt->error);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
