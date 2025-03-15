<?php

class RegisterController extends BaseController {
    private $users;

    public function __construct() {
        $this->users = new UserModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = trim($_POST['full_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $role_id = intval($_POST['role_id'] ?? 2); // Default role: User
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Validate input fields
            if (empty($full_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
                $this->viewAuthentication('authentication/register', ['error' => 'Please fill in all fields.']);
                return;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->viewAuthentication('authentication/register', ['error' => 'Invalid email format.']);
                return;
            }
            if ($password !== $confirm_password) {
                $this->viewAuthentication('authentication/register', ['error' => 'Passwords do not match.']);
                return;
            }

            // Check if email already exists
            $existingUser = $this->users->getUserByEmail($email);
            if ($existingUser) {
                $this->viewAuthentication('authentication/register', ['error' => 'Email is already in use.']);
                return;
            }

            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Call UsersModel to add user
            $result = $this->users->addUser($full_name, $email, $phone, $role_id, $hashed_password);

            if (is_numeric($result)) {
                // ✅ Set user session after successful registration
                $_SESSION['user_id'] = $result; // Use the newly inserted user ID
                $_SESSION['role_id'] = $role_id;
                $_SESSION['full_name'] = $full_name;

                // ✅ Log the registration action
                $this->users->log_action($result, 'User registered successfully.');

                // ✅ Redirect immediately to the dashboard
                $_SESSION['success'] = 'Registration successful! Redirecting to dashboard...';
                header("Location: /");
                exit();
            } else {
                $this->viewAuthentication('authentication/register', ['error' => $result]); // Show error message
            }
        } else {
            $this->viewAuthentication('authentication/register'); // Show registration form
        }
    }
}
?>
