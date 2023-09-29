
// Obtenez une référence aux éléments HTML
const searchInput = document.getElementById('search-input')
const groupes = document.querySelectorAll('.groupe')

// Écoutez l'événement d'entrée dans le champ de recherche pour filtrer en temps réel
searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value.toLowerCase()

    // Parcourez tous les groupes et affichez/masquez-les en fonction du terme de recherche
    groupes.forEach((groupe) => {
        const nom = groupe.querySelector('.nom').textContent.toLowerCase()
        if (nom.includes(searchTerm)) {
            groupe.style.display = 'block'
        } else {
            groupe.style.display = 'none'
        }
    })
})

// ******************menu burger*****************

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



// ******************flip .groupe*****************

let groupe = document.querySelector(".groupe")
let conteneur = document.querySelector(".conteneur-groupe")
let img = document.querySelector(".groupe img")
let card = document.querySelector(".card")
let date_heure = document.querySelector(".date-heure")
let instagram = document.querySelector("img.instagram")
let lien = document.querySelector("a.lien-instagram")




groupes.forEach(groupe => {
    let img = groupe.querySelector("img")
    let card = groupe.querySelector(".card")
    let dateHeure = groupe.querySelector(".date-heure")
    let instagram = groupe.querySelector("img.instagram")
    let lien = groupe.querySelector("a.lien-instagram")
    let isHidden = false // Variable pour suivre l'état

    groupe.addEventListener("click", () => {
        // Basculer l'état entre visible et non visible
        if (isHidden) {
            img.style.display = "block" // ou "inline" selon le type de l'élément
            card.style.display = "block"
            dateHeure.style.display = "block"
            groupe.style.border = "none"
        } else {
            img.style.display = "none"
            card.style.display = "none"
            dateHeure.style.display = "none"
            groupe.style.display = "flex"
            groupe.style.height = "90%"
            groupe.style.border = "5px solid #ff5950"
            groupe.style.backgroundColor = "black"
            groupe.style.backgroundSize = "cover"
            instagram.style.display = "block"
            instagram.style.width = "50px"
            instagram.style.height = "50px"
            lien.style.display = "block"
        }

        // Inverser l'état
        isHidden = !isHidden
    })

    groupe.addEventListener("click", () => {
        groupe.classList.toggle("flipped")
    })

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
