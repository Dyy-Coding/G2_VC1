<div class="container mt-4 card mb-4" style="width: 95%; padding: 25px;">
    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="container">
            <h3 class="mb-4 mt-4">Update Supplier Info</h3>
            <form action="/supplier/update/<?= $supplier['SupplierID'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="existing_image" value="<?= htmlspecialchars($supplier['image'] ?? '') ?>">

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label for="contact-person" class="form-label">Contact Person *</label>
                        <input type="text" id="contact-person" name="contact_person" class="form-control" 
                               value="<?= htmlspecialchars($supplier['ContactPerson'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="supplier-name" class="form-label">Supplier Name *</label>
                        <input type="text" id="supplier-name" name="supplier_name" class="form-control" 
                               value="<?= htmlspecialchars($supplier['Name'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" 
                               value="<?= htmlspecialchars($supplier['Email'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="tel" id="phone" name="phone" class="form-control" 
                               value="<?= htmlspecialchars($supplier['Phone'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category *</label>
                        <select id="category" name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['CategoryID'] ?>" 
                                    <?= $category['CategoryID'] == $supplier['CategoryID'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['CategoryName']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address (Optional)</label>
                        <textarea id="address" name="address" class="form-control" rows="2"><?= htmlspecialchars($supplier['Address'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Current Profile Image</label>
                        <div>
                            <?php if (!empty($supplier['image'])): ?>
                                <img src="/<?= htmlspecialchars($supplier['image']) ?>" alt="Profile" 
                                     style="width: 100px; height: 100px; object-fit: cover;">
                            <?php else: ?>
                                <span>No Image</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="profile-supplier" class="form-label">Upload New Profile Image (Optional)</label>
                        <input type="file" id="profile-supplier" name="profile_supplier" class="form-control" accept="image/*">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Supplier</button>
                <a href="/suppliers" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>