<?php
class LoginController extends BaseController {
    private $users;

    public function __construct() {
        $this->users = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_SESSION['user_id'])) {
                $this->redirect('/'); // Redirect to homepage if already logged in
                return;
            }
            $this->renderAuthView('authentication/login');
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $errorMessage = '';
            $emailClass = '';
            $passwordClass = '';
            $emailValue = htmlspecialchars($email);

            // Case 1: Both empty
            if (empty($email) && empty($password)) {
                $errorMessage = 'Email and password are required!';
                $emailClass = $passwordClass = 'is-invalid';
                $this->renderAuthView('authentication/login', [
                    'error' => $errorMessage,
                    'emailClass' => $emailClass,
                    'passwordClass' => $passwordClass,
                    'email' => '',
                ]);
                return;
            }

            // Case 2: Only one is empty
            if (empty($email)) {
                $errorMessage = 'Email is required!';
                $emailClass = 'is-invalid';
                $this->renderAuthView('authentication/login', [
                    'error' => $errorMessage,
                    'emailClass' => $emailClass,
                    'passwordClass' => '',
                    'email' => '',
                ]);
                return;
            }

            if (empty($password)) {
                $errorMessage = 'Password is required!';
                $passwordClass = 'is-invalid';
                $this->renderAuthView('authentication/login', [
                    'error' => $errorMessage,
                    'emailClass' => '',
                    'passwordClass' => $passwordClass,
                    'email' => $emailValue,
                ]);
                return;
            }

            // Check if user exists
            $user = $this->users->getUserByEmail($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['role_id'] = $user['role_id'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $this->users->log_action($user['user_id'], 'User logged in');

                    // Special handling for role_id = 1 (super admin)
                    if ($user['role_id'] == 1) {
                        $this->redirect('/'); // Full system access
                    } else {
                        // Check specific permission for other roles
                        if ($this->users->userHasPermission($user['user_id'], 'access_dashboard')) {
                            $this->redirect('/dashboard'); // Regular dashboard for permitted users
                        } else {
                            $this->redirect('/welcome'); // Default page for others
                        }
                    }
                } else {
                    $this->users->log_action(null, "Failed login (wrong password) for email: $email");
                    $errorMessage = 'Invalid password!';
                    $emailClass = 'is-valid';
                    $passwordClass = 'is-invalid';
                    $this->renderAuthView('authentication/login', [
                        'error' => $errorMessage,
                        'emailClass' => $emailClass,
                        'passwordClass' => $passwordClass,
                        'email' => $emailValue,
                    ]);
                }
            } else {
                $this->users->log_action(null, "Failed login (wrong email) for email: $email");
                $errorMessage = 'Invalid email!';
                $emailClass = 'is-invalid';
                $passwordClass = 'is-invalid';
                $this->renderAuthView('authentication/login', [
                    'error' => $errorMessage,
                    'emailClass' => $emailClass,
                    'passwordClass' => $passwordClass,
                    'email' => '',
                ]);
            }
        }
    }

    // Email validation function (unchanged)
    private function validateEmail($email, &$errors) {
        if (empty($email)) {
            $errors['email'] = 'Email is required!';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format!';
        } elseif (!$this->users->getUserByEmail($email)) {
            $errors['email'] = 'Email not found in our records!';
        }
    }

    // Password validation function (unchanged)
    private function validatePassword($password, &$errors) {
        if (empty($password)) {
            $errors['password'] = 'Password is required!';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters!';
        }
    }

    public function logout() {
        if (isset($_SESSION['user_id'])) {
            $this->users->log_action($_SESSION['user_id'], 'User logged out');
        }
        session_unset();
        session_destroy();
        $this->redirect('/login');
    }
}