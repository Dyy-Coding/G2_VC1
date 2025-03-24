<?php
require 'Database/Database.php'; // Ensure database connection

class Material {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllMaterials() {
        try {
            $query = "SELECT m.MaterialID, m.Name, c.CategoryName, m.Quantity, m.UnitPrice, s.SupplierName, m.MinStockLevel, m.ReorderLevel, m.UnitOfMeasure, m.Size, m.ImagePath, m.Description, m.CreatedAt, m.UpdatedAt, m.Brand, m.Location, m.SupplierContact, m.Status, m.WarrantyPeriod 
                      FROM materials m
                      JOIN categories c ON m.CategoryID = c.CategoryID
                      JOIN suppliers s ON m.SupplierID = s.SupplierID";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching materials: " . $e->getMessage());
            return [];
        }
    }
}

$materialObj = new Material();
$materials = $materialObj->getAllMaterials();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Material Store</h2>
        <div class="row">
            <?php if (empty($materials)): ?>
                <p class="text-center">No materials available.</p>
            <?php else: ?>
                <?php foreach ($materials as $material): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($material['ImagePath'] ?? 'placeholder.jpg') ?>" class="card-img-top" alt="Material Image">
                            <div class="card-body text-center">
                                <h5 class="card-title"> <?= htmlspecialchars($material['Name']) ?> </h5>
                                <p class="card-text">Category: <?= htmlspecialchars($material['CategoryName']) ?></p>
                                <p class="card-text">Brand: <?= htmlspecialchars($material['Brand']) ?></p>
                                <p class="card-text">Location: <?= htmlspecialchars($material['Location']) ?></p>
                                <p class="card-text">Supplier: <?= htmlspecialchars($material['SupplierName']) ?></p>
                                <p class="card-text">Supplier Contact: <?= htmlspecialchars($material['SupplierContact']) ?></p>
                                <p class="card-text">Stock: <?= $material['Quantity'] ?> (Min: <?= $material['MinStockLevel'] ?>, Reorder: <?= $material['ReorderLevel'] ?>)</p>
                                <p class="card-text">Unit Price: $<?= number_format($material['UnitPrice'], 2) ?> per <?= htmlspecialchars($material['UnitOfMeasure']) ?></p>
                                <p class="card-text">Warranty: <?= htmlspecialchars($material['WarrantyPeriod']) ?> months</p>
                                <p class="card-text">Description: <?= htmlspecialchars($material['Description']) ?></p>
                                <p class="text-muted">Added on: <?= date('Y-m-d', strtotime($material['CreatedAt'])) ?></p>
                                <label for="size">Size:</label>
                                <select class="form-select mb-2">
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="Quantity" min="1">
                                <button class="btn btn-primary w-100 add-to-cart" data-name="<?= htmlspecialchars($material['Name']) ?>" data-price="<?= $material['UnitPrice'] ?>">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
