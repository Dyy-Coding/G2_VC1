<div class="container mt-4 card shadow-lg" style="width: 95%; padding: 25px;">
    <h3 class="text-primary mt-4 mb-4">User Details</h3>
    <?php if (isset($user) && is_array($user) && !empty($user)): ?>
        <table class="table table-striped table-hover table-bordered align-middle">
            <tbody>
                <tr>
                    <th class="text-start" style="width: 20%;​">Profile</th>
                    <td class="text-center">
                        <img src="<?= !empty($user['profile_image']) ? htmlspecialchars($user['profile_image']) : 'views/assets/img/team-2.jpg' ?>"
                            alt="Profile Image" class="rounded-circle border"
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                </tr>
                <tr>
                    <th class="text-start">First Name</th>
                    <td><?= htmlspecialchars($user['first_name'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Last Name</th>
                    <td><?= htmlspecialchars($user['last_name'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Email</th>
                    <td><?= htmlspecialchars($user['email'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Phone Number</th>
                    <td><?= htmlspecialchars($user['phone'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Role</th>
                    <td><?= htmlspecialchars($user['role_id'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Address</th>
                    <td><?= htmlspecialchars($user['address'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Street</th>
                    <td><?= htmlspecialchars($user['street_address'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Created At</th>
                    <td><?= htmlspecialchars($user['created_at'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th class="text-start">Updated At</th>
                    <td><?= htmlspecialchars($user['updated_at'] ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-danger text-center">
            User data not available.
        </div>
    <?php endif; ?>
    <a href="userList" class="btn btn-secondary mt-3">Back to User List</a>
</div>