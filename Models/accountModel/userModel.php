<?php

class UserCustomerProfileModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // Fetch a user by ID
    public function getUserById($id)
    {
        $sql = "SELECT users.*, roles.role_name, roles.description
                FROM users
                LEFT JOIN roles ON users.role_id = roles.role_id
                WHERE users.user_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
