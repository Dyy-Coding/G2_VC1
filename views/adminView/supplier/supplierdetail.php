<div class="container mt-3 mb-3">
    <div class="card shadow border-0 rounded-4 overflow-hidden">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php else: ?>
            <div class="position-absolute top-0 end-2 m-3 d-flex gap-2 align-items-center">
                <!-- Back Button -->
                <a href="/suppliers" class="btn btn-outline-primary px-3 py-2" title="Back to Supplier List">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            <div class="row g-0">
                <!-- Supplier Profile Section -->
                <div class="col-md-4 bg-primary text-white text-center p-4 d-flex flex-column align-items-center">
                    <img src="<?php
                    $imagePath = !empty($supplier['profile_supplier']) ? '/' . ltrim($supplier['profile_supplier'], '/') : 'https://via.placeholder.com/120';
                    if ($imagePath !== 'https://via.placeholder.com/120' && !file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                        $imagePath = 'https://via.placeholder.com/120';
                    }
                    echo htmlspecialchars($imagePath);
                    ?>" alt="Profile Picture" class="rounded-circle border mb-3"
                        style="width: 120px; height: 120px; object-fit: cover;">

                    <h2 class="h5 fw-bold">
                        <?= htmlspecialchars($supplier['Name'] ?? 'Unknown Supplier') ?>
                    </h2>

                    <p class="text-light">
                        <?= htmlspecialchars($supplier['ContactPerson'] ?? 'N/A') ?>
                    </p>

                    <div class="mt-3">
                        <p>
                            <i class="fas fa-phone"></i>
                            <a href="tel:<?= htmlspecialchars($supplier['Phone'] ?? '') ?>" class="text-white">
                                <?= htmlspecialchars($supplier['Phone'] ?? 'N/A') ?>
                            </a>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?= htmlspecialchars($supplier['Email'] ?? '') ?>" class="text-white">
                                <?= htmlspecialchars($supplier['Email'] ?? 'N/A') ?>
                            </a>
                        </p>
                    </div>

                    <!-- Social Media Links -->
                    <div class="d-flex gap-2">
                        <a href="https://linkedin.com" class="btn btn-light btn-sm">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://facebook.com" class="btn btn-light btn-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="mailto:<?= htmlspecialchars($supplier['Email'] ?? '') ?>" class="btn btn-light btn-sm">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                <!-- Supplier Details Section -->
                <div class="col-md-8 p-4">
                    <h4 class="fw-bold mb-3 text-primary">Profile Details</h4>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Supplier Name</p>
                            <p class="text-muted"><?= htmlspecialchars($supplier['Name'] ?? 'N/A') ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold mb-1">Category</p>
                            <p class="text-muted">
                                <?= htmlspecialchars($supplier['CategoryName'] ?? $supplier['CategoryID'] ?? 'N/A') ?>
                            </p>
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

                    <p class="fw-bold mb-1">Address</p>
                    <p class="text-muted"><?= htmlspecialchars($supplier['Address'] ?? 'N/A') ?></p>

                    <div class="row mt-3">
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