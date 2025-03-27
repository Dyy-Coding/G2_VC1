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
        // Query to fetch material data with category name
        $query = "
            SELECT 
                m.NAME AS MaterialName, 
                c.CategoryName, 
                m.QUANTITY 
            FROM 
                construction_depot_lim_try_materials m
            LEFT JOIN 
                construction_depot_lim_try_categories c 
            ON 
                m.CategoryID = c.CategoryID
        ";

        try {
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            // Handle error (you might want to log this in a real application)
            echo "Error fetching stock list: " . $e->getMessage();
            return [];
        }
    }
}