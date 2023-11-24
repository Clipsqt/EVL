<?php
session_start();
require_once("certificate_autofill.php");
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
    <title>CERTIFICATE OF APPEARANCE</title>
</head>
<body>

    <div id="certificateBody">
        <form action="insert_data.php" method="post" class="controlForm">
            <input type="hidden" name="reference_no"value="<?php echo isset($referencecode) ? $referencecode : ''; ?>">
            <input type="hidden" name="yearRequested" value="<?php echo $yearRequested ?>">
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
        <p class="certify">This is to certify that <span class="bold-text"><?php echo isset($fullname) ? $fullname : ''; ?></span> </p>

        <br> <br>
        <p class="position_designation"> <span class="bold-text"><?php echo isset($position_designation) ? $position_designation : ''; ?></span> <br>Position/Designation</p>
        <p class="school_office"> <span class="bold-text"><?php echo isset($agency_school_office) ? $agency_school_office : ''; ?></span> <br>Agency/School/Office</p>
        <p class="appear">Appeared on <span class="bold-text"><?php echo isset($scheduledate) ? $scheduledate : ''; ?></span>  at EcoPark Barangay Muzon City of San Jose Del Monte Bulacan. </p>
        <p class="purpose">Purpose: <br>
            <?php
            $purposeText = isset($purpose) ? $purpose : '';
            echo breakDownWords($purposeText);
            ?>
            <br> <br> This certification is being issued for whatever legal purposes it may serve her/him best.
        </p>
        <div class="seriesnumber">
            Contro No: ECA-
            <input readonly type="text" name="risNoDate" class="risNoDate" readonly >
            <script src="getControlNo.js"></script>
        </div>

        <p class="issued">Date Issued: <?php echo date('F d, Y'); ?></p>

        <img src="sign.jpeg.png" alt="" class="sign"> <br>
        <p class="cadiz">MA. JIMA T. CADIZ <br> <span>Administrative Office V</span></p>
        <input type="submit" value="Generate PDF" id="btnPrint" name="btnPrint">
        </form>
       
    </div>
    <button id="backButton" onclick="goToLogsHistory()">BACK</button>
    <button id="generatePDF"  onclick="generatePDF()">GENERATE PDF</button>
    <script src="cert.js"></script>

    
</body>
</html>
