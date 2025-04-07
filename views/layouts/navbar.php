

<style>
/* Suggestions container */
#suggestions {
    display: none;
    position: absolute;
    width: 100%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    max-height: 300px; /* Limit height */
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
    transition: all 0.3s ease;
}

/* Individual suggestion items */
.suggestions-list a {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    font-size: 16px;
    color: #202124;
    text-decoration: none;
    border-bottom: 1px solid #f1f3f4;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

/* Icon on the left (like Google's magnifying glass) */
.suggestions-list a::before {
    content: "🔍";
    font-size: 14px;
    margin-right: 12px;
    opacity: 0.6;
}

/* Hover effect */
.suggestions-list a:hover {
    background-color: #f1f3f4;
}

/* Selected (highlighted) suggestion */
.suggestions-list a.selected {
    background-color: #e8f0fe;
    color: #1967d2;
}

/* No results message */
.suggestions-list p {
    padding: 12px 16px;
    font-size: 14px;
    color: #5f6368;
    text-align: center;
    margin: 0;
}

/* Search input styles (more Google-like) */
#searchInput {
    width: 100%;
    height: 45px;
    padding: 12px 16px;
    font-size: 16px;
    border-radius: 14px;
    border: 1px solid #dfe1e5;
    background: #fff;
    transition: all 0.2s ease-in-out;
    box-shadow: none;
}

/* Search input focus effect */
#searchInput:focus {
    border-color: #1967d2;
    outline: none;
    box-shadow: 0px 0px 8px rgba(25, 103, 210, 0.2);
}

/* Adjust search form width */
#searchForm {
    width: 80%;
    max-width: 700px;
    margin: 0 auto;
    position: relative;
}

/* Responsive design */
@media (max-width: 768px) {
    #searchForm {
        width: 95%;
    }

    #searchInput {
        height: 40px;
        font-size: 14px;
    }

    #suggestions {
        width: 100%;
    }
}

    </style>



<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="javascript:;">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page" data-translate="dashboard">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0" data-translate="dashboardTitle">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex flex-row align-items-center justify-content-center" id="navbar">
            <div class="ms-md-auto pe-md-5 d-flex align-items-center">
                <form id="searchForm" autocomplete="off" class="relative w-full sm:w-1/2 lg:w-1/2 mx-auto">
                    <div class="relative">
                        <input type="search" name="q" id="searchInput" class="form-control border-2 border-gray-300 rounded-lg p-3 w-full shadow-md focus:ring-2 focus:ring-blue-500" placeholder="Type here..." required>
                        <div id="suggestions" class="absolute w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto z-10"></div>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="ni ni-world-2 text-white text-sm"></i>
                <select id="myDropdown" class="text-white bg-transparent border-0 fw-bold">
                    <option value="en">English</option>
                    <option value="km">Khmer</option>
                </select>
            </div>
        </div>
    </div>
</nav>



<script>
    // Load translations
    fetch('API_lenguage/translations.json')
        .then(response => response.json())
        .then(data => {
            const translations = data;
            const languageDropdown = document.getElementById('myDropdown');
            const elementsToTranslate = document.querySelectorAll('[data-translate]'); // Elements with "data-translate" attribute

            // Function to change content dynamically based on selected language
            function changeLanguage(languageCode) {
                const selectedTranslations = translations[languageCode];
                if (selectedTranslations) {
                    elementsToTranslate.forEach(element => {
                        const translationKey = element.getAttribute('data-translate');
                        if (selectedTranslations[translationKey]) {
                            element.textContent = selectedTranslations[translationKey];
                        }
                    });
                }
            }

            // Handle dropdown change (Language change)
            languageDropdown.addEventListener('change', () => {
                changeLanguage(languageDropdown.value);
            });

            // Default to English
            changeLanguage('en');
        })
        .catch(error => console.error('Error loading translations:', error));

    // Sample search suggestions (this can be dynamically fetched as well)
    const sampleSuggestions = ["Sand", "Cement", "Pebble", "Steel", "Wood", "Brick"];
    const suggestionsBox = document.getElementById("suggestions");
    const searchInput = document.getElementById("searchInput");

    // Search functionality
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();
        suggestionsBox.innerHTML = "";

        if (query.length === 0) {
            suggestionsBox.style.display = "none";
            return;
        }

        const matches = sampleSuggestions.filter(item =>
            item.toLowerCase().includes(query)
        );

        if (matches.length > 0) {
            matches.forEach(item => {
                const anchor = document.createElement("a");
                anchor.textContent = item;
                anchor.href = "#";
                anchor.onclick = () => {
                    searchInput.value = item;
                    suggestionsBox.style.display = "none";
                };
                suggestionsBox.appendChild(anchor);
            });
        } else {
            suggestionsBox.innerHTML = "<p>No results found</p>";
        }

        suggestionsBox.style.display = "block";
    });
</script>