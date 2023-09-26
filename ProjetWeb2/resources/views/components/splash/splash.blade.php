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

    <script src="js/splash.js"></script>
</body>

</html>
