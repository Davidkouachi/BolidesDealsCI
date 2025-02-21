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
});

// document.addEventListener('DOMContentLoaded', function() {
//     const fileInput = document.getElementById('image');
//     const maxFileSize = 2 * 1024 * 1024; // 2 Mo
//     const previewContainer = document.getElementById('previewContainer'); // Container for all previews
//     const fileCountDisplay = document.getElementById('fileCount');
//     const maxFiles = 6;

//     function updateFileCount() {
//         const count = previewContainer.querySelectorAll('.col').length;
//         fileCountDisplay.textContent = `Photos sélectionnées : ${count} / ${maxFiles}`;
//     }

//     fileInput.addEventListener('change', function(event) {
//         const files = event.target.files;

//         if (files.length > maxFiles) {
//             NioApp.Toast("<h5>Alert</h5><p>Vous pouvez sélectionner un maximum de 6 photos.</p>", "warning", {position: "top-center"});
//             return;
//         }

//         for (let i = 0; i < files.length; i++) {
//             const file = files[i];

//             if (file.size > maxFileSize) {
//                 NioApp.Toast("<h5>Alert</h5><p>La taille des photos dépasse 2 Mo. Veuillez télécharger des photos plus petite.</p>", "warning", {position: "top-center"});
//                 continue;
//             }

//             let isDuplicate = false;
//             previewContainer.querySelectorAll('.col img').forEach(img => {
//                 if (img.src === URL.createObjectURL(file)) {
//                     isDuplicate = true;
//                 }
//             });

//             if (isDuplicate) {
//                 NioApp.Toast("<h5>Alert</h5><p>Certaines photos ont été sélectionner deux fois.</p>", "warning", {position: "top-center"});
//                 continue;
//             }

//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 const previewDiv = document.createElement('div');
//                 previewDiv.classList.add('col');

//                 previewDiv.innerHTML = `
//                     <div class="">
//                         <div class="card h-50" style="display: flex; justify-content: center; align-items: center; border:block;">
//                             <a>
//                                 <img id="imagePreview${i}" style="object-fit: cover; height: 150px;" src="${e.target.result}" />
//                             </a>
//                         </div>
//                         <div class="card-inner pt-2 pb-2">
//                             <p id="image_size${i}">Taille : ${(file.size / (1024 * 1024)).toFixed(2)} Mo</p>
//                         </div>
//                     </div>
//                 `;

//                 // Append the preview to the container
//                 previewContainer.appendChild(previewDiv);
//                 $('#previewContainer').slick('refresh');

//                 updateFileCount(); // Update the count after adding the file
//             };

//             reader.readAsDataURL(file);
//         }

//         fileInput.value = ''; // Reset file input to allow re-selection of the same files
//     });

//     // Initial file count update
//     updateFileCount();
// });

