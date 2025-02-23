$(document).ready(function () {

    toggleDeleteButton();

    function toggleDeleteButton() {
        let totalCheckboxes = $('input[name="checkboxes[]"]').length;

        // Si aucune case n'est présente dans le tableau, masquer le bouton de suppression
        if (totalCheckboxes === 0) {
            $('#deleteButton').hide();
            $('#pid').prop('checked', false); // Assurer que la case principale est décochée
            return;
        }

        let checkedCount = $('input[name="checkboxes[]"]:checked').length;

        // Afficher ou cacher le bouton supprimer
        $('#deleteButton').toggle(checkedCount > 0);

        // Cocher/décocher la case principale si toutes les cases sont cochées
        $('#pid').prop('checked', checkedCount === totalCheckboxes);
    }

    // Sur changement de la case principale (#pid)
    $('#pid').on('change', function () {
        $('input[name="checkboxes[]"]').prop('checked', this.checked);
        toggleDeleteButton(); // Mettre à jour la visibilité du bouton "Supprimer"
    });

    // Sur changement des checkboxes individuelles
    $(document).on('change', 'input[name="checkboxes[]"]', function () {
        toggleDeleteButton();
    });

    $(document).on('click', '#deleteButton', function () {
        let checked = $('.table_marque tbody input[name="checkboxes[]"]:checked');

        // Vérifier si au moins une case est cochée
        if (checked.length === 0) {
            showAlert("Alert", "Veuillez sélectionner au moins une marque à supprimer.", "warning");
            return;
        }

        // Récupérer les valeurs des checkboxes cochées
        let selected = checked.map(function () {
            return $(this).val(); // Correctement récupérer les valeurs
        }).get(); // Convertir en tableau JS

        // Afficher une alerte de confirmation avec SweetAlert
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: "Cette action est irréversible !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Oui, supprimer !",
            cancelButtonText: "Annuler"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#modalUpdate').modal('hide');

                preloader();

                $.ajax({
                    url: "/refresh-csrf",
                    method: "GET",
                    success: function (response_crsf) {
                        $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                        $.ajax({
                            url: "/api/delete_marque",
                            method: "POST", // **Mettre POST au lieu de GET pour la suppression**
                            headers: {
                                "X-CSRF-TOKEN": response_crsf.csrf_token,
                            },
                            data: {
                                selected: selected, // Envoyer le tableau des ID
                            },
                            success: function (response) {
                                $('#modalCharge').modal('hide');

                                if (response.success) {
                                    list_marque_all();
                                    showAlert("Succès", response.message, "success");

                                    // Désélectionner toutes les cases à cocher, y compris #pid
                                    $('input[name="checkboxes[]"]').prop('checked', false);
                                    $('#pid').prop('checked', false); // Désélectionner la case principale

                                    // Mettre à jour l'affichage du bouton supprimer (le cacher si aucune case n'est cochée)
                                    toggleDeleteButton();
                                } else if (response.selected_introuv) {
                                    showAlert("Alert", response.message, "warning");
                                } else {
                                    showAlert("Erreur", "Une erreur est survenue", "error");
                                }
                            },
                            error: function () {
                                $('#modalCharge').modal('hide');
                                showAlert("Erreur", "Erreur lors de la suppression.", "error");
                            },
                        });
                    },
                    error: function () {
                        $('#modalCharge').modal('hide');
                        showAlert("Erreur", "Une erreur est survenue lors de la mise a jour.", "error");
                    },
                });

            } else {
                // console.log("Suppression annulée !");
            }
        });
    });

});
