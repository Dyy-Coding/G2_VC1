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
</head>

<body class="bg-gray-100">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card w-full max-w-md shadow-lg">
            <div class="card-body p-8">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Register New User</h2>

           

                <form action="/register" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-600 font-medium mb-1">Full Name</label>
                        <input type="text" name="name" class="form-control border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required value="<?= htmlspecialchars($full_name ?? '') ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-600 font-medium mb-1">Email</label>
                        <input type="email" name="email" class="form-control border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required value="<?= htmlspecialchars($email ?? '') ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-600 font-medium mb-1">Password</label>
                        <input type="password" name="password" class="form-control border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-600 font-medium mb-1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary w-48">Register</button>
                        <a href="/login" class="text-gray-600 hover:text-black">Login</a>
                    </div>
                    
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
