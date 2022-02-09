<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../cordova.js"></script>
    <title>Audio</title>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>

    <div data-role="page" id="index">
        <div data-theme="a" data-role="header" data-position="fixed">
            <h1 class="titlehome">Audio</h1>
        </div>
        <div data-role="content" id="content">
            <li><a href="#" onclick="playAudio('soundbbm')" data-icon="power">Test Sound</a></li>
        </div>
        <div data-theme="a" data-role="footer" data-position="fixed">
            <div data-role="navbar">
                <ul>
                    <li><a href="#" onclick="ExitFromApp()" data-icon="power">Exit</a></li>
                </ul>
            </div>
            <h1>setijo@gmail.com</h1>
        </div>
    </div>


    <script>
        document.addEventListener("deviceready", onDeviceReady, false);

        function onDeviceReady() {
            document.addEventListener("backbutton", function(e) {
                if ($.mobile.activePage.is('#page')) {
                    e.preventDefault();
                    ExitFromApp();
                } else {
                    navigator.app.backHistory()
                }
            }, false);
        }

        function ExitFromApp() {
            var x = confirm("Yakin keluar ?");
            if (x == true) {
                navigator.app.exitApp();
                return true;
            } else {
                return false;
            }
        }

        function playAudio(url) {
            var my_media = new Media("/android_asset/www/audio/mp3/Yoru-ni-kakeru-(osanime.com).mp3",
                function() {
                    console.log("playAudio():Audio Success");
                },
                function(err) {
                    console.log("playAudio():Audio Error: " + err);
                }
            );
            my_media.play();
            // var my_media = new Media("/android_asset/www/audio/mp3/akeh.mp3",
            //     function() {
            //         console.log("playAudio():Audio Success");
            //     },
            //     function(err) {
            //         console.log("playAudio():Audio Error: " + err);
            //     }
            // );
            // my_media.play();
        }
    </script>
</body>

</html>