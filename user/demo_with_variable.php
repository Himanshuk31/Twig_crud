<?php
require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('../template');

$twig = new Environment($loader);
$firstName = 'Himanshu';
$lastName = 'Katyal';
echo $twig->render('demo1.html.twig', [
    'firstName' => $firstName,
    'lastName' => $lastName
]);
?>
