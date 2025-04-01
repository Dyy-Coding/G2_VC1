
    document.addEventListener("DOMContentLoaded", function () {
        const addCategoryForm = document.getElementById("addCategory");
        const btnAdd = document.getElementById("btn-add");
        const btnCancel = document.getElementById("btn-cancel");

        // Show Add Category Form
        btnAdd.addEventListener("click", function () {
            addCategoryForm.style.display = "block";
        });

        // Hide Form when clicking the Cancel button
        btnCancel.addEventListener("click", function () {
            addCategoryForm.style.display = "none";
        });

        // Hide Form when clicking outside of it
        document.addEventListener("click", function (event) {
            if (!addCategoryForm.contains(event.target) && event.target !== btnAdd) {
                addCategoryForm.style.display = "none";
            }
        });

        // Validate Form
        document.getElementById("btn-add-category").addEventListener("click", function (event) {
            let name = document.getElementById("name").value;
            if (!name.trim()) {
                alert("Please fill in all fields!");
                event.preventDefault();
            }
        });
        
    });

    document.addEventListener("DOMContentLoaded", function () {
        const selectAllCheckbox = document.getElementById("selectAll");
        const checkboxes = document.querySelectorAll("table tbody input[type='checkbox']");
        
        // Add event listener to the "Select All" checkbox
        selectAllCheckbox.addEventListener("change", function () {
            // Loop through all checkboxes and set their checked state based on "Select All"
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        // Optional: If any checkbox is unchecked, uncheck the "Select All" checkbox
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                // If any checkbox is unchecked, uncheck the "Select All" checkbox
                if (![...checkboxes].some(checkbox => !checkbox.checked)) {
                    selectAllCheckbox.checked = true;  // If all checkboxes are checked, check "Select All"
                } else {
                    selectAllCheckbox.checked = false;  // If not all checkboxes are checked, uncheck "Select All"
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search");
        const rows = document.querySelectorAll("table tbody tr");

        // Add event listener to the search input
        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase(); // Get the search term and convert it to lowercase

            // Loop through each row and filter based on the category name or description
            rows.forEach(function (row) {
                const categoryName = row.cells[1].textContent.toLowerCase(); // Get the category name (column 2)
                const description = row.cells[2].textContent.toLowerCase(); // Get the description (column 3)

                // If the search term matches the category name or description, show the row, otherwise hide it
                if (categoryName.includes(searchTerm) || description.includes(searchTerm)) {
                    row.style.display = ""; // Show row
                } else {
                    row.style.display = "none"; // Hide row
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const rowsPerPageSelect = document.getElementById("rowsPerPage");
        const rows = document.querySelectorAll("table tbody tr"); // Select all rows in the table
        const totalRows = rows.length;

        // Function to update the number of visible rows based on selection
        function updateRowsPerPage() {
            const rowsPerPage = rowsPerPageSelect.value; // Get selected value
            let rowsToShow;

            if (rowsPerPage === "all") {
                rowsToShow = totalRows;
            } else {
                rowsToShow = parseInt(rowsPerPage, 10);
            }

            // Hide all rows first
            rows.forEach(row => row.style.display = "none");

            // Show the first 'rowsToShow' rows
            for (let i = 0; i < rowsToShow; i++) {
                if (i < totalRows) {
                    rows[i].style.display = ""; // Show row
                }
            }
        }

        // Event listener for when the "Rows per page" selection changes
        rowsPerPageSelect.addEventListener("change", updateRowsPerPage);

        // Initialize the display based on the default value of 10
        updateRowsPerPage();
    });

    document.addEventListener("DOMContentLoaded", function () {
    const deleteAllBtn = document.getElementById("deleteAllBtn");
    
    deleteAllBtn.addEventListener("click", function () {
        const selectedCheckboxes = document.querySelectorAll("table tbody input[type='checkbox']:checked");
        const selectedCategories = Array.from(selectedCheckboxes).map(checkbox => checkbox.closest("tr").dataset.categoryId);
        
        if (selectedCategories.length === 0) {
            alert("Please select at least one category to delete.");
            return;
        }

        if (confirm("Are you sure you want to delete the selected categories?")) {
            fetch('/category/delete_all', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ categoryIds: selectedCategories })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Selected categories deleted successfully.");
                    location.reload();
                } else {
                    alert("Error deleting categories.");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });
});




    
