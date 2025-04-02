<?php
header("Content-Type: application/json");

// Sample database connection (Modify as per your DB setup)
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

$sql = "SELECT 
    MONTHNAME(OrderDate) AS month, 
    SUM(TotalAmount) AS totalSalesAmount
FROM salesorders
WHERE OrderDate >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 12 MONTH), '%Y-%m-01')
AND OrderDate <= LAST_DAY(CURDATE())
GROUP BY YEAR(OrderDate), MONTH(OrderDate)
ORDER BY YEAR(OrderDate), MONTH(OrderDate);
";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "month" => $row["month"],
        "totalSalesAmount" => $row["totalSalesAmount"]
    ];
}

echo json_encode($data, JSON_PRETTY_PRINT);
$conn->close();
?>
