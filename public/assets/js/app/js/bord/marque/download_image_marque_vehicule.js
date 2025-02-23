$(document).ready(function() {
    const $fileInput = $('#imageInput0');
    const $imagePreview = $('#imagePreview');
    const $removeButton = $('#removeButton');
    const $marqueInput = $('#marque');
    const $label = $('.label_input_file0');

    $fileInput.on('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            $label.hide();
            // Extraire le nom du fichier sans extension et le convertir en majuscules
            let fileName = file.name.split('.').slice(0, -1).join('.').toUpperCase();
            $marqueInput.val(fileName);

            const reader = new FileReader();
            reader.onload = function(e) {
                $imagePreview.attr('src', e.target.result);
                $removeButton.show();
            };
            reader.readAsDataURL(file);
        }
    });

    $removeButton.on('click', function() {
        $imagePreview.attr('src', ''); // Réinitialiser l'image
        $fileInput.val(null); // Réinitialiser l'input file
        $removeButton.hide(); // Masquer le bouton
        $label.show(); // Réafficher l'input file
        $marqueInput.val(null);
    });

    // Masquer le bouton au chargement
    $removeButton.hide();
});
