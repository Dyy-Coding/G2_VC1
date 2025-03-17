<?php

class Material {
    private $conn;

    // Constructor to initialize DB connection
    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // Add material with image
    public function addMaterial($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $image) {
        // Check if valid image file array is passed
        if (!is_array($image) || !isset($image['name'])) {
            error_log("Invalid image format provided.");
            return false;
        }

        // Upload image and get path
        $imageUpload = $this->uploadImage($image);
        
        if (!$imageUpload || isset($imageUpload["error"])) {
            error_log("Image Upload Error: " . ($imageUpload["error"] ?? "Unknown error"));
            return false;
        }

        $imagePath = $imageUpload["success"];

        $query = "INSERT INTO Materials (Name, CategoryID, Quantity, UnitPrice, SupplierID, MinStockLevel, ReorderLevel, ImagePath)
                  VALUES (:name, :categoryID, :quantity, :unitPrice, :supplierID, :minStockLevel, :reorderLevel, :imagePath)";

        try {
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':unitPrice', $unitPrice, PDO::PARAM_STR);
            $stmt->bindParam(':supplierID', $supplierID, PDO::PARAM_INT);
            $stmt->bindParam(':minStockLevel', $minStockLevel, PDO::PARAM_INT);
            $stmt->bindParam(':reorderLevel', $reorderLevel, PDO::PARAM_INT);
            $stmt->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Exception in addMaterial: " . $e->getMessage());
            return false;
        }
    }

    // Upload image method
    public function uploadImage($file) {
        // Validate input type
        if (!is_array($file) || !isset($file["name"])) {
            return ["error" => "Invalid file format."];
        }

        $targetDir = "uploads/images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = basename($file["name"]);
        $filePath = $targetDir . uniqid() . '_' . $fileName;
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        $validTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($fileType, $validTypes)) {
            return ["error" => "Only JPG, JPEG, PNG & GIF files are allowed."];
        }

        $mimeType = mime_content_type($file["tmp_name"]);
        $validMimeTypes = ["image/jpeg", "image/png", "image/gif"];
        if (!in_array($mimeType, $validMimeTypes)) {
            return ["error" => "Invalid image file type."];
        }

        if ($file["size"] > 5000000) {
            return ["error" => "File size should be less than 5MB."];
        }

        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            return ["success" => $filePath];
        } else {
            return ["error" => "There was an error uploading the file."];
        }
    }

    // Fetch categories
    public function getCategories() {
        $query = "SELECT CategoryID, CategoryName FROM Categories;";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching categories: " . $e->getMessage());
            return [];
        }
    }

    // Fetch suppliers
    public function getSuppliers() {
        $query = "SELECT SupplierID, Name FROM Suppliers;";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching suppliers: " . $e->getMessage());
            return [];
        }
    }
}
?>
