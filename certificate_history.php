<?php
session_start();
require_once("certificateHistory_autofill.php");
function breakDownWords($text) {
    $words = explode(' ', $text);
    $maxWordsPerLine = 15;
    $lines = [];
    for ($i = 0; $i < count($words); $i += $maxWordsPerLine) {
        $lines[] = '<strong>' . implode(' ', array_slice($words, $i, $maxWordsPerLine)) . '</strong>';
    }
    return implode('<br>', $lines);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="certificate_of_appearance.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="website icon" type="png" href="monitoring logbook logo.jpeg.png">
    <title>CERTIFICATE OF APPEARANCE</title>
</head>
<body>

    <div id="certificateBody">
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
        <p class="certify">This is to certify that <span class="name"><?php echo isset($fullname) ? $fullname : ''; ?></span> </p>

        <br> <br>
        <div class="position_office">
        <p class="position_designation"> <span class="bold-text"><?php echo isset($position_designation) ? $position_designation : ''; ?></span> <br>Position/Designation</p>
        <p class="school_office"> <span class="bold-text"><?php echo isset($agency_school_office) ? $agency_school_office : ''; ?></span> <br>Agency/School/Office</p>
        </div>
        <p class="appear">Appeared on <span class="scheduledate"><?php echo isset($scheduledate) ? $scheduledate : ''; ?></span>  at EcoPark Barangay Muzon City of San Jose Del Monte Bulacan. </p>
        <p class="purpose">Purpose: <br>
            <?php
            $purposeText = isset($purpose) ? $purpose : '';
            echo breakDownWords($purposeText);
            ?>
            <br> <br> <span class="best">This certification is being issued for whatever legal purposes it may serve her/him best.</span>
        </p>
        <div class="seriesnumber">
    Contro No: ECA-
    <input readonly type="text" name="risNoDate" class="risNoDate" value="<?php echo isset($risNoDate) ? $risNoDate : ''; ?>" readonly>
    <img src="e_sign.png" alt="" class="sign"> <br>
        </div>
        <p class="issued">Date Issued: <?php echo date('F d, Y'); ?></p>

        <input type="submit" value="Generate PDF" id="btnPrint" name="btnPrint">
        </form>
       
    </div>
    <footer>
    <button id="backButton" onclick="goToLogsHistory()">BACK</button>
    <button id="generatePDF"  onclick="generatePDF()">PRINT</button>
    </footer>
    <script src="certificateHistory.js"></script>

    
</body>
</html>
