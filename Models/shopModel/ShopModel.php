<?php
require_once "Database/Database.php";

class ShopModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

}
