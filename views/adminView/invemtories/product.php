<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

<div class="w-full max-w-6xl bg-white rounded-lg shadow-xl p-8 mx-auto my-12">
    <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Add New Material</h2>
    <form method="POST" action="/materials/add" enctype="multipart/form-data">
        
        <!-- Material Name -->
        <div class="mb-6">
            <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Material Name</label>
            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="name" name="name" required placeholder="Enter material name">
        </div>

        <!-- Category Dropdown -->
        <div class="mb-6">
            <label for="categoryID" class="block text-lg font-medium text-gray-700 mb-2">Category</label>
            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="categoryID" name="categoryID" required>
                <option value="" disabled selected>Select Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Supplier Dropdown -->
        <div class="mb-6">
            <label for="supplierID" class="block text-lg font-medium text-gray-700 mb-2">Supplier</label>
            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="supplierID" name="supplierID" required>
                <option value="" disabled selected>Select Supplier</option>
                <?php foreach ($suppliers as $supplier): ?>
                    <option value="<?php echo $supplier['SupplierID']; ?>"><?php echo $supplier['Name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Quantity -->
        <div class="mb-6">
            <label for="quantity" class="block text-lg font-medium text-gray-700 mb-2">Quantity</label>
            <input type="number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="quantity" name="quantity" required min="0" placeholder="Enter quantity">
        </div>

        <!-- Unit Price -->
        <div class="mb-6">
            <label for="unitPrice" class="block text-lg font-medium text-gray-700 mb-2">Unit Price</label>
            <input type="number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="unitPrice" name="unitPrice" step="0.01" required min="0" placeholder="Enter unit price">
        </div>

        <!-- Minimum Stock Level -->
        <div class="mb-6">
            <label for="minStockLevel" class="block text-lg font-medium text-gray-700 mb-2">Minimum Stock Level</label>
            <input type="number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="minStockLevel" name="minStockLevel" required min="0" placeholder="Enter min stock level">
        </div>

        <!-- Reorder Level -->
        <div class="mb-6">
            <label for="reorderLevel" class="block text-lg font-medium text-gray-700 mb-2">Reorder Level</label>
            <input type="number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="reorderLevel" name="reorderLevel" required min="0" placeholder="Enter reorder level">
        </div>

        <!-- Image Upload -->
        <div class="mb-6">
            <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Upload Image</label>
            <input type="file" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            <p class="mt-2 text-sm text-gray-500">Accepted formats: jpg, png, gif</p>
        </div>

        <!-- Image Preview -->
        <div class="mb-6">
            <img id="preview" class="w-[200px] h-[200px] object-cover rounded-lg border border-gray-300 hidden" src="#" alt="Image Preview">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition ease-in-out duration-300">
            Add Material
        </button>
    </form>
</div>

<script>
    // Image Preview Function
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = "#";
            preview.style.display = "none";
        }
    }
</script>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-12">
        <p>&copy; <?php echo date('Y'); ?> Material Management. All rights reserved.</p>
    </footer>

    <!-- Optional scripts -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.js"></script>
</body>
</html>
