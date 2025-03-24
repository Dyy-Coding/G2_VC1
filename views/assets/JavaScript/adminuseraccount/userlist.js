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

// Add JavaScript for Search Functionality
document.getElementById('search').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase(); // Get the search input and convert to lowercase
    const rows = document.querySelectorAll('#userTable tbody tr'); // Get all table rows

    rows.forEach(row => {
        const firstName = row.querySelector('.first-name').textContent.toLowerCase();
        const lastName = row.querySelector('.last-name').textContent.toLowerCase();
        const phone = row.querySelector('.phone').textContent.toLowerCase();
        const role = row.querySelector('.role').textContent.toLowerCase();

        // Check if any column matches the search input
        if (firstName.includes(searchValue) ||
            lastName.includes(searchValue) ||
            phone.includes(searchValue) ||
            role.includes(searchValue)) {
            row.style.display = ''; // Show the row
        } else {
            row.style.display = 'none'; // Hide the row
        }
    });
});