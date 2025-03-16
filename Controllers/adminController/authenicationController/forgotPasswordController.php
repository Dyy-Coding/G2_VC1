<?php

class AuthController extends BaseController {

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Show the forgot password form
    public function forgot() {
        $this->renderAuthView('authentication/forgot_password');
        if (isset($_SESSION['user_id'])) {
            $this->userModel->log_action($_SESSION['user_id'], 'User forgot password.');
        }
    }

    // Handle the password reset request
    public function showForgotPasswordForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $email = $this->getEmailInput();

            // Get user by email
            $user = $this->userModel->checkEmail($email);

            if ($user) {
                // Generate and store the reset token in the database
                $token = $this->userModel->generatePasswordResetToken($email);

                if ($token) {
                    // Normally, you would send the token via email, but we're logging it here for demo purposes
                    error_log("Password reset token for {$email}: " . $token);

                    // Render the reset page (you should actually send the token to the user's email here)
                    $this->renderAuthView('authentication/resetpassword');
                    exit();
                } else {
                    // Error generating token
                    echo "Error generating password reset token.";
                }

                // Log action
                if (isset($_SESSION['user_id'])) {
                    $this->userModel->log_action($_SESSION['user_id'], 'User requested password reset link.');
                }
            } else {
                // User email not found
                echo "Email not found.";
                if (isset($_SESSION['user_id'])) {
                    $this->userModel->log_action($_SESSION['user_id'], 'User requested reset, but email not found.');
                }
            }
        }
    }

    // Change password after token validation
    public function resetPasswordRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newPassword = $this->getPasswordInput();
            $user_id = $this->userModel->getLastUserIdInPasswordResets();
    
            // Ensure password and token are provided
            if (!$newPassword) {
                echo "Password cannot be empty.";
                return;
            }
    
    
            // Validate the reset token
            echo var_dump($user_id);
            
            // Ensure the token is valid and the user exists
            if ($user_id && $newPassword) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    
                // Update the password in the database
                $this->userModel->updatePassword($user_id, $hashedPassword);
    
                // Log the password reset action
                if (isset($_SESSION['user_id'])) {
                    $this->userModel->log_action($_SESSION['user_id'], 'User reset password using token.');
                }
    
                // Redirect to login page after successful password reset
                header("Location: /login");
                exit();
            } else {
                // Token is invalid or expired, pass the error message and token to the view
                $error_message = "Invalid or expired token.";
                $this->renderAuthView('authentication/resetpassword', [
                    'error_message' => $error_message,
                 // Pass the token here for troubleshooting
                ]);
                return;
            }
        } else {
            echo "Invalid request method.";
            return;
        }
    }
    
    // Private function to get the email from input
    private function getEmailInput() {
        if (isset($_POST['email'])) {
            return filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        }
        return null;
    }

    // Private function to get the password from input
    private function getPasswordInput() {
        if (isset($_POST['password'])) {
            return trim($_POST['password']);
        }
        return null;
    }

    // Private function to get the token from input
    private function getTokenInput() {
        if (isset($_POST['token'])) {
            return trim($_POST['token']);
        }
        return null;
    }
}

?>
