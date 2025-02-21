$(document).ready(function() {
    // Vérifiez si le cookie de consentement existe
    const cookieConsent = getCookie('cookieConsent');

    if (!cookieConsent) {
        var modalHtml = `
            <div class="modal fade" id="CookiesOver" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Consentement aux Cookies</h5>
                        </div>
                        <div class="modal-body">
                            <p>Nous utilisons des cookies pour améliorer votre expérience.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="acceptCookies" class="btn btn-primary">Accepter</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Insérer le modal dans le DOM
        $('body').append(modalHtml);

        // Vérifier si le bouton existe avant d'attacher l'événement
        $(document).on('click', '#acceptCookies', function() {
            setCookie('cookieConsent', 'accepted', 365); // Cookie valide pendant 1 an
            $('#CookiesOver').modal('hide');
        });

        // Afficher le modal après l'ajout dans le DOM
        var modal = new bootstrap.Modal($('#CookiesOver')[0]);
        modal.show();
    }

    // Fonction pour obtenir un cookie par son nom
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // Fonction pour définir un cookie
    function setCookie(name, value, days) {
        let expires = '';
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = `; expires=${date.toUTCString()}`;
        }
        document.cookie = `${name}=${(value || '') + expires}; path=/`;
    }
});
