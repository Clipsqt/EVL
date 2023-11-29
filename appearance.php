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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bookman+Old+Style">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="table2excel.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="appearance.css">
    <title>CERTIFICATE OF APPEARANCE LIST</title>
</head>

<body>
    <header>
        <img src="monitoring logbook logo.jpeg.png" alt="">
        <h1>CERTIFICATE OF APPEARANCE LIST</h1>
    </header>

    <div class="scroll">
        <form action="" method="post">
            <table id="monitoringTable" border="1">
                <thead>
                    <tr>
                        <th id="colNo">No.</th>
                        <th id="colFullName">Full Name</th>
                        <th id="colcertificate">Certificate</th>
                    </tr>
                </thead>

                <?php
                $query = "SELECT * FROM control_number ORDER BY timeStamp desc";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $totalRows = mysqli_num_rows($result);
                    $rowNumber = $totalRows;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $referencecode = $row["seriesNumber"];

                        echo "<tr class='highlight-row'>";
                        echo "<td>" . $rowNumber . "</td>";
                        echo "<td class='fullname'>" . htmlspecialchars($row['fullname']) . "</td>";
                        ?>
                       <td> <a href="certificate_history.php?seriesNumber=<?php echo $referencecode; ?>" class="certificate" data-referencecode="<?php echo $referencecode; ?>">Certificate</a> </td>
                        <?php
                        echo "</tr>";

                        $rowNumber--;
                    }
                } else {
                    echo "No transferred row data found.";
                }
                mysqli_close($conn); // Close the database connection
                ?>

            </table>
        </form>
    </div>
</body>

</html>
