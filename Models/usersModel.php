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
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return associative array or false
    }

    
    // Function to log user actions
    public function log_action($user_id, $action)
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

    // Add a new user to the database
    public function addUser($full_name, $email, $phone, $role_id, $password, $verification_token) {
        $sql = "INSERT INTO users (full_name, email, phone, role_id, password, verification_token, is_verified) 
                VALUES (:full_name, :email, :phone, :role_id, :password, :verification_token, 0)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':verification_token', $verification_token);
        
        return $stmt->execute(); // Returns true if the query was successful
    }

    // Get all users from the database
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return an array of users
    }

    // Display all users in a table format
    public function showAllUsers() {
        $users = $this->getAllUsers(); // Fetch all users

        if ($users) {
            echo "<table border='1'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role ID</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($users as $user) {
                echo "<tr>
                        <td>" . htmlspecialchars($user['user_id']) . "</td>
                        <td>" . htmlspecialchars($user['full_name']) . "</td>
                        <td>" . htmlspecialchars($user['email']) . "</td>
                        <td>" . htmlspecialchars($user['phone']) . "</td>
                        <td>" . htmlspecialchars($user['role_id']) . "</td>
                        <td>" . ($user['is_verified'] ? 'Verified' : 'Not Verified') . "</td>
                        <td>" . htmlspecialchars($user['created_at']) . "</td>
                        <td>
                            <a href='edit.php?id=" . htmlspecialchars($user['user_id']) . "'>Edit</a> | 
                            <a href='delete.php?id=" . htmlspecialchars($user['user_id']) . "'>Delete</a>
                        </td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No users found.</p>";
        }
    }
}
?>
