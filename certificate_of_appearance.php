<?php session_start(); require_once("certificate_autofill.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="certificate_of_appearance.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>CERTIFICATE OF APPEARANCE</title>
</head>
<body>
    <form id="coaForm">
        <header>
            <img src="monitoring logbook logo.jpeg.png" alt="">
        </header>
        <header>
            Republic of the Philippines <br>
            Department of Education <br>
            Region III <br>
            Schools Division of City of San Jose Del Monte
        </header>
        <hr>
        <h2>CERTIFICATE OF APPEARANCE</h2>
        <p class="certify">This is to certify that <input type="text" id="personName" value="<?php echo isset($fullname) ? $fullname : ''; ?>" disabled > </p>
        <br> <br>
        <p class="position_designation"><span class="overline">Position/Designation</span></p>
        <p class="school_office"><span class="line">School/Office</span></p>
        <p class="appear">Appeared on<input type="" id="date">at EcoPark Barangay Muzon City of San Jose Del Monte Bulacan. </p>
        <p class="purpose">Purpose: <br> <input type="text" id="purpose" value="<?php echo isset($purpose) ? $purpose : ''; ?>" disabled > <br> <br> This certification is being issued for whatever legal purposes it may serve her/him best. </p>
        <br>
        <p class="control_no">Control No: <input type="text" class="control_no_value" readonly></p>
        <p class="issued">Date Issued: November 11, 2023 </p>
    </form>
    <script>
        $(document).ready(function() {
            // Fetch the last series number and year from the server
            $.ajax({
                url: 'get_last_series_year.php',
                method: 'GET',
                success: function(response) {
                    const data = JSON.parse(response);
                    let lastSeriesNumber = parseInt(data.lastSeriesNumber);
                    let lastYear = parseInt(data.lastYear);
                    if (isNaN(lastSeriesNumber)) {
                        lastSeriesNumber = 0;
                    }
                    if (isNaN(lastYear)) {
                        lastYear = 0;
                    }
                    // Get the year and month from worldtimeapi
                    $.ajax({
                        url: 'https://worldtimeapi.org/api/ip',
                        dataType: 'json',
                        success: function(data) {
                            const onlineDate = new Date(data.utc_datetime);
                            const currentYear = onlineDate.getUTCFullYear();
                            const month = (onlineDate.getUTCMonth() + 1).toString().padStart(2, '0');
                            if (lastYear !== currentYear) {
                                lastSeriesNumber = 1; // Reset the series number to 1 for a new year
                                lastYear = currentYear; // Update the last year
                            } else {
                                lastSeriesNumber++; // Increment the series number within the same year
                            }
                            // Format the series number
                            const formattedSeriesNumber = String(lastSeriesNumber).padStart(6, '0');
                            // Combine the year, month, and series number
                            const controlNo = 'CA-' + currentYear + '-' + month + '-' + formattedSeriesNumber;
                            // Set the control number as the value of the input element
                            $(".control_no_value").val(controlNo);
                        },
                        error: function(error) {
                            console.error('Error fetching online date:', error);
                        }
                    });
                },
                error: function() {
                    console.error("Error fetching last series number and year.");
                }
            });
        });
    </script>
</body>
</html>