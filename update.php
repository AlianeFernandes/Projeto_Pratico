<?php
require 'auth.php';
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=? WHERE id=?");
    $stmt->execute([$name, $description, $price, $id]);

    header("Location: index.php");
    exit;
}

// Buscar produto
$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();
?>

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            resize: vertical;
        }

        textarea {
            min-height: 100px;
        }

        button {
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #0056b3;
        }
    </style>
</head>

<div class="form-container">
    <h2>Editar Produto</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php" class="back-link">← Voltar</a>
</div>
