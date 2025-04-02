<?php
require_once 'Database/Database.php';

class SaleOrderManagementModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAllSalesOrders() {
        try {
            $query = "
                SELECT 
                    so.SalesOrderID,
                    so.Quantity,
                    so.TotalAmount,
                    so.OrderDate,
                    c.Name AS CustomerName,
                    c.Phone AS CustomerPhone,
                    m.Name AS MaterialName,
                    m.UnitPrice
                FROM 
                    construction_depot_ltm_salesorders so
                LEFT JOIN construction_depot_ltm_customers c ON so.CustomerID = c.CustomerID
                LEFT JOIN materials m ON so.MaterialID = m.MATERIAL_ID
                ORDER BY so.OrderDate DESC
            ";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Model Error: " . $e->getMessage());
            return [];
        }
    }
}