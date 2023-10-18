<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e-logsheet";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from the e_logsheetaccounts table
$sql = "SELECT * FROM e_logsheetaccounts";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bookman+Old+Style">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link rel="stylesheet" href="user_accounts.css">
            <title>User Accounts</title>
        </head>
        <body>

        <header>
        <img src="monitoring logbook logo.jpeg.png" alt="">
            <h1>USER ACCOUNTS</h1>
        </div>
        </header>
        <div class="scroll">
    <table id="monitoringTable">
    <thead>
        <tr>
            <th id="colNo">No.</th>
            <th id="colaccountType">accountType</th>
            <th id="colaccountName">accountName</th>
            <th id="coluserPosition">userPosition</th>
            <th id="coluserOffice">userOffice</th>
            <th id="coldepedEmail">depedEmail</th>
            <th id="colaccountPass">accountPass</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            $rowNumber = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rowNumber . "</td>";
                echo "<td>" . $row["accountType"] . "</td>";
                echo "<td>" . $row["accountName"] . "</td>";
                echo "<td>" . $row["userPosition"] . "</td>";
                echo "<td>" . $row["userOffice"] . "</td>";
                echo "<td>" . $row["depedEmail"] . "</td>";
                echo "<td>" . $row["accountPass"] . "</td>";
                echo "</tr>";
                $rowNumber++;
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        ?>
      </tbody>
    </div>  
</table>

        
</body>
</html>
s