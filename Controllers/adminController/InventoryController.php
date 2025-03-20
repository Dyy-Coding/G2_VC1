<?php

class InventoryController extends BaseController {

    private $material;

    public function __construct() {
        $this->material = new Material();
    }

    /**
     * Display the inventory (stock) page.
     */
    public function inventory()
    {
        // If needed, you can fetch the inventory data from the model or database here
        // Example: $inventoryData = $this->inventoryModel->getInventory();
        
        // Check if the required inventory view exists and render it
        // Assuming `adminView/inventory/stock` is the correct view file
        $this->renderView('adminView/inventory/stock');
    }

    public function category() {

        $this->renderView('adminView/inventory/category');
    }

    public function order() {
        $this->renderView('adminView/inventory/order');
    }

    // Show Add Form with Categories and Suppliers
    public function showAddForm() {
        $categories = $this->material->getCategories();
        $suppliers = $this->material->getSuppliers();

        $this->renderAuthView("adminView/inventory/addMaterial", [
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }
    // Add Material
    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input
            $name = $this->sanitizeInput($_POST['name']);
            $categoryID = (int) $this->sanitizeInput($_POST['categoryID']);
            $quantity = (int) $this->sanitizeInput($_POST['quantity']);
            $unitPrice = (float) $this->sanitizeInput($_POST['unitPrice']);
            $supplierID = (int) $this->sanitizeInput($_POST['supplierID']);
            $minStockLevel = (int) $this->sanitizeInput($_POST['minStockLevel']);
            $reorderLevel = (int) $this->sanitizeInput($_POST['reorderLevel']);

            // Check required fields
            if (empty($name) || empty($categoryID) || empty($quantity) || empty($unitPrice) || empty($supplierID)) {
                $this->setFlashMessage('error', 'All fields are required!');
                $this->redirect('/materials/add');
                return;
            }

            // Handle image upload (if provided)
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imageUpload = $this->material->uploadImage($_FILES['image']);
                if (!$imageUpload || isset($imageUpload["error"])) {
                    $this->setFlashMessage('error', $imageUpload["error"] ?? 'Error uploading image.');
                    $this->redirect('/materials/add');
                    return;
                }
                $imagePath = $imageUpload["success"];
            }

            // Insert material into the database
            $insertSuccess = $this->material->addMaterial($name, $categoryID, $quantity, $unitPrice, $supplierID, $minStockLevel, $reorderLevel, $imagePath);

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material added successfully!');
                $this->redirect('/user');
            } else {
                error_log("Error adding material: Database insert failed for $name (Category ID: $categoryID)");
                $this->setFlashMessage('error', 'Error adding material! Please try again.');
                $this->redirect('/materials/add');
            }
        }
    }

    // Flash Message Helper
    private function setFlashMessage($type, $message) {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    // Input Sanitization Helper
    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
    /**
     * Ensure that the session is started.
     * This can be moved to BaseController or another common helper class
     */
}
