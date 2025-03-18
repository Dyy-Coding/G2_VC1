<?php

class Material {
    private $conn;

    // Constructor to initialize DB connection
    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // Add material with image and size
    public function addMaterial($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $unitOfMeasure, $size, $image, $description, $brand, $location, $supplierContact, $status, $warrantyPeriod) {
        // Validation (you can expand validation rules if needed)
        if (empty($name) || empty($categoryID) || empty($supplierID)) {
            error_log("Validation Error: Name, Category and Supplier are required.");
            return false;
        }
    
        // Upload image and get the path
        $imagePath = null;
        if (is_array($image) && isset($image['name']) && $image['error'] === 0) {
            $uploadResult = $this->uploadImage($image);
            if ($uploadResult['error']) {
                error_log("Image Upload Error: " . $uploadResult['error']);
                return false;
            }
            $imagePath = $uploadResult['success'];
        }
    
        // Prepare SQL with all attributes
        $query = "INSERT INTO Materials 
            (Name, CategoryID, Quantity, UnitPrice, SupplierID, MinStockLevel, ReorderLevel, UnitOfMeasure, Size, ImagePath, Description, CreatedAt, UpdatedAt, Brand, Location, SupplierContact, Status, WarrantyPeriod)
            VALUES 
            (:name, :categoryID, :quantity, :unitPrice, :supplierID, :minStockLevel, :reorderLevel, :unitOfMeasure, :size, :imagePath, :description, NOW(), NOW(), :brand, :location, :supplierContact, :status, :warrantyPeriod)";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':categoryID', $categoryID);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':unitPrice', $unitPrice);
            $stmt->bindParam(':supplierID', $supplierID);
            $stmt->bindParam(':minStockLevel', $minStockLevel);
            $stmt->bindParam(':reorderLevel', $reorderLevel);
            $stmt->bindParam(':unitOfMeasure', $unitOfMeasure);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':imagePath', $imagePath);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':supplierContact', $supplierContact);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':warrantyPeriod', $warrantyPeriod);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Exception in addMaterial: " . $e->getMessage());
            return false;
        }
    }
    

    // Validate material data
    public function validateMaterialData($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $size) {
        if (empty($name) || empty($categoryID) || empty($supplierID)) {
            return "Name, category, and supplier are required.";
        }
        if (!is_numeric($quantity) || $quantity < 0) {
            return "Quantity must be a non-negative number.";
        }
        if (!is_numeric($unitPrice) || $unitPrice < 0) {
            return "Unit price must be a valid number.";
        }
        if (!is_numeric($minStockLevel) || $minStockLevel < 0) {
            return "Min stock level must be a non-negative number.";
        }
        if (!is_numeric($reorderLevel) || $reorderLevel < 0) {
            return "Reorder level must be a non-negative number.";
        }
        if (empty($size) || !in_array($size, ['25kg', '50kg', 'Other'])) {
            return "Size must be either 25kg, 50kg, or Other.";
        }
        return true;
    }

    // Upload image with validation
    public function uploadImage($file) {
        if (!isset($file["name"])) {
            return ["error" => "Invalid file format."];
        }

        $targetDir = "uploads/images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = basename($file["name"]);
        $fileName = preg_replace("/[^a-zA-Z0-9._-]/", "_", $fileName);
        $filePath = $targetDir . uniqid() . '_' . $fileName;
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        $validTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($fileType, $validTypes)) {
            return ["error" => "Only JPG, JPEG, PNG & GIF files are allowed."];
        }

        $mimeType = mime_content_type($file["tmp_name"]);
        $validMimeTypes = ["image/jpeg", "image/png", "image/gif"];
        if (!in_array($mimeType, $validMimeTypes)) {
            return ["error" => "Invalid image MIME type."];
        }

        if ($file["size"] > 5 * 1024 * 1024) {
            return ["error" => "File size should be less than 5MB."];
        }

        if (!move_uploaded_file($file["tmp_name"], $filePath)) {
            return ["error" => "Failed to upload the image."];
        }

        return ["success" => $filePath];
    }

    // Fetch categories
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

    // Fetch suppliers
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
}

?>
