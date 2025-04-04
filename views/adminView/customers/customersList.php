<div class="container mt-3 card" style="width: 95%; padding: 30px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Customer List</h1>
            <p class="text-muted mb-2">All customers in the system.</p>
        </div>
    </div>
    <div class="container d-flex align-items-center justify-content-between mb-4">
        <div class="ms-2" style="width: 400px;">
            <input type="search" id="search" class="form-control" placeholder="Search Customer" />
        </div>
    </div>

    <!-- Table Wrapper with Hidden Scrollbar -->
    <div style="overflow-x: auto; max-height: 500px; -ms-overflow-style: none; scrollbar-width: none;">
        <style>
            /* Hide scrollbar for Chrome, Safari and Edge */
            div::-webkit-scrollbar {
                display: none;
            }
        </style>

        <table class="table text-center align-middle" id="customerTable">
            <thead>
                <tr>
                    <th class="w-small">Profile</th>
                    <th class="w-medium">First Name</th>
                    <th class="w-medium">Last Name</th>
                    <th class="w-medium">Email</th>
                    <th class="w-small">Phone</th>
                    <th class="w-large">Location</th>
                    <th class="w-large">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($customers)): ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <?php if (!empty($customer['profile_image']) && $customer['profile_image'] !== 'default_value'): ?>
                                        <?php
                                        $image_path = htmlspecialchars($customer['profile_image']);
                                        $full_server_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $image_path;
                                        if (!file_exists($full_server_path)) {
                                            error_log("Profile image not found on server for user {$customer['user_id']}: " . $full_server_path);
                                        } else {
                                            error_log("Profile image found for user {$customer['user_id']}: " . $image_path);
                                        }
                                        ?>
                                        <img src="/<?php echo $image_path; ?>" alt="Profile Image" class="rounded-circle"
                                            style="width: 30px; height: 30px;"
                                            onerror="this.onerror=null; this.parentNode.innerHTML='<i class=\material-icons ms-3\ style=\font-size: 36px;\>account_circle</i>';">
                                    <?php else: ?>
                                        <?php error_log("No profile image for user {$customer['user_id']}: profile_image is " . ($customer['profile_image'] ?? 'null')); ?>
                                        <i class="material-icons" style="font-size: 40px;">account_circle</i>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><strong><?php echo htmlspecialchars($customer['first_name']); ?></strong></td>
                            <td><?php echo htmlspecialchars($customer['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($customer['email']); ?></td>
                            <td><?php echo htmlspecialchars($customer['phone']); ?></td>
                            <td><?php echo htmlspecialchars($customer['street_address']); ?></td>
                            <td class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons" style="font-size:34px;">more_vert</i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a href="/edit/customer?user_id=<?php echo htmlspecialchars($customer['user_id']); ?>"
                                            class="dropdown-item text-primary d-flex align-items-center">
                                            <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/delete/customer?user_id=<?php echo htmlspecialchars($customer['user_id']); ?>"
                                            class="dropdown-item text-danger d-flex align-items-center"
                                            onclick="return confirm('Are you sure you want to delete this customer? This action cannot be undone.');">
                                            <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/customer/detail?user_id=<?php echo htmlspecialchars($customer['user_id']); ?>"
                                            class="dropdown-item d-flex align-items-center">
                                            <i class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No customers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
