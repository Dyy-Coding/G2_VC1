<?php
require_once "Database/Database.php";

class SupplierDetailModel
{
    private $dsn;

    public function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    public function supplierDetail($supplierId)
    {
        try {
            $query = "SELECT s.*, c.CategoryName 
                      FROM suppliers s
                      LEFT JOIN categories c ON s.CategoryID = c.CategoryID
                      WHERE s.SupplierID = :supplierId";
            $stmt = $this->dsn->prepare($query);
            $stmt->bindParam(':supplierId', $supplierId, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    public function updateProfileImage($supplierId, $imagePath)
    {
        try {
            $query = "UPDATE suppliers SET profile_supplier = :imagePath WHERE SupplierID = :supplierId";
            $stmt = $this->dsn->prepare($query);
            $stmt->bindParam(':imagePath', $imagePath);
            $stmt->bindParam(':supplierId', $supplierId);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
}