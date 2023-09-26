const splashScreen = document.getElementById("splash-screen")
const mainContent = document.getElementById("main-content")


function hideSplashShowMain() {
    splashScreen.style.transform = "translateY(-100%)"
    setTimeout(() => {
        splashScreen.style.display = "none"
        mainContent.style.display = "block"
        document.body.classList.remove("no-scroll")
    }, 1000)
}

setTimeout(hideSplashShowMain, 2000)

window.onbeforeunload = function () {
    window.scroll(0, 0)
    window.location.reload()
}
