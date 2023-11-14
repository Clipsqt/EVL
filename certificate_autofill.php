<?php
// Connect to the database (replace with your actual database connection code)
require("connect.php");

if (isset($_GET['reference_no'])) {
    $referencecode = $_GET['reference_no'];

    // Query your database to fetch the data based on the referenceCode
    $sql = "SELECT * FROM e_logshistory WHERE reference_no = '$referencecode'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows are found
    if (mysqli_num_rows($result) > 0) {
        // Initialize an array to store the data
        $data = array();

        // Loop through the result set to fetch all rows
        while ($row = mysqli_fetch_assoc($result)) {
            // Store each row's data in the array
            $data[] = $row;
        }

        // Now, you can work with the $data array, which contains all matching rows
        foreach ($data as $row) {
            $fullname = $row['fullname'];
            $purpose = $row['purpose_of_visit'];
            $scheduledate = $row['scheduledate'];
           
        }

        // Close the table or perform any other necessary actions
    } else {
        // Handle the case where no matching rows are found
    }
}


?>