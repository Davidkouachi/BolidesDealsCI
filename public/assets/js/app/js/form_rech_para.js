document.addEventListener("DOMContentLoaded", function() {

    function formatPrice(input) {
        // Supprimer tous les points existants
        input = input.replace(/\./g, '');

        // Formater le prix avec des points
        return input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Écouter l'événement d'entrée sur les champs de texte
    document.getElementById('min-price').addEventListener('input', function() {
        this.value = formatPrice(this.value);
    });

    document.getElementById('max-price').addEventListener('input', function() {
        this.value = formatPrice(this.value);
    });

    // Événement pour permettre uniquement les chiffres
    document.getElementById('min-price').addEventListener('keypress', function(event) {
        const key = event.key;
        if (isNaN(key)) {
            event.preventDefault();
        }
    });

    document.getElementById('max-price').addEventListener('keypress', function(event) {
        const key = event.key;
        if (isNaN(key)) {
            event.preventDefault();
        }
    });
});
// Fonction pour formater le prix avec des points

