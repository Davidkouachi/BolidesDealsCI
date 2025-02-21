document.addEventListener('DOMContentLoaded', function() {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    const fileCountDisplay = document.getElementById('fileCount');
    const nbre_photo = document.getElementById('nbre_photo');

    const imagePreviews = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`imagePreview${i + 1}`));
    const removeButtons = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`btn_image${i + 1}`));
    const updates = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`update${i + 1}`));
    const imageDefauts = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`imageDefaut${i + 1}`));

    const maxFileSize = 2 * 1024 * 1024; // 2 MB

    function updateFileCount() {
        let filledCount = 0;
        fileInputs.forEach(input => {
            if (input.files.length > 0) {
                filledCount++;
            }
        });
        fileCountDisplay.textContent = `${filledCount} / ${fileInputs.length}`;
    }

    imageDefauts.forEach((img, index) => {
        img.addEventListener('click', function() {
            fileInputs[index].click();
        });
    });

    fileInputs.forEach((input, index) => {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > maxFileSize) {
                    NioApp.Toast("<h5>Alert</h5><p>La taille du fichier dépasse 2 Mo. Veuillez télécharger un fichier plus petit.</p>", "warning", { position: "top-center" });
                    input.value = ''; // Clear the file input value
                    updateFileCount();
                    return;
                }

                let isDuplicate = false;
                for (let i = 0; i < fileInputs.length; i++) {
                    if (i !== index && fileInputs[i].files.length > 0 && fileInputs[i].files[0].name === file.name) {
                        isDuplicate = true;
                        break;
                    }
                }

                if (isDuplicate) {
                    NioApp.Toast("<h5>Alert</h5><p>Vous avez déjà sélectionné cette photo.</p>", "warning", {position: "top-center"});
                    input.value = ''; // Clear the file input value
                    updateFileCount();
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviews[index].style.display = 'block';
                    imageDefauts[index].style.display = 'none';
                    imagePreviews[index].src = e.target.result;
                    removeButtons[index].style.display = 'block';
                    updates[index].value = '1';

                    const sizeInMB = file.size / (1024 * 1024);
                    const displaySize = sizeInMB >= 1 ? `${sizeInMB.toFixed(2)} Mo` : `${(file.size / 1024).toFixed(2)} Ko`;

                    input.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
            updateFileCount();
        });
    });

    removeButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            imagePreviews[index].style.display = 'none';
            imageDefauts[index].style.display = 'block';
            imagePreviews[index].src = ''; // Reset to default image or clear it
            fileInputs[index].value = ''; // Clear the file input value
            button.style.display = 'none'; // Hide the remove button
            updateFileCount();
        });
    });

    // Initial hide of all remove buttons and update file count
    removeButtons.forEach(button => button.style.display = 'block');
    fileInputs.forEach(input => input.style.display = 'none');
    updateFileCount();
});
