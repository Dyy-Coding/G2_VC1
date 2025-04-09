<?php


class Material {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getMaterialsByIds(array $ids) {
        try {
            if (empty($ids)) {
                return []; // No IDs provided
            }
    
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                      FROM Materials m
                      LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                      LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                      WHERE m.MaterialID IN ($placeholders)";
    
            $stmt = $this->conn->prepare($query);
            $stmt->execute($ids);
            $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!$materials) {
                error_log("No materials found for IDs: " . implode(',', $ids));
            }
    
            return $materials;
        } catch (PDOException $e) {
            error_log("Error fetching materials by IDs: " . $e->getMessage());
            return [];
        }
    }
    

    public function getAllMaterials() {
        try {
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                      FROM Materials m
                      LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                      LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                      ORDER BY m.CreatedAt DESC";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
            error_log("Fetched Materials: " . json_encode($materials));
            return $materials;
        } catch (PDOException $e) {
            error_log("Error fetching materials: " . $e->getMessage());
            return [];
        }
    }

    public function deleteSelectedMaterials(array $materials) {
        try {
            if (empty($materials)) {
                error_log("No materials selected for deletion.");
                return false; // No materials selected
            }

            $placeholders = implode(',', array_fill(0, count($materials), '?'));
            $stmt = $this->conn->prepare("DELETE FROM Materials WHERE MaterialID IN ($placeholders)");

            // Execute the query with material IDs as parameters
            $stmt->execute($materials);

            error_log("Successfully deleted materials with IDs: " . implode(', ', $materials));
            return true;
        } catch (PDOException $e) {
            error_log("Error deleting selected materials: " . $e->getMessage());
            return false;
        }
    }

    public function uploadImage(array $file) {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ['error' => 'Invalid file upload.'];
        }

        $targetDir = "uploads/images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = preg_replace("/[^a-zA-Z0-9._-]/", "_", basename($file['name']));
        $filePath = $targetDir . uniqid() . '_' . $fileName;
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        $validTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $validTypes)) {
            return ['error' => 'Only JPG, JPEG, PNG & GIF files are allowed.'];
        }

        if ($file['size'] > 5 * 1024 * 1024) {
            return ['error' => 'File size must be less than 5MB.'];
        }

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['error' => 'Failed to upload the image.'];
        }

        return ['success' => $filePath];
    }

    public function editMaterial(int $id, array $data) {
        $query = "UPDATE Materials SET Name = :name, CategoryID = :categoryID, Quantity = :quantity, UnitPrice = :unitPrice, SupplierID = :supplierID, MinStockLevel = :minStockLevel, ReorderLevel = :reorderLevel, UnitOfMeasure = :unitOfMeasure, Size = :size, ImagePath = :imagePath, Description = :description, UpdatedAt = NOW(), Brand = :brand, Location = :location, SupplierContact = :supplierContact, Status = :status, WarrantyPeriod = :warrantyPeriod WHERE MaterialID = :id";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':id' => $id,
                ':name' => $data['name'],
                ':categoryID' => $data['categoryID'],
                ':quantity' => $data['quantity'],
                ':unitPrice' => $data['unitPrice'],
                ':supplierID' => $data['supplierID'],
                ':minStockLevel' => $data['minStockLevel'] ?? null,
                ':reorderLevel' => $data['reorderLevel'] ?? null,
                ':unitOfMeasure' => $data['unitOfMeasure'] ?? null,
                ':size' => $data['size'] ?? null,
                ':imagePath' => $data['imagePath'] ?? null,
                ':description' => $data['description'] ?? null,
                ':brand' => $data['brand'] ?? null,
                ':location' => $data['location'] ?? null,
                ':supplierContact' => $data['supplierContact'] ?? null,
                ':status' => $data['status'] ?? null,
                ':warrantyPeriod' => $data['warrantyPeriod'] ?? null
            ]);

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                error_log("Material with ID $id updated successfully.");
                return true;
            }
            error_log("No material with ID $id was updated.");
            return false;
        } catch (PDOException $e) {
            error_log("Exception in editMaterial: " . $e->getMessage());
            return false;
        }
    }

    public function addMaterial(array $data) {
        $requiredFields = ['name', 'categoryID', 'supplierID', 'quantity', 'unitPrice'];

        foreach ($requiredFields as $field) {
            if (empty($data[$field]) || ($field === 'categoryID' && $data[$field] <= 0) || ($field === 'supplierID' && $data[$field] <= 0) || ($field === 'quantity' && $data[$field] < 0) || ($field === 'unitPrice' && $data[$field] < 0)) {
                error_log("Validation Error: $field is invalid or missing. Value: " . ($data[$field] ?? 'unset'));
                return false;
            }
        }

        $query = "INSERT INTO Materials (Name, CategoryID, Quantity, UnitPrice, SupplierID, MinStockLevel, ReorderLevel, UnitOfMeasure, Size, ImagePath, Description, CreatedAt, UpdatedAt, Brand, Location, SupplierContact, Status, WarrantyPeriod) 
                  VALUES (:name, :categoryID, :quantity, :unitPrice, :supplierID, :minStockLevel, :reorderLevel, :unitOfMeasure, :size, :imagePath, :description, NOW(), NOW(), :brand, :location, :supplierContact, :status, :warrantyPeriod)";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':name' => $data['name'],
                ':categoryID' => $data['categoryID'],
                ':quantity' => $data['quantity'],
                ':unitPrice' => $data['unitPrice'],
                ':supplierID' => $data['supplierID'],
                ':minStockLevel' => $data['minStockLevel'] ?? null,
                ':reorderLevel' => $data['reorderLevel'] ?? null,
                ':unitOfMeasure' => $data['unitOfMeasure'] ?? null,
                ':size' => $data['size'] ?? null,
                ':imagePath' => $data['imagePath'] ?? null,
                ':description' => $data['description'] ?? null,
                ':brand' => $data['brand'] ?? null,
                ':location' => $data['location'] ?? null,
                ':supplierContact' => $data['supplierContact'] ?? null,
                ':status' => $data['status'] ?? null,
                ':warrantyPeriod' => $data['warrantyPeriod'] ?? null
            ]);
            $lastInsertId = $this->conn->lastInsertId();
            error_log("Material added with ID $lastInsertId.");
            return $lastInsertId;
        } catch (PDOException $e) {
            error_log("Exception in addMaterial: " . $e->getMessage() . " | Data: " . json_encode($data));
            return false;
        }
    }

    public function getSuppliers() {
        try {
            $stmt = $this->conn->prepare("SELECT SupplierID, Name FROM Suppliers");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching suppliers: " . $e->getMessage());
            return [];
        }
    }

    public function deleteMaterial(int $id) {
        try {
            $query = "DELETE FROM Materials WHERE MaterialID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':id' => $id]);

            if ($stmt->rowCount() > 0) {
                error_log("Material with ID $id deleted successfully.");
                return true;
            }

            error_log("No material found with ID $id to delete.");
            return false;
        } catch (PDOException $e) {
            error_log("Exception in deleteMaterial: " . $e->getMessage());
            return false;
        }
    }

    public function getMaterialById(int $id) {
        try {
            $query = "SELECT m.*, c.CategoryName, s.Name AS SupplierName 
                      FROM Materials m
                      LEFT JOIN Categories c ON m.CategoryID = c.CategoryID
                      LEFT JOIN Suppliers s ON m.SupplierID = s.SupplierID
                      WHERE m.MaterialID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching material by ID: " . $e->getMessage());
            return false;
        }
    }
    public function importProductsFromExcel($filePath) {
        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            // Remove header row
            array_shift($data);

            $results = [
                'total' => count($data),
                'imported' => 0,
                'skipped' => 0,
                'errors' => []
            ];

            foreach ($data as $rowIndex => $row) {
                try {
                    // Skip empty rows
                    if (empty(array_filter($row))) {
                        $results['skipped']++;
                        continue;
                    }

                    $product = $this->validateProductRow($row, $rowIndex);
                    
                    if ($this->barcodeExists($product['barcode'])) {
                        $results['skipped']++;
                        $this->log[] = "Row " . ($rowIndex + 2) . ": Skipped - Duplicate barcode";
                        continue;
                    }

                    $this->addProduct($product);
                    $results['imported']++;
                    $this->log[] = "Row " . ($rowIndex + 2) . ": Successfully imported";

                } catch (Exception $e) {
                    $results['errors'][] = "Row " . ($rowIndex + 2) . ": " . $e->getMessage();
                    $results['skipped']++;
                    $this->log[] = "Row " . ($rowIndex + 2) . ": Error - " . $e->getMessage();
                }
            }

            return [
                'success' => true,
                'stats' => $results,
                'log' => $this->log
            ];

        } catch (Exception $e) {
            error_log("Import failed: " . $e->getMessage());
            return [
                'success' => false,
                'message' => "File processing error: " . $e->getMessage(),
                'log' => $this->log
            ];
        }
    }

    private function validateProductRow($row, $rowIndex) {
        $product = [
            'name' => trim($row[0] ?? ''),
            'price' => $this->parseNumber($row[1] ?? 0),
            'purchase_price' => $this->parseNumber($row[2] ?? 0),
            'supplier_id' => is_numeric($row[3] ?? null) ? (int)$row[3] : null,
            'barcode' => trim($row[4] ?? ''),
            'image' => $row[5] ?? null,
            'quantity' => $this->parseQuantity($row[6] ?? 0),
            'end_date' => $this->parseDate($row[7] ?? null)
        ];
        error_log("Processed quantity: " . $product['quantity']);

        

        // Validate required fields
        if (empty($product['name'])) {
            throw new Exception("Product name is required");
        }

        if (empty($product['barcode'])) {
            throw new Exception("Barcode is required");
        }

        return $product;
    }

    private function parseNumber($value) {
        if (is_numeric($value)) return $value;
        
        // Remove currency symbols and thousands separators
        $cleaned = preg_replace('/[^0-9.-]/', '', $value);
        return (float)$cleaned;
    }
    private function parseQuantity($value) {
        if (is_numeric($value)) return (int)$value;
        return (int)preg_replace('/[^0-9]/', '', $value);
    }

    private function parseDate($value) {
        if (empty($value)) return null;

        try {
            if (is_numeric($value)) {
                // Convert Excel date to PHP DateTime
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)
                    ->format('Y-m-d');
            }
            return date('Y-m-d', strtotime($value));
        } catch (Exception $e) {
            return null;
        }
    }
    

    private function barcodeExists($barcode) {
        if (empty($barcode)) return false;
        
        // Modified to work with your Database::query() method
        $result = $this->db->query(
            "SELECT COUNT(*) FROM products WHERE barcode = ?", 
            [$barcode]
        )->fetchColumn();
        
        return $result > 0;
    }

    private function addProduct($product) {
        // Modified to work with your Database::query() method
        $this->db->query(
            "INSERT INTO products 
            (name, price, purchase_price, supplier_id, barcode, image, quantity, end_date, created_at, updated_at) 
            VALUES 
            (:name, :price, :purchase_price, :supplier_id, :barcode, :image, :quantity, :end_date, NOW(), NOW())",
            $product
        );
    }


}
