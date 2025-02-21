function handleFormSubmit(event) {
    event.preventDefault(); // Prevent default form submission

    var modalHtml = `
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
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

    // Insert the modal into the DOM
    document.body.insertAdjacentHTML('beforeend', modalHtml);

    // Show the modal
    var modal = new bootstrap.Modal(document.getElementById('modalL'));
    modal.show();

    this.submit();
}

document.getElementById("form_sugg").addEventListener("submit", handleFormSubmit);
