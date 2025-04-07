<?php
require_once "Controllers/BaseController.php";
require_once "Models/supplierModel/detailSupplierModel.php";

class SupplierDetailController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new SupplierDetailModel();
    }

    public function suppliersInfoDetails()
    {
        $supplierId = $_GET['id'] ?? null;

        // Get all suppliers for the table
        $suppliersList = $this->model->getAllSuppliers();

        if (!$supplierId) {
            $this->renderView('adminView/supplier/supplierdetail', [
                'error' => 'Supplier ID is required',
                'suppliersList' => $suppliersList, // Make sure to pass this
                'purchaseData' => [] // Empty array if no supplier selected
            ]);
            return;
        }

        $supplier = $this->model->supplierDetail($supplierId);
        $purchaseData = $this->model->getPurchaseOrderData($supplierId);

        if (!$supplier) {
            $this->renderView('adminView/supplier/supplierdetail', [
                'error' => 'Supplier not found',
                'suppliersList' => $suppliersList,
                'purchaseData' => $purchaseData
            ]);
            return;
        }

        // Handle image upload if form submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
            $this->handleImageUpload($supplierId);
            // Refresh supplier data after update
            $supplier = $this->model->supplierDetail($supplierId);
        }

        $this->renderView('adminView/supplier/supplierdetail', [
            'supplier' => $supplier,
            'suppliersList' => $suppliersList, // This was missing
            'purchaseData' => $purchaseData   // This was missing
        ]);
    }

    private function handleImageUpload($supplierId)
    {
        if ($_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/uploads/suppliers/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Generate unique filename
            $extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
            $filename = 'supplier_' . $supplierId . '_' . time() . '.' . $extension;
            $targetPath = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetPath)) {
                // Save relative path to database
                $relativePath = 'uploads/suppliers/' . $filename;
                $this->model->updateProfileImage($supplierId, $relativePath);
            }
        }
    }


}