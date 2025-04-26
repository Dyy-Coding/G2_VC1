<!-- Styles (no changes needed here except class correction if any) -->
<style>
    /* Improved styling for readability */
    #addMeterial {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        width: 90%;
        max-width: 700px;
    }

    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    #preview {
        width: 100%;
        max-width: 150px;
        height: auto;
        object-fit: cover;
        border-radius: 10px;
        display: none;
        margin-top: 10px;
    }

    .form-add-meterial {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .form-left, .form-right {
        width: 100%;
    }

    @media (min-width: 768px) {
        .form-left, .form-right {
            width: 48%;
        }
    }

    .form-outline {
        width: 100%;
    }

    /* Material-specific classes */
    .material-discount {
        background-color: #f9f9f9; /* Light background for discounted items */
    }

    .material-discount .text-danger {
        font-weight: bold;
    }
</style>

<!-- Main Container -->
<div class="container mt-3 card" style="width: 95%; padding: 20px;">
    <div class="d-flex justify-content-between mb-1">
        <div>
            <h1>All materials</h1>
            <p>Sand, Pebble, Cement,.....</p>
        </div>
        <div>
             <!-- Import & Export Section -->
             <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4 gap-3">
             <button class="btn btn-primary me-2" id="btn-add">+ New Material</button>
                <!-- Import -->
                <div>
                    <button class="btn btn-success mb-2" type="button" onclick="toggleImportForm()">Import Materials</button>
                    <form id="importForm" action="/materials/import" method="POST" enctype="multipart/form-data" style="display: none;" class="mt-2">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="importFile" accept=".xlsx, .xls, .csv" required>
                                <small class="text-muted">Accepted formats: .xlsx, .xls, .csv</small>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success w-100">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Export
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                        <!-- Export to Excel -->
                        <li>
                            <form method="POST" action="/materials/export/excel">
                                <button class="dropdown-item" type="submit">
                                    Export to Excel
                                </button>
                            </form>
                        </li>
                        <!-- Export to Word -->
                        <li>
                            <form method="POST" action="/materials/export/word">
                                <button class="dropdown-item" type="submit">
                                    Export to Word
                                </button>
                            </form>
                        </li>
                        <!-- Export to PDF -->
                        <li>
                            <form method="POST" action="/materials/export/pdf">
                                <button class="dropdown-item" type="submit">
                                    Export to PDF
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>



            </div>

            <script>
                function toggleImportForm() {
                    const form = document.getElementById('importForm');
                    form.style.display = form.style.display === 'none' ? 'block' : 'none';
                }
            </script>

        </div>
    </div>

    

    <!-- Form for bulk deletion -->
    <form action="/materials/deleteSelectedMaterials" method="POST">
        <div class="input-group-meterails mt-2 mb-0">
            <div class="inline-controls-meterails">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="show-out-of-stock-checkbox" name="show_out_of_stock"
                        <?= isset($_GET['show_out_of_stock']) && $_GET['show_out_of_stock'] == 'true' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="show-out-of-stock-checkbox">Show out of stock</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label" for="selectAll">Select all</label>
                    <button type="submit" class="btn btn-danger me-2" id="btn-delete-selected" style="width: 150px; height: 40px;" disabled>Delete Selected</button>
                </div>
            </div>
            <div class="form-outline">
                <input type="search" id="search" class="form-control" style="width:100%" placeholder="Search materials" />
            </div>
        </div>

        <!-- Table of materials -->
        <table class="table text-center align-middle" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th>Select</th>
                    <th style="width: 18%;">Product</th>
                    <th style="width: 25%;">Category</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Type or Size</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($materials)): ?>
                    <?php foreach ($materials as $material): ?>
                        <tr class="<?= !empty($material['DiscountPrice']) ? 'material-discount' : '' ?>">
                            <td>
                                <input type="checkbox" class="select-material" name="materialIDs[]" value="<?= htmlspecialchars($material['MaterialID']) ?>">
                            </td>
                            <td class="td-product d-flex align-items-center">
                                <img src="<?= htmlspecialchars($material['ImagePath']) ?>" alt="Material Image" width="40" height="40" class="me-2" style="object-fit: cover; border-radius: 5px;">
                                <span><?= htmlspecialchars($material['Name']) ?></span>
                            </td>
                            <td><?= htmlspecialchars($material['CategoryName']) ?></td>
                            <td><?= htmlspecialchars($material['Quantity']) ?></td>
                            <td>
                                <?php if ($material['Quantity'] == 0): ?>
                                    <span class="badge bg-danger">OUT OF STOCK</span>
                                <?php elseif ($material['Quantity'] < 15): ?>
                                    <span class="badge bg-warning text-dark">LOW STOCK</span>
                                <?php else: ?>
                                    <span class="badge bg-success">HIGH STOCK</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($material['Size']) ?></td>
                            <td>
                                <?php if (!empty($material['DiscountPrice'])): ?>
                                    <span class="text-danger"><?= htmlspecialchars($material['DiscountPrice']) ?> $</span> 
                                    <span class="text-muted"><?= htmlspecialchars($material['UnitPrice']) ?> $</span>
                                <?php else: ?>
                                    <?= htmlspecialchars($material['UnitPrice']) ?> $
                                <?php endif; ?>
                            </td>
                            <td class="dropdown">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons" style="font-size:34px;">more_vert</i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a href="/materials/edit/<?= htmlspecialchars($material['MaterialID']) ?>" class="dropdown-item text-primary d-flex align-items-center">
                                            <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/materials/delete/<?= htmlspecialchars($material['MaterialID']) ?>" class="dropdown-item text-danger d-flex align-items-center" onclick="return confirm('Are you sure?');">
                                            <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/materials/view/<?= htmlspecialchars($material['MaterialID']) ?>" class="dropdown-item d-flex align-items-center">
                                            <i class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No materials found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
</div>

<!-- Overlay -->
<div id="overlay"></div>

<!-- Add Material Form -->
<div class="form-container card" id="addMeterial">
    <!-- Form content remains unchanged -->
    <h2 class="text-center mb-4">Add New Material</h2>
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
                            <option value="<?= htmlspecialchars($category['CategoryID']) ?>">
                                <?= htmlspecialchars($category['CategoryName']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Supplier Dropdown -->
                <div class="mb-3">
                    <label for="supplierID" class="form-label">Supplier</label>
                    <select class="form-select" id="supplierID" name="supplierID" required>
                        <option value="" selected>Select Supplier</option>
                        <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?= $supplier['SupplierID']; ?>"><?= htmlspecialchars($supplier['Name']); ?></option>
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
                <!-- Unit Price -->
                <div class="mb-3">
                    <label for="unitPrice" class="form-label">Unit Price</label>
                    <input type="number" class="form-control" id="unitPrice" name="unitPrice" step="0.01" required min="0" placeholder="Enter unit price">
                </div>

                <!-- Minimum Stock Level -->
                <div class="mb-3">
                    <label for="size" class="form-label">Type or Size</label>
                    <input type="text" class="form-control" id="size" name="size" required min="0" placeholder="Enter size or type">
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
                    <p class="text-muted">Accepted formats: jpg, png, gif</p>
                </div>

                <!-- Image Preview -->
                <div class="mb-3 text-center">
                    <img id="preview" class="img-thumbnail" src="#" alt="Image Preview">
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary w-100" id="btn-add-material">Add Material</button>
        <button type="button" class="btn btn-secondary w-100 mt-2" id="btn-cancel">Cancel</button>
    </form>
</div>

<script src="views/assets/js/inventory/material.js"></script>


