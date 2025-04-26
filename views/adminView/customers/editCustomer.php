<div class="container mt-3 mb-4 card" style="width: 95%; padding: 30px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Edit Customer</h1>
            <p class="text-muted mb-2">Modify customer details.</p>
        </div>
    </div>

    <form action="/update/customer?user_id=<?php echo htmlspecialchars($customer['user_id']); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="profile" class="form-label">Select Image (Optional):</label>
            <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($customer['first_name']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($customer['last_name']); ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="street_address" value="<?php echo htmlspecialchars($customer['street_address']); ?>" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="/customers" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>