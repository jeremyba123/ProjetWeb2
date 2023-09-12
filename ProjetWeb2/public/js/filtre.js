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
            groupe.style.display = 'flex'
        } else {
            groupe.style.display = 'none'
        }
    })
})
