<?php
session_start();
require_once("connect.php");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e-logsheet";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$userOffice = $_SESSION['userOffice'];
$currentDate = date("m/d/Y");

// Function to retrieve "Time In" from local storage
function getTimeInFromLocalStorage($reference_no) {
    // Initialize an empty value
    $timeIn = '';

    if (isset($_SESSION['timeIn']) && isset($_SESSION['timeIn'][$reference_no])) {
        $timeIn = $_SESSION['timeIn'][$reference_no];
    }

    // Check if a local storage value is available
    echo '<script>document.addEventListener("DOMContentLoaded", function () {
        const timeInLocalStorage = localStorage.getItem("timeIn_' . $reference_no . '");
        if (timeInLocalStorage) {
            const timeInCell = document.querySelector("#time-in_' . $reference_no . '");
            timeInCell.textContent = timeInLocalStorage;
        }
    });</script>';

    return $timeIn;
}

$sql = "SELECT *, IF(appointment = 'Online', 1, 0) AS is_online FROM e_monitoringlogsheet WHERE department = '$userOffice' AND scheduledate = '$currentDate' AND reference_no NOT IN (SELECT reference_no FROM e_logshistory)";

$result = mysqli_query($conn, $sql);

$rowNumber = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bookman+Old+Style">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin_webpage.css">
    <title>Monitoring Visitor's Logbook </title>

    <header>
        <img src="monitoring logbook logo.jpeg.png" alt="">
        <h1>APPOINTMENT LIST <br> <?php
            if (isset($_SESSION['userOffice'])) {
                echo $_SESSION['userOffice'];
            }
            ?> </h1>
    </header>
</head>
<button id="history_logs_button" onclick="location.href='admins_History.php';">History Logs</button>
<li><a href="change_password.php">CHANGE PASSWORD</a></li>
<li><a href="log_out.php">LOGOUT</a></li>
<body>
<div class="scroll">
    <table id="monitoringTable">
    <tr>
        <th id="colNo">No.</th>
        <th id="colFullName">Full Name</th>
        <th id="colSex">Sex</th>
        <th id="colpriority">Priority</th>
        <th id="colPhoneNumber">Phone Number</th>
        <th id="colScheduleDate">Schedule Date</th>
        <th id="colAppointment">Appointment</th>
        <th id="colPurpose">Purpose of visit</th>
        <th id="colDepartment">Department</th>
        <th id="colreference_no">Reference No.</th>
        <th id="colTime in">Time In</th>
        <th>Action</th>
        <th>Time out</th>
     
    </tr>
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $isOnlineAppointment = $row["is_online"];
            $reference_no = $row["reference_no"];
            $timeIn = getTimeInFromLocalStorage($reference_no);
            ?>
    <tr id="row_<?php echo $rowNumber; ?>" class="clickable-row">
        <td><?php echo $rowNumber; ?></td>
        <td class="fullname"><?php echo $row["fullname"]; ?></td>
        <td class="sex"><?php echo $row["sex"]; ?></td>
        <td class="priority"><?php echo $row["priority"]; ?></td>
        <td><?php echo $row["phonenumber"]; ?></td>
        <td class="sched"><?php echo $row["scheduledate"]; ?></td>
        <td><?php echo $row["appointment"]; ?></td>
        <td><?php echo $row["purpose_of_visit"]; ?></td>
        <td><?php echo $row["department"]; ?></td>
        <td><?php echo $row["reference_no"]; ?></td>
        <td class="time-in"></td>
        <td><button class="time-in-button">Time In</button></td>
        <td><button id="timeout_button_<?php echo $rowNumber; ?>" class="timeout-button" data-reference="<?php echo $row["reference_no"]; ?>" disabled>Time Out</button></td>
      
    </tr>
    <?php
    $rowNumber++;
    }
    ?>
    </table>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  <?php
  $rowNumber = 1; // Reset row number for JavaScript
  mysqli_data_seek($result, 0); // Reset the result pointer
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
  
  document.getElementById("timeout_button_<?php echo $rowNumber; ?>").addEventListener("click", function () {
    var reference_no = this.getAttribute("data-reference");

    // Get the current time in HH:MM:SS format
    var currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit',});
    
    // Make an AJAX request to transfer the row and update the time_out column
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "transfer_row.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          // Handle the response from the server (e.g., display a success sweet alert)
          Swal.fire({
            icon: 'success',
            title: 'Time Out Successful',
            text: 'The time out action was successful!',
          }).then(function () {
            // You can also redirect to another page here if needed
            window.location.href = "admin_webpage.php";
          });
        } else {
          // Handle any error here
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while processing the request.',
          });
        }
      }
    };
    
    // Send the reference_no and current time as POST data
    xhr.send("reference_no=" + reference_no + "&time_out=" + currentTime);
  });
  <?php
  $rowNumber++;
  }
  ?>
});
</script>
 <script>
