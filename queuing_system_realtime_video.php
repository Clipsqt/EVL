<?php
include("connect.php");

// Fetch the latest video file path from the database
$sql = "SELECT location FROM videos_displayer ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $videoFilePath = $row['location'];
    echo $videoFilePath;
} else {
    // Default video file path if no data is available
    echo "default_video.mp4";
}

// Close the database connection
$conn->close();
?>
