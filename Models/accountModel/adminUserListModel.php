<?php
require_once "Database/Database.php";

class AdminUserListModel
{
    private $dsn;
    function __construct()
    {
        $this->dsn = Database::getConnection();
    }
    // Function to show all users except the admin (user_id = 1)
    public function getUsersAccount()
    {
        $sql = "SELECT * FROM users WHERE user_id != :admin_id";
        $stmt = $this->dsn->prepare($sql);
        $stmt->execute([':admin_id' => 1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to vieew user details by ID
    public function viewUserAccountDetail($id)
    {
        $sql = "SELECT users.user_id, users.profile_image, users.first_name, users.last_name, users.email, users.phone, users.role_id, users.password, users.address, users.street_address, users.created_at, users.updated_at 
                    FROM users 
                    WHERE users.user_id = :user_id";
        try {
            $stmt = $this->dsn->prepare($sql);
            $stmt->execute([':user_id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed to fetch user details: " . $e->getMessage());
            throw new Exception("Failed to fetch user details from the database: " . $e->getMessage());
        }
    }

    // Add a new user
    public function addNewUserAccount($firstName, $lastName, $email, $phone, $roleId, $password, $address = null, $streetAddress = null, $profileImage = null)
    {
        $sql = "INSERT INTO users (
            first_name, 
            last_name, 
            email, 
            phone, 
            role_id, 
            password, 
            address, 
            street_address, 
            profile_image, 
            created_at, 
            updated_at
        ) VALUES (
            :first_name, 
            :last_name, 
            :email, 
            :phone, 
            :role_id, 
            :password, 
            :address, 
            :street_address, 
            :profile_image, 
            NOW(), 
            NOW()
        )";

        $stmt = $this->dsn->prepare($sql);
        $stmt->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email,
            ':phone' => $phone,
            ':role_id' => $roleId,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
            ':address' => $address,
            ':street_address' => $streetAddress,
            ':profile_image' => $profileImage
        ]);

        return $this->dsn->lastInsertId();
    }

    // Check if an email already exists
    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->dsn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserAccountFSY($id)
    {
        $sql = "SELECT users.user_id, users.profile_image, users.first_name, users.last_name, users.email, users.phone, users.role_id, users.password, users.address, users.street_address, users.created_at, users.updated_at 
            FROM users 
            WHERE users.user_id = :user_id";
        try {
            $stmt = $this->dsn->prepare($sql);
            $stmt->execute([':user_id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed to fetch user details for update: " . $e->getMessage());
            throw new Exception("Failed to fetch user details for update from the database: " . $e->getMessage());
        }
    }

    // Function to update user
    public function updateUserAccountTSY($id, $data)
    {
        $sql = "UPDATE users SET 
                     profile_image = :profile_image, 
                     first_name = :first_name, 
                     last_name = :last_name, 
                     email = :email, 
                     phone = :phone, 
                     role_id = :role_id, 
                     address = :address, 
                     street_address = :street_address, 
                     password = :password, 
                     updated_at = NOW() 
                 WHERE user_id = :user_id";

        $stmt = $this->dsn->prepare($sql);
        $stmt->execute([
            ':profile_image' => $data['profile_image'],
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':role_id' => $data['role_id'],
            ':address' => $data['address'],
            ':street_address' => $data['street_address'],
            ':password' => $data['password'],
            ':user_id' => $id
        ]);
    }

    // delete user
    public function deleteUserAccountById($userId)
    {
        $stmt = $this->dsn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
    }
}
