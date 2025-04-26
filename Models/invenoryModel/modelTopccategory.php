<?php
header("Content-Type: application/json");

// Sample database connection (Modify as per your DB setup)
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// SQL Query to get top 5 categories with most materials
$sql = "SELECT c.CategoryID, c.CategoryName, COUNT(m.MaterialID) AS MaterialCount
        FROM categories c
        LEFT JOIN materials m ON c.CategoryID = m.CategoryID
        GROUP BY c.CategoryID, c.CategoryName
        ORDER BY MaterialCount DESC
        LIMIT 5";

$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "CategoryName" => $row["CategoryName"],
        "materialCount" => (int) $row["MaterialCount"],
    ];
}

echo json_encode($data, JSON_PRETTY_PRINT);
$conn->close();
?>
