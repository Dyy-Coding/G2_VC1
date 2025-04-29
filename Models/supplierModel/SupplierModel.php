<?php

class SupplierManagementModel
{
    private $conn;

    public function __construct() {
        // Initialize the database connection
        $this->conn = Database::getConnection();
    }

    public function supplierDetail($supplierId)
    {
        try {
            $query = "SELECT s.*
            FROM suppliers s
                      WHERE s.SupplierID = :supplierId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':supplierId', $supplierId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    

    // Get top 5 suppliers who have purchase orders
public function getTopSuppliersWithPurchaseOrders($limit = 9)
{
    try {
        $query = "
            SELECT s.*, COUNT(po.PurchaseOrderID) AS TotalOrders
            FROM suppliers s
            INNER JOIN purchaseorderdetails po ON s.SupplierID = po.SupplierID
            GROUP BY s.SupplierID
            ORDER BY TotalOrders DESC
            LIMIT :limit
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Error fetching top suppliers: " . $e->getMessage());
    }
}


    // Get all suppliers (Category removed)
    public function getAllSuppliers()
    {
        $query = "SELECT * FROM suppliers ORDER BY SupplierID";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all categories (Still here in case you need categories separately)
    public function getAllCategories()
    {
        try {
            $query = "SELECT CategoryID, CategoryName FROM categories ORDER BY CategoryName";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching categories: " . $e->getMessage());
        }
    }

    // Get supplier by ID
    public function getSupplierById($supplierId)
    {
        try {
            $query = "SELECT * FROM suppliers WHERE SupplierID = :id LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':id' => (int) $supplierId]);
            $supplier = $stmt->fetch(PDO::FETCH_ASSOC);
            return $supplier ? $supplier : null;
        } catch (PDOException $e) {
            throw new Exception("Error fetching supplier: " . $e->getMessage());
        }
    }

    // Check if the email exists
    public function emailExists($email, $excludeSupplierId = null)
    {
        try {
            $query = "SELECT COUNT(*) FROM suppliers WHERE Email = :email";
            if ($excludeSupplierId) {
                $query .= " AND SupplierID != :id";
            }
            $stmt = $this->conn->prepare($query);
            $params = [':email' => $email];
            if ($excludeSupplierId) {
                $params[':id'] = (int) $excludeSupplierId;
            }
            $stmt->execute($params);
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            throw new Exception("Error checking email: " . $e->getMessage());
        }
    }

    // Store new supplier (CategoryID removed)
    public function supplierStore($data)
    {
        try {
            if ($this->emailExists($data['Email'])) {
                throw new Exception("Email already exists");
            }

            $query = "INSERT INTO suppliers 
                      (Name, ContactPerson, Phone, Email, Address, image, CreatedAt, UpdatedAt) 
                      VALUES 
                      (:Name, :ContactPerson, :Phone, :Email, :Address, :image, NOW(), NOW())";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([
                ':Name' => $data['Name'],
                ':ContactPerson' => $data['ContactPerson'],
                ':Phone' => $data['Phone'],
                ':Email' => $data['Email'],
                ':Address' => $data['Address'] ?? null,
                ':image' => $data['image'] ?? null
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error adding supplier: " . $e->getMessage());
        }
    }

    // Update supplier (CategoryID removed)
    public function updateSupplier($data)
    {
        try {
            if ($this->emailExists($data['email'], $data['supplier_id'])) {
                throw new Exception("Email already exists");
            }

            $query = "UPDATE suppliers SET 
                        Name = :name,
                        ContactPerson = :contact_person,
                        Email = :email,
                        Phone = :phone,
                        Address = :address,
                        image = :image,
                        UpdatedAt = NOW()
                      WHERE SupplierID = :supplier_id";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([
                ':name' => $data['name'],
                ':contact_person' => $data['contact_person'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':address' => $data['address'] ?? null,
                ':image' => $data['image'] ?? null,
                ':supplier_id' => $data['supplier_id']
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error updating supplier: " . $e->getMessage());
        }
    }

    // Delete supplier
    public function deleteSupplier($supplierId)
    {
        try {
            $query = "DELETE FROM suppliers WHERE SupplierID = :id";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([':id' => (int) $supplierId]);
        } catch (PDOException $e) {
            throw new Exception("Error deleting supplier: " . $e->getMessage());
        }
    }
}
