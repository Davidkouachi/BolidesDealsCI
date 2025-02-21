$(document).ready(function () {

    window.showAlert = function (title, message, color) {
        NioApp.Toast(`<h5>${title}</h5><p>${message}</p>`, color, { position: "top-center" });
    };

    window.showAlertSwal = function (title, message, icon) {
        Swal.fire({ title: title, text: message, icon: icon, });
    }

});