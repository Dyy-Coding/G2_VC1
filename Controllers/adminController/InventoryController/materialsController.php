<?php

class MaterialsController extends BaseController {
    private $material;
    private $category;

    public function __construct() {
        $this->material = new Material();
        $this->category = new Category();
    }



    public function material() {
        $categories = $this->category->getAllCategories();
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
                'categoryID' => (int) ($_POST['categoryID'] ?? 0),
                'quantity' => (int) ($_POST['quantity'] ?? 0),
                'unitPrice' => (float) ($_POST['unitPrice'] ?? 0.0),
                'supplierID' => (int) ($_POST['supplierID'] ?? 0),
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
                $this->redirect('/materials/add');
                return;
            }

            $imagePath = null;
            if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadResult = $this->material->uploadImage($_FILES['image']);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect('/materials/add');
                    return;
                }
                $imagePath = $uploadResult['success'];
            }

            $data['imagePath'] = $imagePath;

            if ($this->material->addMaterial($data)) {
                $this->setFlashMessage('success', 'Material added successfully!');
                $this->redirect('/material');
            } else {
                error_log("Error adding material: Database insert failed for " . $data['name'] . " | Data: " . json_encode($data));
                $this->setFlashMessage('error', 'Error adding material! Please try again.');
                $this->redirect('/materials/add');
            }
        } else {
            $this->renderView('adminView/inventory/addMaterial', [
                'categories' => $this->category->getAllCategories(),
                'suppliers' => $this->material->getSuppliers()
            ]);
        }
    }

    public function materialEditForSome($id) {
        $material = $this->material->getMaterialById($id);
        $suppliers = $this->material->getSuppliers();
        $categories = $this->category->getAllCategories();

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
            $id = (int) ($_POST['materialID'] ?? 0);
            $material = $this->material->getMaterialById($id);

            if (!$material) {
                $this->setFlashMessage('error', 'Material not found!');
                $this->redirect('/material');
                return;
            }

            $data = [
                'name' => $this->sanitizeInput($_POST['Name'] ?? ''),
                'categoryID' => (int) ($_POST['categoryID'] ?? 0),
                'quantity' => (int) ($_POST['Quantity'] ?? 0),
                'unitPrice' => (float) ($_POST['UnitPrice'] ?? 0.0),
                'supplierID' => (int) ($_POST['supplierID'] ?? 0),
                'description' => $this->sanitizeInput($_POST['Description'] ?? ''),
                'brand' => $this->sanitizeInput($_POST['Brand'] ?? ''),
                'status' => $this->sanitizeInput($_POST['Status'] ?? ''),
                'minStockLevel' => (int) ($_POST['minStockLevel'] ?? 0),
                'reorderLevel' => (int) ($_POST['reorderLevel'] ?? 0),
                'unitOfMeasure' => $this->sanitizeInput($_POST['unitOfMeasure'] ?? ''),
                'size' => $this->sanitizeInput($_POST['Size'] ?? ''),
                'location' => $this->sanitizeInput($_POST['location'] ?? ''),
                'supplierContact' => $this->sanitizeInput($_POST['supplierContact'] ?? ''),
                'warrantyPeriod' => $this->sanitizeInput($_POST['warrantyPeriod'] ?? ''),
            ];

            if (empty($data['name']) || empty($data['categoryID']) || empty($data['supplierID'])) {
                $this->setFlashMessage('error', 'Name, Category, and Supplier are required!');
                $this->redirect("/materials/edit/{$id}");
                return;
            }

            $image = $_FILES['image'] ?? null;
            if (!empty($image['name']) && $image['error'] === UPLOAD_ERR_OK) {
                $uploadResult = $this->material->uploadImage($image);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect("/materials/edit/{$id}");
                    return;
                }
                $data['imagePath'] = $uploadResult['success'];
            } else {
                $data['imagePath'] = $material['ImagePath'];
            }

            $updateSuccess = $this->material->editMaterial($id, $data);

            if ($updateSuccess) {
                $this->setFlashMessage('success', 'Material updated successfully!');
                $this->redirect('/material');
            } else {
                error_log("Error updating material: Database update failed for ID " . $id);
                $this->setFlashMessage('error', 'Error updating material! Please try again.');
                $this->redirect("/materials/edit/{$id}");
            }
        } else {
            $this->redirect('/material');
        }
    }

    public function deleteMaterial($id) {
        $material = $this->material->getMaterialById($id);

        if (!$material) {
            $this->setFlashMessage('error', 'Material not found!');
            $this->redirect('/material');
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

        $this->redirect('/material');
    }

    public function DeleteSelectedMaterials() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['materialIDs'])) {
            $materialIDs = array_map('intval', $_POST['materialIDs']);

            $materials = $this->material->getMaterialsByIds($materialIDs);
            $deleteSuccess = $this->material->deleteSelectedMaterials($materialIDs);

            echo $deleteSuccess;

            if ($deleteSuccess) {
                foreach ($materials as $material) {
                    if (!empty($material['ImagePath']) && file_exists($material['ImagePath'])) {
                        unlink($material['ImagePath']);
                    }
                }
                $this->setFlashMessage('success', 'Selected materials deleted successfully!');
                $this->redirect('/material');
            } else {
                error_log("Bulk deletion failed for IDs: " . implode(',', $materialIDs));
                $this->setFlashMessage('error', 'Failed to delete selected materials.');
                $this->redirect('/material');
            }
        } else {
            $this->setFlashMessage('error', 'Please select at least one material to delete.');
            $this->redirect('/material');
        }
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

    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}