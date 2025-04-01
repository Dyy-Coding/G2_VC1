<?php
header("Content-Type: application/json");

// Sample database connection (Modify as per your DB setup)
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

$sql = "SELECT MONTHNAME(OrderDate) AS month, SUM(TotalAmount) AS totalSalesAmount FROM salesorders GROUP BY MONTH(OrderDate)";
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
