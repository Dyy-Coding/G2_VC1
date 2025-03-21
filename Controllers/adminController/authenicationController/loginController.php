<?php


class LoginController extends BaseController
{
    private $users;

    public function __construct()
    {
        // Initialize the UserModel to interact with user data
        $this->users = new UserModel();
    }

    public function login()
    {
        // Handle GET request (display login form)
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Redirect to home if already logged in
            if (isset($_SESSION['user_id'])) {
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

            // Initialize an array to store errors
            $errors = [];

            // Validate email and password using the separate functions
            $this->validateEmail($email, $errors);
            $this->validatePassword($password, $errors);

            // If there are errors, re-render the login view with error messages
            if (!empty($errors)) {
                $this->renderAuthView('authentication/login', ['errors' => $errors, 'email' => $email, 'password' => $password]);
                return;
            }

            // Fetch user by email from the database
            $user = $this->users->getUserByEmail($email);

            // Check if user exists and password is correct
            if ($user && password_verify($password, $user['password'])) {
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

                // General error: Invalid email or password
                $errors['general'] = 'Invalid email or password!';
                
                // Re-render the login view with error messages
                $this->renderAuthView('authentication/login', ['errors' => $errors, 'email' => $email, 'password' => $password]);
            }
        }
    }

    // Email validation function
    private function validateEmail($email, &$errors)
    {
        if (empty($email)) {
            $errors['email'] = 'Email is required!';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format!';
        } elseif (!$this->users->getUserByEmail($email)) {
            // Check if email exists in the database
            $errors['email'] = 'Email not found in our records!';
        }
    }

    // Password validation function
    private function validatePassword($password, &$errors)
    {
        if (empty($password)) {
            $errors['password'] = 'Password is required!';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters!';
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
