<div class="container mt-4 card mb-4" style="width: 95%; padding: 25px;">
    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="container">
            <h3 class="mb-4 mt-4">Enter User Info</h3>
            <form action="/userstore" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="profile" class="form-label">Select Image (Optional):</label>
                    <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first-name" class="form-label">First Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="first-name" name="first_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last-name" class="form-label">Last Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="last-name" name="last_name" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                            <select id="role" name="role" class="form-control" required>
                                <?php if (!empty($roles)): ?>
                                    <?php foreach ($roles as $role): ?>
                                        <?php if ($role['role_id'] != 1): ?>
                                            <option value="<?= htmlspecialchars($role['role_id']) ?>">
                                                <?= htmlspecialchars($role['role_name']) ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">No roles found</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="form-label">Address (Optional):</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street" class="form-label">Street (Optional):</label>
                            <input type="text" id="street" name="street" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add User</button>
                <a href="/userList" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>