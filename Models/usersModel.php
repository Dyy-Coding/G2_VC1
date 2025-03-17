<?php

class UserModel {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->conn = Database::getConnection(); // Singleton DB connection
    }

    // Get user by email
    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get user by ID
    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add a new user
    public function addUser($first_name, $last_name, $email, $phone, $role_id, $password, $address, $streetAddress) {
        $sql = "INSERT INTO users (first_name, last_name, email, phone, role_id, password, address, street_address) 
                VALUES (:first_name, :last_name, :email, :phone, :role_id, :password, :address, :street_address)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':street_address', $streetAddress, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); // Return the last inserted ID
        }
    
        return false; // Return false if the insert fails
    }
    

    // Function to generate a token and store it in the database for the user
    public function generatePasswordResetToken($email) {
        // Get the user_id from the email
        $user_id = $this->getUserIdByEmail($email);
        
        if (!$user_id) {
            return false; // Email does not exist, handle this case properly
        }
    
        $token = bin2hex(random_bytes(16));
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
        $query = "INSERT INTO password_resets (user_id, email, token, expiration) 
                  VALUES (:user_id, :email, :token, :expiration)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':expiration', $expiration, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return $token;
        }
        return false;
    }
    

    // Function to validate the reset token
    public function validateResetToken($token) {
        $query = "SELECT * FROM password_resets WHERE token = :token AND expiration > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch the token data (including user_id)
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;  // Return the row containing user_id and token data
        } else {
            return false; // Token is invalid or expired
        }
    }

    // Function to update the password once the token is valid
    public function updatePassword($user_id, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $query = "UPDATE users SET password = :password WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Check if email exists in the database
    public function checkEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get user ID by email
    public function getUserIdByEmail($email) {
        $query = "SELECT user_id FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn(); // returns only the user_id
    }

    // Add a password reset entry for the user
    public function addPasswordReset($user_id, $token) {
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $query = "INSERT INTO password_resets (user_id, token, expiration) VALUES (:user_id, :token, :expiration)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':expiration', $expiration, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Log user actions
    public function log_action($user_id, $action) {
        try {
            $user = $this->getUserById($user_id);
            if (!$user) {
                $user_id = null;
            }

            $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
            $agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

            $stmt = $this->conn->prepare("INSERT INTO audit_logs (user_id, action, ip_address, user_agent, created_at) 
                                          VALUES (:user_id, :action, :ip_address, :user_agent, NOW())");

            if ($user_id === null) {
                $stmt->bindValue(':user_id', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            }
            $stmt->bindParam(':action', $action, PDO::PARAM_STR);
            $stmt->bindParam(':ip_address', $ip, PDO::PARAM_STR);
            $stmt->bindParam(':user_agent', $agent, PDO::PARAM_STR);

            if (!$stmt->execute()) {
                error_log("Failed to log action: " . implode(" | ", $stmt->errorInfo()));
            }
        } catch (PDOException $e) {
            error_log("Audit log error: " . $e->getMessage());
        }
    }

    // Get all users
    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update user details
    public function updateUser($user_id, $first_name, $last_name, $email, $phone, $role_id) {
        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, role_id = :role_id WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete a user
    public function deleteUser($user_id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Get user ID by token
    public function getUserIdByResetToken($token) {
        // Query to find the user associated with the token
        $query = "SELECT user_id FROM password_resets WHERE token = :token AND expiration > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Token is valid, return user_id
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['user_id'];
        }
        return false; // Token is invalid or expired
    }

    // Get the last user_id from password_resets table
public function getLastUserIdInPasswordResets() {
    $query = "SELECT user_id FROM password_resets ORDER BY id DESC LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchColumn(); // Returns only the user_id
}

}
?>
