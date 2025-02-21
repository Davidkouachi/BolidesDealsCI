$(document).ready(function() {
    var $passwordField = $('#password');
    var $cpasswordField = $('#cpassword');

    function preventCopyPaste(event) {
        if (event.ctrlKey && (event.key === 'c' || event.key === 'v')) {
            event.preventDefault();
        }
    }

    function preventContextMenu(event) {
        event.preventDefault();
    }

    // Bloquer les événements Ctrl+C et Ctrl+V
    $passwordField.on('keydown', preventCopyPaste);
    $cpasswordField.on('keydown', preventCopyPaste);

    // Bloquer le menu contextuel (clic droit)
    $passwordField.on('contextmenu', preventContextMenu);
    $cpasswordField.on('contextmenu', preventContextMenu);
});
