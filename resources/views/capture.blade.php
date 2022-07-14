<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button id="start-camera">Start Camera</button>
    <video id="video" width="320" height="240" autoplay></video>
    <button id="click-photo">Click Photo</button>
    <canvas id="canvas" width="320" height="240"></canvas>
    <input type="text" name="myHiddenField"> 
    <img src="" id="imageView" alt="Red dot" />

    <script>
        let camera_button = document.querySelector("#start-camera");
        let video = document.querySelector("#video");
        let click_button = document.querySelector("#click-photo");
        let canvas = document.querySelector("#canvas");

        // if (navigator.mediaDevices.getUserMedia) {
        //     navigator.mediaDevices.getUserMedia({ video: true }).then(function (stream) {
        //         video.srcObject = stream;
        //     })
        //     .catch(function (err0r) {
        //         console.log("Something went wrong!");
        //     });
        // }

        camera_button.addEventListener('click', async function() {
            let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
            video.srcObject = stream;
        });

        click_button.addEventListener('click', function() {
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            let image_data_url = canvas.toDataURL('image/jpeg');

            // data url of the image
            console.log(image_data_url);
            document.getElementsByName("myHiddenField")[0].setAttribute("value", image_data_url);
            document.getElementById("imageView").setAttribute("src", image_data_url);
            
            // var image = new Image();
            // image.src = image_data_url;
            // document.body.append(image);

            // function download(dataurl, filename) {
            // const link = document.createElement("a");
            // link.href = dataurl;
            // link.download = filename;
            // link.click();
            // }
            // download(image_data_url, "helloWorld.jpg");
        });
    </script>
</body>
</html>