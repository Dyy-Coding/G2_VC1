
<?php


class AuthController extends BaseController {

private $userModel;

public function __construct() {
    // Initialize the UserModel for use in the controller
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
        $email = $_POST['email'];
        
        // Get user by email
        $user = $this->userModel->checkEmail($email);

        if ($user) {
            if (isset($_SESSION['user_id'])) {
                $this->userModel->log_action($_SESSION['user_id'], 'User requested password reset link.');
            }

            // Redirect to the login page
            $this->renderAuthView('authentication/resetpassword');
            exit();
        } else {
            echo "Email not found.";
            if (isset($_SESSION['user_id'])) {
                $this->userModel->log_action($_SESSION['user_id'], 'User requested reset, but email not found.');
            }
        }
    }
}

// Change password after token validation
public function resetPasswordRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'], $_POST['token'])) {
        $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = $_POST['token'];

        // Validate the token and get the associated user ID
        $resetData = $this->userModel->validateResetToken($token);
        if ($resetData) {
            // Proceed with updating the password
            $user_id = $resetData['user_id'];
            $this->userModel->updatePassword($user_id, $newPassword);
            
            // Redirect to login page after successful password reset
            $this->requireAuth();
            exit();
        } else {
            echo "Invalid or expired token.";
        }
    }
}

// Show the change password form

}
