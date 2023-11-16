<?php
    session_start();
    require_once("fetch_videos.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUEUING VIDEO</title>
    <link rel="stylesheet" href="queuing_system_videouploader.css">
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
    </div>

    <button id="playButton">Play</button>
    <form action="upload_video.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" class="input">
        <input type="submit" value="Upload" name="btn_upload">
    </form>
</body>
<script src="queuing_system_videouploader.js"></script>
</html>
