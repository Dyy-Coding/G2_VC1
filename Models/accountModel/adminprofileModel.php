<?php
require_once "Database/Database.php";

class AdminProfileModel
{
    private $dsn;
    function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    function profileAdminAccount()
    {
        try {
            $query = "
                SELECT 
                    u.user_id, 
                    u.profile_image, 
                    u.first_name, 
                    u.last_name, 
                    u.email, 
                    u.phone, 
                    u.address, 
                    u.street_address, 
                    u.created_at, 
                    u.updated_at, 
                    r.role_name, 
                    r.description AS role_description
                FROM 
                    users u
                JOIN 
                    roles r ON u.role_id = r.role_id
                WHERE 
                    r.role_name = 'Admin' OR u.role_id = 1
                LIMIT 1";

            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Debug: Log the fetched data to verify profile_image
            error_log("Fetched admin data: " . print_r($admin, true));

            return $admin ?: [];
        } catch (PDOException $e) {
            error_log("Error fetching admin profile: " . $e->getMessage());
            return [];
        }
    }
}