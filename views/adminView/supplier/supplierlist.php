<div class="container mt-3 mb-4 card shadow-sm" style="width: 95%; padding: 25px;">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Suppliers Information</h1>
            <p class="text-muted mb-0">Supplier and Contact Details</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="/add/supplier" class="btn btn-primary d-flex align-items-center"
                style="height: 40px; padding: 8px 16px; font-size: 16px;">
                <i class="fa fa-plus-circle me-2" style="font-size: 18px;"></i> Add Supplier
            </a>
            <div class="dropdown">
                <button class="btn btn-outline-primary d-flex align-items-center"
                    style="height: 40px; padding: 8px 16px; font-size: 16px;" type="button" id="exportDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-download me-2" style="font-size: 18px;"></i> Export
                </button>
                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                    <li><a class="dropdown-item" href="/suppliers/export/excel">
                        <i class="material-icons me-2">insert_drive_file</i> Excel</a></li>
                    <li><a class="dropdown-item" href="/suppliers/export/pdf">
                        <i class="material-icons me-2">picture_as_pdf</i> PDF</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div style="max-width: 400px;">
            <input type="search" id="search" class="form-control" placeholder="Search Supplier">
        </div>
    </div>

    <!-- Suppliers Table -->
    <div style="overflow-x: auto; max-width: 100%; height: 400px; padding-right: 17px;">
        <table class="table table-hover text-center align-middle" id="supplierTable">
            <thead class="bg-light">
                <tr>
                    <th>Profile</th>
                    <th>Contact Person</th>
                    <th>Supplier Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td>
                            <?php if (!empty($supplier['image'])): ?>
                                <img src="/<?= htmlspecialchars($supplier['image']) ?>" alt="Profile"
                                    style="width: 30px; height: 30px; object-fit: cover;">
                            <?php else: ?>
                                <i class="fa fa-user-circle" style="font-size: 30px; color: #6c757d;"></i>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($supplier['ContactPerson']) ?></td>
                        <td><?= htmlspecialchars($supplier['Name']) ?></td>
                        <td><?= htmlspecialchars($supplier['Phone']) ?></td>
                        <td><?= htmlspecialchars($supplier['Email']) ?></td>
                        <td class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size: 34px;">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="/supplier/edit/<?= $supplier['SupplierID'] ?>"
                                        class="dropdown-item text-primary d-flex align-items-center">
                                        <i class="material-icons me-2">edit</i> Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="/supplier/delete/<?= $supplier['SupplierID'] ?>" method="POST">
                                        <button type="submit" class="dropdown-item text-danger d-flex align-items-center"
                                            onclick="return confirm('Are you sure you want to delete this supplier?');">
                                            <i class="material-icons me-2">delete</i> Delete
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <a href="/supplier/detail/<?= $supplier['SupplierID'] ?>" class="dropdown-item d-flex align-items-center">
                                        <i class="material-icons me-2">visibility</i> View
                                    </a>
                                </li>

                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Row for Top 5 Suppliers and Purchase Chart -->
<div class="row mt-4">

    <!-- Top 5 Suppliers with Purchase Orders -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm hover:shadow-lg transition-all duration-300 ease-in-out">
            <div class="card-header pb-0 p-3 bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-600 text-white">
                <h4 class="mb-2">Top 5 Suppliers with Purchase Orders</h4>
            </div>
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table align-items-center text-sm">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">Profile</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Total Orders</th>
                            <th class="text-center">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($topSupplier)): ?>
                            <?php foreach ($topSupplier as $supplier): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if (!empty($supplier['image'])): ?>
                                            <img src="<?= htmlspecialchars($supplier['image']) ?>" alt="Profile" 
                                                class="rounded-circle" style="width: 35px; height: 35px;">
                                        <?php else: ?>
                                            <span class="text-muted">N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?= htmlspecialchars($supplier['Name']) ?></td>
                                    <td class="text-center font-bold"><?= (int) $supplier['TotalOrders'] ?></td>
                                    <td class="text-center"><?= htmlspecialchars($supplier['UpdatedAt']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    No suppliers found with purchase orders.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Purchase Order Overview Chart -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Manage Purchase Order</h6>
            </div>
            <div class="card-body p-3">
                <div id="chart-container" style="position: relative; height: 400px;">
                    <canvas id="purchase-order-chart"></canvas>
                    <div id="loading-indicator"
                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
                        <div class="spinner"></div>
                        <p>Loading data...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
