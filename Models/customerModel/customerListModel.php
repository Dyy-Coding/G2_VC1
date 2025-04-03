<?php
require_once "Database/Database.php";

class CustomerInfoModel
{
    private $dsn;
    
    function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    function getCustomersModel()
    {
        try {
            $query = "SELECT 
                        c.CustomerID, 
                        c.Profile, 
                        c.Name, 
                        c.Phone, 
                        c.Email, 
                        c.Address, 
                        c.Status, 
                        c.created,
                        m.Name AS MaterialName,
                        c.Quantity
                      FROM 
                        customers c
                      LEFT JOIN 
                        materials m ON c.MaterialID = m.MaterialID
                      ORDER BY 
                        c.created DESC";
            
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching customers: " . $e->getMessage());
            return [];
        }
    }
}