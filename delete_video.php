<?php
include("connect.php");

// Get data from the AJAX request
$name = $_POST['name'];
$location = $_POST['location'];

// Get the file path
$filePath =  "videos/".$location; // Assuming $location contains the full path to the file

// Delete record from the 'videos' table
$deleteDataSql = "DELETE FROM videos WHERE name = '$name' AND location = '$location'";
if ($conn->query($deleteDataSql) === TRUE) {
    // Delete the file from storage
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "Delete Successfully";
        } else {
            echo "Error deleting file from storage";
        }
    } else {
        echo "File not found in storage";
    }
} else {
    echo "Error Deleting: " . $deleteDataSql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
