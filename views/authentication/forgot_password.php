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
        <p class="text-center text-gray-500 mb-4">Enter your email address below, and we’ll send you a reset link.</p>

        <form action="/forgotpasswordform" method="POST">
            <div class="mb-4">
                <label for="email" class="form-label block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="email" id="email"
                    class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="you@example.com" required>
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
