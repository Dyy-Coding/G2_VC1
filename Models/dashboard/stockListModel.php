<?php
require_once "Database/Database.php";

class StockListModel
{
    private $dsn;
    
    function __construct()
    {
        $this->dsn = Database::getConnection();
    }
    function StockListAutoUpdateData()
    {
        try {
            $query = "
                SELECT m.MaterialID, m.Name AS MaterialName, c.CategoryName, m.Quantity, m.Status
                FROM materials m
                LEFT JOIN categories c ON m.CategoryID = c.CategoryID
                WHERE m.Status = 'Active'
            ";
            
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            
            $materials = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['Quantity'] > 10) {
                    $row['StockStatus'] = 'Have in stock';
                    $row['StockColor'] = 'success'; 
                } elseif ($row['Quantity'] > 0 && $row['Quantity'] <= 10) {
                    $row['StockStatus'] = 'Low stock';
                    $row['StockColor'] = 'warning';
                } else {
                    $row['StockStatus'] = 'Out of stock';
                    $row['StockColor'] = 'danger';
                }
                $materials[] = $row;
            }
            
            return $materials;
        } catch (PDOException $e) {
            error_log("Error fetching stock list: " . $e->getMessage());
            return [];
        }
    }
}