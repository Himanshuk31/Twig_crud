<?php

require_once '../vendor/autoload.php'; 

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Repository\Repository; // Corrected class import


// Ensure Repository class is included
if (!class_exists('Repository\Repository')) {
    die("Repository class not found or included.");
}

$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

session_start();

if(isset($_GET['id'])) {
    // Assuming Composer autoloader is correctly configured and generated
    $repo = new Repository();
    $user = $repo->getUserById($_GET['id']);
    
    echo $twig->render('pages/details.twig', ['user' => $user]);
} else {
    echo "User Deleted succesfully";
}
?>
