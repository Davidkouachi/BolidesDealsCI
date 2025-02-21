document.addEventListener('DOMContentLoaded', function() {
    var passwordField = document.getElementById('password');

    function preventCopyPaste(event) {
        if (event.ctrlKey && (event.key === 'c' || event.key === 'v')) {
            event.preventDefault();
        }
    }

    function preventContextMenu(event) {
        event.preventDefault();
    }

    // Bloquer les événements Ctrl+C et Ctrl+V
    passwordField.addEventListener('keydown', preventCopyPaste);

    // Bloquer le menu contextuel (clic droit)
    passwordField.addEventListener('contextmenu', preventContextMenu);
});
