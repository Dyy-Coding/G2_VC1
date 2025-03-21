<?php

class Material {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // ✅ Fetch all materials with category & supplier name
    public function getAllMaterials() {
        try {
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                      FROM Materials m
                      LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                      LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                      ORDER BY m.CreatedAt DESC";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching materials: " . $e->getMessage());
            return [];
        }
    }

    // ✅ Upload image with validation
    public function uploadImage($file) {
        if (!isset($file['name']) || $file['error'] !== 0) {
            return ['error' => 'Invalid file upload.'];
        }

        $targetDir = "uploads/images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = preg_replace("/[^a-zA-Z0-9._-]/", "_", basename($file['name']));
        $filePath = $targetDir . uniqid() . '_' . $fileName;
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        $validTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $validTypes)) {
            return ['error' => 'Only JPG, JPEG, PNG & GIF files are allowed.'];
        }

        if ($file['size'] > 5 * 1024 * 1024) {
            return ['error' => 'File size should be less than 5MB.'];
        }

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['error' => 'Failed to upload the image.'];
        }

        return ['success' => $filePath];
    }

    // ✅ Add material with image handling
    public function addMaterial($data, $image) {
        $requiredFields = ['name', 'categoryID', 'quantity', 'unitPrice', 'supplierID'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                error_log("Validation Error: $field is required.");
                return false;
            }
        }
        
        $imagePath = null;
        if (!empty($image) && isset($image['name']) && $image['error'] === 0) {
            $uploadResult = $this->uploadImage($image);
            if (isset($uploadResult['error'])) {
                error_log("Image Upload Error: " . $uploadResult['error']);
                return false;
            }
            $imagePath = $uploadResult['success'];
        }

        $query = "INSERT INTO Materials (Name, CategoryID, Quantity, UnitPrice, SupplierID, MinStockLevel, ReorderLevel, UnitOfMeasure, Size, ImagePath, Description, CreatedAt, UpdatedAt, Brand, Location, SupplierContact, Status, WarrantyPeriod) 
                  VALUES (:name, :categoryID, :quantity, :unitPrice, :supplierID, :minStockLevel, :reorderLevel, :unitOfMeasure, :size, :imagePath, :description, NOW(), NOW(), :brand, :location, :supplierContact, :status, :warrantyPeriod)";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':name' => $data['name'],
                ':categoryID' => $data['categoryID'],
                ':quantity' => $data['quantity'],
                ':unitPrice' => $data['unitPrice'],
                ':supplierID' => $data['supplierID'],
                ':minStockLevel' => $data['minStockLevel'] ?? null,
                ':reorderLevel' => $data['reorderLevel'] ?? null,
                ':unitOfMeasure' => $data['unitOfMeasure'] ?? null,
                ':size' => $data['size'] ?? null,
                ':imagePath' => $imagePath,
                ':description' => $data['description'] ?? null,
                ':brand' => $data['brand'] ?? null,
                ':location' => $data['location'] ?? null,
                ':supplierContact' => $data['supplierContact'] ?? null,
                ':status' => $data['status'] ?? null,
                ':warrantyPeriod' => $data['warrantyPeriod'] ?? null
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("Exception in addMaterial: " . $e->getMessage());
            return false;
        }
    }

    // Fetch all categories
    public function getCategories() {
        try {
            $stmt = $this->conn->prepare("SELECT CategoryID, CategoryName FROM Categories");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching categories: " . $e->getMessage());
            return [];
        }
    }

    // Fetch all suppliers
    public function getSuppliers() {
        try {
            $stmt = $this->conn->prepare("SELECT SupplierID, Name FROM Suppliers");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching suppliers: " . $e->getMessage());
            return [];
        }
    }

    // ✅ Helper method to prepare form data
    public function prepareAddMaterialForm() {
        return [
            'categories' => $this->getCategories(),
            'suppliers'  => $this->getSuppliers()
        ];
    }
}

?>
