<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e-logsheet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the visitor data into the database
if (isset($_POST['visitorName']) && isset($_POST['department'])) {
    $visitorName = $_POST['visitorName'];
    $department = $_POST['department'];

    $sql = "INSERT INTO visitor_data (visitor_name, department, time_stamp) VALUES ('$visitorName', '$department', NOW())";
    if (mysqli_query($conn, $sql)) {
        echo "Visitor's name updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Delete rows older than 2 minutes
$sql = "DELETE FROM visitor_data WHERE time_stamp < (NOW() - INTERVAL 3 MINUTE)";
if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>