document.addEventListener('DOMContentLoaded', function() {
    var vehiculeSelect = document.getElementById('annee');
    var currentYear = new Date().getFullYear();
    var startYear = 2000; // Commencer à partir de 2021

    for (var year = currentYear; year >= startYear; year--) {
        var option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        vehiculeSelect.appendChild(option);
    }
});

// Écouter l'événement d'entrée sur les champs de texte
document.getElementById('min-prix').addEventListener('input', function() {
    this.value = formatPrice(this.value);
});
// Écouter l'événement d'entrée sur les champs de texte
document.getElementById('max-prix').addEventListener('input', function() {
    this.value = formatPrice(this.value);
});
// Écouter l'événement d'entrée sur les champs de texte
document.getElementById('min-km').addEventListener('input', function() {
    this.value = formatPrice(this.value);
});
// Écouter l'événement d'entrée sur les champs de texte
document.getElementById('max-km').addEventListener('input', function() {
    this.value = formatPrice(this.value);
});

// Événement pour permettre uniquement les chiffres
document.getElementById('min-prix').addEventListener('keypress', function(event) {
    const key = event.key;
    if (isNaN(key)) {
        event.preventDefault();
    }
});

// Événement pour permettre uniquement les chiffres
document.getElementById('max-prix').addEventListener('keypress', function(event) {
    const key = event.key;
    if (isNaN(key)) {
        event.preventDefault();
    }
});
// Événement pour permettre uniquement les chiffres
document.getElementById('min-km').addEventListener('keypress', function(event) {
    const key = event.key;
    if (isNaN(key)) {
        event.preventDefault();
    }
});

// Événement pour permettre uniquement les chiffres
document.getElementById('max-km').addEventListener('keypress', function(event) {
    const key = event.key;
    if (isNaN(key)) {
        event.preventDefault();
    }
});

// Fonction pour formater le prix avec des points
function formatPrice(input) {
    // Supprimer tous les points existants
    input = input.replace(/\./g, '');

    // Formater le prix avec des points
    return input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

