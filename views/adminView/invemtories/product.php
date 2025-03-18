<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Material</title>

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
  <div class="flex w-full max-w-5xl rounded-2xl overflow-hidden bg-white card-shadow">
    <div class="w-full p-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Add New Material</h2>

      <form action="/Add/materials" method="POST" enctype="multipart/form-data" class="space-y-3">
      <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

<!-- Your form fields here -->
        <div class="flex  lg:w-2xl gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Material Name</label>
            <input type="text" name="name" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Category</label>
            <select name="categoryID" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
              <option value="" disabled selected>Select Category</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Supplier</label>
            <select name="supplierID" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
              <option value="" disabled selected>Select Supplier</option>
              <?php foreach ($suppliers as $supplier): ?>
                <option value="<?php echo $supplier['SupplierID']; ?>"><?php echo $supplier['Name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Quantity</label>
            <input type="number" name="quantity" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required min="0">
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Unit Price</label>
            <input type="number" name="unitPrice" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required step="0.01" min="0">
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Minimum Stock Level</label>
            <input type="number" name="minStockLevel" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required min="0">
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Reorder Level</label>
            <input type="number" name="reorderLevel" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required min="0">
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Size</label>
            <select name="size" id="size" onchange="toggleSizeInput()" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
              <option value="" disabled selected>Select Size</option>
              <option value="kg">kg</option>
              <option value="L">L</option>
              <option value="m">m</option>
              <option value="m3">m3</option>
              <option value="Other">Other (Custom)</option>
            </select>
            <input type="text" name="customSize" id="customSize" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg mt-2 hidden focus:ring-2 focus:ring-blue-400 outline-none" placeholder="Enter custom size">
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Unit of Measure</label>
            <input type="text" name="unitOfMeasure" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Brand</label>
            <input type="text" name="brand" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Location</label>
            <input type="text" name="location" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Supplier Contact</label>
            <input type="text" name="supplierContact" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
            <select name="status" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
              <option value="" disabled selected>Select Status</option>
              <option value="Available">Available</option>
              <option value="Unavailable">Unavailable</option>
              <option value="In Maintenance">In Maintenance</option>
            </select>
          </div>
          <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-600 mb-1">Warranty Period</label>
            <input type="text" name="warrantyPeriod" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" placeholder="e.g., 6 months, 1 year">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
          <textarea name="description" rows="3" class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none resize-none" placeholder="Write a short description..."></textarea>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Upload Image</label>
          <input type="file" name="image" id="imageUpload" accept="image/*" onchange="handleFileChange(event)" class="hidden">
          <div class="flex items-center gap-3">
            <button type="button" onclick="document.getElementById('imageUpload').click()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
              Choose Image
            </button>
            <span id="fileName" class="text-sm text-gray-700">No file chosen</span>
          </div>
          <p class="mt-1 text-sm text-gray-500">Accepted formats: jpg, png, gif</p>
        </div>

        <div class="flex justify-between items-center mt-4">
          <button type="reset" class="bg-sky-500 text-white hover:bg-sky-600 px-4 py-1 rounded-lg font-medium">Reset</button>
        </div>

        <div class="text-center mt-6">
          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md">
            Add Material
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function toggleSizeInput() {
      const sizeSelect = document.getElementById('size');
      const customSizeInput = document.getElementById('customSize');
      if (sizeSelect.value === 'Other') {
        customSizeInput.classList.remove('hidden');
        customSizeInput.required = true;
      } else {
        customSizeInput.classList.add('hidden');
        customSizeInput.required = false;
      }
    }

    function handleFileChange(event) {
      const file = event.target.files[0];
      const fileName = document.getElementById('fileName');
      if (file) {
        fileName.textContent = file.name;
      } else {
        fileName.textContent = "No file chosen";
      }
    }
  </script>
</body>

</html>
