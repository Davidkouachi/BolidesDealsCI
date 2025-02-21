    document.addEventListener('DOMContentLoaded', function() {
        var imageElement = document.getElementById('marqueImage');

        // Convertir les données PHP en format JSON pour JavaScript
        var marques = @json($marques);

        $('#marqueSelect').on('change', function() {
            var selectedValue = $(this).val();
            
            // Trouver l'image correspondant à la valeur sélectionnée
            var imageUrl = '';
            marques.forEach(function(marque) {
                if (marque.id == selectedValue) {
                    imageUrl = 'storage/images/' + marque.image_nom;
                }
            });

            // Mettre à jour la source de l'image ou la vider si aucune marque n'est sélectionnée
            if (imageUrl) {
                imageElement.src = imageUrl;
            } else {
                imageElement.src = ''; // Clear the image if no brand is selected
            }
        });

        // Optionnel : Initialiser l'image au chargement de la page, si nécessaire
        var initialValue = $('#marqueSelect').val();
        if (initialValue) {
            var initialImageUrl = '';
            marques.forEach(function(marque) {
                if (marque.id == initialValue) {
                    initialImageUrl = 'storage/images/' + marque.image_nom;
                }
            });
            if (initialImageUrl) {
                imageElement.src = initialImageUrl;
            }
        }
    });