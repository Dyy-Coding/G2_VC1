<?php

class InventoryController extends BaseController {
    private $material;

    public function __construct() {
        $this->material = new Material();
    }

    public function inventory() {
        $categories = $this->material->getCategories();
        $suppliers = $this->material->getSuppliers();
        $materials = $this->material->getAllMaterials();
    
        $this->renderView("adminView/inventory/stock", [
            'categories' => $categories,
            'suppliers' => $suppliers,
            'materials'  => $materials,
            'flash_message' => $_SESSION['flash_message'] ?? null
        ]);
        unset($_SESSION['flash_message']);
    }

    public function category() {
        $this->renderView('adminView/inventory/category');
    }

    public function order() {
        $this->renderView('adminView/inventory/order');
    }

    public function materialEditForSome($id) {
        $material = $this->material->getMaterialById($id);
        $suppliers = $this->material->getSuppliers();
        $categories = $this->material->getCategories();
        
        if (!$material) {
            $this->renderView('errors/404', [], 404);
            return;
        }
    
        $this->renderView('adminView/inventory/editnewone', [
            'material' => $material,
            'suppliers' => $suppliers,
            'categories' => $categories,
            'flash_message' => $_SESSION['flash_message'] ?? null
        ]);
        unset($_SESSION['flash_message']);
    }

