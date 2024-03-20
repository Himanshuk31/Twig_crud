<?php
session_start();

require_once '../vendor/autoload.php'; 
use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$pdo = Connection::getInstance()->getConnection();
$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE data SET name = :name, password = :password, phone_number = :phone WHERE id = :id");
    $stmt->execute(['name' => $name, 'password' => $password, 'phone' => $phone, 'id' => $id]);

    header("Location: details.php?id=$id");
    exit();
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM data WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    echo $twig->render('pages/edit.twig', ['user' => $user]);
}
?>
