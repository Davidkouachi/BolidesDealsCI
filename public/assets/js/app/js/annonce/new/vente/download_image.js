document.addEventListener('DOMContentLoaded', function() {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    const fileCountDisplay = document.getElementById('fileCount');
    const nbre_photo = document.getElementById('nbre_photo');

    const imagePreviews = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`imagePreview${i + 1}`));
    const removeButtons = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`btn_image${i + 1}`));
    const imageDefauts = Array.from({ length: nbre_photo.value }, (_, i) => document.getElementById(`imageDefaut${i + 1}`));

    const maxFileSize = 2 * 1024 * 1024; // 2 Mo

    function updateFileCount() {
        let filledCount = 0;
        fileInputs.forEach(input => {
            if (input.files.length > 0) {
                filledCount++;
            }
        });
        fileCountDisplay.textContent = ` ${filledCount} / ${fileInputs.length }`;
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
                    NioApp.Toast("<h5>Alert</h5><p>La taille du fichier dépasse 2 Mo. Veuillez télécharger un fichier plus petit.</p>", "warning", {position: "top-center"});
                    input.value = ''; // Clear the file input value
                    updateFileCount();
                    return;
                }

                //let fileName = file.name.split('.').slice(0, -1).join('.');

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

                    // Conversion de la taille en Mo
                    const sizeInMB = file.size / (1024 * 1024);

                    let displaySize;
                    if (sizeInMB >= 1) {
                        displaySize = sizeInMB.toFixed(2) + ' Mo'; // Afficher en Mo
                    } else {
                        const sizeInKB = (file.size / 1024).toFixed(2);
                        displaySize = sizeInKB + ' Ko'; // Afficher en Ko
                    }

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

    // Initial hide of all remove buttons
    removeButtons.forEach(button => button.style.display = 'none');

    // Initial update
    updateFileCount();
})

// document.addEventListener('DOMContentLoaded', function() {
//     const fileInputs = document.querySelectorAll('input[type="file"]');
//     const fileCountDisplay = document.getElementById('fileCount');

//     const imagePreviews = Array.from({ length: 6 }, (_, i) => document.getElementById(`imagePreview${i + 1}`));
//     const removeButtons = Array.from({ length: 6 }, (_, i) => document.getElementById(`btn_image${i + 1}`));
//     const image_sizes = Array.from({ length: 6 }, (_, i) => document.getElementById(`image_size${i + 1}`));
//     const imageDefauts = Array.from({ length: 6 }, (_, i) => document.getElementById(`imageDefaut${i + 1}`));

//     const maxFileSize = 2 * 1024 * 1024; // 2 Mo

//     function updateFileCount() {
//         let filledCount = 0;
//         fileInputs.forEach(input => {
//             if (input.files.length > 0) {
//                 filledCount++;
//             }
//         });
//         fileCountDisplay.textContent = ` ${filledCount} / ${fileInputs.length }`;
//     }

//     imageDefauts.forEach((img, index) => {
//         img.addEventListener('click', function() {
//             fileInputs[index].click();
//         });
//     });

//     fileInputs.forEach((input, index) => {
//         input.addEventListener('change', function(event) {
//             const file = event.target.files[0];
//             if (file) {

//                 if (file.size > maxFileSize) {
//                     NioApp.Toast("<h5>Alert</h5><p>La taille du fichier dépasse 2 Mo. Veuillez télécharger un fichier plus petit.</p>", "warning", {position: "top-center"});
//                     input.value = ''; // Clear the file input value
//                     updateFileCount();
//                     return;
//                 }

//                 const reader = new FileReader();
//                 reader.onload = function(e) {
//                     imagePreviews[index].style.display = 'block';
//                     imageDefauts[index].style.display = 'none';
//                     imagePreviews[index].src = e.target.result;
//                     removeButtons[index].style.display = 'block';
//                     image_sizes[index].style.display = 'block';

//                     // Conversion de la taille en Mo
//                     const sizeInMB = file.size / (1024 * 1024);

//                     let displaySize;
//                     if (sizeInMB >= 1) {
//                         displaySize = sizeInMB.toFixed(2) + ' Mo'; // Afficher en Mo
//                     } else {
//                         const sizeInKB = (file.size / 1024).toFixed(2);
//                         displaySize = sizeInKB + ' Ko'; // Afficher en Ko
//                     }

//                     image_sizes[index].textContent = 'Taille : ' + displaySize;
//                     input.style.display = 'none';
//                 }
//                 reader.readAsDataURL(file);
//             }
//             updateFileCount();
//         });
//     });

//     removeButtons.forEach((button, index) => {
//         button.addEventListener('click', function() {
//             imagePreviews[index].style.display = 'none';
//             imageDefauts[index].style.display = 'block';
//             imagePreviews[index].src = ''; // Reset to default image or clear it
//             fileInputs[index].value = ''; // Clear the file input value
//             button.style.display = 'none'; // Hide the remove button
//             image_sizes[index].style.display = 'none';
//             updateFileCount();
//         });
//     });

//     // Initial hide of all remove buttons
//     removeButtons.forEach(button => button.style.display = 'none');

//     // Initial update
//     updateFileCount();
// });