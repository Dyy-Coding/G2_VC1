<div class="container mt-3 mb-3">
    <div class="card shadow border-0 rounded-4 overflow-hidden">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger m-3"><?= htmlspecialchars($error) ?></div>
        <?php else: ?>
            <!-- Back Button -->
            <div class="position-absolute top-0 end-0 m-3">
                <a href="/suppliers" class="btn btn-outline-primary px-3 py-2" title="Back to Supplier List">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            <div class="row g-0">
                <!-- Profile Sidebar -->
                <div class="col-md-4 bg-primary text-white text-center p-4 d-flex flex-column align-items-center">
                    <?php
                    $imagePath = !empty($supplier['image']) ? '/' . ltrim($supplier['image'], '/') : 'https://via.placeholder.com/120';
                    if ($imagePath !== 'https://via.placeholder.com/120' && !file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                        $imagePath = 'https://via.placeholder.com/120';
                    }
                    ?>
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="Profile Picture" 
                         class="rounded-circle border mb-3" style="width: 120px; height: 120px; object-fit: cover;">

                    <h2 class="h5 fw-bold mb-1"><?= htmlspecialchars($supplier['Name'] ?? 'Unknown Supplier') ?></h2>
                    <p class="mb-3"><?= htmlspecialchars($supplier['ContactPerson'] ?? 'N/A') ?></p>

                    <div>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>
                            <a href="tel:<?= htmlspecialchars($supplier['Phone'] ?? '') ?>" class="text-white text-decoration-none">
                                <?= htmlspecialchars($supplier['Phone'] ?? 'N/A') ?>
                            </a>
                        </p>
                        <p><i class="fas fa-envelope me-2"></i>
                            <a href="mailto:<?= htmlspecialchars($supplier['Email'] ?? '') ?>" class="text-white text-decoration-none">
                                <?= htmlspecialchars($supplier['Email'] ?? 'N/A') ?>
                            </a>
                        </p>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="https://linkedin.com" class="btn btn-light btn-sm" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://facebook.com" class="btn btn-light btn-sm" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="mailto:<?= htmlspecialchars($supplier['Email'] ?? '') ?>" class="btn btn-light btn-sm">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                <!-- Detail Section -->
                <div class="col-md-8 p-4">
                    <h4 class="fw-bold mb-4 text-primary">Supplier Profile Details</h4>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Supplier Name</p>
                            <p class="text-muted"><?= htmlspecialchars($supplier['Name'] ?? 'N/A') ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Category</p>
                            <p class="text-muted"><?= htmlspecialchars($supplier['CategoryName'] ?? $supplier['CategoryID'] ?? 'N/A') ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Contact Person</p>
                            <p class="text-muted"><?= htmlspecialchars($supplier['ContactPerson'] ?? 'N/A') ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Phone</p>
                            <p class="text-muted"><?= htmlspecialchars($supplier['Phone'] ?? 'N/A') ?></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold mb-1">Address</p>
                        <p class="text-muted"><?= htmlspecialchars($supplier['Address'] ?? 'N/A') ?></p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Created At</p>
                            <p class="text-muted"><?= date('F j, Y', strtotime($supplier['CreatedAt'])) ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Updated At</p>
                            <p class="text-muted"><?= date('F j, Y', strtotime($supplier['UpdatedAt'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
