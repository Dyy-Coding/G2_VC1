<?php
require_once "Controllers/validateionHelper.php";

class RegisterController extends BaseController
{
    private $users;
    private $validate;

    public function __construct()
    {
        $this->users = new UserModel();
        $this->validate = new ValidationHelper();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            
            // Sanitize and collect input data (customer-specific fields)
            $first_name = isset($_POST['first_name']) ? $this->validate->sanitizeInput($_POST['first_name']) : '';
            $last_name = isset($_POST['last_name']) ? $this->validate->sanitizeInput($_POST['last_name']) : '';
            $email = isset($_POST['email']) ? $this->validate->sanitizeInput($_POST['email']) : '';
            $password = isset($_POST['password']) ? $this->validate->sanitizeInput($_POST['password']) : '';
            $confirm_password = isset($_POST['confirm_password']) ? $this->validate->sanitizeInput($_POST['confirm_password']) : '';
            // Fixed customer role ID (assuming 2 is for customers)
            $role_id = 2;

            // Basic validation checks
            if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
                $errors[] = "All fields are required.";
            }

            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }

            if (strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters long.";
            }

            if (!empty($errors)) {
                $this->renderAuthView('authentication/register', ['errors' => $errors]);
                return;
            }

            // Add the customer to the database
            try {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $result = $this->users->addUser($first_name, $last_name, $email, '', $role_id, $hashed_password, '', '');

                if ($result) {
                    // Set session variables for customer
                    $_SESSION['user_id'] = $result;
                    $_SESSION['role_id'] = $role_id;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;

                    // Log the registration action
                    $this->users->log_action($result, 'Customer registered successfully.');

                    // Redirect to customer dashboard with success message
                    $_SESSION['success'] = 'Registration successful! Welcome, customer!';
                    $this->redirect('/welcome');
                } else {
                    throw new Exception("Customer registration failed. Please try again.");
                }
            } catch (Exception $e) {
                $errors[] = "Error: " . $e->getMessage();
                $this->renderAuthView('authentication/register', ['errors' => $errors]);
            }
        } else {
            // Show the customer registration form
            $this->renderAuthView('authentication/register');
        }
    }
}
?>