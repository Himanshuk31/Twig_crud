<?php
require_once '../vendor/autoload.php'; 

use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Services\UserService;


$pdo = Connection::getInstance()->getConnection();
$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

session_start();

if(isset($_GET['id'])) {
    $userService = new UserService();
    $user = $userService->getUserById($_GET['id']);
    
    echo $twig->render('pages/details.twig', ['user' => $user]);
} else {
    echo "User ID not provided.";
}
?>