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

    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            if (empty($data['name']) || empty($data['categoryID']) || empty($data['supplierID'])) {
                $this->setFlashMessage('error', 'Name, Category, and Supplier are required!');
                $this->redirect('/inventory/materials/add');
                return;
            }

            $imagePath = null;
            if (!empty($_FILES['image']['name'])) {
                $uploadResult = $this->material->uploadImage($_FILES['image']);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect('/inventory/materials/add');
                    return;
                }
                $imagePath = $uploadResult['success'];
            }

            $data['imagePath'] = $imagePath;
            $insertSuccess = $this->material->addMaterial($data, $_FILES['image'] ?? null);

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material added successfully!');
                $this->redirect('/inventory');
            } else {
                error_log("Error adding material: Database insert failed for " . $data['name']);
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

    private function setFlashMessage($type, $message) {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}