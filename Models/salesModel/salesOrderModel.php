<?php
require_once 'Database/Database.php';

class SaleOrderManagementModel {
    private $db;

    function __construct() {
        $this->db = Database::getConnection();
    }

    function getAllSalesOrders() {
        try {
            $query = "
                SELECT 
                    so.SalesOrderID,
                    so.OrderDate,
                    so.TotalAmount,
                    so.Status,
                    so.CreatedAt,
                    c.Name AS CustomerName,
                    c.Email AS CustomerEmail,
                    c.Phone AS CustomerPhone,
                    m.Name AS MaterialName,
                    m.UnitPrice,
                    m.Quantity AS MaterialQuantity
                FROM 
                    salesorders so
                LEFT JOIN 
                    customers c ON so.CustomerID = c.CustomerID
                LEFT JOIN 
                    materials m ON so.MaterialID = m.MaterialID
                ORDER BY 
                    so.CreatedAt DESC
            ";

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            $result = $stmt->fetchAll();
            
            // Debug output (remove in production)
            error_log(print_r($result, true));
            
            return $result;
            
        } catch (PDOException $e) {
            error_log("Error in getAllSalesOrders: " . $e->getMessage());
            return [];
        }
    }
}