<div class="container mt-3 mb-4 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Suppliers Information</h1>
            <p class="text-muted mb-0">Supplier and Contact Details</p>
        </div>
        <div>
            <div class="d-flex align-items-center gap-2">
                <!-- Add Supplier Button -->
                <a href="/add/supplier" class="btn btn-primary d-flex align-items-center"
                    style="height: 40px; padding: 8px 16px; font-size: 16px;">
                    <i class="fa fa-plus-circle me-2" style="font-size: 18px;"></i> Add Supplier
                </a>

                <!-- Export Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-primary d-flex align-items-center"
                        style="height: 40px; padding: 8px 16px; font-size: 16px;" type="button" id="exportDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-download me-2" style="font-size: 18px;"></i> Export
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                        <li>
                            <a class="dropdown-item" href="/suppliers/export/excel">
                                <i class="material-icons me-2" style="font-size:18px;">insert_drive_file</i> Excel
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/suppliers/export/pdf">
                                <i class="material-icons me-2" style="font-size:18px;">picture_as_pdf</i> PDF
                            </a>
                        </li>
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

    <form action="/suppliers" method="POST" id="supplierForm">
        <div style="overflow-x: auto; max-width: 100%; height: 400px; padding-right: 17px;">
            <style>
                div::-webkit-scrollbar {
                    display: none;
                }
            </style>
            <!-- Add scrollable container here -->
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
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="material-icons" style="font-size:34px;">more_vert</i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a href="/supplier/edit/<?= $supplier['SupplierID'] ?>"
                                            class="dropdown-item text-primary d-flex align-items-center">
                                            <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="/supplier/delete/<?= $supplier['SupplierID'] ?>" method="POST"
                                            style="display: inline;">
                                            <button type="submit"
                                                class="dropdown-item text-danger d-flex align-items-center"
                                                onclick="return confirm('Are you sure you want to delete this supplier?');">
                                                <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/supplier/detail?id=<?= $supplier['SupplierID'] ?>"
                                            class="dropdown-item d-flex align-items-center">
                                            <i class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>