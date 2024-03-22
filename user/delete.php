<?php
require_once '../vendor/autoload.php'; 
use Config\Connection; 
use Services\UserService;

$pdo = Connection::getInstance()->getConnection();
$userService = new UserService();

if(isset($_GET['id'])) {
    $dataId = $_GET['id'];
    $userService->deleteUser($dataId);
}

?>
<script>
    alert("User deleted successfully");

    setTimeout(function() {
        window.location.href = 'details.php';
    }, 1000); 
</script>
