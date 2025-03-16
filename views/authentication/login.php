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

<!-- 
<div class="col-lg-6 d-none d-lg-flex position-fixed top-0 end-0 w-100 vh-100 text-center justify-content-center flex-column">
  <div class="position-relative h-100 w-100 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" 
       style="background-image: url('https://structuralengineeringbasics.com/wp-content/uploads/2019/05/STRUCTURAL-ENGINEERING-MATERIALS-1024x530-1-1200x720.webp'); 
              background-size: cover; background-position: center; background-repeat: no-repeat;">
    
    <span class="bg-gradient-primary opacity-6"></span>
  </div>
</div>

<section class="vh-100">
<div class="container py-5 h-100">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card p-4 text-center">
                <h3 class="mb-4 text-primary">Login</h3>

                <form action="/login" method="POST">
                    <div class="form-outline mb-3 text-start">
                        <label class="form-label fw-bold fs-6" for="email">Email:</label>
                        <input type="email" id="email" placeholder="Enter email..." name="email" class="form-control" required />
                    </div>

                    <div class="form-outline mb-3 text-start">
                        <label class="form-label fw-bold fs-6" for="pwd">Password:</label>
                        <input type="password" id="pwd" placeholder="Enter password..." name="password" class="form-control" required />
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                          <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="rememberMe">
                              <label class="form-check-label fs-6" for="rememberMe">Remember me</label>
                          </div>
                          <a href="/forgot_password" class="text-primary fs-8">Forgot password?</a>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </form>

                <div class="mt-4">
                    <small>Don't have an account? <a href="/register" class="text-primary fw-bold">Register</a></small>
                </div>
               
              </div>
            </div>
        </div>
    </div>
  </div>
</section> -->

<div class="col-lg-6 d-none d-lg-flex position-fixed top-0 end-0 w-100 vh-100 text-center justify-content-center flex-column">
  <div class="position-relative h-100 w-100 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
       style="background-image: url('https://wp.buildingmaterials.co.uk/wp-content/uploads/2022/11/shutterstock_619349516-scaled.jpg'); 
              background-size: cover; background-position: center; background-repeat: no-repeat;">
    <span class="bg-gradient-primary opacity-6"></span>
  </div>
</div>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 text-center shadow-lg">
          <h3 class="mb-4 text-primary font-semibold text-3xl">Login</h3>

          <form action="/login" method="POST" class="space-y-4">
            <!-- Email Field -->
            <div class="form-outline mb-3 text-start">
              <label class="form-label fw-bold fs-6 text-gray-700" for="email">Email:</label>
              <input type="email" id="email" placeholder="Enter email..." name="email" class="form-control shadow-sm py-2 px-3 border rounded-lg" required />
            </div>

            <!-- Password Field -->
            <div class="form-outline mb-3 text-start">
              <label class="form-label fw-bold fs-6 text-gray-700" for="pwd">Password:</label>
              <input type="password" id="pwd" placeholder="Enter password..." name="password" class="form-control shadow-sm py-2 px-3 border rounded-lg" required />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label fs-6 text-gray-700" for="rememberMe">Remember me</label>
              </div>
              <a href="/forgot" class="text-primary text-sm hover:underline">Forgot password?</a>
            </div>

            <!-- Submit Button -->
            <button class="btn btn-primary w-full py-2 rounded-lg shadow-md" type="submit">Login</button>
          </form>

          <div class="mt-4 text-gray-700">
            <small>Don't have an account? 
              <a href="/register" class="text-primary font-semibold hover:underline">Register</a>
            </small>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<?php require_once "views/layouts/footer.php";?>
