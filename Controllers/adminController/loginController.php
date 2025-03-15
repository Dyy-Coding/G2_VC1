<?php


class LoginController extends BaseController
{
    private $users;

    public function __construct()
    {
        // Ensure session is started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize the UserModel to interact with user data
        $this->users = new UserModel();
    }

    public function login()
    {
        // Handle GET request (display login form)
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Redirect to home if already logged in
            if (isset($_SESSION['user_id'])) {
                // Avoid redirect loop if user is already logged in
                $this->redirect('/');
                return;
            }

            // Show login view
            $this->renderAuthView('authentication/login');
        } 
        // Handle POST request (process login)
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get POST data and sanitize it
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Validate input fields
            if (empty($email) || empty($password)) {
                $this->renderAuthView('authentication/login', ['error' => 'Email and password are required!']);
                return;
            }

            // Fetch user by email
            $user = $this->users->getUserByEmail($email);

            if ($user) {
                // Successful login, regenerate session ID to prevent session fixation attacks
                session_regenerate_id(true);

                // Set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role_id'] = $user['role_id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];

                // Log successful login action
                $this->users->log_action($user['user_id'], 'User logged in');

                // Redirect to home
                $this->redirect('/');
            } else {
                // Log failed login attempt
                $this->users->log_action(null, "Failed login attempt for email: $email");

                // Display error
                $this->renderAuthView('authentication/login', ['error' => 'Invalid email or password!']);
            }
        }
    }

    public function logout()
    {
        // Log the user logout action if logged in
        if (isset($_SESSION['user_id'])) {
            $this->users->log_action($_SESSION['user_id'], 'User logged out');
        }

        // Destroy session and clear all session data
        session_unset();  // Remove all session variables
        session_destroy();  // Destroy the session

        // Redirect to login page
        $this->redirect('/login');
    }
}
