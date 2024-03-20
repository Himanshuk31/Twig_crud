<?php
require_once '../vendor/autoload.php'; 
use Config\Connection; 

$pdo = Connection::getInstance()->getConnection();
$dataId = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM data WHERE id = :id");
$stmt->execute(['id' => $dataId]);

?>
<script>
    alert("User deleted successfully");

    setTimeout(function() {
        window.location.href = 'login.php';
    }, 2000); 
</script>
