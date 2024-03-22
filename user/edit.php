// user/edit.php

<?php
session_start();

require_once '../vendor/autoload.php'; 
use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Services\UserService;

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$pdo = Connection::getInstance()->getConnection();
$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

$userService = new UserService();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    $userService->updateUser($id, $name, $password, $phone_number);

    header("Location: details.php?id=$id");
    exit();
} else {
    $id = $_GET['id'];
    $user = $userService->getUserById($id);

    echo $twig->render('pages/edit.twig', ['user' => $user]);
}
?>
