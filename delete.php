<?php
require 'auth.php';
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>