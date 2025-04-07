<div class="container mt-3 card" style="width: 95%; padding: 25px;">
    <!-- Success/Error Messages -->
    <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="successAlert">
        <span id="successMessage">Operation completed successfully!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="errorAlert">
        <span id="errorMessage">Something went wrong.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Sale Order</h1>
            <p class="text-muted mb-0">All sale orders in the system.</p>
        </div>
    </div>

    <div class="container d-flex justify-content-end mb-3">
        <div style="width: 400px">
            <input type="search" id="search" class="form-control" placeholder="Search Order" />
        </div>
    </div>

    <table class="table text-center align-middle" id="orderTable">
        <thead>
            <tr>
                <th class="w-small">Profile</th>
                <th class="w-medium">Customer Name</th>
                <th class="w-large">Material Name</th>
                <th class="w-small">Quantity</th>
                <th class="w-medium">Order Date</th>
                <th class="w-medium">Total Price</th>
                <th class="w-medium">Phone Number</th>
                <th class="w-large">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            <tr>
                <td>
                    <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td><strong>John Doe</strong></td>
                <td>Steel Rod</td>
                <td>10</td>
                <td>Apr 07, 2025</td>
                <td>$200.00</td>
                <td>012345678</td>
                <td class="dropdown">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons" style="font-size:34px;">more_vert</i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a href="#" class="dropdown-item text-primary d-flex align-items-center">
                                <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item text-danger d-flex align-items-center"
                               onclick="return confirm('Are you sure you want to delete this order?');">
                                <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <i class="material-icons me-2" style="font-size:18px;">visibility</i> View Details
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
            <!-- End example -->
        </tbody>
    </table>
</div>
