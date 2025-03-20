<?php

class MaterialController extends BaseController {

    private $material;

    public function __construct() {
        $this->material = new Material();
    }

    // Show Add Form with Categories, Suppliers, and Size options
    public function showAddForm() {
        echo "This is the materials form!<br>";
    
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Generate CSRF token if not set
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    
        // Check if $this->material is initialized
        if (!isset($this->material)) {
            die("Error: Material model is not initialized.");
        }
    
        // Fetch categories and suppliers
        try {
            $categories = $this->material->getCategories();
            $suppliers = $this->material->getSuppliers();
        } catch (Exception $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    
        // Check if the view file exists
        $viewPath = realpath("views/adminView/inventories/product.php");
        if (!$viewPath || !file_exists($viewPath)) {
            die("Error: View file not found at " . $viewPath);
        }
    
        // Render the view
        $this->renderAuthView("adminView/inventories/product", [
            'categories' => $categories,
            'suppliers' => $suppliers,
            'csrf_token' => $_SESSION['csrf_token'],
            'sizes' => ['kg', 'L', 'm', 'm3', 'Other']
        ]);
    }
    
    
    
    
    // public function showAddForm() {
    //     
    // }

    // Handle Add Material Submission
    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
                $this->setFlashMessage('error', 'Invalid CSRF token.');
                $this->redirect('/materials/form');
                return;
            }

            $name = $this->sanitizeInput($_POST['name'] ?? '');
            $categoryID = (int) $this->sanitizeInput($_POST['categoryID'] ?? 0);
            $quantity = (int) $this->sanitizeInput($_POST['quantity'] ?? 0);
            $unitPrice = (float) $this->sanitizeInput($_POST['unitPrice'] ?? 0.0);
            $supplierID = (int) $this->sanitizeInput($_POST['supplierID'] ?? 0);
            $minStockLevel = (int) $this->sanitizeInput($_POST['minStockLevel'] ?? 0);
            $reorderLevel = (int) $this->sanitizeInput($_POST['reorderLevel'] ?? 0);
            $unitOfMeasure = $this->sanitizeInput($_POST['unitOfMeasure'] ?? 'kg');
            $size = $this->sanitizeInput($_POST['size'] ?? '');

            if ($size === 'Other' && !empty($_POST['customSize'])) {
                $size = $this->sanitizeInput($_POST['customSize']);
            }

            $description = $this->sanitizeInput($_POST['description'] ?? '');
            $brand = $this->sanitizeInput($_POST['brand'] ?? '');
            $location = $this->sanitizeInput($_POST['location'] ?? '');
            $supplierContact = $this->sanitizeInput($_POST['supplierContact'] ?? '');
            $status = $this->sanitizeInput($_POST['status'] ?? 'Available');
            $warrantyPeriod = $this->sanitizeInput($_POST['warrantyPeriod'] ?? '');

            $validationResult = $this->validateMaterialData($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $size);
            if ($validationResult !== true) {
                $this->setFlashMessage('error', $validationResult);
                $this->redirect('/materials/form');
                return;
            }

            // Handle Image Upload
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
                    $this->setFlashMessage('error', 'Image must be less than 5MB.');
                    $this->redirect('/materials/form');
                    return;
                }

                $uploadResult = $this->material->uploadImage($_FILES['image']);
                if (!empty($uploadResult['error'])) {
                    $this->setFlashMessage('error', 'Image upload failed: ' . $uploadResult['error']);
                    $this->redirect('/materials/form');
                    return;
                }
                $imagePath = $uploadResult['success'];
            }

            // Insert into DB
            $insertSuccess = $this->material->addMaterial(
                $name,
                $categoryID,
                $quantity,
                $unitPrice,
                $supplierID,
                $minStockLevel,
                $reorderLevel,
                $unitOfMeasure,
                $size,
                $imagePath,
                $description,
                $brand,
                $location,
                $supplierContact,
                $status,
                $warrantyPeriod
            );

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material "' . $name . '" added successfully!');
                $this->redirect('/materials/list');
            } else {
                $this->setFlashMessage('error', 'Error adding material. Please try again.');
                $this->redirect('/materials/form');
            }
        }
    }

    // View All Materials
    public function listMaterials() {
        $materials = $this->material->getAllMaterials();
        $this->renderAuthView('adminView/inventories/material_list', ['materials' => $materials]);
    }

    // Flash Message
    private function setFlashMessage($type, $message) {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    // Input Sanitization
    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    // CSRF Token Validation
    private function validateCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
    }

    // Validation Logic
    public function validateMaterialData($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $size) {
        if (empty($name) || empty($categoryID) || empty($supplierID)) {
            return "Name, category, and supplier are required.";
        }
        if (!is_numeric($quantity) || $quantity < 0) {
            return "Quantity must be a non-negative number.";
        }
        if (!is_numeric($unitPrice) || $unitPrice < 0) {
            return "Unit price must be a valid number.";
        }
        if (!is_numeric($minStockLevel) || $minStockLevel < 0) {
            return "Min stock level must be a non-negative number.";
        }
        if (!is_numeric($reorderLevel) || $reorderLevel < 0) {
            return "Reorder level must be a non-negative number.";
        }
        return true;
    }
}
?>
