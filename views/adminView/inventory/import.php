<div class="container mt-3 card" style="width: 95%; padding: 20px;">
    <h2>Import Inventory</h2>
    <p>Upload a CSV or Excel file to import or update materials. Required columns: name, categoryID, supplierID, quantity, unitPrice.</p>
    
    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="alert alert-<?= $_SESSION['flash_message']['type']; ?>">
            <?= $_SESSION['flash_message']['message']; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/inventory/import" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="inventoryFile" class="form-label">Upload File (CSV, XLS, XLSX)</label>
            <input type="file" class="form-control" id="inventoryFile" name="inventoryFile" accept=".csv,.xls,.xlsx" required>
            <p class="text-muted">Max file size: 5MB. Ensure the file has headers matching the material fields.</p>
        </div>
        <button type="submit" class="btn btn-primary">Import Inventory</button>
        <a href="/inventory" class="btn btn-secondary">Cancel</a>
    </form>
</div>