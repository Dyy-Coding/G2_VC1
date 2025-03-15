<?php

class LoginController extends BaseController
{
    private $users;
    private $conn;

    public function __construct()
    {
      
        $this->users = new UserModel(); // Assuming UserModel handles database interaction
    }

    // Function to log user actions
    private function log_action($user_id, $action)
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

        // Assuming $this->conn is the PDO connection initialized in BaseController
        $stmt = $this->conn->prepare("INSERT INTO audit_logs (user_id, action, ip_address, user_agent) VALUES (:user_id, :action, :ip_address, :user_agent)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':action', $action);
        $stmt->bindParam(':ip_address', $ip);
        $stmt->bindParam(':user_agent', $agent);
        $stmt->execute();
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
            var_dump($user);

            if ($user && password_verify($password, $user['password'])) {
                // ✅ Successful login
                session_regenerate_id(true); // Regenerate session ID to prevent session fixation
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role_id'] = $user['role_id'];
                $_SESSION['full_name'] = $user['full_name'];

                $this->log_action($user['user_id'], 'User logged in');
                $this->redirect('/');
            } else {
                // Log failed login attempt
                $this->log_action($user['user_id'] ?? 0, 'Login attempt failed');
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
