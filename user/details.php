<?php
require_once '../vendor/autoload.php'; 

use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$pdo = Connection::getInstance()->getConnection();
$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);
session_start();

if(isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM data WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $user = $stmt->fetch();
    
    echo $twig->render('pages/details.twig', ['user' => $user]);
} else {
    echo "User ID not provided.";
}
?>
