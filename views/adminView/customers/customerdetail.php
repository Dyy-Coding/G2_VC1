<div class="container mt-3 mb-3">
    <div class="card shadow border-0 rounded-4 overflow-hidden">
        <div class="position-absolute top-0 end-2 m-3 d-flex gap-2 align-items-center">
            <a href="/customers" class="btn btn-outline-primary px-3 py-2" title="Back to Customer List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div class="row g-0">
            <div class="col-md-4 bg-primary text-white text-center p-4 d-flex flex-column align-items-center">
                <div class="rounded-circle border d-flex align-items-center justify-content-center"
                    style="width: 120px; height: 120px; background-color: white; overflow: hidden;">
                    <?php if (!empty($customer['profile_image'])): ?>
                        <img src="/<?php echo htmlspecialchars($customer['profile_image']); ?>" 
                             alt="Profile Image" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <i class="fas fa-user text-primary" style="font-size: 60px;"></i>
                    <?php endif; ?>
                </div>
                <h2 class="h5 fw-bold mt-3">
                    <?php echo htmlspecialchars($customer['first_name'] . ' ' . $customer['last_name']); ?>
                </h2>
                <p class="text-light"><?php echo htmlspecialchars($customer['role_name']); ?></p>
                <div class="mt-3">
                    <p><i class="fas fa-phone"></i> 
                        <a href="tel:<?php echo htmlspecialchars($customer['phone']); ?>" class="text-white">
                            <?php echo htmlspecialchars($customer['phone']); ?>
                        </a>
                    </p>
                    <p><i class="fas fa-envelope"></i> 
                        <a href="mailto:<?php echo htmlspecialchars($customer['email']); ?>" class="text-white">
                            <?php echo htmlspecialchars($customer['email']); ?>
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-md-8 p-4">
                <h4 class="fw-bold mb-3 text-primary">Customer Details</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Full Name</p>
                        <p class="text-muted">
                            <?php echo htmlspecialchars($customer['first_name'] . ' ' . $customer['last_name']); ?>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Email</p>
                        <p class="text-muted"><?php echo htmlspecialchars($customer['email']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Phone</p>
                        <p class="text-muted"><?php echo htmlspecialchars($customer['phone']); ?></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <p class="fw-bold mb-1">Address</p>
                        <p class="text-muted"><?php echo htmlspecialchars($customer['street_address']); ?></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Account Created</p>
                        <p class="text-muted">
                            <?php echo !empty($customer['created_at']) ? date('M d, Y H:i', strtotime($customer['created_at'])) : 'N/A'; ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Last Updated</p>
                        <p class="text-muted">
                            <?php echo !empty($customer['updated_at']) ? date('M d, Y H:i', strtotime($customer['updated_at'])) : 'N/A'; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>