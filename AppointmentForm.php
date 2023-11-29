<?php
    session_start();

    require_once("connect.php");
    $query = "select * from e_monitoringlogsheet";
    $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html> 
<html lang="en">
    
<head> 
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/7d8e1e46c6.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="AppointmentForm.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
<link rel="website icon" type="png" href="monitoring logbook logo.jpeg.png">
 <meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Fillup Form</title>

</head>
<body> 
<div class="container">
    <div class="card">
        <div class="inner-box">
            <div class="card-front">
                <h1>DEPED CSJDM FRONT DESK</h1>
        <form action="Appointment.php" method="post">
        <input type="hidden" name="yearRequested" class="yearRequested">
        <script src="getYearRequested.js"></script>
        <input type="hidden" name="risNoDate" class="risNoDate" readonly>
        <div class="spinner"></div>

<div class="appointment-type">
    <label>
        <input type="radio" class="radioOnline" name="appointment_type" value="Online" required> Online
    </label>
    <label>
        <input type="radio" class="radioWalkIn" name="appointment_type" value="Walk-in" required> Walk-in
    </label>
    <br>
    <label>
        <input type="radio" class="radiowWithappointment" name="appointment_type" value="with Appointment" required> w/ Appointment
    </label>
</div>
<div id="dateBoxContainer">
    <h2>Prefer Date</h2>
    <input type="text" class="currentDate" name="currentDate" id="currentDate" placeholder="Select a date" readonly required autocomplete="OFF">
</div>
 <input type="text" class="input-box" name="Fullname" placeholder="Fullname" required autocomplete="off" pattern="[A-Za-z.\s]+">
 <input type="tel" class="input-box" name="phonenumber" placeholder="Contact Number" required autocomplete="OFF" pattern="[0-9]{11}" maxlength="11">
 <input type="text" class="input-box" name="position_designation" placeholder="Position / Designation" required autocomplete="off" pattern="[A-Za-z.0-9\s]+">
 <input type="text" class="input-box" name="agency_school_office" placeholder="Agency / School / Office" required autocomplete="off" pattern="[A-Za-z.0-9\s]+">
                    <script>
                       var quantityInput = document.querySelector('.qu');
                        var quantityInputs = document.querySelectorAll('.quantityInputUser');
                        quantityInputs.forEach(function (quantityInput) {
                            quantityInput.addEventListener('keydown', function (e) {
                                // Allow the backspace key (keyCode 😎 and delete key (keyCode 46)
                                if (e.key !== 'Backspace' && e.key !== 'Delete' && e.keyCode !== 8 && e.keyCode !== 46) {
                                    e.preventDefault();
                                }
                            });
                        });
                    </script>
                 <div class="PurposeBox">  
                    <div class="inner-box">
                    <input type="text" class="inputPurpose" name="Purpose" placeholder="The purpose should be clearly stated." required autocomplete="off">  
 
                 <div class="selecOffice">

            <div class="Selectoffice">
                <select name="selectOffice" id="selectOffice" required>
                    <option value="">Office Visit</option>
                    <option value="Office of the School Division Superintendent">SDS</option>
                    <option value="Office of AO5">General Services AO5</option>
                    <option value="School Governance Operations Division">SGOD</option>
                    <option value="Curriculum Implementation Division">CID</option>
                    <option value="Information Communication Technology">ICT Services</option>
                    <option value="The Commission on Audit">COA</option>
                    <option value="Office of the Assistant Schools Division Superintendent">ASDS</option>
                    <option value="Personnel Section">Personnel Section</option>
                    <option value="Records Section">Record Section</option>
                    <option value="Property and Supply">Property and Supply</option>
                    <option value="Payroll Section">Payroll Section</option>
                    <option value="Accounting Section">Accounting Section</option>
                    <option value="Budget Section">Budget Section</option>
                    <option value="Cash Section">Cash Section</option>
                    <option value="General Services">General Services</option>
                    <option value="Legal Services">Legal Services</option>
                    <option value="SDO Clinic & Nursing room">SDO Clinic & Nursing room</option>
                </select>
                <label for="gender"> </label>
    <select name="gender" id="gender" required>
        <option value="">Sex</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>

    </select>
        

    <label for="priorityLane"></label>
    <select name="priorityLane" id="priorityLane">
        <option value=""Defaultvalue>Priority Lane</option>
        <option value="Senior Citizen">Senior Citizen</option>
        <option value="Pregnant">Pregnant</option>
        <option value="Disability">Person with Disability</option>
    </select>
 </div>
  </div>  
  </div>
 </div>           
  

    <input type="hidden" name="timeIn" id="timeIn" value="">
       
 
                 <div class="submit-btn">
                 <button type="submit" class="submit-btn">SUBMIT</button>

                 <input type="hidden" class="reference_no" name="reference_no" readonly>
                 </div>
 
 <script>
        document.addEventListener("DOMContentLoaded", function() {
    const customSelect = document.querySelector('.custom-select');

    if (customSelect) {
        // Check if the element exists before adding an event listener
        customSelect.addEventListener('change', () => {
            customSelect.classList.remove('invalid');
        });
    }

    const form = document.querySelector('form');

    form.addEventListener('submit', (e) => {
        if (customSelect && customSelect.value === '') {
            customSelect.classList.add('invalid');
            e.preventDefault();
        }
    });
});

