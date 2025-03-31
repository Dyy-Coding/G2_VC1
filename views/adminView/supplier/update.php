<div class="container mt-4 card mb-4" style="width: 95%; padding: 25px;">
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="container">
            <h3 class="mb-4 mt-4">Update Supplier Info</h3>
            <form action="/supplier/update/<?= $supplier['SupplierID'] ?>" method="POST">
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Contact Person <span class="text-danger">*</span></label>
                        <input type="text" name="contact_person" class="form-control" 
                               value="<?= htmlspecialchars($supplier['ContactPerson'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Supplier Name <span class="text-danger">*</span></label>
                        <input type="text" name="supplier_name" class="form-control" 
                               value="<?= htmlspecialchars($supplier['Name'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" 
                               value="<?= htmlspecialchars($supplier['Email'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control" 
                               value="<?= htmlspecialchars($supplier['Phone'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['CategoryID'] ?>"
                                    <?= ($cat['CategoryID'] == ($supplier['CategoryID'] ?? '')) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['CategoryName']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="2"><?= htmlspecialchars($supplier['Address'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update Supplier</button>
                    <a href="/suppliers" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>