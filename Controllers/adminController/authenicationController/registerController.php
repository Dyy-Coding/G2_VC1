<?php
require_once "Controllers/validateionHelper.php";

class RegisterController extends BaseController
{
    private $users;
    private $validate;

    public function __construct()
    {
        // Initialize the UserModel
        $this->users = new UserModel();
        $this->validate = new ValidationHelper();
    }

    public function register()
    {
        // Check if the request is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            
            // Sanitize and collect input data
            $first_name = isset($_POST['first_name']) ? $this->validate->sanitizeInput($_POST['first_name']) : '';
            $last_name = isset($_POST['last_name']) ? $this->validate->sanitizeInput($_POST['last_name']) : '';
            $email = isset($_POST['email']) ? $this->validate->sanitizeInput($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? $this->validate->sanitizeInput($_POST['phone']) : '';
            $role_id = isset($_POST['role_id']) ? intval($_POST['role_id']) : 2; // Default role: User
            $password = isset($_POST['password']) ? $this->validate->sanitizeInput($_POST['password']) : '';
            $address = isset($_POST['address']) ? $this->validate->sanitizeInput($_POST['address']) : '';
            $streetAddress = isset($_POST['street_address']) ? $this->validate->sanitizeInput($_POST['street_address']) : '';
            $confirm_password = isset($_POST['confirm_password']) ? $this->validate->sanitizeInput($_POST['confirm_password']) : '';

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
                // Render view with errors
                $this->renderAuthView('authentication/register', ['errors' => $errors]);
                return;
            }

            // Add the user to the database
            try {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password
                $result = $this->users->addUser($first_name, $last_name, $email, $phone, $role_id, $hashed_password, $address, $streetAddress);

                if ($result) {
                    // Set session variables after successful registration
                    $_SESSION['user_id'] = $result;  // Newly inserted user ID
                    $_SESSION['role_id'] = $role_id;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;
                    $_SESSION['address'] = $address; // Fixed session variable name
                    $_SESSION['street_address'] = $streetAddress; // Fixed session variable name

                    // Log the registration action
                    $this->users->log_action($result, 'User registered successfully.');

                    // Redirect to the dashboard with a success message
                    $_SESSION['success'] = 'Registration successful! Redirecting to dashboard...';
                    $this->redirect('/user');
                } else {
                    throw new Exception("Registration failed. Please try again.");
                }
            } catch (Exception $e) {
                // Catch any errors and show them
                $errors[] = "Error: " . $e->getMessage();
                $this->renderAuthView('authentication/register', ['errors' => $errors]);
            }
        } else {
            // Show the registration form (GET request)
            $this->renderAuthView('authentication/register');
        }
    }
}
?>
