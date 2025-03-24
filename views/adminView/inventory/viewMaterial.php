<div class="container mt-5">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/inventory">Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page">Material Details</li>
        </ol>
    </nav>

    <div class=" container card d-flex align-item-center justify-content-center p-5">
            <!-- Material Details -->
            <div class="column">
                <div class=" d-flex align-item-center justify-content-center">
                    <?php if (!empty($material['ImagePath'])): ?>
                        <img src="/<?= htmlspecialchars($material['ImagePath']) ?>" alt="Material Image" class="img-fluid rounded" style="width: 30%; height:30vh;">
                    <?php else: ?>
                        <p>No image available.</p>
                    <?php endif; ?>
                </div>
                <div class="">
                    <h3 class="text-center m-3"><?= htmlspecialchars($material['Name']); ?></h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Category</th>
                            <td><?= htmlspecialchars($material['CategoryName'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td><?= htmlspecialchars($material['Quantity']); ?></td>
                        </tr>
                        <tr>
                            <th>Unit Price</th>
                            <td>$<?= htmlspecialchars($material['UnitPrice']); ?></td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td><?= htmlspecialchars($material['SupplierName'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Type or Size</th>
                            <td><?= htmlspecialchars($material['Size'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?= htmlspecialchars($material['Description'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td><?= htmlspecialchars($material['Brand'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge <?= $material['Status'] == 'Active' ? 'bg-success' : 'bg-danger'; ?>">
                                    <?= htmlspecialchars($material['Status'] ?? 'N/A'); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Min Stock Level</th>
                            <td><?= htmlspecialchars($material['MinStockLevel'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Reorder Level</th>
                            <td><?= htmlspecialchars($material['ReorderLevel'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Unit of Measure</th>
                            <td><?= htmlspecialchars($material['UnitOfMeasure'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td><?= htmlspecialchars($material['Location'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Supplier Contact</th>
                            <td><?= htmlspecialchars($material['SupplierContact'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Warranty Period</th>
                            <td><?= htmlspecialchars($material['WarrantyPeriod'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td><?= htmlspecialchars($material['CreatedAt'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td><?= htmlspecialchars($material['UpdatedAt'] ?? 'N/A'); ?></td>
                        </tr>
                    </table>
                    <div class="btn-detail">
                        <a href="/inventory" class="btn btn-secondary">Back to Inventory</a>
                        <a href="/editmaterial/<?= $material['MaterialID']; ?>" class="btn btn-primary">Edit </a>
                        <a href="/materials/delete/<?= $material['MaterialID']; ?>" 
                        class="btn btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this material?');">Delete 
                        </a>
                    </div>

            </div>
        </div>
    </div>
</div>