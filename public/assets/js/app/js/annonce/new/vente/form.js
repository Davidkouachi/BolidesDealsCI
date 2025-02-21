function handleFormSubmit(event) {
    event.preventDefault();

    const imatricule = document.getElementById('imm').value;
    // Formats séparés pour une meilleure lisibilité
    const format1 = /\d{5}[A-Z]{2}\d{2}/;       // 99999AZ99
    const format2 = /\d{4}[A-Z]{2}\d{2}/;       // 9999AZ99
    const format3 = /\d{3}[A-Z]{2}\d{2}/;       // 999AZ99
    const format4 = /\d{2}[A-Z]{2}\d{2}/;       // 99AZ99
    const format5 = /\d[A-Z]{2}\d{2}/;          // 9AZ99
    const format6 = /[A-Z]{2}-\d{3}-[A-Z]{2}/;  // AZ-999-AZ
    const format7 = /\d{5}/;                    // 99999
    // Combinaison des formats avec le caractère logique |
    const immatriculationRegex = new RegExp(`^(?:${format1.source}|${format2.source}|${format3.source}|${format4.source}|${format5.source}|${format6.source}|${format7.source})$`);

    if (!immatriculationRegex.test(imatricule)) {
        NioApp.Toast("<h5>Alert</h5><p>Le format de la plaque d'immatriculation saisie est incorrecte.</p>", "error", {position: "top-center"});
        return false;
    }

    const prixApport = parseInt(document.getElementById('prix_apport').value.replace(/\./g, '')) || 0;
    const creditAutoMois = parseInt(document.getElementById('credit_auto_mois').value) || 1;
    const prixMois = parseInt(document.getElementById('prix_mois').value.replace(/\./g, '')) || 0;
    const prix = parseInt(document.getElementById('prix').value.replace(/\./g, '')) || 0;
    const credit_auto = document.getElementById('credit_auto').value;

    if (credit_auto === 'oui') {
    // Validation: prixApport should not equal prix, and prixMois should not be negative
        if (prixApport === prix) {
            NioApp.Toast("<h5>Vérification</h5><p>L'apport initial ne peut pas être égal au prix total.</p>", "warning", {position: "top-center"});
            return false;
        }

        if (prixMois < 0) {
            NioApp.Toast("<h5>Vérification</h5><p>Le montant à payer par mois ne peut pas être négatif.</p>", "warning", {position: "top-center"});
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
    var modalElement = document.getElementById('modalCharg');
    var modal = new bootstrap.Modal(modalElement);
    modal.show();

    this.submit();
}

// Attach event listener to both forms
document.getElementById("form_new_vente").addEventListener("submit", handleFormSubmit);