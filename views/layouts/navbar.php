<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="javascript:;">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="search-container ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group shadow-sm rounded" style="max-width: 300px; background: white; border-radius: 20px;">
                    <span class="input-group-text bg-transparent border-0 px-3" role="button" aria-label="Search">
                        <i class="fas fa-search text-gray-600"></i>
                    </span>
                    <input type="text" class="form-control border-0 px-2" 
                        placeholder="Search..." aria-label="Search"
                        style="background: transparent; border-radius: 20px; color: black;">
                </div>
            </div>

            <li class="nav-item dropdown d-flex align-items-center">
                <a href="#" class="nav-link text-white font-weight-bold px-2 d-flex align-items-center gap-2" 
                   id="languageDropdown" role="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
                    <i class="ni ni-world-2 text-white text-sm"></i>
                    <span id="selectedLanguage">English</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    <li><a class="dropdown-item language-option" data-language="English" href="#">English</a></li>
                    <li><a class="dropdown-item language-option" data-language="Khmer" href="#">Khmer</a></li>
                </ul>
            </li>
        </div>

        <script>
            // Load language from local storage when page loads
            document.addEventListener('DOMContentLoaded', () => {
                const savedLanguage = localStorage.getItem('selectedLanguage') || 'English';
                document.getElementById('selectedLanguage').textContent = savedLanguage;
            });

            // Change language function
            document.querySelectorAll('.language-option').forEach(item => {
                item.addEventListener('click', function() {
                    const language = this.dataset.language;
                    document.getElementById('selectedLanguage').textContent = language;
                    localStorage.setItem('selectedLanguage', language); // Save to local storage
                });
            });
        </script>
    </div>
</nav>