<?php
class UserModel {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->conn = Database::getConnection(); // Singleton DB connection
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($first_name, $last_name, $email, $phone, $role_id, $password) {
        $sql = "INSERT INTO users (first_name, last_name, email, phone, role_id, password) 
                VALUES (:first_name, :last_name, :email, :phone, :role_id, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public function deleteUser($user_id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

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
            $stmt->bindParam(':action', $action);
            $stmt->bindParam(':ip_address', $ip);
            $stmt->bindParam(':user_agent', $agent);

            if (!$stmt->execute()) {
                error_log("Failed to log action: " . implode(" | ", $stmt->errorInfo()));
            }
        } catch (PDOException $e) {
            error_log("Audit log error: " . $e->getMessage());
        }
    }



    public function updatePassword($user_id, $newPassword) {
        $sql = "UPDATE users SET password = :password WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function checkEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";  // Fetch user data
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        // Return the user data if email exists, otherwise return false
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Returning user data if email found
    }
    
    
    /**
     * Validate the password reset token.
     *
     * @param string $token The reset token provided by the user.
     * @return mixed Returns user data if valid token, or false if token is invalid or expired.
     */
    public function validateResetToken($token) {
        // SQL to check for the token and its expiration time (assuming token expiry time is 1 hour)
        $query = "SELECT * FROM password_resets WHERE token = :token AND expiration > NOW() LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        // Fetch the result, and return user data if token is valid
        $reset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($reset) {
            // Return the user data associated with the reset token
            return [
                'user_id' => $reset['user_id'],
                'email' => $reset['email']
            ];
        }

        return false; // Token is invalid or expired
    }



}
?>
