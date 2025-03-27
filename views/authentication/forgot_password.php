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
<<<<<<< HEAD
        <p class="text-center text-gray-500 mb-4">Choose how you'd like to reset your password: via email or phone number.</p>
=======
        <p class="text-center text-gray-500 mb-4">Enter your email or phone number below, and we’ll send you a reset link.</p>
>>>>>>> 8104dbc494eba992687c0e453de81dec9bbedc0a

        <form action="/reset-password" method="POST">
            <!-- Hidden Token Field -->
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

            <div class="mb-4">
<<<<<<< HEAD
                <label class="block text-sm font-medium text-gray-700">Choose a method</label>
                <div class="flex items-center space-x-4">
                    <!-- Radio Buttons for Email or Phone Number -->
                    <label class="inline-flex items-center">
                        <input type="radio" name="reset_method" value="email" class="form-radio text-blue-600" checked>
                        <span class="ml-2">Email</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="reset_method" value="phone" class="form-radio text-blue-600">
                        <span class="ml-2">Phone Number</span>
                    </label>
                </div>
            </div>

            <!-- Email input -->
            <div class="mb-4 reset-option email-option">
                <label for="email" class="form-label block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="email" id="email" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@example.com">
            </div>

            <!-- Phone Number input -->
            <div class="mb-4 reset-option phone-option hidden">
                <label for="phone" class="form-label block text-sm font-medium text-gray-700">Phone number</label>
                <input type="tel" name="phone" id="phone" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+1 (555) 123-4567">
=======
                <label for="contact" class="form-label block text-sm font-medium text-gray-700">Email or Phone Number</label>
                <input type="text" name="contact" id="contact"
                    class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="you@example.com or +1234567890" required>
>>>>>>> 8104dbc494eba992687c0e453de81dec9bbedc0a
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary w-full py-2 px-4 rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Continue
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="/login" class="text-blue-600 hover:underline">Back to login</a>
        </div>
    </div>

    <script>
        // Toggle input fields based on selected reset method
        const radioButtons = document.querySelectorAll('input[name="reset_method"]');
        const emailInput = document.querySelector('.email-option');
        const phoneInput = document.querySelector('.phone-option');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'email') {
                    emailInput.classList.remove('hidden');
                    phoneInput.classList.add('hidden');
                } else {
                    emailInput.classList.add('hidden');
                    phoneInput.classList.remove('hidden');
                }
            });
        });
    </script>
</body>
</html>