    public function updateMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) $_POST['materialID'] ?? 0;
            $material = $this->material->getMaterialById($id);

            if (!$material) {
                $this->setFlashMessage('error', 'Material not found!');
                $this->redirect('/inventory');
                return;
            }

            $data = [
                'name' => $this->sanitizeInput($_POST['Name'] ?? ''),
                'categoryID' => (int) $_POST['categoryID'] ?? 0,
                'quantity' => (int) $_POST['Quantity'] ?? 0,
                'unitPrice' => (float) $_POST['UnitPrice'] ?? 0.0,
                'supplierID' => (int) $_POST['supplierID'] ?? 0,
                'description' => $this->sanitizeInput($_POST['Description'] ?? ''),
                'brand' => $this->sanitizeInput($_POST['Brand'] ?? ''),
                'status' => $this->sanitizeInput($_POST['Status'] ?? ''),
                'minStockLevel' => (int) $_POST['minStockLevel'] ?? 0,
                'reorderLevel' => (int) $_POST['reorderLevel'] ?? 0,
                'unitOfMeasure' => $this->sanitizeInput($_POST['unitOfMeasure'] ?? ''),
                'size' => $this->sanitizeInput($_POST['Size'] ?? ''),
                'location' => $this->sanitizeInput($_POST['location'] ?? ''),
                'supplierContact' => $this->sanitizeInput($_POST['supplierContact'] ?? ''),
                'warrantyPeriod' => $this->sanitizeInput($_POST['warrantyPeriod'] ?? ''),
            ];

            error_log("Submitted Size: " . $data['size']);

            if (empty($data['name']) || empty($data['categoryID']) || empty($data['supplierID'])) {
                $this->setFlashMessage('error', 'Name, Category, and Supplier are required!');
                $this->redirect("/inventory/editmaterial/{$id}");
                return;
            }

            $image = $_FILES['image'] ?? null;
            if (!empty($image['name']) && $image['error'] === UPLOAD_ERR_OK) {
                $uploadResult = $this->material->uploadImage($image);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect("/inventory/editmaterial/{$id}");
                    return;
                }
                $data['imagePath'] = $uploadResult['success'];
            } else {
                $data['imagePath'] = $material['ImagePath'];
            }

            $updateSuccess = $this->material->editMaterial($id, $data);

            if ($updateSuccess) {
                $this->setFlashMessage('success', 'Material updated successfully!');
                $this->redirect('/inventory');
            } else {
                error_log("Error updating material: Database update failed for ID " . $id);
                $this->setFlashMessage('error', 'Error updating material! Please try again.');
                $this->redirect("/inventory/editmaterial/{$id}");
            }
        } else {
            $this->redirect('/inventory');
        }
    }

    public function deleteMaterial($id) {
        $material = $this->material->getMaterialById($id);

        if (!$material) {
            $this->setFlashMessage('error', 'Material not found!');
            $this->redirect('/inventory');
            return;
        }

        $deleteSuccess = $this->material->deleteMaterial($id);

        if ($deleteSuccess) {
            if (!empty($material['ImagePath']) && file_exists($material['ImagePath'])) {
                unlink($material['ImagePath']);
            }
            $this->setFlashMessage('success', 'Material deleted successfully!');
        } else {
            error_log("Error deleting material: Database delete failed for ID " . $id);
            $this->setFlashMessage('error', 'Error deleting material! Please try again.');
        }

        $this->redirect('/inventory');
    }

    public function viewMaterial($id) {
        $material = $this->material->getMaterialById($id);
        
        if (!$material) {
            $this->renderView('errors/404', [], 404);
            return;
        }

        $this->renderView('adminView/inventory/viewMaterial', [
            'material' => $material,
            'flash_message' => $_SESSION['flash_message'] ?? null
        ]);
        unset($_SESSION['flash_message']);
    }

    // Unchanged addMaterial method from your last request
    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $this->sanitizeInput($_POST['name'] ?? ''),
                'categoryID' => (int) ($_POST['categoryID'] ?? 0),
                'supplierID' => (int) ($_POST['supplierID'] ?? 0),
                'quantity' => (int) ($_POST['quantity'] ?? 0),
                'unitPrice' => (float) ($_POST['unitPrice'] ?? 0.0),
                'minStockLevel' => (int) ($_POST['minStockLevel'] ?? 0),
                'reorderLevel' => (int) ($_POST['reorderLevel'] ?? 0),
                'unitOfMeasure' => $this->sanitizeInput($_POST['unitOfMeasure'] ?? ''),
                'size' => $this->sanitizeInput($_POST['size'] ?? ''),
                'description' => $this->sanitizeInput($_POST['description'] ?? ''),
                'brand' => $this->sanitizeInput($_POST['brand'] ?? ''),
                'location' => $this->sanitizeInput($_POST['location'] ?? ''),
                'supplierContact' => $this->sanitizeInput($_POST['supplierContact'] ?? ''),
                'status' => $this->sanitizeInput($_POST['status'] ?? ''),
                'warrantyPeriod' => $this->sanitizeInput($_POST['warrantyPeriod'] ?? ''),
            ];

            if (empty($data['name']) || $data['categoryID'] <= 0 || $data['supplierID'] <= 0 || $data['quantity'] < 0 || $data['unitPrice'] < 0) {
                $this->setFlashMessage('error', 'Name, Category, Supplier, Quantity, and Unit Price are required and must be valid!');
                $this->redirect('/inventory/materials/add');
                return;
            }

            $imagePath = null;
            if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadResult = $this->material->uploadImage($_FILES['image']);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect('/inventory/materials/add');
                    return;
                }
                $imagePath = $uploadResult['success'];
            }

            $data['imagePath'] = $imagePath;
            $insertSuccess = $this->material->addMaterial($data);

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material added successfully!');
                $this->redirect('/inventory');
            } else {
                error_log("Error adding material: Database insert failed for " . $data['name'] . " | Data: " . json_encode($data));
                $this->setFlashMessage('error', 'Error adding material! Please try again.');
                $this->redirect('/inventory/materials/add');
            }
        } else {
            $this->renderView('adminView/inventory/addMaterial', [
                'categories' => $this->material->getCategories(),
                'suppliers' => $this->material->getSuppliers()
            ]);
        }
    }

    // New method to handle CSV/Excel import
    public function importInventory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['inventoryFile']['name'])) {
            $file = $_FILES['inventoryFile'];
            $filePath = $file['tmp_name'];
            $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
            if (!in_array($fileType, ['csv', 'xls', 'xlsx'])) {
                $this->setFlashMessage('error', 'Only CSV, XLS, or XLSX files are supported!');
                $this->redirect('/inventory');
                return;
            }
    
            try {
                if ($fileType === 'csv') {
                    $reader = \League\Csv\Reader::createFromPath($filePath, 'r');
                    $reader->setHeaderOffset(0);
                    $records = $reader->getRecords();
                } else {
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $data = $worksheet->toArray(); // This already returns an array
                    $header = array_shift($data); // Remove and use first row as header
                    $records = array_map(function ($row) use ($header) {
                        return array_combine($header, $row);
                    }, $data);
                }
    
                $successCount = 0;
                $errorCount = 0;
    
                foreach ($records as $row) {
                    $data = [
                        'name' => $this->sanitizeInput($row['name'] ?? ''),
                        'categoryID' => (int) ($row['categoryID'] ?? 0),
                        'supplierID' => (int) ($row['supplierID'] ?? 0),
                        'quantity' => (int) ($row['quantity'] ?? 0),
                        'unitPrice' => (float) ($row['unitPrice'] ?? 0.0),
                        'minStockLevel' => (int) ($row['minStockLevel'] ?? 0),
                        'reorderLevel' => (int) ($row['reorderLevel'] ?? 0),
                        'unitOfMeasure' => $this->sanitizeInput($row['unitOfMeasure'] ?? ''),
                        'size' => $this->sanitizeInput($row['size'] ?? ''),
                        'description' => $this->sanitizeInput($row['description'] ?? ''),
                        'brand' => $this->sanitizeInput($row['brand'] ?? ''),
                        'location' => $this->sanitizeInput($row['location'] ?? ''),
                        'supplierContact' => $this->sanitizeInput($row['supplierContact'] ?? ''),
                        'status' => $this->sanitizeInput($row['status'] ?? ''),
                        'warrantyPeriod' => $this->sanitizeInput($row['warrantyPeriod'] ?? ''),
                        'imagePath' => null
                    ];
    
                    if (empty($data['name']) || $data['categoryID'] <= 0 || $data['supplierID'] <= 0 || $data['quantity'] < 0 || $data['unitPrice'] < 0) {
                        error_log("Skipping row due to missing/invalid required fields: " . json_encode($row));
                        $errorCount++;
                        continue;
                    }
    
                    $existingMaterial = $this->material->getMaterialByName($data['name']);
                    if ($existingMaterial) {
                        $updateSuccess = $this->material->editMaterial($existingMaterial['MaterialID'], $data);
                        if ($updateSuccess) {
                            $successCount++;
                        } else {
                            error_log("Failed to update material: " . $data['name']);
                            $errorCount++;
                        }
                    } else {
                        $insertSuccess = $this->material->addMaterial($data);
                        if ($insertSuccess) {
                            $successCount++;
                        } else {
                            error_log("Failed to add material: " . $data['name']);
                            $errorCount++;
                        }
                    }
                }
    
                $this->setFlashMessage('success', "Imported $successCount materials successfully. $errorCount errors occurred. Check logs for details.");
                $this->redirect('/inventory');
            } catch (\Exception $e) {
                error_log("Error processing inventory file: " . $e->getMessage());
                $this->setFlashMessage('error', 'Error processing file: ' . $e->getMessage());
                $this->redirect('/inventory');
            }
        } else {
            $this->renderView('adminView/inventory/import', []);
        }
    }

    // New exportInventory method
    public function exportInventory() {
        try {
            // Fetch all materials from the database
            $materials = $this->material->getAllMaterials();

            if (empty($materials)) {
                $this->setFlashMessage('error', 'No materials found to export.');
                $this->redirect('/inventory');
                return;
            }

            // Create a new Spreadsheet object
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Define the headers for the Excel file
            $headers = [
                'MaterialID', 'Name', 'CategoryID', 'CategoryName', 'SupplierID', 'SupplierName',
                'Quantity', 'UnitPrice', 'MinStockLevel', 'ReorderLevel', 'UnitOfMeasure', 'Size',
                'Description', 'Brand', 'Location', 'SupplierContact', 'Status', 'WarrantyPeriod',
                'CreatedAt', 'UpdatedAt'
            ];

            // Set the headers in the first row
            $column = 1;
            foreach ($headers as $header) {
                $sheet->setCellValueByColumnAndRow($column, 1, $header);
                $column++;
            }

            // Populate the data rows
            $row = 2;
            foreach ($materials as $material) {
                $column = 1;
                foreach ($headers as $header) {
                    $sheet->setCellValueByColumnAndRow($column, $row, $material[$header] ?? '');
                    $column++;
                }
                $row++;
            }

            // Auto-size columns for better readability
            foreach (range(1, count($headers)) as $columnIndex) {
                $sheet->getColumnDimensionByColumn($columnIndex)->setAutoSize(true);
            }

            // Set the title of the sheet
            $sheet->setTitle('Inventory Export');

            // Create a writer to save the spreadsheet as an Excel file
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

            // Set headers to force download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="inventory_export_' . date('Ymd_His') . '.xlsx"');
            header('Cache-Control: max-age=0');

            // Output the file to the browser
            $writer->save('php://output');
            exit;
        } catch (\Exception $e) {
            error_log("Error exporting inventory: " . $e->getMessage());
            $this->setFlashMessage('error', 'Error exporting inventory: ' . $e->getMessage());
            $this->redirect('/inventory');
        }
    }

    private function setFlashMessage($type, $message) {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}