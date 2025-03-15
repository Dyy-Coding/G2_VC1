<?php

class RegisterController extends BaseController
{
    private $users;

    public function __construct()
    {
        // Initialize the UserModel
        $this->users = new UserModel();
    }

    public function register()
    {
        // Check if the request is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            
            // Sanitize and collect input data
            $first_name = ValidationHelper::sanitizeInput($_POST['first_name'] ?? '');
            $last_name = ValidationHelper::sanitizeInput($_POST['last_name'] ?? '');
            $email = ValidationHelper::sanitizeInput($_POST['email'] ?? '');
            $phone = ValidationHelper::sanitizeInput($_POST['phone'] ?? '');
            $role_id = isset($_POST['role_id']) ? intval($_POST['role_id']) : 2; // Default role: User
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            
            // Validate input fields
            if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
                $errors[] = 'Please fill in all fields.';
            }
            if (!ValidationHelper::isValidEmail($email)) {
                $errors[] = 'Invalid email format.';
            }
            if ($password !== $confirm_password) {
                $errors[] = 'Passwords do not match.';
            }
            if (!ValidationHelper::isStrongPassword($password)) {
                $errors[] = 'Password must be at least 8 characters long and contain letters, numbers, and special characters.';
            }
            if ($this->isEmailTaken($email)) {
                $errors[] = 'Email is already in use.';
            }
            
            if (!empty($errors)) {
                $this->renderAuthView('authentication/register', ['errors' => $errors]);
                return;
            }
             
                
                // Add the user to the database
                $result = $this->users->addUser($first_name, $last_name, $email, $phone, $role_id, $password);
                
                if ($result) {
                    // Set session variables after successful registration
                    $_SESSION['user_id'] = $result;  // Newly inserted user ID
                    $_SESSION['role_id'] = $role_id;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;
                    
                    // Log the registration action
                    $this->users->log_action($result, 'User registered successfully.');
                    
                    // Redirect to the dashboard with a success message
                    $_SESSION['success'] = 'Registration successful! Redirecting to dashboard...';
                    $this->redirect('/');
                } else {
                    throw new Exception("Registration failed. Please try again.");
                }
        } else {
            // Show the registration form (GET request)
            $this->renderAuthView('authentication/register');
        }
    }

    private function isEmailTaken($email)
    {
        return $this->users->getUserByEmail($email) ? true : false;
    }
}
?>
