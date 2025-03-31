<?php
require_once "Database/Database.php";

class SupplierManagementModel
{
    private $dsn;
    function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    // Read
    public function getAllSuppliersWithCategories()
    {
        $query = "SELECT s.*, c.CategoryName 
                  FROM suppliers s
                  LEFT JOIN categories c ON s.CategoryID = c.CategoryID
                  ORDER BY s.SupplierID";

        $stmt = $this->dsn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insert / Create
    function supplierFormAdd()
    {
        $query = "SELECT CategoryID, CategoryName FROM categories ORDER BY CategoryName";
        $stmt = $this->dsn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function supplierStore($data)
    {
        $query = "INSERT INTO suppliers 
                  (CategoryID, Name, ContactPerson, Phone, Email, Address, profile_supplier, CreatedAt, UpdatedAt) 
                  VALUES 
                  (:CategoryID, :Name, :ContactPerson, :Phone, :Email, :Address, :profile_supplier, NOW(), NOW())";

        $stmt = $this->dsn->prepare($query);

        return $stmt->execute([
            ':CategoryID' => $data['CategoryID'],
            ':Name' => $data['Name'],
            ':ContactPerson' => $data['ContactPerson'],
            ':Phone' => $data['Phone'],
            ':Email' => $data['Email'],
            ':Address' => $data['Address'],
            ':profile_supplier' => $data['profile_supplier'] ?? null // Handle profile image path
        ]);
    }

    // Edit
    function getSupplierById($supplierId)
    {
        $query = "SELECT * FROM suppliers WHERE SupplierID = :id LIMIT 1";
        $stmt = $this->dsn->prepare($query);
        $stmt->execute([':id' => $supplierId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getAllCategories()
    {
        $query = "SELECT CategoryID, CategoryName FROM categories ORDER BY CategoryName";
        $stmt = $this->dsn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSupplier($data)
    {
        $query = "UPDATE suppliers SET 
                    Name = :name,
                    ContactPerson = :contact_person,
                    Email = :email,
                    Phone = :phone,
                    Address = :address,
                    CategoryID = :category_id,
                    profile_supplier = :profile_supplier,
                    UpdatedAt = NOW()
                  WHERE SupplierID = :supplier_id";

        $stmt = $this->dsn->prepare($query);

        return $stmt->execute([
            ':name' => $data['name'],
            ':contact_person' => $data['contact_person'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':address' => $data['address'],
            ':category_id' => $data['category_id'],
            ':profile_supplier' => $data['profile_supplier'] ?? null,
            ':supplier_id' => $data['supplier_id']
        ]);
    }

    // Delete
    public function deleteSupplier($supplierId)
    {
        $query = "DELETE FROM suppliers WHERE SupplierID = :id";
        $stmt = $this->dsn->prepare($query);
        return $stmt->execute([':id' => $supplierId]);
    }
}