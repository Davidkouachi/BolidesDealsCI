document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    const imageDefaut = document.getElementById('imageDefaut');
    const div_removeimg = document.getElementById('div_removeimg');
    const removeimg = document.getElementById('removeimg');

    imageDefaut.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            
            div_removeimg.style.display = 'block';
            imagePreview.style.display = 'block';
            imageDefaut.style.display = 'none';

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    removeimg.addEventListener('click', function() {
        div_removeimg.style.display = 'none';
        imageDefaut.style.display = 'block';
        imagePreview.style.display = 'none';
        imagePreview.src = ''; // Reset to default image or clear it
        fileInput.value = ''; // Clear the file input value
        button.style.display = 'none'; // Hide the remove button
    });
});