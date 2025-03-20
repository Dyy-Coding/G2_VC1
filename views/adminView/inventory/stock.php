
    <style>
        #preview {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container mt-3 card" style="width: 95%; padding: 20px;">
    <div class="d-flex justify-content-between mb-1">
        <div>
            <h1>All materials</h1>
            <p>Sand, Pebble, Cement,.....</p>
        </div>
        <div>
            <button class="btn btn-primary me-2" id="btn-add">+ New Material</button>
            <button class="btn btn-secondary">Import</button>
            <button class="btn btn-secondary">Export</button>
        </div>
    </div>

    <div class="input-group mt-0 mb-0">
        <div class="inline-controls">
            <label for="rowsPerPage" class="me-2">Rows per page:</label>
            <select id="rowsPerPage" class="form-select" style="width: 7%;">
                <option value="10">10</option>
                <option value="25" selected>25</option>
                <option value="50">50</option>
            </select>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="showOutOfStock">
                <label class="form-check-label" for="showOutOfStock">Show out of stock</label>
            </div>
        </div>
        <div class="form-outline">
            <input type="search" id="form1" class="form-control" placeholder="Search"/>
        </div>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Supplier</th>
                <th>Type or Size</th>
                <th>Price</th>
                <th>Last updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="checkbox">
                    <img src="views/assets/img/building-sand.jpg" alt="">
                    Sand number one
                </td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-danger btn-sm">OUT OF STOCK</button></td>
                <td>Chandy Neat</td>
                <td>Sand</td>
                <td>$15</td>
                <td>14 April 2025</td>
                <td>
                    <i class="material-icons">edit</i>
                    <i class="material-icons text-danger">delete</i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Add Material Form -->
<div class="form-container card mb-5 addMeterial" id="addMeterial">
    <h2 class="text-3xl font-semibold text-gray-800 text-center mb-3">Add New Material</h2>
    <form method="POST" action="/materials/add" enctype="multipart/form-data">
        <div class="form-add-meterial">
            <div class="form-left">
                <!-- Material Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Material Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter material name">
                </div>

                <!-- Category Dropdown -->
                <div class="mb-3">
                    <label for="categoryID" class="form-label">Category</label>
                    <select class="form-select" id="categoryID" name="categoryID" required>
                        <option value="" selected>Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Supplier Dropdown -->
                <div class="mb-3">
                    <label for="supplierID" class="form-label">Supplier</label>
                    <select class="form-select" id="supplierID" name="supplierID" required>
                        <option value="" selected>Select Supplier</option>
                        <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?php echo $supplier['SupplierID']; ?>"><?php echo $supplier['Name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required min="0" placeholder="Enter quantity">
                </div>
            </div>
            

            <div class="form-right">
                <!-- Minimum Stock Level -->
                <!-- Unit Price -->
                <div class="mb-3">
                    <label for="unitPrice" class="form-label">Unit Price</label>
                    <input type="number" class="form-control" id="unitPrice" name="unitPrice" step="0.01" required min="0" placeholder="Enter unit price">
                </div>

                <div class="mb-3">
                    <label for="minStockLevel" class="form-label">Minimum Stock Level</label>
                    <input type="number" class="form-control" id="minStockLevel" name="minStockLevel" required min="0" placeholder="Enter min stock level">
                </div>

                <!-- Reorder Level -->
                <div class="mb-3">
                    <label for="reorderLevel" class="form-label">Reorder Level</label>
                    <input type="number" class="form-control" id="reorderLevel" name="reorderLevel" required min="0" placeholder="Enter reorder level">
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    <p class="mt-2 text-sm text-gray-500">Accepted formats: jpg, png, gif</p>
                </div>

                <!-- Image Preview -->
                <div class="mb-3">
                    <img id="preview" class="img-thumbnail" src="#" alt="Image Preview">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" id="btn-add-material">Add Material</button>
        <button type="button" class="btn btn-secondary w-100 mt-2" id="btn-cancel">Cancel</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Image Preview
    document.getElementById("image").addEventListener("change", function(event) {
        const preview = document.getElementById("preview");
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = "#";
            preview.style.display = "none";
        }
    });

    // Show Add Material Form
    document.getElementById("btn-add").addEventListener("click", function () {
        document.getElementById("addMeterial").style.display = "block";
    });

    // Hide Form
    document.getElementById("btn-cancel").addEventListener("click", function () {
        document.getElementById("addMeterial").style.display = "none";
    });

    // Validate Form
    document.getElementById("btn-add-material").addEventListener("click", function (event) {
        let name = document.getElementById("name").value;
        if (!name) {
            alert("Please fill in all fields!");
            event.preventDefault();
        }
    });
});
</script>

