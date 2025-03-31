<?php
require_once "Controllers/BaseController.php";
require_once "Models/supplierModel/SupplierModel.php";

class supplierController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model = new SupplierManagementModel();
    }

    // Read
    function suppliersInfo()
    {
        $data['suppliers'] = $this->model->getAllSuppliersWithCategories();
        $this->renderView("adminView/supplier/supplierlist", $data);
    }

    // Insert
    function addSupplierInfo()
    {
        $addform = $this->model->supplierFormAdd();
        $data = [
            'categories' => $addform
        ];
        $this->renderView("adminView/supplier/create", $data);
    }

    function storeSupplierInfo()
    {
        // Handle file upload for profile_supplier
        $profileSupplier = null;
        if (isset($_FILES['profile_supplier']) && $_FILES['profile_supplier']['error'] == 0) {
            $uploadDir = 'uploads/suppliers/';
            $fileName = time() . '_' . basename($_FILES['profile_supplier']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($_FILES['profile_supplier']['tmp_name'], $uploadPath)) {
                $profileSupplier = $uploadPath;
            }
        }

        // Prepare data from form
        $data = [
            'CategoryID' => $_POST['category_id'],
            'Name' => $_POST['supplier_name'],
            'ContactPerson' => $_POST['contact_person'],
            'Phone' => $_POST['phone'],
            'Email' => $_POST['email'],
            'Address' => $_POST['address'] ?? null,
            'profile_supplier' => $profileSupplier
        ];

        // Insert into database
        $result = $this->model->supplierStore($data);

        // Redirect with status message
        if ($result) {
            $_SESSION['success'] = 'Supplier added successfully!';
        } else {
            $_SESSION['error'] = 'Failed to add supplier.';
        }
        header('Location: /suppliers');
        exit();
    }

    // Edit
    function getSupplier($supplierId)
    {
        try {
            // Get the specific supplier's data
            $supplier = $this->model->getSupplierById($supplierId);

            if (!$supplier) {
                throw new Exception("Supplier not found");
            }

            // Get all categories for the dropdown
            $categories = $this->model->getAllCategories();

            // Pass data to the view
            $data = [
                'supplier' => $supplier,
                'categories' => $categories
            ];

            $this->renderView('adminView/supplier/update', $data);

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /suppliers');
            exit();
        }
    }

    public function updateSupplier($supplierId)
    {
        try {
            // Validate input data
            if (empty($_POST)) {
                throw new Exception("No form data submitted");
            }

            // Handle file upload for profile_supplier
            $profileSupplier = $_POST['existing_profile_supplier'] ?? null; // Retain existing if no new file
            if (isset($_FILES['profile_supplier']) && $_FILES['profile_supplier']['error'] == 0) {
                $uploadDir = 'uploads/suppliers/';
                $fileName = time() . '_' . basename($_FILES['profile_supplier']['name']);
                $uploadPath = $uploadDir . $fileName;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($_FILES['profile_supplier']['tmp_name'], $uploadPath)) {
                    $profileSupplier = $uploadPath;
                    // Optionally delete the old file if it exists
                    if (!empty($_POST['existing_profile_supplier']) && file_exists($_POST['existing_profile_supplier'])) {
                        unlink($_POST['existing_profile_supplier']);
                    }
                }
            }

            // Prepare data for update
            $data = [
                'supplier_id' => $supplierId,
                'name' => $_POST['supplier_name'] ?? '',
                'contact_person' => $_POST['contact_person'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'address' => $_POST['address'] ?? '',
                'category_id' => $_POST['category_id'] ?? null,
                'profile_supplier' => $profileSupplier
            ];

            // Validate required fields
            if (empty($data['name'])) {
                throw new Exception("Supplier name is required");
            }

            // Update supplier in database
            $success = $this->model->updateSupplier($data);

            if (!$success) {
                throw new Exception("Failed to update supplier");
            }

            $_SESSION['success'] = "Supplier updated successfully";
            header('Location: /suppliers');
            exit();

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: /supplier/edit/$supplierId");
            exit();
        }
    }

    // Delete
    public function destroySupplier($supplierId)
    {
        try {
            // Proceed with deletion
            $result = $this->model->deleteSupplier($supplierId);

            if ($result) {
                $_SESSION['success'] = "Supplier deleted successfully!";
            } else {
                $_SESSION['error'] = "Failed to delete supplier.";
            }

            header('Location: /suppliers');
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /suppliers');
            exit();
        }
    }
}