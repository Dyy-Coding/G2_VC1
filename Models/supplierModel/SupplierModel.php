<?php
require_once "Database/Database.php";

class SupplierManagementModel
{
    private $dsn;

    public function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    // Fetch all suppliers with their associated categories
    public function getAllSuppliersWithCategories()
    {
        try {
            $query = "SELECT s.*, c.CategoryName 
                      FROM suppliers s
                      LEFT JOIN categories c ON s.CategoryID = c.CategoryID
                      ORDER BY s.SupplierID";
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching suppliers: " . $e->getMessage());
        }
    }

    // Fetch all categories for dropdowns
    public function getAllCategories()
    {
        try {
            $query = "SELECT CategoryID, CategoryName FROM categories ORDER BY CategoryName";
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching categories: " . $e->getMessage());
        }
    }

    // Fetch a single supplier by ID
    public function getSupplierById($supplierId)
    {
        try {
            $query = "SELECT * FROM suppliers WHERE SupplierID = :id LIMIT 1";
            $stmt = $this->dsn->prepare($query);
            $stmt->execute([':id' => (int)$supplierId]);
            $supplier = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$supplier) {
                return null;
            }
            return $supplier;
        } catch (PDOException $e) {
            throw new Exception("Error fetching supplier: " . $e->getMessage());
        }
    }

    // Check if an email already exists (for uniqueness validation)
    public function emailExists($email, $excludeSupplierId = null)
    {
        try {
            $query = "SELECT COUNT(*) FROM suppliers WHERE Email = :email";
            if ($excludeSupplierId) {
                $query .= " AND SupplierID != :id";
            }
            $stmt = $this->dsn->prepare($query);
            $params = [':email' => $email];
            if ($excludeSupplierId) {
                $params[':id'] = (int)$excludeSupplierId;
            }
            $stmt->execute($params);
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            throw new Exception("Error checking email: " . $e->getMessage());
        }
    }

    // Insert a new supplier
    public function supplierStore($data)
    {
        try {
            // Check for email uniqueness
            if ($this->emailExists($data['Email'])) {
                throw new Exception("Email already exists");
            }

            $query = "INSERT INTO suppliers 
                      (CategoryID, Name, ContactPerson, Phone, Email, Address, image, CreatedAt, UpdatedAt) 
                      VALUES 
                      (:CategoryID, :Name, :ContactPerson, :Phone, :Email, :Address, :image, NOW(), NOW())";
            $stmt = $this->dsn->prepare($query);
            $result = $stmt->execute([
                ':CategoryID' => $data['CategoryID'],
                ':Name' => $data['Name'],
                ':ContactPerson' => $data['ContactPerson'],
                ':Phone' => $data['Phone'],
                ':Email' => $data['Email'],
                ':Address' => $data['Address'] ?: null,
                ':image' => $data['image'] ?: null
            ]);
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Error adding supplier: " . $e->getMessage());
        }
    }

    // Update an existing supplier
    public function updateSupplier($data)
    {
        try {
            // Check for email uniqueness (excluding the current supplier)
            if ($this->emailExists($data['email'], $data['supplier_id'])) {
                throw new Exception("Email already exists");
            }

            $query = "UPDATE suppliers SET 
                        Name = :name,
                        ContactPerson = :contact_person,
                        Email = :email,
                        Phone = :phone,
                        Address = :address,
                        CategoryID = :category_id,
                        image = :image,
                        UpdatedAt = NOW()
                      WHERE SupplierID = :supplier_id";
            $stmt = $this->dsn->prepare($query);
            $result = $stmt->execute([
                ':name' => $data['name'],
                ':contact_person' => $data['contact_person'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':address' => $data['address'] ?: null,
                ':category_id' => $data['category_id'],
                ':image' => $data['image'] ?: null,
                ':supplier_id' => $data['supplier_id']
            ]);
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Error updating supplier: " . $e->getMessage());
        }
    }

    // Delete a supplier
    public function deleteSupplier($supplierId)
    {
        try {
            $query = "DELETE FROM suppliers WHERE SupplierID = :id";
            $stmt = $this->dsn->prepare($query);
            return $stmt->execute([':id' => (int)$supplierId]);
        } catch (PDOException $e) {
            throw new Exception("Error deleting supplier: " . $e->getMessage());
        }
    }
}