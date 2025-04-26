<?php
require_once "Controllers/BaseController.php";
require_once "Models/customerModel/customerListModel.php";

class CustomerInfoController extends BaseController
{
    private $model;

    function __construct()
    {
        $this->model = new CustomerInfoModel();
        error_log("CustomerInfoController loaded");
    }

    function getCustomersController()
    {
        error_log("getCustomersController called");
        $customers = $this->model->getCustomersModel();
        $this->renderView('adminView/customers/customersList', ['customers' => $customers]);
    }

    function getCustomerController()
    {
        error_log("getCustomerController called");

        $user_id = isset($_GET['user_id']) ? (int) $_GET['user_id'] : 0;

        if ($user_id <= 0) {
            error_log("Invalid user_id provided");
            header("Location: /customers");
            exit;
        }

        $customer = $this->model->getCustomerModel($user_id);

        if (empty($customer)) {
            error_log("Customer not found for user_id: $user_id");
            header("Location: /customers");
            exit;
        }

        $this->renderView('adminView/customers/editCustomer', ['customer' => $customer]);
    }

    function updateCustomerController()
    {
        error_log("updateCustomerController called");

        $user_id = isset($_GET['user_id']) ? (int) $_GET['user_id'] : 0;

        if ($user_id <= 0) {
            error_log("Invalid user_id provided");
            $this->renderView('adminView/customers/editCustomer', [
                'error' => 'Invalid customer ID.'
            ]);
            return;
        }

        $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
        $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $street_address = isset($_POST['street_address']) ? trim($_POST['street_address']) : '';

        if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($street_address)) {
            error_log("Validation failed: Missing required fields");
            $this->renderView('adminView/customers/editCustomer', [
                'error' => 'All fields are required.',
                'customer' => [
                    'user_id' => $user_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'street_address' => $street_address
                ]
            ]);
            return;
        }

        $profile_image = null;
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $file_name = uniqid() . '-' . basename($_FILES['profile']['name']);
            $upload_path = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES['profile']['tmp_name'], $upload_path)) {
                $profile_image = $upload_path; // Store full path
                error_log("Profile image uploaded successfully for user $user_id: " . $upload_path);
            } else {
                error_log("Failed to upload profile image for user $user_id to: " . $upload_path);
                $this->renderView('adminView/customers/editCustomer', [
                    'error' => 'Failed to upload profile image.',
                    'customer' => [
                        'user_id' => $user_id,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'phone' => $phone,
                        'street_address' => $street_address
                    ]
                ]);
                return;
            }
        }

        $success = $this->model->updateCustomerModel($user_id, $first_name, $last_name, $email, $phone, $street_address, $profile_image);

        if ($success) {
            header("Location: /customers?success=Customer updated successfully");
            exit;
        } else {
            $this->renderView('adminView/customers/editCustomer', [
                'error' => 'Failed to update customer.',
                'customer' => [
                    'user_id' => $user_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'street_address' => $street_address
                ]
            ]);
        }
    }

    function destroyCustomerController()
    {
        error_log("destroyCustomerController called");

        $user_id = isset($_GET['user_id']) ? (int) $_GET['user_id'] : 0;

        if ($user_id <= 0) {
            error_log("Invalid user_id provided for deletion");
            header("Location: /customers?error=Invalid customer ID");
            exit;
        }

        // Check if the customer exists and has role_id = 2
        $customer = $this->model->getCustomerModel($user_id);
        if (empty($customer)) {
            error_log("Customer not found for user_id: $user_id");
            header("Location: /customers?error=Customer not found");
            exit;
        }

        // Delete the customer
        $success = $this->model->deleteCustomerModel($user_id);

        if ($success) {
            error_log("Customer deleted successfully: user $user_id");
            // Optionally delete the profile image file
            if (!empty($customer['profile_image']) && $customer['profile_image'] !== 'default_value') {
                $image_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $customer['profile_image'];
                if (file_exists($image_path)) {
                    if (unlink($image_path)) {
                        error_log("Profile image deleted successfully: " . $image_path);
                    } else {
                        error_log("Failed to delete profile image: " . $image_path);
                    }
                }
            }
            header("Location: /customers?success=Customer deleted successfully");
            exit;
        } else {
            error_log("Failed to delete customer: user $user_id");
            header("Location: /customers?error=Failed to delete customer");
            exit;
        }
    }

    function getCustomerDetailController()
    {
        error_log("getCustomerDetailController called");
    
        $user_id = isset($_GET['user_id']) ? (int) $_GET['user_id'] : 0;
    
        if ($user_id <= 0) {
            error_log("Invalid user_id provided for detail view");
            header("Location: /customers");
            exit;
        }
    
        $customer = $this->model->getCustomerDetailModel($user_id);
    
        if (empty($customer)) {
            error_log("Customer detail not found for user_id: $user_id");
            header("Location: /customers");
            exit;
        }
    
        $this->renderView('adminView/customers/customerDetail', ['customer' => $customer]);
    }
}