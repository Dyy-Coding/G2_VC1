<?php
class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        if (self::$conn === null) {
            try {
                $host = 'localhost';
                $db = 'construction_depot_lim_try';
                $user = 'root';
                $pass = '';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

                self::$conn = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                die("DB Connection failed: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}
