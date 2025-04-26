function filterCustomerTable() {
  const searchTerm = document.getElementById("search").value.toLowerCase();
  const rows = document.querySelectorAll("#customerTable tbody tr");
  let hasMatches = false;

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];

    // Skip if it's the "no customers" row
    if (row.cells.length === 1) continue;

    // Skip if it's the header row (no cells[1])
    if (!row.cells[1]) continue;

    const firstName = row.cells[1].textContent.toLowerCase();
    const lastName = row.cells[2].textContent.toLowerCase();
    const email = row.cells[3].textContent.toLowerCase();
    const phone = row.cells[4].textContent.toLowerCase();
    const location = row.cells[5].textContent.toLowerCase();

    const matches =
      firstName.includes(searchTerm) ||
      lastName.includes(searchTerm) ||
      email.includes(searchTerm) ||
      phone.includes(searchTerm) ||
      location.includes(searchTerm);

    row.style.display = matches ? "" : "none";
    if (matches) hasMatches = true;
  }

  // Handle "no results" message
  const noResultsRow = document.querySelector(".no-results-row");
  if (!hasMatches && rows.length > 0) {
    if (!noResultsRow) {
      const tbody = document.querySelector("#customerTable tbody");
      const newRow = document.createElement("tr");
      newRow.className = "no-results-row";
      newRow.innerHTML = '<td colspan="7">No matching customers found</td>';
      tbody.appendChild(newRow);
    }
  } else if (noResultsRow) {
    noResultsRow.remove();
  }
}

// Add event listener to search input
document
  .getElementById("search")
  .addEventListener("input", filterCustomerTable);

// Clear search when input is emptied
document.getElementById("search").addEventListener("input", function (e) {
  if (e.target.value === "") {
    const rows = document.querySelectorAll("#customerTable tbody tr");
    rows.forEach((row) => (row.style.display = ""));
    const noResultsRow = document.querySelector(".no-results-row");
    if (noResultsRow) noResultsRow.remove();
  }
});
