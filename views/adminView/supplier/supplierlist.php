<div class="container mt-3 mb-4 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Suppliers Information</h1>
            <p class="text-muted mb-0">Supplier and Contact Details</p>
        </div>
        <div>
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
                        <li><a class="dropdown-item" href="/suppliers/export/excel"><i
                                    class="material-icons me-2">insert_drive_file</i> Excel</a></li>
                        <li><a class="dropdown-item" href="/suppliers/export/pdf"><i
                                    class="material-icons me-2">picture_as_pdf</i> PDF</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div style="max-width: 400px;">
            <input type="search" id="search" class="form-control" placeholder="Search Supplier" />
        </div>
    </div>

    <div style="overflow-x: auto; max-width: 100%; height: 400px; padding-right: 17px;">
        <table class="table text-center align-middle" id="supplierTable">
            <thead>
                <tr>
                    <th class="w-small">Profile</th>
                    <th class="w-medium">Contact Person</th>
                    <th class="w-small">Supplier Name</th>
                    <th class="w-large">Category</th>
                    <th class="w-large">Phone Number</th>
                    <th class="w-large">Email</th>
                    <th class="w-large">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td style="padding: 5px; text-align: center;">
                            <?php if (!empty($supplier['image'])): ?>
                                <img src="/<?= htmlspecialchars($supplier['image']) ?>" alt="Profile"
                                    style="width: 30px; height: 30px; object-fit: cover; margin-left: -5px;">
                            <?php else: ?>
                                <i class="fa fa-user-circle" style="font-size: 30px; color: #6c757d;"></i>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($supplier['ContactPerson']) ?></td>
                        <td><?= htmlspecialchars($supplier['Name']) ?></td>
                        <td><?= htmlspecialchars($supplier['CategoryName'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($supplier['Phone']) ?></td>
                        <td><?= htmlspecialchars($supplier['Email']) ?></td>
                        <td class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size:34px;">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink"
                                style="min-width: 160px;">
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
                                    <a href="/supplier/detail?id=<?= $supplier['SupplierID'] ?>"
                                        class="dropdown-item d-flex align-items-center">
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

<div class="row mt-4">

    <!-- Suppliers lists -->
    <div class="col-lg-8 mb-lg-0 mb-4">
        <div class="card shadow-sm hover:shadow-lg transition-all duration-300 ease-in-out">
            <div class="card-header pb-0 p-3 bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-600 text-white">
                <h4 class="mb-2 align-items-center">Supplier lists</h4>
            </div>
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table align-items-center text-sm">
                    <thead>
                        <tr class="text-gray-700 bg-gray-200">
                            <th class="text-center">Profile</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">UpdatedAt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through suppliers -->
                        <?php if (!empty($SuppliersData)): ?>
                            <?php foreach ($SuppliersData as $supplier): ?>
                                <tr class="hover:bg-gray-100 transition-all duration-300">
                                    <td class="text-center">
                                        <img src="<?php echo htmlspecialchars($supplier['Image']); ?>" alt="User avatar"
                                            class="rounded-circle" style="width: 35px; height: 35px;" data-toggle="tooltip"
                                            title="Profile Picture">
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="mb-0"><?php echo htmlspecialchars($supplier['Name']); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="mb-0"><?php echo htmlspecialchars($supplier['Email']); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="mb-0"><?php echo htmlspecialchars($supplier['UpdatedAt']); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No suppliers found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Purchase Order Overview -->
    <div class="col-lg-4 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100 shadow-sm">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Manage Purchase Order</h6>
            </div>
            <div class="card-body p-3">
                <div class="chart">
                    <!-- Add a container for the chart with a loading indicator -->
                    <div id="chart-container" style="position: relative; height: 400px;">
                        <canvas id="purchase-order-chart"></canvas>
                        <div id="loading-indicator"
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
                            <div class="spinner"></div> <!-- Custom or CSS spinner -->
                            <p>Loading data...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>