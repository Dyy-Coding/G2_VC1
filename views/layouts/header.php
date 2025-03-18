<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="views/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="views/assets/img/favicon.png">
  <title>
    Argon Dashboard 3 by Creative Tim
  </title>
   Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- CSS Files -->
<link id="pagestyle" href="views/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-fixed w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
        target="_blank">
        <img src="views/assets/img/small-logos/logo.png" width="26px" height="26px" class="navbar-brand-img h-100"
          alt="main_logo">
        <span class="ms-1 font-weight-bold">Lim Try</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/inventory">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Inventory</span>
          </a>
          <ul class="dropdown-menu" id="inventoryDropdown" style="display: none; position: relative; left: 44px;">
            <li><a class="dropdown-item" href="/category">Category</a></li>
            <li><a class="dropdown-item" href="/inventory">Product</a></li>
            <li><a class="dropdown-item" href="/order">Order</a></li>
          </ul>
        </li>

        <script>
          document.querySelector('.nav-link[href="/inventory"]').addEventListener('click', function (event) {
            event.preventDefault();
            var dropdown = document.getElementById("inventoryDropdown");
            if (dropdown.style.display === "none" || dropdown.style.display === "") {
              dropdown.style.display = "block";
            } else {
              dropdown.style.display = "none";
            }
          });
        </script>
        <li class="nav-item">
          <a class="nav-link" href="../pages/billing.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sales</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/virtual-reality.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Customer</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/rtl.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Supplier</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/rtl.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Employee</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="/profile">
          <!-- <a class="nav-link" href="/profile"> -->
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Account</span>
          </a>
          <ul class="dropdown-menu" id="accountDropdown" style="display: none; position: relative; left: 44px;">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/userList">User List</a></li>
            <li><a class="dropdown-item" href="/addusersForm">User Form</a></li>
          </ul>
        </li>

        <script>
          document.querySelector('.nav-link[href="/profile"]').addEventListener('click', function (event) {
            event.preventDefault();
            var accountdropdown = document.getElementById("accountDropdown");
            if (accountdropdown.style.display === "none" || accountdropdown.style.display === "") {
              accountdropdown.style.display = "block";
            } else {
              accountdropdown.style.display = "none";
            }
          });
        </script>


        <li class="nav-item">
          <a class="nav-link" href="../pages/sign-in.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Help and Support</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <style>
      .nav-link:hover,
      .nav-link-text:hover {
        background-color: #f8f9fa;
        color: #5e72e4;
      }

      .nav-link.active,
      .nav-link-text.active {
        background-color: #5e72e4;
        color: #fff;
      }
    </style>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">