<?php
header("Content-Type: application/json");

// Database connection
$conn = new mysqli("localhost", "root", "", "construction_depot_lim_try");

// Check for connection errors
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// SQL Query to fetch all pages
$sql = "SELECT id, title, url, description, category FROM pages";

// Execute the query and handle errors
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

// Fetch data and format correctly
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "id" => (int) $row["id"],  // Ensure ID is an integer
        "title" => $row["title"],  // Keep as a string
        "url" => $row["url"],  // Keep as a string (Fixes escaping issue)
        "description" => $row["description"],  // Keep as a string
        "category" => $row["category"]  // Keep as a string
    ];
}

// Output JSON response with unescaped slashes
echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

// Close the database connection
$conn->close();
?>
