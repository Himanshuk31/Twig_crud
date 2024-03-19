<?php
require_once '../vendor/autoload.php'; 

use Config\Connection; 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$connection = Connection::getInstance();
$pdo = $connection->getConnection();

$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

echo $twig->render('pages/login.twig', []);
?>
