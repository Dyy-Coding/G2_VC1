<?php

class SalesModel {

    // Function to retrieve all sales
    public static function getAllSales() {
        try {
            $db = Database::getConnection(); // Get database connection
            $query = "SELECT s.SaleID, m.Name AS MaterialName, s.Quantity, s.TotalPrice, s.SaleDate, 
                             c.Name AS CustomerName, s.Status
                      FROM sales s
                      JOIN materials m ON s.MaterialID = m.MaterialID
                      JOIN customers c ON s.CustomerID = c.CustomerID
                      ORDER BY s.SaleDate DESC";

            $stmt = $db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching sales: " . $e->getMessage());
            return [];
        }
    }

    // Function to get a single sale by ID
    public static function getSaleById($saleId) {
        try {
            $db = Database::getConnection();
            $query = "SELECT s.SaleID, m.Name AS MaterialName, s.Quantity, s.TotalPrice, s.SaleDate, 
                             c.Name AS CustomerName, s.Status
                      FROM sales s
                      JOIN materials m ON s.MaterialID = m.MaterialID
                      JOIN customers c ON s.CustomerID = c.CustomerID
                      WHERE s.SaleID = :saleId";

            $stmt = $db->prepare($query);
            $stmt->bindParam(':saleId', $saleId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching sale by ID: " . $e->getMessage());
            return null;
        }
    }

    // Function to create a new sale
    public static function createSale($materialId, $customerId, $quantity, $totalPrice, $status) {
        try {
            $db = Database::getConnection();
            $query = "INSERT INTO sales (MaterialID, CustomerID, Quantity, TotalPrice, SaleDate, Status)
                      VALUES (:materialId, :customerId, :quantity, :totalPrice, NOW(), :status)";

            $stmt = $db->prepare($query);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':totalPrice', $totalPrice, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error creating sale: " . $e->getMessage());
            return false;
        }
    }

    // Function to delete a sale
    public static function deleteSale($saleId) {
        try {
            $db = Database::getConnection();
            $query = "DELETE FROM sales WHERE SaleID = :saleId";

            $stmt = $db->prepare($query);
            $stmt->bindParam(':saleId', $saleId, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error deleting sale: " . $e->getMessage());
            return false;
        }
    }
}
