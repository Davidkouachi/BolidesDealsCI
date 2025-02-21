document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('pid');
    const checkboxes = document.querySelectorAll('input[name="checkboxes[]"]');

    selectAllCheckbox.addEventListener('change', function() {
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
});
