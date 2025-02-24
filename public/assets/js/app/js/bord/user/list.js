$(document).ready(function () {

    window.list_users_all = function () {
        $.ajax({
            url: '/api/list_users_all',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const clients = data.data;

                // Détruire l'instance DataTable existante (si elle existe)
                const table = $('.table_users');
                if ($.fn.DataTable.isDataTable(table)) {
                    table.DataTable().destroy();
                }

                // Effacer le contenu du tableau
                table.find("tbody").empty();

                if (clients.length > 0) {

                    $.each(clients, function(index, item) {

                        const row = $(`
                            <tr>
                                <td class="nk-tb-col " style="width: 50px;" >
                                    <span>${index+1}</span>
                                </td>
                                <td class="nk-tb-col" >
                                    ${item.name}
                                </td>
                                <td class="nk-tb-col" >
                                    ${item.prenom}
                                </td>
                                <td class="nk-tb-col" >
                                    ${item.phone}
                                </td>
                                <td class="nk-tb-col" >
                                    ${item.email}
                                </td>
                                <td class="nk-tb-col" >
                                    <span class="${item.lock == 'non' ? 'text-success' : 'text-danger'}">
                                        ${item.lock == 'non' ? 'Déverrouilé' : 'Verrouilé'}
                                    </span>
                                </td>
                                <td class="nk-tb-col" >
                                    ${item.role}
                                </td>
                                <td class="nk-tb-col" >
                                    ${formatDateHeure(item.created_at)}
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
                                                                class="text-warning btn_detail"
                                                                data-id="${item.id}"
                                                                data-mat="${item.mat}"
                                                                data-name="${item.name}"
                                                                data-prenom="${item.prenom}"
                                                                data-phone="${item.phone}"
                                                                data-lock="${item.lock}"
                                                                data-email="${item.email}"
                                                                data-role="${item.role}"
                                                                data-created_at="${item.created_at}"
                                                            >
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Détail</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a  href="#" 
                                                                class="text-primary btn_note"
                                                                data-mat="${item.mat}"
                                                            >
                                                                <em class="icon ni ni-file-text"></em>
                                                                <span>Notification</span>
                                                            </a>
                                                        </li>
                                                        ${item.lock == 'non' ?
                                                        `<li>
                                                            <a  href="#" 
                                                                class="text-danger btn_lock"
                                                                data-mat="${item.mat}"
                                                            >
                                                                <em class="icon ni ni-lock"></em>
                                                                <span>Verrouilé</span>
                                                            </a>
                                                        </li>`:
                                                        `<li>
                                                            <a  href="#" 
                                                                class="text-success btn_unlock"
                                                                data-mat="${item.mat}"
                                                            >
                                                                <em class="icon ni ni-unlock"></em>
                                                                <span>Déverrouilé</span>
                                                            </a>
                                                        </li>`}
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        `);

                        table.find("tbody").append(row);
                    });

                    initializeDataTable(".table_users", { responsive: { details: true } });
                } else {
                    initializeDataTable(".table_users", { responsive: { details: true } });
                }
            },
            error: function() {
                initializeDataTable(".table_users", { responsive: { details: true } });
            }
        });

        $('.table_users').off('click', '.btn_lock').on('click', '.btn_lock', function () {
            const mat = $(this).data('mat');

            preloader();

            $.ajax({
                url: "/refresh-csrf",
                method: "GET",
                success: function (response_crsf) {
                    $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                    $.ajax({
                        url: "/api/insert_user_verouille/" + mat,
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": response_crsf.csrf_token,
                        },
                        success: function (response) {
                            $('#modalCharge').modal('hide');

                            if (response.success) {
                                list_users_all();
                                showAlert("Alert", response.message, "success");
                            } else if (response.user_introuv) {
                                showAlert("Alert", response.message, "warning");
                            } else if (response.error_db) {
                                showAlert("Alert", 'Echec de l\'opération', "warning");
                                console.log(response.message);
                            } else {
                                showAlert("Alert", "Une erreur est survenue", "error");
                            }
                        },
                        error: function () {
                            $('#modalCharge').modal('hide');
                            showAlert("Erreur", "Erreur lors du verouillage.", "error");
                        },
                    });
                },
                error: function () {
                    $('#modalCharge').modal('hide');
                    showAlert("Erreur", "Une erreur est survenue lors du verouillage.", "error");
                },
            });

        });

        $('.table_users').off('click', '.btn_unlock').on('click', '.btn_unlock', function () {
            const mat = $(this).data('mat');

            preloader();

            $.ajax({
                url: "/refresh-csrf",
                method: "GET",
                success: function (response_crsf) {
                    $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                    $.ajax({
                        url: "/api/insert_user_deverouille/" + mat,
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": response_crsf.csrf_token,
                        },
                        success: function (response) {
                            $('#modalCharge').modal('hide');

                            if (response.success) {
                                list_users_all();
                                showAlert("Alert", response.message, "success");
                            } else if (response.user_introuv) {
                                showAlert("Alert", response.message, "warning");
                            } else if (response.error_db) {
                                showAlert("Alert", 'Echec de l\'opération', "warning");
                                console.log(response.message);
                            } else {
                                showAlert("Alert", "Une erreur est survenue", "error");
                            }
                        },
                        error: function () {
                            $('#modalCharge').modal('hide');
                            showAlert("Erreur", "Erreur lors du verouillage.", "error");
                        },
                    });
                },
                error: function () {
                    $('#modalCharge').modal('hide');
                    showAlert("Erreur", "Une erreur est survenue lors du verouillage.", "error");
                },
            });

        });

        $('.table_users').off('click', '.btn_detail').on('click', '.btn_detail', function (event) {
            event.preventDefault();

            // Vérifier si le modal existe déjà, sinon l'ajouter au body
            $('#modalDetail').remove();

            $('body').append(`
                <div class="modal fade" tabindex="-1" id="modalDetail">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg">
                                                <img height="80px" width="80px" class="rounded-pill border border-1" src="images/user8.png" alt="">
                                            </div>
                                            <div class="user-info">
                                                <h6 id="d_np"></h6>
                                            </div>
                                        </div>
                                        <div class="p-2" style="max-height: 400px;" data-simplebar>
                                            <ul class="team-info">
                                                <li><span>Identifiant</span><span id="d_id"></span></li>
                                                <li><span>Matricule</span><span id="d_mat"></span></li>
                                                <li><span>Nom</span><span id="d_name"></span></li>
                                                <li><span>Prénoms</span><span id="d_prenom"></span></li>
                                                <li><span>Email</span><span id="d_email"></span></li>
                                                <li><span>Contact</span><span id="d_phone"></span></li>
                                                <li><span>Statut</span><span id="d_lock"></span></li>
                                                <li><span>Date de creation</span><span id="d_created_at"></span></li>
                                                <li><span>Depuis</span><span id="d_depuis"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            // Affichage du modal
            $('#modalDetail').modal('show');

            const id = $(this).data('id');
            const mat = $(this).data('mat');
            const name = $(this).data('name');
            const prenom = $(this).data('prenom');
            const phone = $(this).data('phone');
            const email = $(this).data('email');
            const lock = $(this).data('lock');
            const role = $(this).data('role');
            const created_at = $(this).data('created_at');

            const createdDate = new Date(created_at);
            const today = new Date();
            const diffTime = today - createdDate;
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

            $('#d_np').text(name+' '+prenom);
            $('#d_id').text(id);
            $('#d_mat').text(mat);
            $('#d_name').text(name);
            $('#d_prenom').text(prenom);
            $('#d_email').text(email);
            $('#d_phone').text(phone);
            if (lock == 'non') {
                $('#d_lock').text('Déverrouilé');
            } else {
                $('#d_lock').text('Vérrouilé');
            }
            $('#d_created_at').text(formatDateHeure(created_at));
            $('#d_depuis').text(diffDays+' jour(s)');
        });

        $('.table_users').off('click', '.btn_note').on('click', '.btn_note', function (event) {
            event.preventDefault();

            const mat = $(this).data('mat');
            // Vérifier si le modal existe déjà, sinon l'ajouter au body
            $('#modalNote').remove();

            $('body').append(`
                <div class="modal fade zoom" tabindex="-1" id="modalNote">
                    <div class="modal-dialog modal-md" role="document" style="width: 100%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Notification</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="form-group">
                                        <label class="form-label" for="type">
                                            Type
                                        </label>
                                        <div class="form-control-wrap ">
                                            <select id="type" class="form-select js-select2" data-placeholder="Selectionner">
                                                <option value="">Selectionner</option>
                                                <option value="Avertissement">Avertissement</option>
                                                <option value="Informations">Informations</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="message">Message</label>
                                        <div class="form-control-wrap">
                                            <textarea id="message" class="form-control no-resize"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn_env" class="btn btn-white btn-dim btn-md btn-outline-success">
                                            <span>Envoyer</span>
                                            <em class="icon ni ni-send"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light">
                                <span class="sub-text">Note</span>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            // Affichage du modal
            $('#modalNote').modal('show');

            $('#btn_env').on('click', function(event) {
                event.preventDefault();

                var type = $("#type").val().trim();
                var message = $("#message").val().trim();

                if (!type) {
                    showAlert("Alert", "Veuillez seletionner un type", "warning");
                    return false;
                }

                if (!message) {
                    showAlert("Alert", "Veuillez saisir un message", "warning");
                    return false;
                }

                var formData = new FormData();
                formData.append("type", type);
                formData.append("message", message);

                $('#modalNote').modal('hide');

                preloader();

                $.ajax({
                    url: "/refresh-csrf",
                    method: "GET",
                    success: function (response_crsf) {
                        $('meta[name="csrf-token"]').attr("content", response_crsf.csrf_token);

                        $.ajax({
                            url: "/api/insert_notification/" + mat,
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": response_crsf.csrf_token,
                            },
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                $('#modalCharge').modal('hide');

                                if (response.success) {
                                    showAlert("Alert", response.message, "success");
                                } else if (response.error_db) {
                                    showAlert("Alert", 'Echec de l\'opération', "warning");
                                    console.log(response.message);
                                } else {
                                    showAlert("Alert", "Une erreur est survenue", "error");
                                }
                            },
                            error: function () {
                                $('#modalCharge').modal('hide');
                                showAlert("Erreur", "Erreur.", "error");
                            },
                        });
                    },
                    error: function () {
                        $('#modalCharge').modal('hide');
                        showAlert("Erreur", "Une erreur est survenue.", "error");
                    },
                });

            });
  
        });
    }

    list_users_all();

});