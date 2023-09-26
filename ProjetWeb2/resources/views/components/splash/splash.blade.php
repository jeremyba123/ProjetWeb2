<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/splash.css">

    <title>Accueil</title>
</head>

<body class="no-scroll">
    <div class="splash-screen" id="splash-screen">
        <div class="splash-content">
            <h1 class="animated-text">MetalFest</h1>
        </div>
        <div class="loading-container">
            <div class="loader"></div>
        </div>
    </div>

    <div class="main-content" id="main-content">
        {{ $slot }}
    </div>
</body>
<script>
    const splashScreen = document.getElementById("splash-screen");
    const mainContent = document.getElementById("main-content");


    function hideSplashShowMain() {
        splashScreen.style.transform = "translateY(-100%)";
        setTimeout(() => {
            splashScreen.style.display = "none";
            mainContent.style.display = "block";
            document.body.classList.remove("no-scroll");
        }, 1000);
    }

    setTimeout(hideSplashShowMain, 2000);

    window.onbeforeunload = function() {
        window.scroll(0, 0);
        window.location.reload();
    };
</script>

</html>
