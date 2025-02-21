$(document).ready(function() {
    $("#form_connexion").on("submit", function(event) {
        event.preventDefault();

        var login = $("#login").val();
        var password = $("#password").val();
        var remember = $("#remember").prop("checked");

        if (!login.trim() || !password.trim()) {
            showAlert("Alert", "Veuillez remplir tous les champs", "warning");
            return false;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var phoneRegex = /^[0-9]{10}$/;
        if (!emailRegex.test(login) && !phoneRegex.test(login)) {
            showAlert("Alert", "Veuillez saisir une adresse e-mail ou un numéro de téléphone valide", "info");
            return false;
        }

        if (!verifierMotDePasse(password)) {
            showAlert("Alert", "Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre", "info");
            return false;
        }

        preloader();

        $.ajax({
            url: "/refresh-csrf",
            method: "GET",
            success: function (response_crsf) {
                $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                // Deuxième requête : authentification
                $.ajax({
                    url: "/api/trait_login",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": response_crsf.csrf_token,
                    },
                    data: {
                        login: login,
                        password: password,
                        remember: remember,
                    },
                    success: function (response) {
                        $('#modalCharge').modal('hide');

                        if (response.success) {

                            Swal.fire({
                                title: "Rédirection vers la page d'accueil...",
                                html: "Veuillez patienter.",
                                timerProgressBar: !0,
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                },
                            });

                            redirectTo(response.login);

                        } else if (response.error) {
                            showAlert("Alert", "Login ou Mot de passe incorrect", "warning");
                        } else if (response.login_in) {
                            showAlert("Alert", "Login introuvable", "warning");
                        }
                    },
                    error: function () {
                        $('#modalCharge').modal('hide');

                        showAlert("Erreur", "Erreur lors de l'authentification.", "error");
                    },
                });
            },
            error: function () {
                $('#modalCharge').modal('hide');

                showAlert("Erreur", "Une erreur est survenue lors de la recupération de l'identifiant.", "error");
            },
        });

    });

    function verifierMotDePasse(motDePasse) {
        return motDePasse.length >= 8 && /[A-Z]/.test(motDePasse) && /[a-z]/.test(motDePasse) && /\d/.test(motDePasse);
    }

    // Fonction pour gérer la redirection après authentification
    function redirectTo(login) {
        let userLogin = login;

        // Récupérer ou initialiser le tableau userPages
        let userPages = JSON.parse(localStorage.getItem("userPages")) || [];

        // Trouver l'utilisateur dans le tableau
        let userIndex = userPages.findIndex((user) => user.login === userLogin);

        if (userIndex !== -1) {
            window.location.href = userPages[userIndex].lastUrl;
        } else {
            window.location.href = "/";
        }
    }

});
