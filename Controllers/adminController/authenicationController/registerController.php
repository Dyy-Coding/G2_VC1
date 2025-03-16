<?php
require_once "Controllers/validateionHelper.php";

class RegisterController extends BaseController
{
    private $users;

    public function __construct()
    {
        // Initialize the UserModel
        $this->users = new UserModel();
    }

    public function register()
    {
        // Check if the request is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            
            // Sanitize and collect input data
            $first_name = ($_POST['first_name'] );
            $last_name = ($_POST['last_name'] );
            $email = ($_POST['email'] );
            $phone = ($_POST['phone'] );
            $role_id = isset($_POST['role_id']) ? intval($_POST['role_id']) : 2; // Default role: User
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ;

        

            // Add the user to the database
            try {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password
                $result = $this->users->addUser($first_name, $last_name, $email, $phone, $role_id, $hashed_password);

                if ($result) {
                    // Set session variables after successful registration
                    $_SESSION['user_id'] = $result;  // Newly inserted user ID
                    $_SESSION['role_id'] = $role_id;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;

                    // Log the registration action
                    $this->users->log_action($result, 'User registered successfully.');

                    // Redirect to the dashboard with a success message
                    $_SESSION['success'] = 'Registration successful! Redirecting to dashboard...';
                    $this->redirect('/');
                } else {
                    throw new Exception("Registration failed. Please try again.");
                }
            } catch (Exception $e) {
                // Catch any errors and show them
                $errors[] = "Error: " . $e->getMessage();
                $this->renderAuthView('authentication/register', ['errors' => $errors]);
            }
        } else {
            // Show the registration form (GET request)
            $this->renderAuthView('authentication/register');
        }
    }
}
?>
