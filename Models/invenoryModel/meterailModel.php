<?php

class Material {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllMaterials() {
        try {
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                      FROM Materials m
                      LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                      LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                      ORDER BY m.CreatedAt DESC";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
            error_log("Fetched Materials: " . json_encode($materials));
            return $materials;
        } catch (PDOException $e) {
            error_log("Error fetching materials: " . $e->getMessage());
            return [];
        }
    }

    public function uploadImage($file) {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
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
            return ['error' => 'File size must be less than 5MB.'];
        }

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['error' => 'Failed to upload the image.'];
        }

        return ['success' => $filePath];
    }

    public function addMaterial($data) {
        $requiredFields = ['name', 'categoryID', 'supplierID', 'quantity', 'unitPrice'];

        foreach ($requiredFields as $field) {
            if (empty($data[$field]) || ($field === 'categoryID' && $data[$field] <= 0) || ($field === 'supplierID' && $data[$field] <= 0) || ($field === 'quantity' && $data[$field] < 0) || ($field === 'unitPrice' && $data[$field] < 0)) {
                error_log("Validation Error: $field is invalid or missing. Value: " . ($data[$field] ?? 'unset'));
                return false;
            }
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
                ':imagePath' => $data['imagePath'] ?? null,
                ':description' => $data['description'] ?? null,
                ':brand' => $data['brand'] ?? null,
                ':location' => $data['location'] ?? null,
                ':supplierContact' => $data['supplierContact'] ?? null,
                ':status' => $data['status'] ?? null,
                ':warrantyPeriod' => $data['warrantyPeriod'] ?? null
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("Exception in addMaterial: " . $e->getMessage() . " | Data: " . json_encode($data));
            return false;
        }
    }

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

    public function deleteMaterial($id) {
        try {
            $query = "DELETE FROM Materials WHERE MaterialID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Exception in deleteMaterial: " . $e->getMessage());
            return false;
        }
    }
}
