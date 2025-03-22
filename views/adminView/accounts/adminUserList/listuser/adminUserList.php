<div class="container mt-4 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">User List</h1>
            <p class="text-muted mb-0">All users in the system.</p>
        </div>
        <div>
            <a href="createuser" class="btn btn-primary">+ Add New</a>
            <button class="btn btn-primary me-2">Edit</button>
            <button class="btn btn-danger">Delete</button>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="me-3 d-flex align-items-center">
            <input type="checkbox" name="selectAll" id="selectAll"
                style="width: 30px; position: relative; bottom: 4px;">
            <label class="form-check-label" for="selectAll">Select All</label>
        </div>
        <div class="ms-2" style="width: 400px">
            <input type="search" id="search" class="form-control" placeholder="Search" />
        </div>
    </div>

    <table class="table text-center align-middle">
        <thead>
            <tr>
                <th class="w-small">Select</th>
                <th class="w-small">Profile</th>
                <th class="w-medium">First Name</th>
                <th class="w-large">Last Name</th>
                <th class="w-large">Email</th>
                <th class="w-large">Phone Number</th>
                <th class="w-large">Role</th>
                <th class="w-large">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><input type="checkbox" name="userCheckbox[]" value="<?= htmlspecialchars($user['user_id'] ?? '') ?>"></td>
                    <td>
                        <img src="<?= !empty($user['profile_image']) ? htmlspecialchars($user['profile_image']) : 'views/assets/img/team-2.jpg' ?>"
                            alt="Profile Image" style="width: 30px; height: 30px; object-fit: cover;">
                    </td>
                    <td><?= htmlspecialchars($user['first_name'] ?? 'N/A'); ?></td>
                    <td><?= htmlspecialchars($user['last_name'] ?? 'N/A'); ?></td>
                    <td><?= htmlspecialchars($user['email'] ?? 'N/A'); ?></td>
                    <td><?= htmlspecialchars($user['phone'] ?? 'N/A'); ?></td>
                    <td><?= htmlspecialchars($user['role_id'] ?? 'N/A'); ?></td>
                    <td><a href="userdetail?id=<?= htmlspecialchars($user['user_id'] ?? '') ?>" class="btn btn-warning">View</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>