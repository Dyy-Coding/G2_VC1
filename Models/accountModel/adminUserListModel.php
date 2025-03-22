<?php
require_once "Database/Database.php";

class AdminUserListModel
{
    private $dsn;

    function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    // get all user but user_id = 1 not show
    public function listGetUsersAccount()
    {
        $sql = "SELECT * FROM users WHERE user_id != :admin_id";
        $stmt = $this->dsn->prepare($sql);
        $stmt->execute([':admin_id' => 1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }








    public function viewuserdetail($id)
    {
        $sql = "SELECT users.user_id, users.profile_image, users.first_name, users.last_name, users.email, users.phone, users.role_id, users.password, users.address, users.street_address, users.created_at, users.updated_at 
                FROM users 
                WHERE users.user_id = :user_id";
        $stmt = $this->dsn->prepare($sql);
        $stmt->execute([':user_id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}