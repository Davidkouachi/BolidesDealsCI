document.getElementById("form_update").addEventListener("submit", function(event) {
    event.preventDefault();

    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    if (phone.length !== 10) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir un numéro de téléphone valide.</p>", "info", { position: "top-center" });
        return false;
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir une adresse e-mail valide.</p>", "info", { position: "top-center" });
        return false;
    }

    // Précharger le HTML du modal
    var modalHtml = `
        <div class="modal fade" id="modalConnexion" tabindex="1" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
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

});
