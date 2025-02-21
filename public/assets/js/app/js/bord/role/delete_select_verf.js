document.addEventListener('DOMContentLoaded', function() {
    const deleteButton = document.getElementById('deleteButton');
    const checkboxes = document.querySelectorAll('input[name="checkboxes[]"]');

    deleteButton.addEventListener('click', function() {
        let checked = false;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checked = true;
            }
        });

        if (checked) {
            // Au moins un checkbox est coché, ouvrir le modal de suppression
            const modalDelete = new bootstrap.Modal(document.getElementById('modalDelete'));
            modalDelete.show();
        } else {
            // Aucun checkbox n'est coché, afficher un message d'alerte
            NioApp.Toast("<h5>Information</h5><p>Veuillez sélectionner une marque SVP !!! .</p>", "info", { position: "top-right" });
        }
    });
});
