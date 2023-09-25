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



