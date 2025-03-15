<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New User</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styling -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 16px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .text-gray-600:hover {
            color: #1d1d1d;
        }
    </style>
</head>

<body>
<div class="col-lg-6 d-none d-lg-flex position-fixed top-0 end-0 w-100 vh-100 text-center justify-content-center flex-column">
  <div class="position-relative h-100 w-100 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
       style="background-image: url('https://static.vecteezy.com/system/resources/previews/010/925/404/non_2x/registration-page-name-and-password-field-fill-in-form-menu-bar-corporate-website-create-account-user-information-flat-design-modern-illustration-vector.jpg'); 
              background-size: cover; background-position: center; background-repeat: no-repeat;">
    <span class="bg-gradient-primary opacity-6"></span>
  </div>
</div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 m-1">
    <div class="card w-full max-w-xl shadow-lg rounded-lg overflow-hidden" style="border-radius: 20px;">
            <div class="card-header bg-blue-500 text-white text-center text-2xl font-bold py-3">
                Register
            </div>
            <div class="card-body p-8">
                <?php 
                    $successMessage = $successMessage ?? ''; // Avoid undefined variable error
                ?>

                <?php if (!empty($errors)): ?>
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
                    </div>
                <?php elseif ($successMessage): ?>
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        <p><?= $successMessage ?></p>
                    </div>
                <?php endif; ?>

                <form action="/register" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-2 pb-1">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label block text-gray-600 font-medium mb-1" for="form3Examplev2">First name</label>
                                <input type="text" id="form3Examplev2" name="first_name" class="form-control shadow-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-2 pb-1">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label block text-gray-600 font-medium mb-1" for="form3Examplev3">Last name</label>
                                <input type="text" id="form3Examplev3" name="last_name" class="form-control shadow-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2 pb-1">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label block text-gray-600 font-medium mb-1" for="form3Examplev2">Email</label>
                                <input type="text" id="form3Examplev2" name="email" class="form-control shadow-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-2 pb-1">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label block text-gray-600 font-medium mb-1" for="form3Examplev3">Phone</label>
                                <input type="text" id="form3Examplev3" name="phone_number" class="form-control shadow-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 pb-1">
                        <label class="block text-gray-600 font-medium mb-1">Password</label>
                        <input type="password" name="password" class="form-control shadow-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="mb-2 pb-1">
                        <label class="block text-gray-600 font-medium mb-1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control shadow-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="d-flex justify-content-center gap-8">
                        <button type="submit" class="btn bg-blue-400 p-1 w-1/6">Reset</button>
                        <small class="text-sm text-gray-500">
                            You have an account already! 
                            <a href="/login" class="text-blue-600 text-base">Login</a>
                        </small>
                    </div>
                    
                    <div class="mt-3 mb-0 text-center">
                        <button type="reset" class="btn btn-primary w-1/2">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for modal, tooltip, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
