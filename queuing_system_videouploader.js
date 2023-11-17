//FUNCTION FOR VIDEO SELECTOR COLOR
let listVideo = document.querySelectorAll('.video-list .vid');
        let mainVideo = document.querySelector('.main-video video');
        let title = document.querySelector('.main-video .title');

        listVideo.forEach(video =>{
            video.onclick = () =>{
                listVideo.forEach(vid => vid.classList.remove('active'));
                video.classList.add('active');
                if(video.classList.contains('active')){
                    let src = video.children[0].getAttribute('src');
                    mainVideo.src = src;
                    let text = video.children[1].innerHTML;
                    title.innerHTML = text;
                };
            };
        });

//FUNCTION TO PLAY VIDEO IN QUEUING SYSTEM WHEN THE USER CLICK THE PLAY BUTTON
$(document).ready(function() {
    $("#playButton").on("click", function() {
        var mainVideoName = $(".main-video .title").text();
        var mainVideoLocation = $(".main-video video").attr("src");
        $.ajax({
            url: "display_vid_queuingsystem.php", 
            method: "POST",
            data: { name: mainVideoName, location: mainVideoLocation },
            success: function(response) {
                console.log("Data successfully sent to the server");
            },
            error: function(error) {
                console.error("Error sending data to the server", error);
            }
        });
    });
});