
<div class="container mt-3 mb-4 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Suppliers Information</h1>
            <p class="text-muted mb-0">Supplier and Contact Details</p>
        </div>
        <div>
            <a href="/add/supplier" class="btn btn-primary">+ Add Supplier</a>
            <button type="button" class="btn btn-secondary">
                Export
            </button>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="me-3 d-flex align-items-center">
            <input type="checkbox" name="selectAll" id="selectAll"
                style="width: 30px; position: relative; bottom: 4px;">
            <label class="form-check-label" for="selectAll">Select All</label>
        </div>
        <div class="ms-2" style="width: 400px">
            <input type="search" id="search" class="form-control" placeholder="Search Supplier" />
        </div>
    </div>

    <form action="/suppliers" method="POST" id="supplierForm">
        <table class="table text-center align-middle" id="supplierTable">
            <thead>
                <tr>
                    <th class="w-small">Select</th>
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
                        <td><input type="checkbox" name="selected[]" value="<?= $supplier['SupplierID'] ?>"></td>
                        <td>
                            <?php if (!empty($supplier['profile_supplier'])): ?>
                                <img src="/<?= htmlspecialchars($supplier['profile_supplier']) ?>" alt="Profile" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php else: ?>
                                <span>No Image</span>
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
                                        <button type="submit" class="dropdown-item text-danger d-flex align-items-center"
                                            onclick="return confirm('Are you sure you want to delete this supplier?');">
                                            <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/supplier/view/<?= $supplier['SupplierID'] ?>">
                                        <i class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>