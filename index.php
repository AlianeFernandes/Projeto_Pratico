<?php
require 'auth.php';
require 'db.php';

// Buscar todos os produtos
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .top-links {
            margin-bottom: 20px;
        }

        .top-links a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .top-links a:hover {
            background-color: #0056b3;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f0f2f5;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .actions a {
            text-decoration: none;
            padding: 6px 10px;
            margin-right: 5px;
            border-radius: 4px;
            color: white;
            font-size: 0.9em;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<div class="top-links">
    <a href="logout.php">Logout</a>
    <a href="create.php">Adicionar Produto</a>
</div>

<h2>Lista de Produtos</h2>

<table>
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['description']) ?></td>
            <td>R$ <?= number_format($product['price'], 2, ',', '.') ?></td>
            <td class="actions">
                <a href="update.php?id=<?= $product['id'] ?>" class="edit-btn">Editar</a>
                <a href="delete.php?id=<?= $product['id'] ?>" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

