<?php

class Category {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getBestSellingCategories() {
        try {
            $sql = "
                SELECT 
                    c.CategoryName AS CategoryName,
                    SUM(m.Quantity) AS TotalStockInCategory,
                    SUM(sod.Quantity) AS TotalQuantitySold,
                    SUM(sod.Total) AS TotalSalesAmount
                FROM 
                    salesorderdetails sod
                JOIN 
                    materials m ON sod.MaterialID = m.MaterialID
                JOIN 
                    categories c ON m.CategoryID = c.CategoryID
                GROUP BY 
                    c.CategoryName
                ORDER BY 
                    TotalSalesAmount DESC
            ";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching best selling categories: " . $e->getMessage());
            return [];
        }
    }
    

    // Fetch all categories with Description and UpdatedAt
    public function getAllCategories() {
        try {
            $stmt = $this->conn->prepare("SELECT CategoryID, CategoryName, Description, UpdatedAt FROM Categories");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching categories: " . $e->getMessage());
            return [];
        }
    }

    // Method to get all categories 
    public function getCategoryById($categoryID) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Categories WHERE CategoryID = :categoryID");
            $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching category: " . $e->getMessage());
            return null;
        }
    }

    public function updateCategory($categoryID, $categoryName, $description) {
        try {
            $stmt = $this->conn->prepare("
                UPDATE Categories 
                SET CategoryName = :categoryName, Description = :description, UpdatedAt = NOW()
                WHERE CategoryID = :categoryID
            ");
            $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
            $stmt->bindParam(':categoryName', $categoryName);
            $stmt->bindParam(':description', $description);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating category: " . $e->getMessage());
            return false;
        }
    }    
    

    // Method to add a new category
    public function addCategory($categoryName, $description) {
        try {
            // Prepare the SQL query to insert a new category
            $query = "INSERT INTO Categories (CategoryName, Description) VALUES (:categoryName, :description)";

            // Prepare the statement
            $stmt = $this->conn->prepare($query);

            // Bind parameters to the statement
            $stmt->bindParam(':categoryName', $categoryName);
            $stmt->bindParam(':description', $description);

            // Execute the statement
            $stmt->execute();

            // Return the last inserted ID (or true if successful)
            return $this->conn->lastInsertId();

        } catch (PDOException $e) {
            error_log("Error adding category: " . $e->getMessage());
            return false;
        }
    }

    public function deleteCategory($categoryID) {
        try {
            // Prepare the SQL query to delete the category
            $query = "DELETE FROM Categories WHERE CategoryID = :categoryID";
    
            // Prepare the statement
            $stmt = $this->conn->prepare($query);
    
            // Bind the category ID
            $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
    
            // Execute the statement
            $stmt->execute();
    
            // Return true if deletion is successful
            return true;
        } catch (PDOException $e) {
            error_log("Error deleting category: " . $e->getMessage());
            return false;
        }
    }

    public function deleteSelectedCategories($categoryIDs) {
        try {
            if (empty($categoryIDs)) {
                return false; // No categories selected
            }
    
            $placeholders = implode(',', array_fill(0, count($categoryIDs), '?'));
            $stmt = $this->conn->prepare("DELETE FROM Categories WHERE CategoryID IN ($placeholders)");
    
            // Execute the query with category IDs as parameters
            $stmt->execute($categoryIDs);
    
            return true;
        } catch (PDOException $e) {
            error_log("Error deleting selected categories: " . $e->getMessage());
            return false;
        }
    }

    public function getMaterialCountByCategory() {
        try {
            $sql = "SELECT c.CategoryID, c.CategoryName, COUNT(m.MaterialID) AS MaterialCount
                    FROM categories c
                    LEFT JOIN materials m ON c.CategoryID = m.CategoryID
                    GROUP BY c.CategoryID, c.CategoryName";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching material count by category: " . $e->getMessage());
            return [];
        }
    }

    public function getCategoryDetails($categoryID) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Categories WHERE CategoryID = :categoryID");
            $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching category details: " . $e->getMessage());
            return null;
        }
    }

    
}
