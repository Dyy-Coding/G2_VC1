document.getElementById('deleteSelectedUsers').addEventListener('click', () => {
    const confirmationMessage = 'Are you sure you want to delete the selected users?';
    const deleteForm = document.getElementById('deleteForm');

    if (confirm(confirmationMessage)) {
        deleteForm.submit();
    }
});


document.getElementById('selectAll').addEventListener('change', function () {
    var checkboxes = document.querySelectorAll('input[name="user_ids[]"]');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = this.checked;
    }, this);
});