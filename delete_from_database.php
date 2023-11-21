<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e-logsheet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get the referencecode from the AJAX request
$referencecode = $conn->real_escape_string($_POST['reference_no']);

// SQL to delete data based on referencecode
$sql = "DELETE FROM control_number WHERE reference_no = '$referencecode'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>