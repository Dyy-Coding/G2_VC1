<?php

class InventoryController extends BaseController {
    private $material;

    public function __construct() {
        $this->material = new Material();
    }

    /**
     * Display the inventory (stock) page.
     */
    public function inventory() {
        $categories = $this->material->getCategories();
        $suppliers = $this->material->getSuppliers();
        $materials = $this->material->getAllMaterials(); // Fetch all materials
    
        $this->renderView("adminView/inventory/stock", [
            'categories' => $categories,
            'suppliers' => $suppliers,
            'materials'  => $materials
        ]);
    }
    

    public function category() {
        $this->renderView('adminView/inventory/category');
    }

    public function order() {
        $this->renderView('adminView/inventory/order');
    }


    

    // Add Material
    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input
            $data = [
                'name' => $this->sanitizeInput($_POST['name'] ?? ''),
                'categoryID' => (int) $_POST['categoryID'] ?? 0,
                'quantity' => (int) $_POST['quantity'] ?? 0,
                'unitPrice' => (float) $_POST['unitPrice'] ?? 0.0,
                'supplierID' => (int) $_POST['supplierID'] ?? 0,
                'minStockLevel' => (int) $_POST['minStockLevel'] ?? 0,
                'reorderLevel' => (int) $_POST['reorderLevel'] ?? 0,
                'unitOfMeasure' => $this->sanitizeInput($_POST['unitOfMeasure'] ?? ''),
                'size' => $this->sanitizeInput($_POST['size'] ?? ''),
                'description' => $this->sanitizeInput($_POST['description'] ?? ''),
                'brand' => $this->sanitizeInput($_POST['brand'] ?? ''),
                'location' => $this->sanitizeInput($_POST['location'] ?? ''),
                'supplierContact' => $this->sanitizeInput($_POST['supplierContact'] ?? ''),
                'status' => $this->sanitizeInput($_POST['status'] ?? ''),
                'warrantyPeriod' => $this->sanitizeInput($_POST['warrantyPeriod'] ?? ''),
            ];

            // Validate required fields
            if (empty($data['name']) || empty($data['categoryID']) || empty($data['supplierID'])) {
                $this->setFlashMessage('error', 'Name, Category, and Supplier are required!');
                $this->redirect('/materials/add');
                return;
            }

            // Handle image upload
            $imagePath = null;
            if (!empty($_FILES['image']['name'])) {
                $uploadResult = $this->material->uploadImage($_FILES['image']);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect('/materials/add');
                    return;
                }
                $imagePath = $uploadResult['success'];
            }

            // Insert material into database
            $data['imagePath'] = $imagePath;
            $insertSuccess = $this->material->addMaterial($data, $_FILES['image'] ?? null);

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material added successfully!');
                $this->redirect('/inventory');
            } else {
                error_log("Error adding material: Database insert failed for " . $data['name']);
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

    public function editMaterial($id) {
        // Fetch the material with the given ID
        $material = $this->material->getMaterialById($id);
        if (!$material) {
            // Handle the case where the material is not found
            $this->renderView('errors/404', [], 404);
            return;
        }
        // Return the edit view with the material data
        $this->renderView('adminView/inventory/editMaterial', ['material' => $material]);
    }
    
}
