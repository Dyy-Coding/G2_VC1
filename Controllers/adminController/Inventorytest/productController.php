<?php

class MaterialController extends BaseController {

    private $material;

    public function __construct() {
        $this->material = new Material();
    }

    // Show Add Form with Categories, Suppliers, and Size options
    public function showAddForm() {
        // Fetch categories and suppliers from the model
        $categories = $this->material->getCategories();
        $suppliers = $this->material->getSuppliers();

        // Generate CSRF Token for the form
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Render view and pass data to it
        $this->renderAuthView("adminView/invemtories/product", [
            'categories' => $categories,
            'suppliers' => $suppliers,
            'csrf_token' => $_SESSION['csrf_token'],
            'sizes' => ['kg', 'L', 'm', 'm3', 'Other']
        ]);
    }

    // Handle Material Submission
    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // CSRF Token Validation
            if (!$this->validateCsrfToken($_POST['csrf_token'])) {
                $this->setFlashMessage('error', 'Invalid CSRF token.');
                $this->redirect('/materials/form');
                return;
            }

            // Sanitize Input
            $name = $this->sanitizeInput($_POST['name']);
            $categoryID = (int) $this->sanitizeInput($_POST['categoryID']);
            $quantity = (int) $this->sanitizeInput($_POST['quantity']);
            $unitPrice = (float) $this->sanitizeInput($_POST['unitPrice']);
            $supplierID = (int) $this->sanitizeInput($_POST['supplierID']);
            $minStockLevel = (int) $this->sanitizeInput($_POST['minStockLevel']);
            $reorderLevel = (int) $this->sanitizeInput($_POST['reorderLevel']);
            $size = $this->sanitizeInput($_POST['size']);

            // Handle 'Other' size input
            if ($size === 'Other' && !empty($_POST['customSize'])) {
                $size = $this->sanitizeInput($_POST['customSize']);
            }

            // Validate Required Fields
            $validationResult = $this->material->validateMaterialData($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $size);
            if ($validationResult !== true) {
                $this->setFlashMessage('error', $validationResult);
                $this->redirect('/materials/form');
                return;
            }

            // Handle Image Upload
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                if ($_FILES['image']['size'] > 5000000) { // 5MB max
                    $this->setFlashMessage('error', 'File size should be less than 5MB.');
                    $this->redirect('/materials/form');
                    return;
                }

                // Upload the image
                $imageUpload = $this->material->uploadImage($_FILES['image']);
                if ($imageUpload['error']) {
                    $this->setFlashMessage('error', 'Image upload failed: ' . $imageUpload['error']);
                    $this->redirect('/materials/form');
                    return;
                }
                $imagePath = $imageUpload['success'];
            }

            // Add Material to Database using model
            $insertSuccess = $this->material->addMaterial(
                $name,
                $categoryID,
                $quantity,
                $unitPrice,
                $supplierID,
                $minStockLevel,
                $reorderLevel,
                'kg', // Default unit of measure (you can extend logic for dynamic units)
                $size,
                $imagePath,
                $_POST['description'],
                $_POST['brand'],
                $_POST['location'],
                $_POST['supplierContact'],
                $_POST['status'],
                $_POST['warrantyPeriod']
            );

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material "' . $name . '" added successfully!');
                $this->redirect('/materials/view/' . $insertSuccess);
            } else {
                $this->setFlashMessage('error', 'Error adding material! Please try again.');
                $this->redirect('/materials/form');
            }
        }
    }

    // Flash Message
    private function setFlashMessage($type, $message) {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    // Input Sanitization
    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    // CSRF Token Check
    private function validateCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
    }
}
?>
