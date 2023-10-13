<?php
session_start();
require_once("connect.php");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Get the reference_no from the POST request
    $reference_no = isset($_POST['reference_no']) ? $_POST['reference_no'] : '';

    // Check if the reference_no is not empty
    if (!empty($reference_no)) {
        // Initialize the transfer status
        $transferStatus = 'failed';

        // Perform the transfer logic based on your specific requirements
        // For example, you can update the database to mark the row as transferred
        // and then redirect to the unsuccessful_appointment.php page
        // Adjust this logic according to your database structure and requirements.

        // Example update query (modify this as per your database structure)
        $sql = "UPDATE e_monitoringlogsheet SET transferred = 1 WHERE reference_no = '$reference_no'";

        // Execute the update query
        if (mysqli_query($conn, $sql)) {
            // The transfer was successful
            $transferStatus = 'success';
        }

        // Prepare the response
        $response = ['status' => $transferStatus];

        // Send the JSON response back to the client
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}

// Handle non-AJAX requests or requests without a reference_no
// Redirect to the unsuccessful_appointment.php page or perform other actions as needed
header('Location: unsuccessful_appointment.php');
exit();