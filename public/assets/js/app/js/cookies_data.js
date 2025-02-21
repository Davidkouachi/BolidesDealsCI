$(document).ready(function() {
    // Fonction pour obtenir un cookie par son nom
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Obtenez la valeur du cookie de consentement
    const cookieConsent = getCookie('cookieConsent');

    if (cookieConsent) {
        // Sélectionner tous les liens qui doivent inclure le cookie de consentement
        $('a[data-cookie-consent]').each(function() {
            const originalHref = $(this).attr('href');

            // Vérifier si href est valide
            if (originalHref && originalHref !== "#") {
                try {
                    const newHref = new URL(originalHref, window.location.origin);
                    newHref.searchParams.set('cookieConsent', cookieConsent);
                    $(this).attr('href', newHref.toString());
                } catch (error) {
                    console.error("Erreur lors du traitement du lien :", originalHref, error);
                }
            }
        });
    }
});
