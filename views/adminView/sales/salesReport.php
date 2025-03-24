<?php
// db.php - Include database connection
// include 'db.php';
// Fetch orders
// $orders = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales / Orders Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mt-5">
        <h2 class="text-2xl font-bold mb-4">Sales / Orders Management</h2>

        <!-- Add New Order Button -->
        <a href="add_order.php" class="btn btn-primary mb-3">+ Create New Order</a>

        <!-- Order Table -->
        <div class="card shadow p-4">
            <h5 class="mb-3">Order List</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $orders->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['order_id'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td>$<?= number_format($row['total_amount'], 2) ?></td>
                        <td><span class="badge bg-<?php 
                            echo $row['status'] === 'Completed' ? 'success' : 
                                ($row['status'] === 'Pending' ? 'warning' : 'danger'); 
                        ?>"><?= $row['status'] ?></span></td>
                        <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                        <td>
                            <a href="view_invoice.php?id=<?= $row['order_id'] ?>" class="btn btn-sm btn-info">Invoice</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Order Status Chart -->
        <div class="card shadow p-4 mt-5">
            <h5 class="mb-3">Order Status Overview</h5>
            <canvas id="statusChart"></canvas>
        </div>
    </div>

    <script>
        // Chart.js Example - Order Status Overview
        const ctx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Completed', 'Cancelled'],
                datasets: [{
                    label: 'Orders',
                    data: [10, 25, 5], // Replace with dynamic PHP values later
                    backgroundColor: ['#facc15', '#22c55e', '#ef4444'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>

