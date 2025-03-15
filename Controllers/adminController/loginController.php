<?php

class LoginController extends BaseController
{
    private $users;

    public function __construct()
    {
        $this->users = new UserModel(); // Assuming UserModel handles database interaction
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_SESSION['user_id'])) {
                $this->redirect('/');
                return;
            }
            $this->viewAuthentication('authentication/login');
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $this->viewAuthentication('authentication/login', ['error' => 'Email and password are required!']);
                return;
            }

            // Fetch user by email
            $user = $this->users->getUserByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                // ✅ Successful login
                session_regenerate_id(true); // Regenerate session ID to prevent session fixation
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role_id'] = $user['role_id'];
                $_SESSION['full_name'] = $user['full_name'];

                // Log the successful login action
                $this->users->log_action($user['user_id'], 'User logged in');
                $this->redirect('/');
            } else {
                // Log failed login attempt
                $this->users->log_action(0, 'Login attempt failed for email: ' . $email);
                $this->viewAuthentication('authentication/login', ['error' => 'Invalid email or password!']);
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
?>
