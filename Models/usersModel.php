<?php
class UserModel {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->conn = Database::getConnection(); // Singleton DB connection
    }

    // Get a user by email
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get a user by ID
    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add a new user to the database (Create)
    public function addUser($full_name, $email, $phone, $role_id, $hashed_password) {
        try {
            $sql = "INSERT INTO users (full_name, email, phone, role_id, password, created_at) 
                    VALUES (:full_name, :email, :phone, :role_id, :password, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':role_id', $role_id);
            $stmt->bindParam(':password', $hashed_password);
    
            if ($stmt->execute()) {
                return $this->conn->lastInsertId(); // Return new user ID instead of true
            } else {
                return "Failed to insert user.";
            }
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }
    
    // Get all users (Read)
    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update user information (Update)
    public function updateUser($user_id, $full_name, $email, $phone, $role_id) {
        $sql = "UPDATE users SET full_name = :full_name, email = :email, phone = :phone, role_id = :role_id WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':full_name', $full_name);
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
        // If user_id is NULL (not logged in), assign a default user_id (e.g., 0 for guest)
        $user_id = $user_id ?? "unknown"; // Default to 0 if user_id is not set

        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

        $stmt = $this->conn->prepare("INSERT INTO audit_logs (user_id, action, ip_address, user_agent, created_at) 
                                      VALUES (:user_id, :action, :ip_address, :user_agent, NOW())");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':action', $action);
        $stmt->bindParam(':ip_address', $ip);
        $stmt->bindParam(':user_agent', $agent);
        $stmt->execute();
    }
}
