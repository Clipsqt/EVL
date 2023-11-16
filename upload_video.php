<?php
    include("connect.php");

    if (isset($_POST['btn_upload'])) {
        $maxsize = 1073741824; //104857600 = 50MB

        $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $extension_arr = array("mp4","mp3","ogg","avi","3gp","mov","mpeg","mp4v");

        if (in_array($videoFileType, $extension_arr)){
            if(($_FILES['file']['size'] >=$maxsize) || ($_FILES['file']['size'] == 0)){
                echo "File too large. File must be less than 1GB.";
            }

            else{
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    $query = "INSERT INTO videos (name,location) VALUES ('".$name."','".$target_file."')";

                    mysqli_query($conn,$query);

                    echo "Upload Successfully";
                    
                }
            }
           
        }
        else {
            echo "Invalid File Extension";
        }
    }
?>