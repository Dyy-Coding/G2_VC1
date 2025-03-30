<div class="container mt-3 mb-3">
    <div class="card shadow border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-4 bg-primary text-white text-center p-4 d-flex flex-column align-items-center">
                <img src="<?php
                $imagePath = !empty($admin['profile_image']) ? '/' . ltrim($admin['profile_image'], '/') : 'https://via.placeholder.com/120';
                if ($imagePath !== 'https://via.placeholder.com/120' && !file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                    $imagePath = 'https://via.placeholder.com/120';
                }
                echo htmlspecialchars($imagePath);
                ?>" alt="Profile Picture" class="rounded-circle border mb-3"
                    style="width: 120px; height: 120px; object-fit: cover;">
                <h2 class="h5 fw-bold">
                    <?php echo htmlspecialchars($admin['first_name'] ?? 'Unknown'); ?>
                </h2>
                <p class="text-light"><i class="fas fa-shield-alt"></i>
                    <?php echo htmlspecialchars($admin['role_name'] ?? 'Admin'); ?></p>
                <div class="mt-3">
                    <p><i class="fas fa-phone"></i> <?php echo htmlspecialchars($admin['phone'] ?? 'Not Provided'); ?>
                    </p>
                    <p><i class="fas fa-envelope"></i>
                        <?php echo htmlspecialchars($admin['email'] ?? 'Not Provided'); ?></p>
                </div>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-light btn-sm"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="btn btn-light btn-sm"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-light btn-sm"><i class="fab fa-github"></i></a>
                    <a href="#" class="btn btn-light btn-sm"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
            <div class="col-md-8 p-4">
                <h4 class="fw-bold mb-3 text-primary">Profile Details</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Department</p>
                        <p class="text-muted">Research and Development</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Available</p>
                        <p class="text-muted">Yes</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">First Name</p>
                        <p class="text-muted"><?php echo htmlspecialchars($admin['first_name'] ?? 'Not Provided'); ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Last Name</p>
                        <p class="text-muted"><?php echo htmlspecialchars($admin['last_name'] ?? 'Not Provided'); ?></p>
                    </div>
                </div>
                <p class="fw-bold mb-1">Address</p>
                <p class="text-muted">
                    <?php echo htmlspecialchars(($admin['address'] ?? '') . ' ' . ($admin['street_address'] ?? '')) ?: 'Not Provided'; ?>
                </p>
                <p class="fw-bold mb-1 mt-3">Role Description</p>
                <p class="text-muted">
                    <?php echo htmlspecialchars($admin['role_description'] ?? 'Has full access to the system, can manage all data.'); ?>
                </p>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Created At</p>
                        <p class="text-muted"><?php echo htmlspecialchars($admin['created_at'] ?? 'Not Provided'); ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Updated At</p>
                        <p class="text-muted"><?php echo htmlspecialchars($admin['updated_at'] ?? 'Not Provided'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>