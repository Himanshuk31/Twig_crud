<?php
session_start();

require_once '../vendor/autoload.php'; 

use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Services\UserService;

$pdo = Connection::getInstance()->getConnection();
$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userService = new UserService();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userService->login($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: details.php?id={$user['id']}");
        exit();
    } else {
        $error = "Invalid username or password";
        echo $twig->render('pages/login.twig', ['error' => $error]);
    }
} else {
    echo $twig->render('pages/login.twig', []);
}
?>


