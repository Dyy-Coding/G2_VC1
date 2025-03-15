<?php
class UserModel {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->conn = Database::getConnection(); // Singleton DB connection
    }

    // Get a user by email (case-insensitive)
    public function registerUser($email, $password) {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database with the hashed password
        $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
    }

    public function getUserByEmail($email) {
        // Retrieve the user from the database by email
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Returns an associative array
    }

    // Get a user by ID
    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add a new user to the database (Create)// Add a new user to the database (Create)
public function addUser($first_name, $last_name, $email, $phone, $role_id, $password)
{
    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Using PDO prepared statements
    $sql = "INSERT INTO users (first_name, last_name, email, phone, role_id, password) 
            VALUES (:first_name, :last_name, :email, :phone, :role_id, :password)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
    $stmt->bindParam(':password', $hashedPassword);
    
    if ($stmt->execute()) {
        return $this->conn->lastInsertId();  // Return the inserted user ID
    }

    return false;  // Return false if registration fails
}

    

    // Get all users (Read)
    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update user information (Update)
    public function updateUser($user_id, $first_name, $last_name, $email, $phone, $role_id) {
        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, role_id = :role_id WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Delete a user (Delete)
    public function deleteUser($user_id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Function to log user actions
    public function log_action($user_id, $action) {
        try {
            // Validate user existence
            $user = $this->getUserById($user_id);
            if (!$user) {
                $user_id = null; // Avoid foreign key violation
            }
    
            // Get user IP and user agent
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
            $agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    
            // Prepare SQL statement
            $stmt = $this->conn->prepare("INSERT INTO audit_logs (user_id, action, ip_address, user_agent, created_at) 
                                          VALUES (:user_id, :action, :ip_address, :user_agent, NOW())");
    
            // Bind parameters with proper handling for NULL values
            if ($user_id === null) {
                $stmt->bindValue(':user_id', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            }
            $stmt->bindParam(':action', $action);
            $stmt->bindParam(':ip_address', $ip);
            $stmt->bindParam(':user_agent', $agent);
    
            // Execute the query
            if (!$stmt->execute()) {
                error_log("Failed to log action: " . implode(" | ", $stmt->errorInfo()));
            }
        } catch (PDOException $e) {
            error_log("Audit log error: " . $e->getMessage());
        }
    }
    
}
?>
