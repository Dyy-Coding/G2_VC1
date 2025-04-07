// Function to handle the search and display suggestions
function searchPages() {
    let query = document.getElementById("searchInput").value.trim();
    let suggestionsBox = document.getElementById("suggestions");

    // If the query is less than 2 characters, hide suggestions
    if (query.length < 2) {
        suggestionsBox.innerHTML = "";
        suggestionsBox.style.display = "none";
        return;
    }

    // Fetch data from searchData.php with the search query
    fetch(`/Models/dashboard/searchModel/searchData.php?query=${encodeURIComponent(query)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            let suggestionsOutput = "";

            // If data exists, generate suggestions list
            if (Array.isArray(data) && data.length > 0) {
                console.log("Data received: ", data);
                data.forEach((page, index) => {
                    suggestionsOutput += `
                        <a href="${page.url}" 
                           class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md cursor-pointer"
                           onclick="handleRedirect(event, '${page.url}')"
                           data-index="${index}">
                            ${page.title}
                        </a>`;
                });
            } else {
                // Display "No results found" if no matches
                suggestionsOutput = "<p class='px-3 py-2 text-gray-700'>No results found.</p>";
            }

            // Show and update suggestions
            suggestionsBox.innerHTML = suggestionsOutput;
            suggestionsBox.style.display = "block";
        })
        .catch(error => {
            console.error("Error fetching search results:", error);
            alert("Error fetching search results: " + error.message);
        });
}

// Handle redirect when clicking on a suggestion
function handleRedirect(event, url) {
    event.preventDefault(); // Prevent default link behavior
    window.location.href = url; // Redirect to the selected page
}

// Hide suggestions when clicking outside
document.addEventListener("click", function (event) {
    let searchInput = document.getElementById("searchInput");
    let suggestionsBox = document.getElementById("suggestions");

    if (!searchInput.contains(event.target) && !suggestionsBox.contains(event.target)) {
        suggestionsBox.style.display = "none";
    }
});

// Attach input event listener for search
document.getElementById("searchInput").addEventListener("input", searchPages);