</script>
   
    
    <script>
       $(document).ready(function() {
    $.ajax({
        url: 'https://worldtimeapi.org/api/ip',
        dataType: 'json',
        success: function(data) {
            const onlineDate = new Date(data.utc_datetime);
            const formattedDate = getFormattedDate(onlineDate);
            document.querySelector('.currentDate').value = formattedDate;
        }
    });

    function getFormattedDate(date) {
        const day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
        const month = (date.getMonth() + 1) < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
        const year = date.getFullYear();
        return `${month}/${day}/${year}`; // Use backticks and ${} to insert variables
    
    }
    //TIMEZONEMANILA//
    const currentTime = new Date();
    const timezoneOffset = currentTime.getTimezoneOffset();
    const formattedTime = currentTime.toISOString().slice(11, 19); // Extract HH:mm:ss

    document.getElementById('timeIn').value = formattedTime + '|' + timezoneOffset;


});
// Get the appointment type radio buttons and the date input box container
const radioOnline = document.querySelector('.radioOnline');
const radioWalkIn = document.querySelector('.radioWalkIn');
const radioWithAppointment = document.querySelector('.radiowWithappointment');
const dateBoxContainer = document.getElementById('dateBoxContainer');
const currentDateInput = document.querySelector('.currentDate');

// Add an event listener to the radio buttons
radioOnline.addEventListener('change', function () {
    if (this.checked) {
        // If "Online" is selected, show the date input box with a placeholder and make it readonly
        dateBoxContainer.style.display = 'block';
        currentDateInput.value = ''; // Clear the date value
        currentDateInput.placeholder = 'MM/DD/YY';
        currentDateInput.readOnly = false;
    }
});

radioWalkIn.addEventListener('change', function () {
    if (this.checked) {
        // If "Walk-in" is selected, hide the date input box and set its value to the current date
        dateBoxContainer.style.display = 'none';
        currentDateInput.value = getFormattedDate(new Date());
        currentDateInput.placeholder = ''; // Remove the placeholder
        currentDateInput.readOnly = true;
    }
});

radioWithAppointment.addEventListener('change', function () {
    if (this.checked) {
        // If "Walk-in" is selected, hide the date input box and set its value to the current date
        dateBoxContainer.style.display = 'none';
        currentDateInput.value = getFormattedDate(new Date());
        currentDateInput.placeholder = ''; // Remove the placeholde
        currentDateInput.readOnly = true; 
    }
    });
// Function to get formatted date (similar to your existing code)
function getFormattedDate(date) {
    const day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
    const month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
    const year = date.getFullYear();
    return `${month}/${day}/${year}`;
}
 

currentDateInput.addEventListener('input', function (e) {
    let cleanedValue = this.value.replace(/[^0-9/]/g, '');

    // Handle backspace or delete key press
    if (e.inputType === 'deleteContentBackward' || e.inputType === 'deleteContentForward') {
        cleanedValue = cleanedValue.slice(0, -1);
    }

    if (cleanedValue.length > 10) {
        cleanedValue = cleanedValue.slice(0, 10);
    }

    if (cleanedValue.length >= 2 && cleanedValue.charAt(2) !== '/') {
        cleanedValue = cleanedValue.slice(0, 2) + '/' + cleanedValue.slice(2);
    }
    if (cleanedValue.length >= 5 && cleanedValue.charAt(5) !== '/') {
        cleanedValue = cleanedValue.slice(0, 5) + '/' + cleanedValue.slice(5);
    }

    this.value = cleanedValue;
});

    
</script>
    </script>

    </form>

    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</script>
<script>
    // Get the input element by its name
    const phoneNumberInput = document.querySelector('input[name="phonenumber"]');

    // Add an input event listener to validate and format the phone number
    phoneNumberInput.addEventListener('input', function (e) {
        // Remove non-numeric characters using a regular expression
        const numericValue = this.value.replace(/\D/g, '');

        // Limit the length of the phone number to 11 digits
        if (numericValue.length > 11) {
            this.value = numericValue.slice(0, 11);
        } else {
            this.value = numericValue;
        }
    });
</script>
<script>
    
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

// Add an event listener to the form for submission
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form');

form.addEventListener('submit', async function (e) {
    e.preventDefault(); // Prevent the default form submission behavior

    try {
        const response = await fetch('Appointment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Change to 'application/json' if sending JSON data
            },
            body: new URLSearchParams(new FormData(form)),
        });

            if (!response.ok) {
                throw new Error(`Network response was not ok. Status: ${response.status}`);
            }

            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                const data = await response.json();
                console.log(contentType);

                // Check if the reference number exists in the response data
                if (data.reference_no) {
                    // Check if the appointment type is "Online"
                    if (data.appointment && data.appointment.toLowerCase() === 'online') {
                        // Show SweetAlert with the fetched reference number
                        Swal.fire({
                            title: `Your reference number is: ${data.reference_no}`,
                            text: `TAKE A SCREENSHOT & PRESENT TO THE GUARD`,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        
                        // Reset the form or perform any other necessary actions
                        form.reset();
                    } else {
                        // Do not show SweetAlert for Walk-in
                        form.reset();
                    }
                } else {
                    // Handle the case where no reference number is returned
                    console.error('No reference number found in the response.');
                }
                        } else {
                    // Handle non-JSON responses here (e.g., show a success message or reset the form)
                    console.log('Response is not in JSON format. Proceeding with form reset or other actions.');
                    form.reset();
                }
                
            
            } catch (error) {
    console.error('Error fetching reference number:', error.message);
    console.log('Full response:', error.response);  // Use error.response instead of response
}


    });
});

    
</script>
<li> <a href="adminLogin.php"><i class="fa-solid fa-user-tie"></i>ADMIN LOG-IN</a></li>
</body>
</html>
