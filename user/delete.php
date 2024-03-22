<?php

require_once '../vendor/autoload.php'; 
use Repository\Repository;

$repo = new Repository();

if(isset($_GET['id'])) {
    $dataId = $_GET['id'];
    $repo->deleteUser($dataId);
}

?>
<script>
    alert("User deleted successfully");

    setTimeout(function() {
        window.location.href = 'details.php';
    }, 1000); 
</script>
