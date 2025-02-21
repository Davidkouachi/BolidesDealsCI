function handleFormSubmit(event) {
    event.preventDefault();
    
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
document.getElementById("form_new_formule").addEventListener("submit", handleFormSubmit);