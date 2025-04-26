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

    public function getAllSuppliers()
    {
        try {
            $query = "SELECT SupplierID, Name, Email, Image, UpdatedAt 
                      FROM suppliers 
                      ORDER BY UpdatedAt DESC";
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }

    public function getPurchaseOrderData($supplierId)
    {
        try {
            // Get data for the last 12 months
            $query = "SELECT 
                        MONTH(PurchaseDate) as month,
                        YEAR(PurchaseDate) as year,
                        COUNT(*) as order_count,
                        SUM(TotalAmount) as total_amount
                      FROM purchase_orders
                      WHERE SupplierID = :supplierId
                      AND PurchaseDate >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                      GROUP BY YEAR(PurchaseDate), MONTH(PurchaseDate)
                      ORDER BY year, month";
            
            $stmt = $this->dsn->prepare($query);
            $stmt->bindParam(':supplierId', $supplierId, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }
}
