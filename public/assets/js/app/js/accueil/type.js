$(document).ready(function () {

    $.ajax({
        url: '/api/select_type',
        method: 'GET',
        success: function(response) {
            const data = response.data;

            $('#list_type').empty();

            const div = $(`
                <ul class="filter-button-group mb-4 pb-1" id="donnee">
                </ul>
            `);
            $('#list_type').append(div);

            data.forEach(function(item) {

                const divd = $(`
                    <li>
                        <a class="filter-button text-center trans_shado" type="button">
                            ${item.nom}
                        </a>
                    </li>
                `);

                $('#donnee').append(divd);
            });
        },
        error: function() {
            // showAlert('danger', 'Impossible de generer le code automatiquement');
        }
    });

});