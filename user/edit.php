<?php
require_once '../vendor/autoload.php'; 

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Repository\Repository;

$loader = new FilesystemLoader('../template');
$twig = new Environment($loader);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id'])) {
        $repo = new Repository();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];
        
        $result = $repo->updateUser($id, $name, $password, $phone_number);
        
        if ($result) {
            header("Location: details.php?id={$id}");
            exit();
        } else {
            echo "Failed to update user details.";
        }
    } else {
        echo "User ID not provided.";
    }
} else {
    if(isset($_GET['id'])) {
        $repo = new Repository();
        $user = $repo->getUserById($_GET['id']);
        
        echo $twig->render('pages/edit.twig', ['user' => $user]);
    } else {
        echo "User ID not provided.";
    }
}
?>
