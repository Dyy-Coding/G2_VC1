<?php

class MaterialModel {

    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // Fetch all materials
    public function getAllMaterials() {
        // SQL query to fetch materials along with supplier name and category name
        $query = "
            SELECT 
                m.*, 
                s.Name, 
                c.categoryName 
            FROM 
                materials m
            LEFT JOIN 
                suppliers s ON m.supplierID = s.supplierID
            LEFT JOIN 
                categories c ON m.categoryID = c.categoryID
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Reset MaterialID count to start from 1
        foreach ($materials as $index => &$material) {
            $material['MaterialID'] = $index + 1; // Set MaterialID to be 1-based index
        }
        
        return $materials;
    }
    

    // Insert material from import
    public function importMaterial($material) {
        $query = "INSERT INTO materials 
                  (Name, CategoryID, Quantity, UnitPrice, SupplierID, MinStockLevel, 
                  ReorderLevel, UnitOfMeasure, Size, ImagePath, Description, CreatedAt, 
                  UpdatedAt, Brand, Location, SupplierContact, Status, WarrantyPeriod) 
                  VALUES 
                  (:name, :categoryID, :quantity, :unitPrice, :supplierID, :minStockLevel, 
                  :reorderLevel, :unitOfMeasure, :size, :imagePath, :description, :createdAt, 
                  :updatedAt, :brand, :location, :supplierContact, :status, :warrantyPeriod)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $material['name']);
        $stmt->bindParam(':categoryID', $material['categoryID']);
        $stmt->bindParam(':quantity', $material['quantity']);
        $stmt->bindParam(':unitPrice', $material['unitPrice']);
        $stmt->bindParam(':supplierID', $material['supplierID']);
        $stmt->bindParam(':minStockLevel', $material['minStockLevel']);
        $stmt->bindParam(':reorderLevel', $material['reorderLevel']);
        $stmt->bindParam(':unitOfMeasure', $material['unitOfMeasure']);
        $stmt->bindParam(':size', $material['size']);
        $stmt->bindParam(':imagePath', $material['imagePath']);
        $stmt->bindParam(':description', $material['description']);
        $stmt->bindParam(':createdAt', $material['createdAt']);
        $stmt->bindParam(':updatedAt', $material['updatedAt']);
        $stmt->bindParam(':brand', $material['brand']);
        $stmt->bindParam(':location', $material['location']);
        $stmt->bindParam(':supplierContact', $material['supplierContact']);
        $stmt->bindParam(':status', $material['status']);
        $stmt->bindParam(':warrantyPeriod', $material['warrantyPeriod']);
        $stmt->execute();
    }
}

?>
