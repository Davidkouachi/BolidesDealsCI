$(document).ready(function() {
    $("#btn_eng").on("click", function(event) {
        event.preventDefault();

        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var token = $("#token").val();

        if (password !== cpassword) {
            NioApp.Toast("<h5>Erreur</h5><p>Les mots de passe ne correspondent pas.</p>", "error", { position: "top-center" });
            return false;
        }

        if (password === cpassword) {
            // Vérification si le mot de passe satisfait les critères
            if (!verifierMotDePasse(password) || !verifierMotDePasse(cpassword)) {
                NioApp.Toast("<h5>Information</h5><p>Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.</p>", "error", { position: "top-center" });
                return false;
            }
        }

        preloader();

        $.ajax({
            url: "/api/reset_new_password/" + token,
            method: "GET",
            data: {
                password: password,
            },
            success: function (response) {
                $('#modalCharge').modal('hide');

                if (response.success) {

                    $("#password").val(null);
                    $("#cpassword").val(null);
                    $("#token").val(null);

                    Swal.fire({
                        title: "Opération éffectuée, rédirection vers la page de connexion...",
                        html: "Veuillez patienter.",
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        },
                    });

                    window.location.href = "/Se Connecter";

                } else if (response.email_existe) {
                    showAlert("Alert", response.message, "warning");
                } else if (response.error_db) {
                    showAlert("Alert", "Echec de l'opération", "warning");
                    console.log(response.message);
                } else if (response.abort) {
                    location.reload();
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

    function verifierMotDePasse(motDePasse) {
        return motDePasse.length >= 8 &&
               /[A-Z]/.test(motDePasse) &&
               /[a-z]/.test(motDePasse) &&
               /\d/.test(motDePasse);
    }
});
