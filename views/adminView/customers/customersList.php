<div class="container mt-3 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Customer List</h1>
            <p class="text-muted mb-0">All customers in the system.</p>
        </div>
        <div>
            <a href="/createcustomer" class="btn btn-primary">+ Add New</a>
            <button type="button" class="btn btn-secondary" id="deleteSelectedCustomers"
                onmouseover="this.classList.replace('btn-secondary', 'btn-danger')"
                onmouseout="this.classList.replace('btn-danger', 'btn-secondary')">
                Delete
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
            <input type="search" id="search" class="form-control" placeholder="Search Customer" />
        </div>
    </div>

    <form action="/deletecustomer" method="POST" id="deleteForm">
        <table class="table text-center align-middle" id="customerTable">
            <thead>
                <tr>
                    <th class="w-small">Select</th>
                    <th class="w-small">Profile</th>
                    <th class="w-medium">Name</th>
                    <th class="w-medium">Material</th>
                    <th class="w-small">Qty</th>
                    <th class="w-large">Phone</th>
                    <th class="w-medium">Location</th>
                    <th class="w-medium">Status</th>
                    <th class="w-large">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><input type="checkbox" name="customer_ids[]"
                                value="<?= htmlspecialchars($customer['id'] ?? '') ?>"></td>
                        <td>
                            <?php if (!empty($customer['Profile'])): ?>
                                <img src="<?= htmlspecialchars($customer['Profile']) ?>" alt="Profile" width="50" height="50" class="rounded-circle">
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="material-icons" style="font-size: 36px;">account_circle</i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?= htmlspecialchars($customer['Name']) ?></strong></td>
                        <td><?= htmlspecialchars($customer['MaterialName'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($customer['Quantity'] ?? '0') ?></td>
                        <td><?= htmlspecialchars($customer['Phone']) ?></td>
                        <td><?= htmlspecialchars($customer['Address']) ?></td>
                        <td>
                            <?php
                            $statusClass = '';
                            switch ($customer['Status']) {
                                case 'Active':
                                    $statusClass = 'text-bg-success';
                                    break;
                                case 'Inactive':
                                    $statusClass = 'text-bg-danger';
                                    break;
                                case 'Pending':
                                    $statusClass = 'text-bg-warning';
                                    break;
                                default:
                                    $statusClass = 'text-bg-secondary';
                            }
                            ?>
                            <span class="badge <?= $statusClass ?>"><?= htmlspecialchars($customer['Status']) ?></span>
                        </td>
                        <td class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size:34px;">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li><a href="/editcustomer?id=<?= htmlspecialchars($customer['id'] ?? '') ?>" class="dropdown-item text-primary d-flex align-items-center">
                                        <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit</a></li>
                                <li><a href="/deletecustomer/<?= htmlspecialchars($customer['id'] ?? '') ?>" class="dropdown-item text-danger d-flex align-items-center" onclick="return confirm('Are you sure?');">
                                        <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="/customerdetail?id=<?= htmlspecialchars($customer['id'] ?? '') ?>">
                                        <i class="material-icons me-2" style="font-size:18px;">visibility</i> View</a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>