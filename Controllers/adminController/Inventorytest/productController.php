<?php

class MaterialController extends BaseController {

    private $material;


    public function __construct() {
        $this->material = new Material();
    }

    // Show Add Form with Categories and Suppliers
    public function showAddForm() {
        $categories = $this->material->getCategories();
        $suppliers = $this->material->getSuppliers();

        $this->renderAuthView("adminView/invemtories/product", [
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }
    // public function () {
    //     // Ensure this method properly renders or displays the form
    //     echo '<form method="POST" action="/materials/add">
    //             <input type="text" name="material_name" placeholder="Material Name" required>
    //             <input type="number" name="quantity" placeholder="Quantity" required>
    //             <input type="submit" value="Add Material">
    //           </form>';
    // }
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
}

?>