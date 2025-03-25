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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching materials: " . $e->getMessage());
            return [];
        }
    }

    public function getMaterialByName($name) {
        try {
            $query = "SELECT * FROM Materials WHERE Name = :name LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':name' => $name]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching material by name: " . $e->getMessage());
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

    public function getMaterialById($id) {
        try {
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                      FROM Materials m
                      LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                      LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                      WHERE m.MaterialID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching material by ID: " . $e->getMessage());
            return false;
        }
    }

    public function uploadImage($file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['error' => 'File upload error occurred.'];
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
            return ['error' => 'Only JPG, JPEG, PNG, and GIF files are allowed.'];
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
            if (!isset($data[$field]) || $data[$field] === '' || ($field === 'categoryID' && $data[$field] <= 0) || ($field === 'supplierID' && $data[$field] <= 0) || ($field === 'quantity' && $data[$field] < 0) || ($field === 'unitPrice' && $data[$field] < 0)) {
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

    public function editMaterial($id, $data) {
        try {
            $query = "UPDATE Materials SET 
                        Name = :name, 
                        CategoryID = :categoryID, 
                        Quantity = :quantity, 
                        UnitPrice = :unitPrice, 
                        SupplierID = :supplierID, 
                        MinStockLevel = :minStockLevel, 
                        ReorderLevel = :reorderLevel, 
                        UnitOfMeasure = :unitOfMeasure, 
                        Size = :size, 
                        Description = :description, 
                        Brand = :brand, 
                        Location = :location, 
                        SupplierContact = :supplierContact, 
                        Status = :status, 
                        WarrantyPeriod = :warrantyPeriod, 
                        UpdatedAt = NOW()";

            if (isset($data['imagePath'])) {
                $query .= ", ImagePath = :imagePath";
            }

            $query .= " WHERE MaterialID = :id";
            
            $stmt = $this->conn->prepare($query);
            $params = [
                ':id' => $id,
                ':name' => $data['name'],
                ':categoryID' => $data['categoryID'],
                ':quantity' => $data['quantity'],
                ':unitPrice' => $data['unitPrice'],
                ':supplierID' => $data['supplierID'],
                ':minStockLevel' => $data['minStockLevel'] ?? null,
                ':reorderLevel' => $data['reorderLevel'] ?? null,
                ':unitOfMeasure' => $data['unitOfMeasure'] ?? null,
                ':size' => $data['size'] ?? null,
                ':description' => $data['description'] ?? null,
                ':brand' => $data['brand'] ?? null,
                ':location' => $data['location'] ?? null,
                ':supplierContact' => $data['supplierContact'] ?? null,
                ':status' => $data['status'] ?? null,
                ':warrantyPeriod' => $data['warrantyPeriod'] ?? null
            ];

            if (isset($data['imagePath'])) {
                $params[':imagePath'] = $data['imagePath'];
            }
            
            $stmt->execute($params);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Exception in editMaterial: " . $e->getMessage() . " | Query: " . $query . " | Params: " . json_encode($params));
            return false;
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


    // In Material.php
    public function getMaterialsByCategory($categoryID) {
        try {
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                    FROM Materials m
                    LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                    LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                    WHERE m.CategoryID = :categoryID
                    ORDER BY m.CreatedAt DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':categoryID' => $categoryID]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching materials by category: " . $e->getMessage());
            return [];
        }
    }
}