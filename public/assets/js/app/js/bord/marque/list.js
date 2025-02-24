$(document).ready(function () {

    window.list_marque_all = function () {
        $.ajax({
            url: '/api/list_marque_all',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const clients = data.data;

                // Détruire l'instance DataTable existante (si elle existe)
                const table = $('.table_marque');
                if ($.fn.DataTable.isDataTable(table)) {
                    table.DataTable().destroy();
                }

                // Effacer le contenu du tableau
                table.find("tbody").empty();

                if (clients.length > 0) {

                    // const table = $('.table_marque');
                    // table.DataTable().destroy();

                    $.each(clients, function(index, item) {

                        const row = $(`
                            <tr>
                                <td class="nk-tb-col " style="width: 50px;" >
                                    <div class="d-flex">
                                        <div class="me-1 custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="checkbox${index+1}" name="checkboxes[]" value="${item.id}">
                                            <label class="custom-control-label" for="checkbox${index+1}"></label>
                                        </div>
                                        <spany>${index+1}</span>
                                    </div>
                                </td>
                                <td class="nk-tb-col" style="width: 100px;" >
                                    <div class="user-avatar md sq" style="background: transparent;">
                                        <img 
                                            src="storage/images/${item.image_nom}" 
                                            alt="${item.nom}" 
                                            class="thumb image_view" 
                                            data-src="storage/images/${item.image_nom}">
                                    </div>
                                </td>
                                <td class="nk-tb-col" >
                                    ${item.nom}
                                </td>
                                <td class="nk-tb-col" >
                                    ${formatDateHeure(item.created_at)}
                                </td>
                                <td class="nk-tb-col" >
                                    ${formatDateHeure(item.updated_at)}
                                </td>
                                <td class="nk-tb-col">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a  href="#" 
                                                                class="text-info btn_modif"
                                                                data-id="${item.id}"
                                                                data-src="storage/images/${item.image_nom}"
                                                                data-nom="${item.nom}"
                                                            >
                                                                <em class="icon ni ni-edit"></em>
                                                                <span>modifier</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        `);

                        table.find("tbody").append(row);

                        // $(`#detail-${item.matricule}`).on('click', function() {
                        //     console.log(item.nomprenom);
                        //     $('#m_nom').text(item.nomprenom);
                        // });

                        // $(`#delete-${item.id}`).on('click', function() {
                        //     $('#litIddelete').val(item.id);
                        // });
                    });

                    initializeDataTable(".table_marque", { responsive: { details: true } });
                } else {
                    initializeDataTable(".table_marque", { responsive: { details: true } });
                }
            },
            error: function() {
                initializeDataTable(".table_marque", { responsive: { details: true } });
            }
        });

        $('.table_marque').off('click', '.btn_modif').on('click', '.btn_modif', function (event) {
            event.preventDefault();

            $('#modalUpdate').remove();

            $('body').append(`
                <div class="modal fade xxl" tabindex="-1" id="modalUpdate" aria-modal="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="modal-body modal-body-lg bg-white">
                                <div class="row g-gs align-items-center justify-content-center">
                                    <div class="col-12 h-50" >
                                        <div class="">
                                            <div class="mb-3" style="display: flex;justify-content: center;align-items: center;border:block; height: 150px; border-radius: 10px;">
                                                <a>
                                                    <img id="imagePreview_modif" style="object-fit: cover;height: 150px;" class="" src="" />
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-control-wrap text-center">
                                                    <label for="imageInput0_modif" class="label_input_file0_modif">Choisir une image</label>
                                                    <input type="file" id="imageInput0_modif" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="hidden" id="id_marque">
                                                <input name="marque" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" placeholder="Entrer la Marque" id="marque_modif" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group row g-gs">
                                            <div class="col-12 text-center">
                                                <button class="btn btn-mw btn-dim btn-outline-success btn-white " id="btn_modif">
                                                    <span>Sauvgarder</span>
                                                    <em class="icon ni ni-arrow-right-circle"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            // Affichage du modal
            $('#modalUpdate').modal('show');

            const id = $(this).data('id');
            const src = $(this).data('src');
            const nom = $(this).data('nom');

            $('#id_marque').val(id);
            $('#imagePreview_modif').attr('src', src);
            $('#marque_modif').val(nom);

            const $fileInput = $('#imageInput0_modif');
            const $imagePreview = $('#imagePreview_modif');
            const $marqueInput = $('#marque_modif');
            const $label = $('.label_input_file0_modif');

            $fileInput.on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    // Extraire le nom du fichier sans extension et le convertir en majuscules
                    let fileName = file.name.split('.').slice(0, -1).join('.').toUpperCase();
                    $marqueInput.val(fileName);

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $imagePreview.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        $('.table_marque').off('click', '.image_view').on('click', '.image_view', function (event) {
            event.preventDefault();

            $('#modalImage').remove();

            $('body').append(`
                <div class="modal fade zoom" tabindex="-1" id="modalImage" aria-modal="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-body text-center">
                            <img src="" class="img-fluid modal_img_view" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            `);

            // Affichage du modal
            $('#modalImage').modal('show');

            var imageUrl = $(this).data('src'); // Récupérer l'URL de l'image
            $('#modalImage .modal_img_view').attr('src', imageUrl); // Mettre à jour l'image du modal
        });  
    }

    list_marque_all();

});