<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Argon Dashboard CSS -->
  <link id="pagestyle" href="views/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />

  <!-- Custom Styling -->
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
    }
    .card {
      border-radius: 16px;
    }
    .form-control {
      border-radius: 8px;
    }
    .btn-primary {
      background-color: #4e73df;
      border: none;
    }
    .btn-primary:hover {
      background-color: #2e59d9;
    }
    .text-gray-700 {
      color: #4a4a4a;
    }
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">

<!-- Background Image Side -->
<div class="col-lg-6 d-none d-lg-flex position-fixed top-0 end-0 w-100 vh-100 text-center justify-content-center flex-column">
  <div class="position-relative h-100 w-100 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
       style="background-image: url('https://wp.buildingmaterials.co.uk/wp-content/uploads/2022/11/shutterstock_619349516-scaled.jpg');
              background-size: cover; background-position: center;">
    <span class="bg-gradient-primary opacity-6"></span>
  </div>
</div>

<!-- Login Section -->
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 shadow-lg">
          <h3 class="mb-4 text-primary text-center fw-bold">Login</h3>

          <form action="/login" method="POST">
            <!-- Email -->
            <div class="mb-3 position-relative">
              <label class="form-label fw-semibold text-gray-700" for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control py-2 px-3 shadow-sm" placeholder="Enter your email" required>
            </div>

            <!-- Password with toggle -->
            <div class="mb-3 position-relative">
              <label class="form-label fw-semibold text-gray-700" for="password">Password</label>
              <div class="position-relative">
                <input type="password" id="password" name="password" class="form-control py-2 px-3 shadow-sm" placeholder="Enter your password" required>
                <span class="toggle-password" onclick="togglePassword()">
                  <i class="fa fa-eye" id="toggleIcon"></i>
                </span>
              </div>
<<<<<<< HEAD
              <a href="/forgot" class="text-primary text-sm hover:underline">Forgot password?</a>
=======
            </div>

            <!-- Remember Me + Forgot -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label text-gray-700" for="rememberMe">Remember me</label>
              </div>
              <a href="/forgot" class="text-primary small">Forgot password?</a>
>>>>>>> origin
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 py-2 shadow">Login</button>
          </form>

          <!-- Register Link -->
          <div class="mt-4 text-center text-gray-700">
            <small>Don't have an account? 
              <a href="/register" class="text-primary fw-semibold text-decoration-none">Register here</a>
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Show Password Script -->
<script>
  function togglePassword() {
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    }
  }
</script>

<?php require_once "views/layouts/footer.php";?>
</body>
</html>
