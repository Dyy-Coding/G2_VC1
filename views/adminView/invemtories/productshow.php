<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Materials</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet" />

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

<body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen flex flex-col items-center justify-center px-4 py-8">
  <div class="w-full max-w-6xl bg-white rounded-2xl overflow-hidden card-shadow p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Material List</h2>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto">
        <thead>
          <tr class="bg-blue-600 text-white">
            <th class="px-6 py-3 text-left">Material Name</th>
            <th class="px-6 py-3 text-left">Category</th>
            <th class="px-6 py-3 text-left">Supplier</th>
            <th class="px-6 py-3 text-left">Quantity</th>
            <th class="px-6 py-3 text-left">Unit Price</th>
            <th class="px-6 py-3 text-left">Status</th>
            <th class="px-6 py-3 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($materials as $material): ?>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4"><?php echo $material['Name']; ?></td>
              <td class="px-6 py-4"><?php echo $material['CategoryName']; ?></td>
              <td class="px-6 py-4"><?php echo $material['SupplierName']; ?></td>
              <td class="px-6 py-4"><?php echo $material['Quantity']; ?></td>
              <td class="px-6 py-4"><?php echo '$' . number_format($material['UnitPrice'], 2); ?></td>
              <td class="px-6 py-4"><?php echo $material['Status']; ?></td>
              <td class="px-6 py-4">
                <a href="/edit/material/<?php echo $material['MaterialID']; ?>" class="text-blue-600 hover:text-blue-700">Edit</a> |
                <a href="/delete/material/<?php echo $material['MaterialID']; ?>" class="text-red-600 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this material?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="mt-6 text-center">
      <a href="/Add/material" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md">
        Add New Material
      </a>
    </div>
  </div>
</body>

</html>
