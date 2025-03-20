<?php
require_once "Database/Database.php";
class AdminUserListModel
{
    private $dsn;

    function __construct()
    {
        $this->dsn = Database::getConnection();
    }

    function listGetUsersAccount()
    {
        $stmt = $this->dsn->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }
}