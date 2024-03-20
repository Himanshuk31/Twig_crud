<?php
require_once '../vendor/autoload.php'; 

use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
$pdo = Connection::getInstance()->getConnection();

$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM data WHERE name = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
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
