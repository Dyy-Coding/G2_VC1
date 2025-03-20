<div class="container mt-4 card" style="width: 95%; padding: 25px;">
    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="container">
            <h3 class="mb-4 mt-4">Enter User Info</h3>
            <form action="/user/store" method="POST">

                <div class="form-group">
                    <label for="" class="form-label">Select image:</label>
                    <input type="file" name="profile" class="form-control">
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" id="first-name" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" id="last-name" name="last_name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Email:</label>
                            <input type="email" value="" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Password:</label>
                            <input type="password" value="" name="password" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" id="role" name="role" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" id="street" name="street" class="form-control">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add User</button>
            </form>
        </div>
    </div>
</div>