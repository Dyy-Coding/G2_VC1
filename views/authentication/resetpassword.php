<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Custom styling if needed */
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="container bg-white shadow-md rounded-lg p-8 mt-10">
        <h2 class="text-center text-3xl mb-4">Reset Password</h2>

        <!-- Display messages -->
        <?php if (isset($error_message)): ?>
            <div class="error text-danger text-center mb-4"><?php echo $error_message; ?></div>
        <?php elseif (isset($success_message)): ?>
            <div class="success text-success text-center mb-4"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <!-- Password Reset Form -->
        <form action="/forgot-password" method="POST">
            <!-- Hidden field to pass the token -->
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

            <div class="form-group">
                <label for="new_password" class="form-label">New Password:</label>
                <input type="password" id="new_password" name="new_password" class="form-control p-3 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control p-3 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary w-full py-2 px-4 rounded-md">Reset Password</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
