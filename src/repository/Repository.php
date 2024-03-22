<?php
namespace Repository;

use Config\Connection;

class Repository {
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::getInstance()->getConnection();
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM data WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateUser($id, $name, $password, $phone) {
        $stmt = $this->pdo->prepare("UPDATE data SET name = :name, password = :password, phone_number = :phone WHERE id = :id");
        return $stmt->execute(['name' => $name, 'password' => $password, 'phone' => $phone, 'id' => $id]);
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM data WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
