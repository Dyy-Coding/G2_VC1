<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ensure Composer autoload is included
require 'vendor/autoload.php';

class AuthController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Show the forgot password form
    public function forgot()
    {
        if (isset($_SESSION['user_id'])) {
            $this->userModel->log_action($_SESSION['user_id'], 'User opened forgot password page.');
        }
        $this->renderAuthView('authentication/forgot_password');
    }

    // Handle the forgot password form submission
    public function handleForgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact = $this->getEmailOrPhoneInput();

            if (empty($contact)) {
                echo "Please enter your email.";
                return;
            }

            $user = $this->userModel->checkUserByEmailOrPhone($contact);

            if ($user) {
                $token = bin2hex(random_bytes(32)); // Generate a random token
                $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expiration time (1 hour)

                if ($this->userModel->storeResetToken($user['user_id'], $token, $expiresAt)) {
                    if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
                        $this->sendPasswordResetEmail($contact, $token); // Send reset email with token
                        echo "A password reset code has been sent to your email.";
                    } else {
                        echo "Please enter a valid email address.";
                    }

                    $this->userModel->log_action($user['user_id'], 'Password reset token generated.');
                } else {
                    echo "Failed to generate password reset token.";
                }
            } else {
                echo "No user found with that contact.";
            }
        }
    }

    // Send the reset email with a token code
    // Inside the sendPasswordResetEmail function
private function sendPasswordResetEmail($email, $token)
{
    $resetLink = "http://localhost:8000/reset-password.php?token=" . urlencode($token);

    $mail = new PHPMailer(true);
    try {
        // Enable debugging for troubleshooting
        $mail->SMTPDebug = 2; // Set to 0 in production after testing

        // Set mailer to use SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chandyneat9999@gmail.com'; // Your Gmail address
        $mail->Password = 'chandy@123'; // Replace with your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('chandyneat9999@gmail.com', 'Lim Try Construction Depot');
        $mail->addAddress($email);

        // Content of the email
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body = "
            <p>Hi,</p>
            <p>We received a request to reset your password. Please use the following token to reset your password:</p>
            <h2>$token</h2>
            <p>Click the link below to reset your password:</p>
            <p><a href='$resetLink'>$resetLink</a></p>
            <p>If you didn’t request this, ignore this message.</p>
        ";

        // Send the email
        if ($mail->send()) {
            // Success message is already handled in handleForgotPassword()
        } else {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

    // Show the reset password form
    public function showResetForm()
    {
        $token = $_GET['token'] ?? null;

        if (!$token || !$this->userModel->isTokenValid($token)) {
            // If token is invalid or expired, show the error view
            $this->renderAuthView('authentication/error', ['message' => 'Invalid or expired token.']);
            return;
        }

        // Token is valid, show the reset form
        $this->renderAuthView('authentication/reset_password', ['token' => $token]);
    }

    // Handle reset password form submission
    public function handleResetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'] ?? null;
            $newPassword = $this->getPasswordInput();

            if (!$token || !$newPassword) {
                echo "Token or password missing.";
                return;
            }

            $user = $this->userModel->getUserByResetToken($token);

            if ($user) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $this->userModel->updatePassword($user['user_id'], $hashedPassword);
                $this->userModel->deleteResetToken($token);

                echo "Password successfully reset.";
                header("Location: /login");
                exit();
            } else {
                // Token invalid or expired
                $this->renderAuthView('authentication/error', ['message' => 'Invalid or expired token.']);
            }
        }
    }

    // Show a success message after password reset
    public function passwordResetSuccess()
    {
        $this->renderAuthView('authentication/reset_confirmation', ['message' => 'Your password has been successfully reset.']);
    }

    // Show an error message if token is invalid or expired
    public function passwordResetError()
    {
        $this->renderAuthView('authentication/error', ['message' => 'Invalid or expired token.']);
    }

    private function getEmailOrPhoneInput()
    {
        return trim($_POST['contact'] ?? '');
    }

    private function getPasswordInput()
    {
        return trim($_POST['password'] ?? '');
    }
}
