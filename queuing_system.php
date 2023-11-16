<?php 
session_start();
require_once("queuing_system_display.php")
 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="queuing_system.css">
    <title>QUEUING SYSTEM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="datetime">
        <div class="time"></div>
        <div class="date"></div>
        <img src="monitoring logbook logo.jpeg.png" alt="deped">
        <div class="headerTitles">
            <h3>Republic of the Philippines</h3> <br>
            <h2>Department of Education</h2> <br>
            <h3>Region III</h3> <br>
            <h1>SCHOOLS DIVISION OF CITY OF SAN JOSE DEL MONTE</h1>
        </div>
        
    </div>


    <audio id="notification">
        <source src="queuing_system_announcement.mp3" type="audio/mp3"> 
    </audio>


    <video id="video" width="730" height="450" autoplay muted>
        <source id="source" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    
    <div class="OSDS">
        <h3>Office of the Schools Division Superintendent</h3>
        <table id="visitor_table">
            <tr>
                <th class="name_of_visitors">VISITORS:</th>
                <th class="department">DEPARTMENT:</th>
            </tr>
        </table>
    </div>


    <div class="CID">
        <h3>Curriculum Implementation Division</h3>
        <table class="table-cid">
            <tr>
                <th class="name_of_visitors">VISITORS:</th>
            </tr>
        </table>
    </div>


    <div class="SGOD">
        <h3>School Governance Operations Division</h3>
        <table class="table-sgod">
            <tr>
                <th class="name_of_visitors">VISITORS:</th>
            </tr>
        </table>
    </div>

 
</body>
<script src="queuing_system.js"></script>
<?php
    // Check if a video source is provided in the URL
    if (isset($_GET['video'])) {
        $videoSource = $_GET['video'];
        echo '<script>
                // Update the video source
                var video = document.getElementById("video");
                var source = document.getElementById("source");
                source.setAttribute("src", "' . $videoSource . '");
                video.load();
                video.play();
              </script>';
    }
    ?>
</html>