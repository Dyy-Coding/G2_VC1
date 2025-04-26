document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const addCategoryForm = document.getElementById("addCategory");
    const btnAdd = document.getElementById("btn-add");
    const btnCancel = document.getElementById("btn-cancel");
    const btnAddCategory = document.getElementById("btn-add-category");
    const nameInput = document.getElementById("name");
    const selectAllCheckbox = document.getElementById("selectAll");
    const checkboxes = document.querySelectorAll('input[name="categoryIDs[]"]');
    const deleteButton = document.querySelector('button[type="submit"]');
    const searchInput = document.getElementById("search");
    const rows = document.querySelectorAll("table tbody tr");
    const rowsPerPageSelect = document.getElementById("rowsPerPage");
    
    // Show Add Category Form
    btnAdd.addEventListener("click", () => addCategoryForm.style.display = "block");
    
    // Hide Form when clicking the Cancel button or outside of it
    btnCancel.addEventListener("click", () => addCategoryForm.style.display = "none");
    document.addEventListener("click", (event) => {
        if (!addCategoryForm.contains(event.target) && event.target !== btnAdd) {
            addCategoryForm.style.display = "none";
        }
    });
    
    // Validate Form
    btnAddCategory.addEventListener("click", (event) => {
        if (!nameInput.value.trim()) {
            alert("Please fill in all fields!");
            event.preventDefault();
        }
    });
    
    // Select/Deselect All Checkboxes
    function updateDeleteButton() {
        deleteButton.disabled = !Array.from(checkboxes).some(checkbox => checkbox.checked);
    }
    
    selectAllCheckbox.addEventListener("change", function () {
        checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
        updateDeleteButton();
    });
    
    checkboxes.forEach(checkbox => checkbox.addEventListener("change", updateDeleteButton));
    updateDeleteButton();
    
    // Confirm Deletion
    window.confirmDelete = () => confirm("Are you sure you want to delete all selected categories?");
    
    // Search Functionality
    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();
        rows.forEach(row => {
            const categoryName = row.cells[1].textContent.toLowerCase();
            const description = row.cells[2].textContent.toLowerCase();
            row.style.display = (categoryName.includes(searchTerm) || description.includes(searchTerm)) ? "" : "none";
        });
    });
    
    // Pagination (Rows per Page)
    function updateRowsPerPage() {
        const rowsPerPage = rowsPerPageSelect.value === "all" ? rows.length : parseInt(rowsPerPageSelect.value, 10);
        rows.forEach((row, index) => row.style.display = index < rowsPerPage ? "" : "none");
    }
    
    rowsPerPageSelect.addEventListener("change", updateRowsPerPage);
    updateRowsPerPage();
});
