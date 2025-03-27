<!-- reset_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Include Bootstrap and Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container max-w-lg mx-auto mt-10 p-5 bg-white shadow-lg rounded">
    <h2 class="text-2xl font-semibold text-center mb-5">Reset Password</h2>
    <form action="/reset-password" method="POST" class="space-y-4">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <div class="form-group">
            <label for="password" class="font-medium text-gray-700">New Password</label>
            <input type="password" name="password" id="password" class="form-control w-full px-4 py-2 border rounded-lg shadow-sm" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">Reset Password</button>
    </form>
</div>

</body>
</html>
