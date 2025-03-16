<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS (Optional if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .error { color: #dc3545; }
        .success { color: #28a745; }
    </style>
</head>

<body class="bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl w-full max-w-lg p-10 border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Reset Your Password</h2>

        <!-- Display messages -->
        <?php if (isset($error_message)): ?>
            <div class="error text-center mb-4 font-medium"><?php echo $error_message; ?></div>
        <?php elseif (isset($success_message)): ?>
            <div class="success text-center mb-4 font-medium"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <!-- Password Reset Form -->
        <form action="/forgot-password" method="POST" class="space-y-5">
            <!-- Hidden field for token -->

            <div>
                <label for="new_password" class="block text-sm font-semibold text-gray-700 mb-1">New Password</label>
                <input type="password" id="new_password" name="password" class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-indigo-300 outline-none" placeholder="Enter new password" required>
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-1">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-indigo-300 outline-none" placeholder="Confirm new password" required>
            </div>

            <div class="flex items-center justify-between text-sm text-gray-500 mt-2">
                <div class="flex gap-2 items-center">
                    <input type="checkbox" id="togglePassword" class="accent-indigo-500">
                    <label for="togglePassword">Show Passwords</label>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition duration-200 shadow-md">Reset Password</button>
            </div>
        </form>
    </div>

    <!-- Password toggle script -->
    <script>
        document.getElementById('togglePassword').addEventListener('change', function () {
            const newPassword = document.getElementById('new_password');
            const confirmPassword = document.getElementById('confirm_password');
            const type = this.checked ? 'text' : 'password';
            newPassword.type = type;
            confirmPassword.type = type;
        });
    </script>

</body>
</html>
