<?php
    session_start();
    require_once("fetch_videos.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUEUING VIDEO UPLOADER</title>
    <link rel="stylesheet" href="queuing_system_videouploader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<header>
    <img src="monitoring logbook logo.jpeg.png" alt="">
    <h1>  QUEUING SYSTEM VIDEO UPLOADER</h1>
</header>
<div class="container">
    <div class="main-video">
        <video src="<?php echo $videos[0]['location']; ?>" controls muted autoplay></video>
        <h3 class="title">01. VIDEO</h3>
    </div>

    <div class="video-list">
        <?php foreach ($videos as $video): ?>
            <div class="vid">
                <video src="<?php echo $video['location']; ?>" muted></video>
                <h3 class="title"><?php echo $video['name']; ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="buttons">
        <button id="playButton" class="playbutton">Play</button>
        <button class="deletebutton" id="deletebutton">Delete</button>
        <button type="button" class="upload-file" onclick="openAdd()"><i class = "fa fa-upload"></i> Upload File</button>
    </div>
</div>


<div class="popup" id="popup">
    <h2>UPLOAD FILE</h2> 
    <form action="" id="uploadForm" method="post" enctype="multipart/form-data">
        <div class="files">
            <input type="file" id="file" class="hidden" name="file">
            <label for="file" class="selectfiles">Select Files</label>
        </div>
        <div class="pr">
            <strong>
                <h4 class="ex">PDF</h4>
                <h5 class="size">2.5kb</h5>
            </strong>
        </div>
        <span id="percent" class="percent">0%</span>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <span id="dataTransferred" class="total">Loaded/Total</span>
        <span id="Mbps" class="mbps">Mbps</span>
        <span id="timeLeft" class="timeleft">Time Left</span>
        <input type="submit" value="Upload" id="upload"class="uploadbtn" name="btn_upload">
        <button id="cancel" class="cancel" disabled>Cancel</button>
    </form>
</div>
</body>
<script src="queuing_system_videouploader.js"></script>
</html>
