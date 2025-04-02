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
            <button type="button" class="btn btn-secondary" id="deleteSelectedOrders">Delete Selected</button>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="me-3 d-flex align-items-center">
            <input type="checkbox" name="selectAll" id="selectAll" style="width: 30px; position: relative; bottom: 4px;">
            <label class="form-check-label" for="selectAll">Select All</label>
        </div>
        <div class="ms-2" style="width: 400px">
            <input type="search" id="search" class="form-control" placeholder="Search Order" />
        </div>
    </div>

    <table class="table text-center align-middle" id="orderTable">
        <thead>
            <tr>
                <th class="w-small">Select</th>
                <th class="w-medium">Order ID</th>
                <th class="w-medium">Customer</th>
                <th class="w-large">Material</th>
                <th class="w-medium">Date</th>
                <th class="w-medium">Amount</th>
                <th class="w-medium">Status</th>
                <th class="w-large">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($salesOrders)): ?>
                <?php foreach ($salesOrders as $order): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="selected_orders[]" 
                                   value="<?= $order['SalesOrderID'] ?>" 
                                   class="order-checkbox">
                        </td>
                        <td>#<?= htmlspecialchars($order['SalesOrderID']) ?></td>
                        <td>
                            <strong><?= htmlspecialchars($order['CustomerName'] ?? 'N/A') ?></strong><br>
                            <small><?= htmlspecialchars($order['CustomerEmail'] ?? '') ?></small>
                        </td>
                        <td>
                            <?= htmlspecialchars($order['MaterialName'] ?? 'N/A') ?><br>
                            <small>$<?= htmlspecialchars(number_format($order['UnitPrice'] ?? 0, 2)) ?></small>
                        </td>
                        <td><?= date('M d, Y', strtotime($order['OrderDate'])) ?></td>
                        <td>$<?= htmlspecialchars(number_format($order['TotalAmount'], 2)) ?></td>
                        <td>
                            <span class="badge bg-<?= 
                                $order['Status'] === 'Completed' ? 'success' : 
                                ($order['Status'] === 'Cancelled' ? 'danger' : 'warning') 
                            ?>">
                                <?= htmlspecialchars($order['Status']) ?>
                            </span>
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
                                       onclick="return confirm('Are you sure you want to delete order #<?= $order['SalesOrderID'] ?>?');">
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
                    <td colspan="8" class="text-center py-4">
                        <div class="alert alert-info">
                            No sales orders found. <a href="/admin/saleorder/add" class="alert-link">Create your first order</a>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select All functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.order-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Delete Selected Orders
    document.getElementById('deleteSelectedOrders').addEventListener('click', function() {
        const selectedIds = Array.from(document.querySelectorAll('.order-checkbox:checked'))
            .map(checkbox => checkbox.value);
        
        if (selectedIds.length === 0) {
            alert('Please select at least one order to delete');
            return;
        }
        
        if (confirm(`Are you sure you want to delete ${selectedIds.length} selected order(s)?`)) {
            fetch('/admin/saleorder/delete-multiple', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.message || 'Error deleting orders');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting orders: ' + error.message);
            });
        }
    });

    // Search functionality
    document.getElementById('search').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#orderTable tbody tr');
        
        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchTerm) ? '' : 'none';
        });
    });
});
</script>