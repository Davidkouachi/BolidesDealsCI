$(document).ready(function() {
    $("#btn_eng").on("click", function(event) {
        event.preventDefault();

        var email = $("#email").val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            showAlert("Alert", "Veuillez saisir une adresse e-mail valide.", "info");
            return false;
        }

        preloader();

        $.ajax({
            url: "/api/reset_password_email_lien",
            method: "GET",
            data: {
                email: email,
            },
            success: function (response) {
                $('#modalCharge').modal('hide');

                if (response.success) {

                    showAlert("Alert", response.message, "success");
                } else if (response.email_existe) {
                    showAlert("Alert", response.message, "warning");
                } else if (response.date_60) {
                    showAlert("Alert", response.message, "warning");
                } else if (response.error_db) {
                    showAlert("Alert", "Echec de l'opération", "warning");
                    console.log(response.message);
                } else {
                    showAlert("Alert", "une erreur est survenue", "error");
                }
            },
            error: function () {
                $('#modalCharge').modal('hide');

                showAlert("Erreur", "une erreur est survenue lors de l'operation.", "error");
            },
        });
    });
});
