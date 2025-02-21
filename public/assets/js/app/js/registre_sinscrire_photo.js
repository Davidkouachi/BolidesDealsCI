$(document).ready(function() {
    $("#btn-delete-img").hide();
    $("#imageInput").on("change", function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").attr("src", e.target.result).show();
                $("#btn-delete-img").show(); // Afficher le bouton de suppression
            }
            reader.readAsDataURL(file);
        }
    });

    // Gestion du clic sur le bouton de suppression
    $("#btn-delete-img").on("click", function() {
        $("#imagePreview").attr("src", "").hide(); // Cacher l'image
        $("#imageInput").val(null); // Réinitialiser le champ fichier
        $(this).hide(); // Cacher le bouton
    });

    // Initialisation : cacher le bouton si aucune image n'est présente
    if (!$("#imagePreview").attr("src")) {
        $("#btn-delete-img").hide();
    }
});
