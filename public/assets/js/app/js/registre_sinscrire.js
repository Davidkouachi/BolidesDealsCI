$(document).ready(function () {

    numberTel('#phone');
    numberTelLimit('#phone');

    $("#btn_eng").on("click", function (event) {
        event.preventDefault();

        var nom = $("#nom").val().trim();
        var prenom = $("#prenom").val().trim();
        var email = $("#email").val().trim();
        var phone = $("#phone").val().trim();
        var adresse = $("#adresse").val().trim();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var image = $("#imageInput")[0].files[0];

        if (!nom || !prenom || !email || !phone || !password ) {
            showAlert("Alert", "Certains champs obligatoires n'ont pas été saisis.", "info");
            return false;
        }

        if (phone.length !== 10) {
            showAlert("Alert", "Veuillez saisir un numéro de téléphone valide.", "info");
            return false;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showAlert("Alert", "Veuillez saisir une adresse e-mail valide.", "info");
            return false;
        }

        if (password !== cpassword) {
            showAlert("Alert", "Les mots de passe ne correspondent pas.", "info");
            return false;
        }

        if (!verifierMotDePasse(password)) {
            showAlert("Alert", "Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.", "info");
            return false;
        }

        preloader();

        var formData = new FormData();
        formData.append("nom", nom);
        formData.append("prenom", prenom);
        formData.append("email", email);
        formData.append("phone", phone);
        formData.append("adresse", adresse);
        formData.append("password", password);
        if (image) {
            formData.append("image", image); // Ajout du fichier image
        }

        $.ajax({
            url: "/refresh-csrf",
            method: "GET",
            success: function (response_crsf) {
                $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                $.ajax({
                    url: "/api/trait_registre",
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
                            Swal.fire({
                                title: "Rédirection vers la page de connexion...",
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
                        } else if (response.contact_existe) {
                            showAlert("Alert", response.message, "warning");
                        } else if (response.error) {
                            showAlert("Alert", "Échec de l'opération", "warning");
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
                showAlert("Erreur", "Une erreur est survenue lors de l'enregistrement de l'utilisateur.", "error");
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
