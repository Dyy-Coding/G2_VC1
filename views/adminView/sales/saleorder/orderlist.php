<div class="container mt-3 card" style="width: 95%; padding: 25px;">
    <!-- Success/Error Messages -->
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php 
                echo match($_GET['success']) {
                    '1' => 'Order added successfully!',
                    'deleted' => 'Order deleted successfully!',
                    default => 'Operation completed successfully!'
                };
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($error) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Sale Order</h1>
            <p class="text-muted mb-0">All sale orders in the system.</p>
        </div>
        <div>
            <a href="/admin/saleorder/add" class="btn btn-primary">+ Add New</a>
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
            <?php if (!empty($salesOrders)): ?>
                <?php foreach ($salesOrders as $order): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($order['CustomerName'] ?? 'N/A') ?></strong>
                        </td>
                        <td>
                            <?= htmlspecialchars($order['MaterialName'] ?? 'N/A') ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($order['Quantity'] ?? 'N/A') ?>
                        </td>
                        <td>
                            <?= date('M d, Y', strtotime($order['OrderDate'] ?? 'now')) ?>
                        </td>
                        <td>
                            $<?= htmlspecialchars(number_format($order['TotalAmount'] ?? 0, 2)) ?>
                            <?php 
                                // Optional: Validate TotalAmount
                                $calculatedTotal = ($order['Quantity'] ?? 0) * ($order['UnitPrice'] ?? 0);
                                if (round($calculatedTotal, 2) !== round($order['TotalAmount'] ?? 0, 2)) {
                                    echo '<br><small class="text-danger">Mismatch: Should be $' . number_format($calculatedTotal, 2) . '</small>';
                                }
                            ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($order['CustomerPhone'] ?? 'N/A') ?>
                        </td>
                        <td class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size:34px;">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="/admin/saleorder/edit/<?= $order['SalesOrderID'] ?>" 
                                       class="dropdown-item text-primary d-flex align-items-center">
                                        <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/saleorder/delete/<?= $order['SalesOrderID'] ?>" 
                                       class="dropdown-item text-danger d-flex align-items-center"
                                       onclick="return confirm('Are you sure you want to delete this order?');">
                                        <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/saleorder/view/<?= $order['SalesOrderID'] ?>" 
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
                            No sales orders found. <a href="/admin/saleorder/add" class="alert-link">Create your first order</a>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>