<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  
  <!-- Argon Dashboard CSS -->
  <link id="pagestyle" href="views/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />

  <style>
    body { font-family: 'Open Sans', sans-serif; }
    .card { border-radius: 16px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); }
    .form-control { border-radius: 8px; transition: all 0.3s; }
    .form-control:focus { border-color: #4e73df; box-shadow: 0 0 10px rgba(78, 115, 223, 0.2); }
    .btn-primary { background-color: #4e73df; border: none; transition: background-color 0.3s; }
    .btn-primary:hover { background-color: #2e59d9; }
    .text-gray-700 { color: #4a4a4a; }
    .toggle-password { position: absolute; top: 50%; right: 12px; transform: translateY(-50%); cursor: pointer; color: #888; }
    .input-error { border: 2px solid red !important; background-color: #ffe6e6; }
    .error-message { color: red; font-size: 0.875rem; margin-top: 5px; display: block; }
    .fade-in { animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { 0% { opacity: 0; } 100% { opacity: 1; } }
    .bg-image { background-image: url('https://wp.buildingmaterials.co.uk/wp-content/uploads/2022/11/shutterstock_619349516-scaled.jpg'); background-size: cover; background-position: center; }
  </style>
</head>
<body class="g-sidenav-show bg-gray-100">

<!-- Background Image Side -->
<div class="col-lg-6 d-none d-lg-flex position-fixed top-0 end-0 w-100 vh-100 text-center justify-content-center flex-column bg-image">
  <span class="bg-gradient-primary opacity-6"></span>
</div>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 shadow-lg fade-in">
          <h3 class="mb-4 text-primary text-center fw-bold">Login</h3>

          <form id="loginForm" method="POST" action="/login">
            <div class="mb-3 position-relative">
              <label class="form-label fw-semibold text-gray-700" for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control py-2 px-3 shadow-sm <?= isset($errors['email']) ? 'input-error' : '' ?>" placeholder="Enter your email" value="<?= htmlspecialchars($email ?? '') ?>" required>
              <?php if (isset($errors['email'])): ?>
                <div id="emailError" class="error-message"><?= $errors['email'] ?></div>
              <?php endif; ?>
            </div>

            <div class="mb-3 position-relative">
              <label class="form-label fw-semibold text-gray-700" for="password">Password</label>
              <div class="position-relative">
                <input type="password" id="password" name="password" class="form-control py-2 px-3 shadow-sm <?= isset($errors['password']) ? 'input-error' : '' ?>" placeholder="Enter your password" required>
                <span class="toggle-password" onclick="togglePassword()">
                  <i class="fa fa-eye" id="toggleIcon"></i>
                </span>
              </div>
              <?php if (isset($errors['password'])): ?>
                <div id="passwordError" class="error-message"><?= $errors['password'] ?></div>
              <?php endif; ?>
            </div>

            <?php if (isset($errors['general'])): ?>
              <div class="error-message"><?= $errors['general'] ?></div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary w-100 py-2 shadow">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

</script>

</body>
</html>
