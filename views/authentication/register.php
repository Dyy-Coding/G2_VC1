<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register New User</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet"/>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
    }
    .card-shadow {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center px-4">
  <div class="flex w-full max-w-7xl rounded-2xl overflow-hidden bg-white card-shadow">
    
    <!-- Left Image Side -->
    <div class="hidden lg:flex w-1/2 bg-cover bg-center" style="background-image: url('https://static.vecteezy.com/system/resources/previews/010/925/404/non_2x/registration-page-name-and-password-field-fill-in-form-menu-bar-corporate-website-create-account-user-information-flat-design-modern-illustration-vector.jpg');">
    </div>

    <!-- Right Form Side -->
    <div class="w-full lg:w-1/2 p-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Register</h2>

      <!-- Success / Error Messages -->
      <?php 
        $successMessage = $successMessage ?? '';
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

      <form action="/register" method="POST" class="space-y-3">
        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">First Name</label>
            <input type="text" name="first_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Last Name</label>
            <input type="text" name="last_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
            <input type="text" name="phone_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
          </div>    

        </div>
        <div class="flex gap-4">
                 <!-- Address Input -->
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Address</label>
            <input type="text" name="address" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Street Address</label>
            <input type="text" name="address" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
        </div>

     
      
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
          <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
        </div>

        <!-- Password Visibility Toggle -->
        <div class="flex items-center gap-2 text-sm text-gray-500 mt-1">
          <input type="checkbox" id="togglePassword" class="accent-blue-500">
          <label for="togglePassword">Show Passwords</label>
        </div>

        <div class="flex justify-between items-center mt-4">
        <button type="reset" class="bg-sky-500 text-white hover:bg-sky-600 px-4 py-1 rounded-lg font-medium">Reset</button>

          <p class="text-sm text-gray-500">
            Already have an account?
            <a href="/login" class="text-blue-600 hover:underline font-medium">Login</a>
          </p>
        </div>

        <div class="text-center mt-6">
          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md">
            Register
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Password Toggle Script -->
  <script>
    document.getElementById('togglePassword').addEventListener('change', function () {
      const pass1 = document.getElementById('password');
      const pass2 = document.getElementById('confirm_password');
      const type = this.checked ? 'text' : 'password';
      pass1.type = type;
      pass2.type = type;
    });
  </script>
</body>
</html>