<?php
require_once "Database/Database.php";

class CustomerInfoModel
{
    private $dsn;

    function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    function getCustomersModel()
    {
        try {
            $query = "SELECT user_id, profile_image, first_name, last_name, email, phone, street_address 
                      FROM users 
                      WHERE role_id = 2";
            $stmt = $this->dsn->prepare($query);
            $stmt->execute();
            $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $customers;
        } catch (PDOException $e) {
            error_log("Error fetching customers: " . $e->getMessage());
            return [];
        }
    }

    function getCustomerModel($user_id)
    {
        try {
            $query = "SELECT user_id, profile_image, first_name, last_name, email, phone, street_address 
                      FROM users 
                      WHERE user_id = :user_id AND role_id = 2";
            $stmt = $this->dsn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $customer = $stmt->fetch(PDO::FETCH_ASSOC);
            return $customer ?: [];
        } catch (PDOException $e) {
            error_log("Error fetching customer: " . $e->getMessage());
            return [];
        }
    }

    function updateCustomerModel($user_id, $first_name, $last_name, $email, $phone, $street_address, $profile_image = null)
    {
        try {
            $query = "UPDATE users 
                      SET first_name = :first_name, 
                          last_name = :last_name, 
                          email = :email, 
                          phone = :phone, 
                          street_address = :street_address";

            if ($profile_image !== null) {
                $query .= ", profile_image = :profile_image";
            }

            $query .= " WHERE user_id = :user_id AND role_id = 2";

            $stmt = $this->dsn->prepare($query);

            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':street_address', $street_address, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

            if ($profile_image !== null) {
                $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
            }

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error updating customer: " . $e->getMessage());
            return false;
        }
    }

    function deleteCustomerModel($user_id)
    {
        try {
            $query = "DELETE FROM users WHERE user_id = :user_id AND role_id = 2";
            $stmt = $this->dsn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $success = $stmt->rowCount() > 0;
            error_log("Delete customer user_id $user_id: " . ($success ? "Success" : "No rows affected"));
            return $success;
        } catch (PDOException $e) {
            error_log("Error deleting customer user_id $user_id: " . $e->getMessage());
            return false;
        }
    }

    function getCustomerDetailModel($user_id)
    {
        try {
            $query = "SELECT 
                        u.user_id, 
                        u.profile_image, 
                        u.first_name, 
                        u.last_name, 
                        u.email, 
                        u.phone, 
                        u.street_address,
                        u.created_at,
                        u.updated_at,
                        r.role_name
                      FROM users u
                      JOIN roles r ON u.role_id = r.role_id
                      WHERE u.user_id = :user_id";
            $stmt = $this->dsn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching customer detail: " . $e->getMessage());
            return [];
        }
    }
}