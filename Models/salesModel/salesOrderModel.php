<?php

class SaleOrderManagementModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Function to fetch all sales orders
    public function getAllSalesOrders() {
        try {
            $query = "
                SELECT 
                    sod.SalesOrderDetailID,
                    sod.SalesOrderID,
                    sod.MaterialID,
                    sod.Quantity,
                    sod.UnitPrice,
                    sod.Total,
                    sod.SalesOrderDetail_Date,
                    sod.CreatedAt,
                    sod.UpdatedAt,
                    sod.CustomerID,
                    CONCAT(c.first_name, ' ', c.last_name) AS CustomerName,
                    c.phone AS CustomerPhone,
                    m.Name AS MaterialName
                FROM 
                    salesorderdetails sod
                LEFT JOIN salesorders so ON sod.SalesOrderID = so.SalesOrderID
                LEFT JOIN customers c ON sod.CustomerID = c.user_id
                LEFT JOIN materials m ON sod.MaterialID = m.MaterialID
                ORDER BY sod.SalesOrderDetail_Date DESC
            ";

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Model Error: " . $e->getMessage());
            return [];
        }
    }

    // Function to fetch all purchase orders
    public function getAllPurchaseOrders() {
        try {
            $query = "
                SELECT 
                    po.PurchaseOrderID,
                    po.MaterialID,
                    po.Quantity,
                    po.UnitPrice,
                    po.TotalAmount,
                    po.OrderDate,
                    po.SupplierID,
                    po.Status,
                    po.Discount,
                    po.Tax,
                    po.DeliveryDate,
                    m.Name AS MaterialName,
                    s.Name AS SupplierName
                FROM 
                    purchaseorderdetails  po
                LEFT JOIN materials m ON po.MaterialID = m.MaterialID
                LEFT JOIN suppliers s ON po.SupplierID = s.SupplierID
                ORDER BY po.DeliveryDate ASC
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
?>
