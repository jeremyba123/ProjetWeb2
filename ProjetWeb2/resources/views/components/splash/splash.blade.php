<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your meta tags and links) ... -->
    <link rel="stylesheet" href="css/splash.css">

    <title>Accueil</title>
</head>
<body class="no-scroll"> <!-- Apply the no-scroll class to the body -->
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

    // Function to hide the splash screen and show the main content
    function hideSplashShowMain() {
        splashScreen.style.transform = "translateY(-100%)"; // Move from bottom to top
        setTimeout(() => {
            splashScreen.style.display = "none"; // Hide the splash screen
            mainContent.style.display = "block"; // Show the main content
            document.body.classList.remove("no-scroll"); // Remove the no-scroll class
        }, 1000); // After 1 second (to give time for the animation)
    }

    // Call the function to hide the splash screen and show the main content after 3 seconds
    setTimeout(hideSplashShowMain, 2000);

    // Function to reload the page at the top when it's refreshed
    window.onbeforeunload = function () {
        window.scroll(0, 0); // Scroll to the top
        window.location.reload(); // Reload the page
    };
</script>
</html>
