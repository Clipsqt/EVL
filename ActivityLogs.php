<?php
session_start();
require_once("connect.php");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e-logsheet";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the current user's accountName and store it in a variable
$assistedBy = (isset($_SESSION['accountName']) ? $_SESSION['accountName'] : '');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bookman+Old+Style">
    <script src="https://kit.fontawesome.com/7d8e1e46c6.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="table2excel.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Activitylog.css">
    <title>Activity Logs</title>
</head>
<header>
    <img src="monitoring logbook logo.jpeg.png" alt="">
    <h1>Activity Logs</h1>
    <input type="text" id="searchInput" placeholder="Search" oninput="searchTable()">
</header>
<body>
    <div class="filter-container">
        <label for="fromDate">From:</label>
        <input type="text" id="fromDate" placeholder="MM/DD/YYYY">
        <label for="toDate">To:</label>
        <input type="text" id="toDate" placeholder="MM/DD/YYYY">
        <button onclick="filterData()">Find</button>
        <button id="downloadexcel" onclick="exportTableToExcel('monitoringTable')">Convert to Excel</button>
    </div>
    <input type="checkbox" name="" id="check">
    <div class="container">
        <label for="check">
            <span class="bx bx-x" id="cross"></span>
            <span class="bx bx-menu" id="bars"></span>
        </label>
        <div class="head">MENU</div>
        <ol>
            <li> <a href="e_logsHistory.php"><i class='bx bx-history'></i>E-LOG'S HISTORY</a></li>
            <li> <a href="unsuccessful_appointment.php"><i class='bx bx-clipboard'></i></i></i>UNSUCCESSFUL APPOINTMENTS</a></li>
            <li> <a href="appearance.php"><i class="fa-regular fa-file-lines" style="color: #f4f7fa;"></i>CERTIFICATE LIST</a></li>
            <li> <a href="user_accounts.php"><i class='bx bxs-user-account' ></i></i>USER ACCOUNTS</a></li>
            <li> <a href="ActivityLogs.php"><i class='bx bx-list-ul'></i>ACTIVITY LOG</a></li>
            <li> <a href="queuing_system_videouploader.php"><i class='bx bx-cloud-upload'></i>UPLOADER</a></li>
            <li> <a href="change_password.php"><i class='bx bx-lock-alt'></i>CHANGE PASSWORD</a></li>
            <li> <a href="log_out.php"><i class='bx bx-log-out'></i>LOGOUT</a></li>
        </ol>
    </div>   
    <div class="pagination">
        <button id="previousButton">Previous</button>
        <div id="paginationContainer" class="page-numbers"></div>
        <button id="nextButton">Next</button>
        <button id="showAllButton" onclick="showAllRows()">Show All</button>
    </div>
    <div class="scroll">    
        <table id="monitoringTable" border="1">
            <thead> 
                <tr>
                    <th id="colFullName">Full Name</th>
                    <th id="colScheduleDate">Schedule Date</th>
                    <th id="colAppointment">Appointment</th>
                    <th id="colDepartment">Department</th>
                    <th id="colTime in">Time In</th>
                    <th id="colTime out">Time Out</th>
                    <th id="colAssistedBy">Assisted by</th>
                </tr>
            </thead> 
     
            <?php
               
                $query = "SELECT * FROM e_logshistory ORDER BY timeStamp desc";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                $totalRows = mysqli_num_rows($result); // Get the total number of rows
                $rowNumber = $totalRows; // Initialize row number to the total number of rows

                while ($row = mysqli_fetch_assoc($result)) {
                    // Start a new table row for each record
                    echo "<tr class='highlight-row'>"; // Apply the CSS class
                    echo "<td class='fullname'>" . $row['fullname'] . "</td>";
                    echo "<td class='sched'>" . $row['scheduledate'] . "</td>";
                    echo "<td>" . $row['appointment'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td>" . $row['time_in'] . "</td>";
                    echo "<td>" . $row['time_out'] . "</td>";
                    echo "<td>" . $row['assisted_by'] . "</td>";
                    echo "</tr>";
                    $rowNumber--; // Decrease row number for the next row
                }
                } else {
                    echo "No transferred row data found.";
                }
            ?>
        
        </table>
    </div>
</body>
<script src="ActivityLog.js"></script>
</html>
