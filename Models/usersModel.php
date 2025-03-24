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
            return $this->conn->lastInsertId();
        }

        return false;
    }

    // Get the latest token for a user by email
    public function getLatestResetTokenByEmail($email) {
        $query = "SELECT token FROM password_resets WHERE email = :email ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['token'] : false;
    }

    // Generate a password reset token and store it in the database
    public function generatePasswordResetToken($email) {
        $user_id = $this->getUserIdByEmail($email);
        if (!$user_id) {
            return false;
        }

        $this->clearOldResetTokens($email);

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

    // Validate the reset token
    public function validateResetToken($token) {
        $query = "SELECT * FROM password_resets WHERE token = :token AND expiration > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
    }

    // Update the password once the reset token is valid
    public function updatePassword($user_id, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $query = "UPDATE users SET password = :password WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Delete a reset token after use
    public function deleteResetToken($token) {
        $query = "DELETE FROM password_resets WHERE token = :token";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Clear old reset tokens by email
    public function clearOldResetTokens($email) {
        $query = "DELETE FROM password_resets WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function checkEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserIdByEmail($email) {
        $query = "SELECT user_id FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
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

    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public function deleteUser($user_id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getUserIdByResetToken($token) {
        $query = "SELECT user_id FROM password_resets WHERE token = :token AND expiration > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['user_id'] : false;
    }

    public function getLastUserIdInPasswordResets() {
        $query = "SELECT user_id FROM password_resets ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function userHasPermission($user_id, $permission_name) {
        $query = "SELECT 1 
                  FROM users u
                  JOIN roles r ON u.role_id = r.role_id
                  JOIN permission_roles pr ON r.role_id = pr.role_id
                  JOIN permissions p ON pr.permission_id = p.permission_id
                  WHERE u.user_id = :user_id
                  AND p.permission_name = :permission_name
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':permission_name', $permission_name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function checkUserByEmailOrPhone($contact)
{
    try {
        // Check if the input is an email or phone number
        if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT * FROM users WHERE email = :contact LIMIT 1";
        } else {
            $query = "SELECT * FROM users WHERE phone = :contact LIMIT 1";
        }

        // Prepare and execute the query
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);

        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;  // User found
        } else {
            return null;  // No user found
        }
    } catch (PDOException $e) {
        // Handle query or database connection error
        echo "Error: " . $e->getMessage();
        return null;
    }
}


    public function clearAllExpiredResetTokens() {
        $query = "DELETE FROM password_resets WHERE expiration < NOW()";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    // Store the reset token and expiration time in the password_resets table
    public function storeResetToken($user_id, $token, $expiresAt)
    {
        $query = "INSERT INTO password_resets (user_id, token, expiration) 
                  VALUES (:user_id, :token, :expiration)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':expiration', $expiresAt, PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Check if the reset token is valid and hasn't expired
    public function isTokenValid($token)
    {
        $query = "SELECT * FROM password_resets WHERE token = :token AND expiration > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }



    // Get user by reset token
public function getUserByResetToken($token) {
    $query = "SELECT u.* 
              FROM users u 
              JOIN password_resets pr ON u.user_id = pr.user_id 
              WHERE pr.token = :token AND pr.expiration > NOW()";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}

?>
