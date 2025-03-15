<?php

class RegisterController extends BaseController {
    private $usersModel;

    public function __construct() {
        $this->usersModel = new UserModel();
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

            // Generate a verification token (for email verification)
            $verification_token = bin2hex(random_bytes(16)); // 32-character random token

            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Call UsersModel to add user
            $result = $this->usersModel->addUser($full_name, $email, $phone, $role_id, $hashed_password, $verification_token);

            if ($result === true) {
                // Send verification email
                $this->sendVerificationEmail($email, $verification_token);

                $this->viewAuthentication('authentication/register', ['success' => 'Registration successful! Please check your email to verify your account.']);
            } else {
                $this->viewAuthentication('authentication/register', ['error' => $result]); // Show error message
            }
        } else {
            $this->viewAuthentication('authentication/register'); // Show registration form
        }
    }

    private function sendVerificationEmail($email, $verification_token) {
        $verification_link = "http://yourwebsite.com/verify?token=" . $verification_token;

        $subject = "Verify your email address";
        $message = "Please click on the following link to verify your email address: $verification_link";
        $headers = "From: no-reply@yourwebsite.com";

        mail($email, $subject, $message, $headers);
    }
}

?>
