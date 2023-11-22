<?php
// Connect to the database (replace with your actual database connection code)
require("connect.php");

if (isset($_POST['fullName']) && isset($_POST['seriesNumber'])) {
    $fullName = $_POST['fullName'];
    $seriesNumber = $_POST['seriesNumber'];

    // Insert the full name and series number into the "control_number" table
    $insertSql = "INSERT INTO control_number (fullname, seriesnumber) VALUES ('$fullName', '$seriesNumber')";
    if (mysqli_query($conn, $insertSql)) {
        echo "Full name and series number inserted into control_number table successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Full name or series number not received";
}
?>