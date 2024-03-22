<?php
namespace Config;

use PDO;

class Connection {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user";

        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
