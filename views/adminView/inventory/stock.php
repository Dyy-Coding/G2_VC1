<!-- Inline Styles -->
<style>
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
</style>

<div class="container mt-3 card" style="width: 95%; padding: 20px;">
    <div class="d-flex justify-content-between mb-1">
        <div>
            <h1>All Materials</h1>
            <p>Sand, Pebble, Cement,...</p>
        </div>
        <div>
            <button class="btn btn-primary me-2" id="btn-add">+ New Material</button>
            <button class="btn btn-secondary">Import</button>
            <button class="btn btn-secondary">Export</button>
        </div>
    </div>

    <?php if (isset($flash_message)): ?>
        <div class="alert alert-<?= $flash_message['type'] ?>"><?= $flash_message['message'] ?></div>
    <?php endif; ?>

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
                    <tr>
                        <td><input type="checkbox"></td>
                        <td class="td-product">
                            <img src="<?= htmlspecialchars($material['ImagePath'] ?? '/default.jpg') ?>" 
                                 alt="Material Image" width="40" height="40" 
                                 style="object-fit: cover; border-radius: 5px; margin-right: 10px;">
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
                        <td><?= htmlspecialchars($material['UnitPrice']) ?></td>
                        <td class="dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size:34px;">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="/editmaterial/<?= $material['MaterialID'] ?>" class="dropdown-item text-primary d-flex align-items-center">
                                    <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                </a></li>
                                <li><a href="/materials/delete/<?= $material['MaterialID'] ?>" class="dropdown-item text-danger d-flex align-items-center"
                                       onclick="return confirm('Are you sure?');">
                                    <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                </a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">No materials found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Overlay Background -->
<div id="overlay"></div>

<!-- Add Material Form -->
<div class="form-container card addMeterial" id="addMeterial">
    <h2 class="text-center mb-4">Add New Material</h2>
    <form method="POST" action="/materials/add" enctype="multipart/form-data">
        <div class="form-add-meterial">
            <div class="form-left">
                <div class="mb-3">
                    <label for="name" class="form-label">Material Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter material name">
                </div>
                <div class="mb-3">
                    <label for="categoryID" class="form-label">Category</label>
                    <select class="form-select" id="categoryID" name="categoryID" required>
                        <option value="" selected>Select Category</option>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['CategoryID']) ?>">
                                    <?= htmlspecialchars($category['CategoryName']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No categories available</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="supplierID" class="form-label">Supplier</label>
                    <select class="form-select" id="supplierID" name="supplierID" required>
                        <option value="" selected>Select Supplier</option>
                        <?php if (!empty($suppliers)): ?>
                            <?php foreach ($suppliers as $supplier): ?>
                                <option value="<?= htmlspecialchars($supplier['SupplierID']) ?>">
                                    <?= htmlspecialchars($supplier['Name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No suppliers available</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required min="0" placeholder="Enter quantity">
                </div>
            </div>
            <div class="form-right">
                <div class="mb-3">
                    <label for="unitPrice" class="form-label">Unit Price</label>
                    <input type="number" class="form-control" id="unitPrice" name="unitPrice" step="0.01" required min="0" placeholder="Enter unit price">
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label">Type or Size</label>
                    <input type="text" class="form-control" id="size" name="size" placeholder="Enter size or type">
                </div>
                <div class="mb-3">
                    <label for="reorderLevel" class="form-label">Reorder Level</label>
                    <input type="number" class="form-control" id="reorderLevel" name="reorderLevel" min="0" placeholder="Enter reorder level">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    <p class="text-muted">Accepted formats: jpg, png, gif</p>
                </div>
                <div class="mb-3 text-center">
                    <img id="preview" class="img-thumbnail" src="#" alt="Image Preview">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" id="btn-add-material">Add Material</button>
        <button type="button" class="btn btn-secondary w-100 mt-2" id="btn-cancel">Cancel</button>
    </form>
</div>

<!-- Inline Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addMaterialForm = document.getElementById("addMeterial");
        const overlay = document.getElementById("overlay");

        document.getElementById("btn-add").addEventListener("click", function () {
            addMaterialForm.style.display = "block";
            overlay.style.display = "block";
        });

        document.getElementById("btn-cancel").addEventListener("click", function () {
            addMaterialForm.style.display = "none";
            overlay.style.display = "none";
        });

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
    });
</script>