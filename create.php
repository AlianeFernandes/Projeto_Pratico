<?php
require 'auth.php';
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
    $stmt->execute([$name, $description, $price]);

    header("Location: index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
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
            background-color: #28a745;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
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
    <h2>Adicionar Produto</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Nome" required>
        <textarea name="description" placeholder="Descrição"></textarea>
        <input type="number" step="0.01" name="price" placeholder="Preço" required>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php" class="back-link">← Voltar</a>
</div>

