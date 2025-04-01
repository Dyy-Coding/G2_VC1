<?php
require_once "Controllers/BaseController.php";
require_once "Models/supplierModel/SupplierModel.php";
require_once 'vendor/autoload.php'; // Include Composer autoload

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class SupplierController extends BaseController
{
    private $model;
    private const UPLOAD_DIR = 'uploads/suppliers/';
    private const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2MB in bytes

    public function __construct()
    {
        $this->model = new SupplierManagementModel();
    }

    // Read: Display all suppliers with their categories
    public function suppliersInfo()
    {
        $data['suppliers'] = $this->model->getAllSuppliersWithCategories();
        $this->renderView("adminView/supplier/supplierlist", $data);
    }

    // Export suppliers to different formats
    public function exportSuppliers($format)
    {
        $suppliers = $this->model->getAllSuppliersWithCategories();

        switch (strtolower($format)) {
            case 'excel': // Changed to CSV
                $this->exportToCSV($suppliers);
                break;
            case 'pdf':
                $this->exportToPDF($suppliers);
                break;
            default:
                $_SESSION['error'] = "Invalid export format";
                header('Location: /suppliers');
                exit();
        }
    }

    private function exportToCSV($suppliers)
    {
        try {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename="suppliers_' . date('Ymd_His') . '.csv"');
            header('Cache-Control: max-age=0');
            $output = fopen('php://output', 'w');

            // Add headers
            fputcsv($output, ['Supplier Name', 'Contact Person', 'Phone', 'Email', 'Category', 'Address']);

            // Add data
            foreach ($suppliers as $supplier) {
                fputcsv($output, [
                    $supplier['Name'],
                    $supplier['ContactPerson'],
                    $supplier['Phone'],
                    $supplier['Email'],
                    $supplier['CategoryName'] ?? 'N/A',
                    $supplier['Address'] ?? ''
                ]);
            }

            fclose($output);
            exit();
        } catch (\Exception $e) {
            error_log("CSV Export Error: " . $e->getMessage());
            $_SESSION['error'] = "Failed to export to CSV: " . $e->getMessage();
            header('Location: /suppliers');
            exit();
        }
    }

    private function exportToPDF($suppliers)
    {
        try {
            $dompdf = new Dompdf();

            $html = '<h1>Suppliers Information</h1>';
            $html .= '<table border="1" cellpadding="5" cellspacing="0">';
            $html .= '<thead><tr>
            <th>Supplier Name</th>
            <th>Contact Person</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Category</th>
            <th>Address</th>
        </tr></thead><tbody>';

            foreach ($suppliers as $supplier) {
                $html .= '<tr>';
                $html .= '<td>' . htmlspecialchars($supplier['Name']) . '</td>';
                $html .= '<td>' . htmlspecialchars($supplier['ContactPerson']) . '</td>';
                $html .= '<td>' . htmlspecialchars($supplier['Phone']) . '</td>';
                $html .= '<td>' . htmlspecialchars($supplier['Email']) . '</td>';
                $html .= '<td>' . htmlspecialchars($supplier['CategoryName'] ?? 'N/A') . '</td>';
                $html .= '<td>' . htmlspecialchars($supplier['Address'] ?? '') . '</td>';
                $html .= '</tr>';
            }

            $html .= '</tbody></table>';

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream("suppliers_" . date('Ymd_His') . ".pdf", ["Attachment" => true]);
            exit();
        } catch (\Exception $e) {
            error_log("PDF Export Error: " . $e->getMessage());
            $_SESSION['error'] = "Failed to export to PDF: " . $e->getMessage();
            header('Location: /suppliers');
            exit();
        }
    }

    // Show form to add a new supplier
    public function addSupplierInfo()
    {
        $data['categories'] = $this->model->getAllCategories();
        $this->renderView("adminView/supplier/create", $data);
    }

    // Store a new supplier
    public function storeSupplierInfo()
    {
        try {
            // Validate required fields
            $this->validateRequiredFields($_POST, ['category_id', 'supplier_name', 'contact_person', 'phone', 'email']);

            // Handle file upload for profile_supplier
            $profileSupplier = $this->handleFileUpload();

            // Prepare data for insertion
            $data = [
                'CategoryID' => (int) $_POST['category_id'],
                'Name' => trim($_POST['supplier_name']),
                'ContactPerson' => trim($_POST['contact_person']),
                'Phone' => trim($_POST['phone']),
                'Email' => trim($_POST['email']),
                'Address' => trim($_POST['address'] ?? ''),
                'profile_supplier' => $profileSupplier
            ];

            // Validate email format
            if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
            }

            // Insert into database
            $result = $this->model->supplierStore($data);

            if (!$result) {
                throw new Exception("Failed to add supplier to the database");
            }

            $_SESSION['success'] = 'Supplier added successfully!';
            header('Location: /suppliers');
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /add/supplier');
            exit();
        }
    }

    // Show form to edit a supplier
    public function getSupplier($supplierId)
    {
        try {
            $supplier = $this->model->getSupplierById($supplierId);
            if (!$supplier) {
                throw new Exception("Supplier not found");
            }

            $data = [
                'supplier' => $supplier,
                'categories' => $this->model->getAllCategories()
            ];

            $this->renderView('adminView/supplier/update', $data);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /suppliers');
            exit();
        }
    }

    // Update an existing supplier
    public function updateSupplier($supplierId)
    {
        try {
            // Validate form submission
            if (empty($_POST)) {
                throw new Exception("No form data submitted");
            }

            // Validate required fields
            $this->validateRequiredFields($_POST, ['category_id', 'supplier_name', 'contact_person', 'phone', 'email']);

            // Handle file upload for profile_supplier
            $profileSupplier = $this->handleFileUpload($_POST['existing_profile_supplier'] ?? null);

            // Prepare data for update
            $data = [
                'supplier_id' => (int) $supplierId,
                'name' => trim($_POST['supplier_name']),
                'contact_person' => trim($_POST['contact_person']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address'] ?? ''),
                'category_id' => (int) $_POST['category_id'],
                'profile_supplier' => $profileSupplier
            ];

            // Validate email format
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
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

    // Delete a supplier
    public function destroySupplier($supplierId)
    {
        try {
            // Get supplier data to retrieve the profile image path
            $supplier = $this->model->getSupplierById($supplierId);
            if (!$supplier) {
                throw new Exception("Supplier not found");
            }

            // Delete the profile image file if it exists
            if (!empty($supplier['profile_supplier']) && file_exists($supplier['profile_supplier'])) {
                unlink($supplier['profile_supplier']);
            }

            // Delete from database
            $result = $this->model->deleteSupplier($supplierId);
            if (!$result) {
                throw new Exception("Failed to delete supplier");
            }

            $_SESSION['success'] = "Supplier deleted successfully!";
            header('Location: /suppliers');
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /suppliers');
            exit();
        }
    }

    // Private helper method to validate required fields
    private function validateRequiredFields($data, $requiredFields)
    {
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                throw new Exception(ucfirst(str_replace('_', ' ', $field)) . " is required");
            }
        }
    }

    // Private helper method to handle file uploads
    private function handleFileUpload($existingFile = null)
    {
        // If no new file is uploaded, return the existing file path (if any)
        if (!isset($_FILES['profile_supplier']) || $_FILES['profile_supplier']['error'] !== UPLOAD_ERR_OK) {
            return $existingFile;
        }

        // Validate file size
        if ($_FILES['profile_supplier']['size'] > self::MAX_FILE_SIZE) {
            throw new Exception("Profile image exceeds maximum size of 2MB");
        }

        // Validate file type (only allow images)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['profile_supplier']['tmp_name']);
        if (!in_array($fileType, $allowedTypes)) {
            throw new Exception("Only JPEG, PNG, and GIF images are allowed");
        }

        // Create upload directory if it doesn't exist
        if (!is_dir(self::UPLOAD_DIR)) {
            mkdir(self::UPLOAD_DIR, 0777, true);
        }

        // Generate a unique file name
        $fileName = time() . '_' . basename($_FILES['profile_supplier']['name']);
        $uploadPath = self::UPLOAD_DIR . $fileName;

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['profile_supplier']['tmp_name'], $uploadPath)) {
            throw new Exception("Failed to upload profile image");
        }

        // Delete the old file if it exists
        if ($existingFile && file_exists($existingFile)) {
            unlink($existingFile);
        }

        return $uploadPath;
    }
}