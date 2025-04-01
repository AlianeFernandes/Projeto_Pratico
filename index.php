<?php
require 'db.php';
$products = $conn->query("SELECT * FROM products");
?>

<a href="logout.php">Logout</a> | <a href="create.php">Adicionar Produto</a>

<h2>Lista de Produtos</h2>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td>R$ <?= $product['price'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
