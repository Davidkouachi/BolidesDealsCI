document.getElementById("registre_password_profil").addEventListener("submit", function(event) {
    event.preventDefault();

    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;

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

    // Précharger le HTML du modal
    var modalHtml = `
        <div class="modal fade" id="modalConnexion" tabindex="-1" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center">
                <ul class="preview-list g-1">
                    <li class="preview-item"> 
                        <a class="btn btn-warning" > 
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
                            <span>Chargement en cours...</span> 
                        </a> 
                    </li>
                </ul>
            </div>
        </div>
    `;

    // Insérer le modal dans le DOM
    document.body.insertAdjacentHTML('beforeend', modalHtml);

    // Initialiser et afficher le modal après insertion
    var modalElement = document.getElementById('modalConnexion');
    var modal = new bootstrap.Modal(modalElement);
    modal.show();

    this.submit();

    function verifierMotDePasse(motDePasse) {

        if (motDePasse.length < 8) {
            return false;
        }

        if (!/[A-Z]/.test(motDePasse)) {
            return false;
        }

        if (!/[a-z]/.test(motDePasse)) {
            return false;
        }

        if (!/\d/.test(motDePasse)) {
            return false;
        }

        return true;
    }

});
