<?php
namespace Services;

use Config\Connection;

class UserService {
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::getInstance()->getConnection();
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM data WHERE name = :username AND password = :password");
        $stmt->execute([':username' => $username, ':password' => $password]); 
        return $stmt->fetch();
    }
}
?>
