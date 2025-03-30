<div class="container mt-4 card mb-4" style="width: 95%; padding: 25px;">
    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="container">
            <h3 class="mb-4 mt-4">Edit User Info</h3>

            <!-- Display error or success messages if present -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= htmlspecialchars($_GET['success']) ?>
                </div>
            <?php endif; ?>

            <form action="/storeupdate" method="POST" enctype="multipart/form-data">
                <!-- Hidden input for user_id -->
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id'] ?? '') ?>">

                <!-- Profile Image -->
                <div class="form-group mb-3">
                    <label for="profile" class="form-label">Select Image (Optional):</label>
                    <input type="file" name="profile" id="profile" class="form-control"
                        accept="image/jpeg,image/png,image/gif">
                    <!-- Hidden input for old profile image -->
                    <input type="hidden" name="old_profile"
                        value="<?= htmlspecialchars($user['profile_image'] ?? '') ?>">
                    <?php if (!empty($user['profile_image'])): ?>
                        <div class="mt-2">
                            <p>Current Image:</p>
                            <img src="/Images/<?= htmlspecialchars($user['profile_image']) ?>" alt="Profile Image"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- First Name and Last Name -->
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first-name" class="form-label">First Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="first-name" name="first_name" class="form-control"
                                value="<?= htmlspecialchars($user['first_name'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last-name" class="form-label">Last Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="last-name" name="last_name" class="form-control"
                                value="<?= htmlspecialchars($user['last_name'] ?? '') ?>" required>
                        </div>
                    </div>
                </div>
                

                <!-- Email and Password -->
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password (Leave blank to keep current)</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter new password">
                            <!-- Hidden input for old password -->
                            <input type="hidden" name="old_password"
                                value="<?= htmlspecialchars($user['password'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <!-- Phone Number and Role -->
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control"
                                value="<?= htmlspecialchars($user['phone'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                            <select id="role" name="role_id" class="form-control" required>
                                <?php foreach ($roles as $role): ?>
                                    <?php if ($role['role_id'] != 1): ?>
                                        <option value="<?= htmlspecialchars($role['role_id']) ?>"
                                            <?= ($user['role_id'] == $role['role_id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($role['role_name']) ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Address and Street Address -->
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="form-label">Address (Optional):</label>
                            <input type="text" id="address" name="address" class="form-control"
                                value="<?= htmlspecialchars($user['address'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street" class="form-label">Street (Optional):</label>
                            <input type="text" id="street" name="street_address" class="form-control"
                                value="<?= htmlspecialchars($user['street_address'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    <a href="/userList" class="btn btn-secondary mt-3">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>