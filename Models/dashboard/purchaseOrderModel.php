<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // For cross-origin requests if necessary

// Database connection
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Calculate the date 12 months ago
$startDate = date('Y-m-d', strtotime('-12 months'));

$sql = "SELECT 
            DATE_FORMAT(po.OrderDate, '%Y-%m') AS MonthYear, 
            SUM(po.Quantity) AS TotalQuantity, 
            SUM(po.TotalAmount) AS TotalAmount 
        FROM purchaseorderdetails po
        WHERE po.OrderDate >= '$startDate'
        GROUP BY MonthYear 
        ORDER BY MonthYear DESC";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['error' => 'Database query failed: ' . $conn->error]);
    exit;
}

$purchaseData = [];
while ($row = $result->fetch_assoc()) {
    $purchaseData[] = $row;
}

// Return an empty array if no data is found
if (empty($purchaseData)) {
    echo json_encode(['error' => 'No data found']);
    exit;
}

// Return the JSON data
echo json_encode($purchaseData);
?>
