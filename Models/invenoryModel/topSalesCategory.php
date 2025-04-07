<?php
header("Content-Type: application/json");

// Database connection
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// SQL query to get total sales for each category for the last 5 months
$sql = "
    SELECT 
        DATE_FORMAT(o.OrderDate, '%Y-%m') AS Month,
        c.CategoryName,
        SUM(s.Quantity) AS TotalSold
    FROM salesorderdetails s
    JOIN salesorders o ON s.SalesOrderID = o.SalesOrderID
    JOIN materials m ON s.MaterialID = m.MaterialID
    JOIN categories c ON m.CategoryID = c.CategoryID
    WHERE o.OrderDate >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 MONTH), '%Y-%m-01')
    GROUP BY Month, c.CategoryID
    ORDER BY Month DESC;
";

// Execute the query
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "Month" => $row["Month"],
        "CategoryName" => $row["CategoryName"],
        "TotalSold" => (int) $row["TotalSold"],
    ];
}

// Output the JSON-encoded data
echo json_encode($data, JSON_PRETTY_PRINT);

// Close the database connection
$conn->close();
?>
