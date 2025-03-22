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
            <form id="searchForm" action="/category" method="GET">
              <div class="input">
                <span class="text-body"><i class="fas fa-search"></i></span>
                <input type="search" name="q" class="form-control border-0" placeholder="Type here..." required>
              </div>
            </form>
          </div>
          <!-- <li class="nav-item dropdown d-flex align-items-center">
            <a href="#" class="nav-link text-white font-weight-bold px-2 d-flex align-items-center gap-2 dropdown-toggle"
              role="button" id="languageDropdownToggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ni ni-world-2 text-white text-sm"></i>
              <span id="selectedLanguage">English</span>
            </a>
            <ul class="dropdown-menu" id="languageDropdown">
              <li><a class="dropdown-item language-option" data-language="English" href="#">English</a></li>
              <li><a class="dropdown-item language-option" data-language="Khmer" href="#">Khmer</a></li>
            </ul>
          </li> -->
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
