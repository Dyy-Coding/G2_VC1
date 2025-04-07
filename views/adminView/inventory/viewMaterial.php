<div class="container mt-5">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/material">Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page">Material Details</li>
        </ol>
    </nav>

    <div class="container card p-5">
        <!-- Material Details -->
        <div class="text-center mb-4">
            <?php if (!empty($material['ImagePath'])): ?>
                <img src="/<?= htmlspecialchars($material['ImagePath']) ?>" alt="Material Image" class="img-fluid rounded" style="width: 30%; height:30vh;" id="materialImage">
            <?php else: ?>
                <p>No image available.</p>
            <?php endif; ?>
        </div>
        
        <h3 class="text-center m-3"> <?= htmlspecialchars($material['Name']); ?> </h3>
        
        <div class="mb-3">
            <label for="toggleFields">Select Fields to Display:</label>
            <select id="toggleFields" class="form-select" multiple>
                <option value="Category">Category</option>
                <option value="Quantity">Quantity</option>
                <option value="UnitPrice">Unit Price</option>
                <option value="DiscountPercentage">Discount Percentage</option>
                <option value="DiscountAmount">Discount Amount</option>
                <option value="DiscountedPrice">Discounted Price</option>
                <option value="Supplier">Supplier</option>
                <option value="Size">Type or Size</option>
                <option value="Description">Description</option>
                <option value="Brand">Brand</option>
                <option value="Status">Status</option>
                <option value="MinStockLevel">Min Stock Level</option>
                <option value="ReorderLevel">Reorder Level</option>
                <option value="UnitOfMeasure">Unit of Measure</option>
                <option value="Location">Location</option>
                <option value="SupplierContact">Supplier Contact</option>
                <option value="WarrantyPeriod">Warranty Period</option>
                <option value="CreatedAt">Created At</option>
                <option value="UpdatedAt">Updated At</option>
            </select>
        </div>

        <table class="table table-bordered" id="detailsTable">
            <tbody>
                <?php 
                $fields = [
                    'Category' => 'CategoryName',
                    'Quantity' => 'Quantity',
                    'Unit Price' => 'UnitPrice',
                    'Discount Percentage' => 'DiscountPercentage',
                    'Discount Amount' => 'DiscountAmount',
                    'Discounted Price' => 'DiscountedPrice',
                    'Supplier' => 'SupplierName',
                    'Type or Size' => 'Size',
                    'Description' => 'Description',
                    'Brand' => 'Brand',
                    'Status' => 'Status',
                    'Min Stock Level' => 'MinStockLevel',
                    'Reorder Level' => 'ReorderLevel',
                    'Unit of Measure' => 'UnitOfMeasure',
                    'Location' => 'Location',
                    'Supplier Contact' => 'SupplierContact',
                    'Warranty Period' => 'WarrantyPeriod',
                    'Created At' => 'CreatedAt',
                    'Updated At' => 'UpdatedAt'
                ];

                // Adding logic to calculate Discounted Price
                $unitPrice = $material['UnitPrice'] ?? 0;
                $discountPercentage = $material['DiscountPercentage'] ?? 0;
                $discountAmount = $material['DiscountAmount'] ?? 0;

                $discountedPrice = $discountPercentage ? 
                    $unitPrice * (1 - $discountPercentage / 100) : 
                    $unitPrice - $discountAmount;

                // Show the original and discounted prices
                $material['DiscountedPrice'] = $discountedPrice;

                foreach ($fields as $label => $key): ?>
                    <tr class="detail-row" data-field="<?= $key; ?>">
                        <th><?= $label; ?></th>
                        <td>
                            <?php if ($key === 'Status'): ?>
                                <span class="badge <?= $material['Status'] == 'Active' ? 'bg-success' : 'bg-danger'; ?>">
                                    <?= htmlspecialchars($material['Status'] ?? 'N/A'); ?>
                                </span>
                            <?php elseif ($key === 'DiscountedPrice'): ?>
                                <span class="text-success font-weight-bold">
                                    $<?= number_format($material['DiscountedPrice'], 2); ?>
                                </span>
                            <?php else: ?>
                                <?= htmlspecialchars($material[$key] ?? 'N/A'); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="d-flex gap-2">
        <a href="/material" class="btn btn-outline-primary btn-lg rounded-pill">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
            <a href="/materials/edit/<?= $material['MaterialID']; ?>" class="btn btn-primary">Edit</a>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this material?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="/materials/delete/<?= $material['MaterialID']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const select = document.getElementById("toggleFields");
        const rows = document.querySelectorAll(".detail-row");
        
        select.addEventListener("change", function () {
            let selected = Array.from(select.selectedOptions).map(option => option.value);
            rows.forEach(row => {
                row.style.display = selected.includes(row.dataset.field) ? "table-row" : "none";
            });
        });

        // Full-Screen Toggle for Image
        const image = document.getElementById("materialImage");

        image.addEventListener("click", function() {
            if (image.classList.contains("full-screen")) {
                image.classList.remove("full-screen");
                image.style.width = "30%"; // Reset size to the original
                image.style.height = "30vh"; // Reset height to the original
            } else {
                image.classList.add("full-screen");
                image.style.width = "100vw"; // Full width of the screen
                image.style.height = "100vh"; // Full height of the screen
                image.style.objectFit = "contain"; // Maintain aspect ratio
            }
        });
    });
</script>

<style>
    /* Full screen class for image toggle */
    .full-screen {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        object-fit: contain;
    }
</style>
