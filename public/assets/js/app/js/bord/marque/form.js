$(document).ready(function() {

    $('#reset_form').on('click', formReset);

    $("#btn_eng").on("click", function(event) {
        event.preventDefault();

        var nom = $("#marque").val().trim();
        var image = $("#imageInput0")[0].files[0];

        if (!image) {
            showAlert("Alert", "Veuillez seletionner une image", "warning");
            return false;
        }

        if (!nom) {
            showAlert("Alert", "Veuillez saisir le nom de la marque", "warning");
            return false;
        }

        preloader();

        var formData = new FormData();
        formData.append("nom", nom);
        formData.append("image", image);

        $.ajax({
            url: "/refresh-csrf",
            method: "GET",
            success: function (response_crsf) {
                $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                $.ajax({
                    url: "/api/insert_marque",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": response_crsf.csrf_token,
                    },
                    data: formData,
                    contentType: false, // Important pour envoyer un fichier
                    processData: false, // Important pour envoyer un fichier
                    success: function (response) {
                        $('#modalCharge').modal('hide');

                        if (response.success) {
                            list_marque_all();
                            formReset();
                            showAlert("Alert", response.message, "success");
                        } else if (response.marque_trouve) {
                            showAlert("Alert", response.message, "warning");
                        } else if (response.error_db) {
                            showAlert("Alert", 'Echec de l\'opération', "warning");
                            console.log(response.message);
                        } else {
                            showAlert("Alert", "Une erreur est survenue", "error");
                        }
                    },
                    error: function () {
                        $('#modalCharge').modal('hide');
                        showAlert("Erreur", "Erreur lors de l'enregistrement.", "error");
                    },
                });
            },
            error: function () {
                $('#modalCharge').modal('hide');
                showAlert("Erreur", "Une erreur est survenue lors de l'enregistrement.", "error");
            },
        });
    });

    $("#btn_modif").on("click", function(event) {
        event.preventDefault();

        var id = $("#id_marque").val().trim();
        var nom = $("#marque_modif").val().trim();
        var image = $("#imageInput0_modif")[0].files[0];

        if (!nom) {
            showAlert("Alert", "Veuillez saisir le nom de la marque", "warning");
            return false;
        }

        $('#modalUpdate').modal('hide');

        preloader();

        var formData = new FormData();
        formData.append("nom", nom);
        formData.append("image", image);

        $.ajax({
            url: "/refresh-csrf",
            method: "GET",
            success: function (response_crsf) {
                $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                $.ajax({
                    url: "/api/update_marque/" + id,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": response_crsf.csrf_token,
                    },
                    data: formData,
                    contentType: false, // Important pour envoyer un fichier
                    processData: false, // Important pour envoyer un fichier
                    success: function (response) {
                        $('#modalCharge').modal('hide');

                        if (response.success) {
                            list_marque_all();
                            showAlert("Alert", response.message, "success");
                        } else if (response.marque_introuv) {
                            showAlert("Alert", response.message, "warning");
                        } else if (response.error_db) {
                            showAlert("Alert", 'Echec de l\'opération', "warning");
                            console.log(response.message);
                        } else {
                            showAlert("Alert", "Une erreur est survenue", "error");
                        }
                    },
                    error: function () {
                        $('#modalCharge').modal('hide');
                        showAlert("Erreur", "Erreur lors de la mise a jour.", "error");
                    },
                });
            },
            error: function () {
                $('#modalCharge').modal('hide');
                showAlert("Erreur", "Une erreur est survenue lors de la mise a jour.", "error");
            },
        });
    });

    function formReset()
    {
        $('#imageInput0').val(null);
        $('#imagePreview').attr('src', '');
        $('#removeButton').hide();
        $('#marque').val(null);
        $('.label_input_file0').show();
    }

});
