<?php
header("Content-Type: application/json");

// Sample database connection (Modify as per your DB setup)
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// SQL Query to get order data
$sql = "
    SELECT 
        DATE_FORMAT(s.OrderDate, '%Y-%m') AS Month, 
        COUNT(DISTINCT s.SalesOrderID) AS TotalOrders, 
        SUM(so.Total) AS TotalSalesAmount 
    FROM 
        salesorders s 
    JOIN 
        salesorderdetails so ON s.SalesOrderID = so.SalesOrderID 
    GROUP BY 
        DATE_FORMAT(s.OrderDate, '%Y-%m') 
    ORDER BY 
        Month DESC
";

// Execute the query and handle errors
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    // Ensure the column keys are correct (case-sensitive)
    $data[] = [
        "month" => $row["Month"], // Change to match the alias from SQL
        "totalOrders" => (int) $row["TotalOrders"], // Ensure total orders is an integer
        "totalSalesAmount" => (float) $row["TotalSalesAmount"] // Ensure total sales amount is a float
    ];
}

// Output the JSON-encoded data
echo json_encode($data, JSON_PRETTY_PRINT);

// Close the database connection
$conn->close();
?>
