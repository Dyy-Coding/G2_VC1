document.addEventListener("DOMContentLoaded", function () {
    setupFormDisplay();
    setupImagePreview();
    setupMaterialFormValidation();
    setupSearch();
    setupCheckboxLogic();
    setupDeleteSelectedButton();
    setupShowOutOfStock();
    preventEnterKeySubmit();
});

function setupFormDisplay() {
    const addMaterialForm = document.getElementById("addMeterial");
    const overlay = document.getElementById("overlay");
    const btnAdd = document.getElementById("btn-add");
    const btnCancel = document.getElementById("btn-cancel");

    if (btnAdd && btnCancel) {
        btnAdd.addEventListener("click", () => {
            addMaterialForm.style.display = "block";
            overlay.style.display = "block";
        });

        btnCancel.addEventListener("click", () => {
            addMaterialForm.style.display = "none";
            overlay.style.display = "none";
        });
    }
}

function setupImagePreview() {
    const preview = document.getElementById("preview");
    const imageInput = document.getElementById("image");

    if (imageInput) {
        imageInput.addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.style.display = "none";
            }
        });
    }
}

function setupMaterialFormValidation() {
    const addMaterialBtn = document.getElementById("btn-add-material");

    if (addMaterialBtn) {
        addMaterialBtn.addEventListener("click", function (event) {
            const requiredFields = ['name', 'categoryID', 'supplierID', 'quantity', 'unitPrice', 'size'];
            const isFormValid = requiredFields.every(field => document.getElementById(field)?.value.trim());

            if (!isFormValid) {
                alert("Please fill in all required fields: Name, Category, Supplier, Quantity, Unit Price, and Size!");
                event.preventDefault();
            }
        });
    }
}

function setupSearch() {
    const searchInput = document.getElementById("search");
    const tableRows = document.querySelectorAll("tbody tr");

    if (searchInput) {
        searchInput.addEventListener("keyup", () => {
            const searchText = searchInput.value.trim().toLowerCase();
            tableRows.forEach(row => {
                const rowContent = [
                    row.querySelector(".td-product span")?.textContent,
                    row.cells[2]?.textContent,
                    row.cells[3]?.textContent,
                    row.cells[5]?.textContent,
                    row.cells[6]?.textContent
                ].map(content => content?.toLowerCase() || "");

                row.style.display = rowContent.some(content => content.includes(searchText)) ? "" : "none";
            });
        });
    }
}

function setupCheckboxLogic() {
    const selectAllCheckbox = document.getElementById("selectAll");
    const rowCheckboxes = document.querySelectorAll('input[name="materialIDs[]"]');

    if (selectAllCheckbox && rowCheckboxes.length > 0) {
        selectAllCheckbox.addEventListener("change", () => {
            rowCheckboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
            toggleDeleteButton();
        });

        rowCheckboxes.forEach(cb => {
            cb.addEventListener("change", () => {
                selectAllCheckbox.checked = [...rowCheckboxes].every(checkbox => checkbox.checked);
                toggleDeleteButton();
            });
        });
    }

    function toggleDeleteButton() {
        const deleteButton = document.getElementById('btn-delete-selected');
        const anySelected = [...rowCheckboxes].some(checkbox => checkbox.checked);
        deleteButton.disabled = !anySelected;
    }
}

function setupDeleteSelectedButton() {
    const deleteButton = document.getElementById('btn-delete-selected');
    const checkboxes = document.querySelectorAll('.select-material');
    const form = document.querySelector('form'); // Make sure it's the correct form

    if (deleteButton && checkboxes.length > 0) {
        function toggleDeleteButton() {
            const anySelected = [...checkboxes].some(checkbox => checkbox.checked);
            deleteButton.disabled = !anySelected;
            deleteButton.classList.toggle("btn-danger", anySelected);
            deleteButton.classList.toggle("btn-secondary", !anySelected);
        }

        toggleDeleteButton();
        checkboxes.forEach(checkbox => checkbox.addEventListener('change', toggleDeleteButton));

        deleteButton.addEventListener('click', function (event) {
            const selectedIds = [...document.querySelectorAll('.select-material:checked')]
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                alert('Please select at least one material to delete.');
                event.preventDefault();
                return;
            }

            selectedIds.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'materialIDs[]';
                input.value = id;
                form.appendChild(input);
            });

            form.submit();
        });
    }
}

function setupShowOutOfStock() {
    const showOutOfStockCheckbox = document.getElementById("show-out-of-stock-checkbox");
    const tableRows = document.querySelectorAll("tbody tr");

    if (showOutOfStockCheckbox) {
        showOutOfStockCheckbox.addEventListener("change", () => {
            const showOutOfStock = showOutOfStockCheckbox.checked;

            tableRows.forEach(row => {
                const stockStatus = row.cells[4]?.textContent.trim();
                row.style.display = showOutOfStock ? (stockStatus === "OUT OF STOCK" ? "" : "none") : "";
            });
        });
    }
}

function preventEnterKeySubmit() {
    const searchInput = document.getElementById("search");
    searchInput?.addEventListener("keydown", function (e) {
        if (e.key === "Enter") e.preventDefault();
    });
}
