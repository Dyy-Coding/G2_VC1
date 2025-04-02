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
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex flex-row align-items-center justify-content-center" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <form id="searchForm" action="/search" method="GET">
                <div class="relative">
                    <input type="search" name="q" id="searchInput" class="form-control border-2 border-gray-300 rounded-lg p-3 w-full" placeholder="Type here..." required>
                    <div id="suggestions" class="absolute w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto z-10"></div>
                </div>
            </form>
            <script>
document.getElementById('searchInput').addEventListener('input', function() {
    let query = this.value;

    // Only send a request if the query is more than 1 character
    if (query.length > 1) {
        // Create an AJAX request
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/search-suggestions?q=' + query, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let suggestions = JSON.parse(xhr.responseText);
                let suggestionsBox = document.getElementById('suggestions');
                suggestionsBox.innerHTML = '';  // Clear previous suggestions
                
                // If there are results, display them
                if (suggestions.length > 0) {
                    suggestions.forEach(function(suggestion) {
                        let div = document.createElement('div');
                        div.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-100', 'transition');
                        div.textContent = suggestion;
                        div.onclick = function() {
                            document.getElementById('searchInput').value = suggestion;
                            suggestionsBox.innerHTML = ''; // Clear suggestions
                        };
                        suggestionsBox.appendChild(div);
                    });
                } else {
                    suggestionsBox.innerHTML = '<div class="px-4 py-2 text-gray-500">No results found</div>';
                }
            }
        };
        xhr.send();
    } else {
        document.getElementById('suggestions').innerHTML = '';
    }
});
</script>

          </div>
          <li class="nav-item dropdown d-flex flex-row align-items-center">
            <!-- <label for="myDropdown" class="text-white font-weight-bold px-2 d-flex align-items-center gap-2">Choose an option:</label> -->
              <i class="ni ni-world-2 text-white text-sm"></i>
              <select id="myDropdown" class="text-white font-weight-bold px-2 d-flex align-items-center gap-2 bg-transparent border-0" >
                  <option value="english">English</option>
                  <option value="khmer">Khmer</option>
              </select>

          </li>
            <script>
                document.getElementById("myDropdown").addEventListener("change", function () {
                    // alert("You selected: " + this.value);
                });
            </script>
          </ul>
        </div>
      </div>
    </nav>
        </script>
    </div>
</nav>
