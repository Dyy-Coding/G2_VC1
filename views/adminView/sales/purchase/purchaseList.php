<div class="container mt-3 card" style="width: 95%; padding: 25px;">
    <!-- Success Message -->
    <?php if (!empty($success)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php 
                echo match($success) {
                    '1' => 'Purchase order added successfully!',
                    'deleted' => 'Purchase order deleted successfully!',
                    default => 'Operation completed successfully!'
                };
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Error Message -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($error) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Purchase Order</h1>
            <p class="text-muted mb-0">All purchase orders in the system.</p>
        </div>
        <div>
            <a href="/admin/purchaseorder/add" class="btn btn-primary">+ Add New</a>
        </div>
    </div>

    <!-- Search -->
    <div class="container d-flex justify-content-end mb-3">
        <div style="width: 400px">
            <input type="search" id="search" class="form-control" placeholder="Search Order" />
        </div>
    </div>

    <!-- Table -->
    <table class="table text-center align-middle" id="orderTable">
        <thead>
            <tr>
                <th>Material Name</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Total Price</th>
                <th>Supplier Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($purchaseOrders)): ?>
                <?php foreach ($purchaseOrders as $order): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($order['MaterialName'] ?? 'N/A') ?></strong></td>
                        <td><?= (int)($order['Quantity'] ?? 0) ?></td>
                        <td><?= !empty($order['OrderDate']) ? date('M d, Y', strtotime($order['OrderDate'])) : 'N/A' ?></td>
                        <td>
                            $<?= number_format($order['TotalAmount'] ?? 0, 2) ?>
                        </td>
                        <td><?= htmlspecialchars($order['SupplierName'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($order['Status'] ?? 'N/A') ?></td>
                        <td class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size:34px;">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="/admin/purchaseorder/edit/<?= $order['PurchaseOrderID'] ?>" class="dropdown-item text-primary d-flex align-items-center">
                                        <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/purchaseorder/delete/<?= $order['PurchaseOrderID'] ?>" 
                                       class="dropdown-item text-danger d-flex align-items-center"
                                       onclick="return confirm('Are you sure you want to delete this order?');">
                                        <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/purchaseorder/view/<?= $order['PurchaseOrderID'] ?>" 
                                       class="dropdown-item d-flex align-items-center">
                                        <i class="material-icons me-2" style="font-size:18px;">visibility</i> View Details
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <div class="alert alert-info">
                            No purchase orders found. <a href="/admin/purchaseorder/add" class="alert-link">Create your first order</a>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