document.addEventListener("DOMContentLoaded", function () {
    const timeInButtons = document.querySelectorAll(".time-in-button");

    timeInButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const timeInCell = row.querySelector("td:nth-child(11)");
            const currentTime = new Date().toLocaleTimeString();

            // Update the "Time In" cell with the current time
            timeInCell.textContent = currentTime;

            // Store the current time in a variable
            const time_in = currentTime;

            // Disable the button
            button.classList.add("disabled");
            button.disabled = true;

            // Get other necessary data
            const scheduledate = row.querySelector(".sched").textContent;
            const fullname = row.querySelector(".fullname").textContent;
            const reference_no = row.querySelector("td:nth-child(10)").textContent;

            // Send the data to the server to update the database
            updateDatabase(scheduledate, fullname, time_in, reference_no);
        });
    });
});

function updateDatabase(scheduledate, fullname, time_in, reference_no) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_time_in.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server if needed
            if (xhr.responseText === "success") {
                // Time In data saved successfully
            } else {
                // Handle any errors here
            }
        }
    };
    const data = `scheduledate=${scheduledate}&fullname=${fullname}&time_in=${time_in}&reference_no=${reference_no}`;
    xhr.send(data);
}
 </script>
 <script>
  document.addEventListener("DOMContentLoaded", function () {
    const timeInButtons = document.querySelectorAll(".time-in-button");

    timeInButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const timeInCell = row.querySelector("td:nth-child(11)");
            const currentTime = new Date();
            const formattedTime = currentTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            // Update the "Time In" cell with the current time (without seconds)
            timeInCell.textContent = formattedTime;

            // Store the current time in local storage
            const reference_no = row.querySelector("td:nth-child(10)").textContent;
            localStorage.setItem(`timeIn_${reference_no}`, formattedTime);

            // Disable the "Time In" button
            button.classList.add("disabled");
            button.disabled = true;

            // Enable the corresponding "Time Out" button
            const timeoutButton = row.querySelector(".timeout-button");
            timeoutButton.disabled = false;
        });
    });

    // Check local storage and disable "Time In" buttons if "Time In" is recorded
    timeInButtons.forEach(function (button) {
        const row = button.closest("tr");
        const reference_no = row.querySelector("td:nth-child(10)").textContent;
        const timeIn = localStorage.getItem(`timeIn_${reference_no}`);

        if (timeIn) {
            const timeInCell = row.querySelector(".time-in");
            timeInCell.textContent = timeIn;
            button.classList.add("disabled");
            button.disabled = true;

            // Enable the corresponding "Time Out" button
            const timeoutButton = row.querySelector(".timeout-button");
            timeoutButton.disabled = false;
        }
    });
});
</script>
<script>
function setTimeInLocalStorage(reference_no, timeIn) {
    localStorage.setItem(`timeIn_${reference_no}`, timeIn);
}
</script>
<script>
function getCurrentTime() {
    return new Date().toLocaleTimeString();
}

// Check local storage and disable "Time In" buttons if "Time In" is recorded
document.addEventListener("DOMContentLoaded", function () {
    const timeInButtons = document.querySelectorAll(".time-in-button");

    timeInButtons.forEach(function (button) {
        const row = button.closest("tr");
        const reference_no = row.querySelector("td:nth-child(10)").textContent;
        const timeIn = localStorage.getItem(`timeIn_${reference_no}`);

        if (timeIn) {
            const timeInCell = row.querySelector(".time-in");
            timeInCell.textContent = timeIn;
            button.classList.add("disabled");
            button.disabled = true;
        }
    });
});
</script>
<script>
    function transferData(reference_no) {
    // Get the current time
    const currentTime = new Date();

    // Check if the current time has passed midnight (00:00:00)
    if (currentTime.getHours() === 0 && currentTime.getMinutes() === 0 && currentTime.getSeconds() === 0) {
        // Make an AJAX request to transfer the row data
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "transfer_unsuccessful.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Handle the response from the server
                    const response = xhr.responseText;
                    if (response === "success") {
                        // The row was successfully transferred
                        // You can add further actions here if needed
                    } else {
                        // Handle any errors or display an error message
                        console.log("Transfer error:", response);
                    }
                } else {
                    // Handle any errors or display an error message
                    console.log("AJAX request failed");
                }
            }
        };

        // Send the reference_no as POST data
        xhr.send("reference_no=" + reference_no);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const timeOutButtons = document.querySelectorAll(".timeout-button");

    timeOutButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const timeOutCell = row.querySelector("td:nth-child(12)");

            if (!timeOutCell.textContent) {
                // If the "Time Out" cell is empty, automatically transfer the row
                const reference_no = row.querySelector("td:nth-child(10)").textContent;
                transferData(reference_no);
                
                // You can add further actions here, e.g., hide the row or display a message
                row.style.display = "none"; // Hide the row
            } else {
                // The row has already timed out, display a message or take other action
                console.log("This row has already timed out.");
            }
        });
    });
});
</script>
</body>
</html>