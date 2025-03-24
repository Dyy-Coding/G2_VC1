<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="container max-w-md bg-white p-5 rounded-xl shadow-lg w-full">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-4">Forgot Your Password?</h2>
        <p class="text-center text-gray-500 mb-4">Enter your email or phone number below, and we’ll send you a reset link.</p>

        <form action="/reset-password" method="POST">
            <!-- Hidden Token Field -->
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

            <div class="mb-4">
                <label for="contact" class="form-label block text-sm font-medium text-gray-700">Email or Phone Number</label>
                <input type="text" name="contact" id="contact"
                    class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="you@example.com or +1234567890" required>
            </div>

            <div class="d-grid">
                <button type="submit"
                    class="btn btn-primary w-full py-2 px-4 rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Continue
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="/login" class="text-blue-600 hover:underline">Back to login</a>
        </div>
    </div>
</body>

</html>
