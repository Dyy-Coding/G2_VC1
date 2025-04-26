<?php

class StockModel {
    private $conn;

    public function __construct() {
        // Get the database connection using the Database class
        $this->conn = Database::getConnection();
    }

    // Function to get stock list data with Material and Category names, excluding in-stock materials
    public function getStockList() {
        // Query to fetch Material ID, Category ID, and Quantity along with the names, excluding in-stock materials
        $query = "
            SELECT m.MaterialID, m.Name, c.CategoryName, m.Quantity
            FROM materials m
            JOIN categories c ON m.CategoryID = c.CategoryID
            WHERE m.Quantity <= 10
        ";
        
        // Prepare and execute the query
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $stockListData = [];

        // Fetch results
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Determine stock status based on Quantity
            if ($row['Quantity'] == 0) {
                $stockStatus = 'Out of stock';
                $stockColor = 'danger';
            } elseif ($row['Quantity'] > 0 && $row['Quantity'] <= 10) {
                $stockStatus = 'Low stock';
                $stockColor = 'warning';
            } 

            // Add the stock information to the array
            $stockListData[] = [
                'MaterialID' => $row['MaterialID'],
                'MaterialName' => $row['Name'],
                'CategoryName' => $row['CategoryName'],
                'Quantity' => $row['Quantity'],
                'StockStatus' => $stockStatus,
                'StockColor' => $stockColor,
            ];
        }

        // Return the stock data
        return $stockListData;
    }

    public function getTopPurchasedMaterials() {
        // Query to fetch Material ID, Category Name, Purchase Order Quantity, Total Amount, Type, and Size
        $query = "
            SELECT 
                m.MaterialID, 
                m.Name AS MaterialName, 
                c.CategoryName, 
                m.Size AS MaterialSize,      -- Assuming 'Size' is a column in the 'materials' table
                SUM(po.Quantity) AS PurchaseOrderQuantity,
                SUM(po.Quantity * po.TotalAmount) AS TotalAmount
            FROM materials m
            JOIN categories c ON m.CategoryID = c.CategoryID
            JOIN purchaseorderdetails po ON m.MaterialID = po.MaterialID
            GROUP BY m.MaterialID, m.Name, c.CategoryName, m.Size
            ORDER BY PurchaseOrderQuantity DESC
        ";
        
        // Prepare and execute the query
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        $purchaseListData = [];
    
        // Fetch results
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Add the material data to the array
            $purchaseListData[] = [
                'MaterialID' => $row['MaterialID'],
                'MaterialName' => $row['MaterialName'],
                'CategoryName' => $row['CategoryName'],
                'MaterialSize' => $row['MaterialSize'],   // Add Material Size to data
                'PurchaseOrderQuantity' => $row['PurchaseOrderQuantity'],
                'TotalAmount' => $row['TotalAmount'],
            ];
        }
    
        // Return the materials with the highest purchase order quantities and their total amounts
        return $purchaseListData;
    }
    
}
?>
