<div class="container mt-5">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/inventory">Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Material</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <h1>Edit Material</h1>
        </div>
        <div class="card-body">
            <!-- Flash Message Display -->
            <?php if (isset($flash_message)): ?>
                <div class="alert alert-<?= $flash_message['type'] === 'success' ? 'success' : 'danger'; ?>" role="alert">
                    <?= htmlspecialchars($flash_message['message']); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="/materials/update" enctype="multipart/form-data">
                <input type="hidden" name="materialID" value="<?= htmlspecialchars($material['MaterialID']) ?>">

                <div class="mb-3">
                    <label for="Name" class="form-label">Name:</label>
                    <input type="text" id="Name" name="Name" class="form-control" maxlength="255" value="<?= htmlspecialchars($material['Name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="categoryID" class="form-label">Category:</label>
                    <select class="form-select" id="categoryID" name="categoryID" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['CategoryID']; ?>" 
                                <?= $material['CategoryID'] == $category['CategoryID'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($category['CategoryName']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Quantity" class="form-label">Quantity:</label>
                    <input type="number" id="Quantity" name="Quantity" class="form-control" value="<?= htmlspecialchars($material['Quantity']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="UnitPrice" class="form-label">Unit Price:</label>
                    <input type="number" step="0.01" id="UnitPrice" name="UnitPrice" class="form-control" value="<?= htmlspecialchars($material['UnitPrice']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="supplierID" class="form-label">Supplier:</label>
                    <select class="form-select" id="supplierID" name="supplierID" required>
                        <option value="">Select Supplier</option>
                        <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?= $supplier['SupplierID']; ?>" 
                                <?= $material['SupplierID'] == $supplier['SupplierID'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($supplier['Name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="MinStockLevel" class="form-label">Min Stock Level:</label>
                    <input type="number" id="MinStockLevel" name="MinStockLevel" class="form-control" value="<?= htmlspecialchars($material['MinStockLevel'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="ReorderLevel" class="form-label">Reorder Level:</label>
                    <input type="number" id="ReorderLevel" name="ReorderLevel" class="form-control" value="<?= htmlspecialchars($material['ReorderLevel'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="UnitOfMeasure" class="form-label">Unit of Measure:</label>
                    <input type="text" id="UnitOfMeasure" name="UnitOfMeasure" class="form-control" maxlength="50" value="<?= htmlspecialchars($material['UnitOfMeasure'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="Size" class="form-label">Type or Size:</label>
                    <input type="text" id="Size" name="Size" class="form-control" maxlength="100" value="<?= htmlspecialchars($material['Size'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description:</label>
                    <textarea id="Description" name="Description" class="form-control"><?= htmlspecialchars($material['Description'] ?? '') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="Brand" class="form-label">Brand:</label>
                    <input type="text" id="Brand" name="Brand" class="form-control" maxlength="255" value="<?= htmlspecialchars($material['Brand'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="Location" class="form-label">Location:</label>
                    <input type="text" id="Location" name="Location" class="form-control" maxlength="255" value="<?= htmlspecialchars($material['Location'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="SupplierContact" class="form-label">Supplier Contact:</label>
                    <input type="text" id="SupplierContact" name="SupplierContact" class="form-control" maxlength="255" value="<?= htmlspecialchars($material['SupplierContact'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="Status" class="form-label">Status:</label>
                    <select id="Status" name="Status" class="form-select">
                        <option value="Active" <?= $material['Status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                        <option value="Inactive" <?= $material['Status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                        <option value="Discontinued" <?= $material['Status'] == 'Discontinued' ? 'selected' : ''; ?>>Discontinued</option>
                        <option value="Pending" <?= $material['Status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="WarrantyPeriod" class="form-label">Warranty Period (months):</label>
                    <input type="number" id="WarrantyPeriod" name="WarrantyPeriod" class="form-control" value="<?= htmlspecialchars($material['WarrantyPeriod'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <?php if (!empty($material['ImagePath'])): ?>
                        <img src="/<?= htmlspecialchars($material['ImagePath']) ?>" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                    <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/material" class="btn btn-secondary">Back to Inventory</a>
                    <button type="submit" class="btn btn-primary">Update Record</button>
                </div>
            </form>
        </div>
    </div>
</div>