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

// Obtenez une référence aux éléments HTML
const searchInput2 = document.getElementById('search-input2')
const groupes2 = document.querySelectorAll('.groupe')

// Écoutez l'événement d'entrée dans le champ de recherche pour filtrer en temps réel
searchInput2.addEventListener('input', () => {
    const searchTerm2 = searchInput2.value.toLowerCase()

    // Parcourez tous les groupes et affichez/masquez-les en fonction du terme de recherche
    groupes2.forEach((groupe) => {
        const nom2 = groupe.querySelector('.nom').textContent.toLowerCase()
        if (nom2.includes(searchTerm2)) {
            groupe.style.display = 'block'
        } else {
            groupe.style.display = 'none'
        }
    })
})

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





