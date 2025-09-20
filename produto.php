<?php
$produtos = [
    1 => ["nome" => "Notebook", "preco" => 3500.00, "imagem" => "img/notebook.jpg", "descricao" => "Notebook potente para estudos e trabalho."],
    2 => ["nome" => "Smartphone", "preco" => 2200.00, "imagem" => "img/joystick.jpg", "descricao" => "Smartphone moderno com ótima câmera."],
    3 => ["nome" => "Fone de ouvido", "preco" => 2500.00, "imagem" => "img/computador.jpg", "descricao" => "Fone de ouvido sem fio com cancelamento de ruído."]
];

$id = $_GET['id'] ?? 1;
$produto = $produtos[$id];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $produto['nome'] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?= $produto['nome'] ?></h1>
    <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" class="img-detalhe">
    <p><?= $produto['descricao'] ?></p>
    <p><strong>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></p>
    <a href="carrinho.php?add=<?= $id ?>" class="btn">Adicionar ao Carrinho</a>
    <a href="index.php">Voltar</a>
</body>
</html>
