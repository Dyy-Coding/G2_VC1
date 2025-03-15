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

<body class="bg-gray-100">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card w-full max-w-md shadow-lg">
            <div class="card-body p-8">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Register New User</h2>

                <form action="/register" method="POST">
                    <!-- First Name Input -->
                    <div class="mb-4">
                        <label for="first_name" class="block text-gray-600 font-medium mb-1">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control border border-gray-300 p-2 w-full focus:ring-2 focus:ring-blue-400" required value="<?= htmlspecialchars($first_name ?? '') ?>" />
                    </div>

                    <!-- Last Name Input -->
                    <div class="mb-4">
                        <label for="last_name" class="block text-gray-600 font-medium mb-1">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control border border-gray-300 p-2 w-full focus:ring-2 focus:ring-blue-400" required value="<?= htmlspecialchars($last_name ?? '') ?>" />
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-600 font-medium mb-1">Email</label>
                        <input type="email" id="email" name="email" class="form-control border border-gray-300 p-2 w-full focus:ring-2 focus:ring-blue-400" required value="<?= htmlspecialchars($email ?? '') ?>" />
                    </div>

                    <!-- Phone Number Input -->
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-600 font-medium mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control border border-gray-300 p-2 w-full focus:ring-2 focus:ring-blue-400" required value="<?= htmlspecialchars($phone ?? '') ?>" />
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-600 font-medium mb-1">Password</label>
                        <input type="password" id="password" name="password" class="form-control border border-gray-300 p-2 w-full focus:ring-2 focus:ring-blue-400" required />
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="mb-6">
                        <label for="confirm_password" class="block text-gray-600 font-medium mb-1">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control border border-gray-300 p-2 w-full focus:ring-2 focus:ring-blue-400" required />
                    </div>

                    <!-- Form Buttons -->
                    <div class="d-flex justify-content-between mb-4">
                        <button type="submit" class="btn btn-primary w-48">Register</button>
                        <a href="/login" class="text-gray-600 hover:text-black">Already have an account? Login</a>
                    </div>

                    <!-- Reset Button -->
                    <div class="mt-4">
                        <button type="reset" class="btn btn-secondary w-full">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for modal, tooltip, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
