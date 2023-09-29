// Sélectionnez le bouton du menu burger (menu-croix)
const menuBurger = document.querySelector(".menu-croix")
let menuOuvert = false

// Ajoutez un gestionnaire d'événement de clic pour basculer entre les états du menu
menuBurger.addEventListener("click", () => {
    if (!menuOuvert) {
        menuBurger.classList.add("open")
        menuOuvert = true
    } else {
        menuBurger.classList.remove("open")
        menuOuvert = false
    }
})

// *********************lien retour en haut*********************

var backToTop = document.getElementById("back-to-top")


window.addEventListener("scroll", function () {
    if (window.scrollY >= window.innerHeight) {
        backToTop.classList.add("show")
    } else {
        backToTop.classList.remove("show")
    }
})

backToTop.addEventListener("click", function (e) {
    e.preventDefault()
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    })
})
