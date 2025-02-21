function handleFormSubmit(event) {
    event.preventDefault();

    const prixApport = parseInt(document.getElementById('prix_apport').value.replace(/\./g, '')) || 0;
    const creditAutoMois = parseInt(document.getElementById('credit_auto_mois').value) || 1;
    const prixMois = parseInt(document.getElementById('prix_mois').value.replace(/\./g, '')) || 0;
    const prix = parseInt(document.getElementById('prix').value.replace(/\./g, '')) || 0;
    const credit_auto = document.getElementById('credit_auto').value;

    if (credit_auto === 'oui') {
    // Validation: prixApport should not equal prix, and prixMois should not be negative
        if (prixApport === prix) {
            NioApp.Toast("<h5>Alert</h5><p>L'apport initial ne peut pas être égal au prix total.</p>", "warning", {position: "top-center"});
            return false;
        }

        if (prixMois < 0) {
            NioApp.Toast("<h5>Alert</h5><p>Le montant à payer par mois ne peut pas être négatif.</p>", "warning", {position: "top-center"});
            return false;
        }
    }

    // Récupérer les valeurs des éléments
    const papier = document.getElementById('papier').value;
    const assurance = document.getElementById('assurance').value;
    const visite_techn = document.getElementById('visite_techn').value;

    // Obtenir la date du jour
    const today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

    // Vérifier si 'papier' est 'oui'
    if (papier === 'oui') {
        // Convertir les dates en objets Date pour la comparaison
        const assuranceDate = new Date(assurance);
        const visiteDate = new Date(visite_techn);
        const todayDate = new Date(today);

        // Comparer les dates
        if (assuranceDate < todayDate || visiteDate < todayDate) {
            NioApp.Toast("<h5>Alert</h5><p>Veuillez bien vérifier la date d'assurance et de la visite technique.</p>", "warning", {position: "top-center"});
            return false;
        }
    }
    
    // Précharger le HTML du modal
    var modalHtml = `
        <div class="modal fade" id="modalCharg" tabindex="-1" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center">
                <ul class="preview-list g-1">
                    <li class="preview-item"> 
                        <a class="btn btn-warning" > 
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
                            <span>Vérification en cours...</span> 
                        </a> 
                    </li>
                </ul>
            </div>
        </div>
    `;

    // Insérer le modal dans le DOM
    document.body.insertAdjacentHTML('beforeend', modalHtml);

    // Initialiser et afficher le modal après insertion
    var modalElement = document.getElementById('modalCharg');
    var modal = new bootstrap.Modal(modalElement);
    modal.show();

    this.submit();
}

// Attach event listener to both forms
document.getElementById("form").addEventListener("submit", handleFormSubmit);
