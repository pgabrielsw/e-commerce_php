<?php
$produtos = [
    ["id" => 1, "nome" => "Notebook", "preco" => 3500.00, "imagem" => "src/notebook.png", "descricao" => "Notebook potente para estudos e trabalho."],
    ["id" => 2, "nome" => "Smartphone", "preco" => 2200.00, "imagem" => "src/smartphone.png", "descricao" => "Smartphone moderno com ótima câmera."],
    ["id" => 3, "nome" => "Fone Bluetooth", "preco" => 150.00, "imagem" => "src/fone.png", "descricao" => "Fone de ouvido sem fio com cancelamento de ruído."]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>E-commerce Simples</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo_inicial">
        <img class="img_latamarket" src="src/lata1-png.png">
        <h1 class="h1_1">Lata Market</h1>
    </div>
    <div class="produtos">
        <?php foreach($produtos as $p): ?>
            <div class="card">
                <img src="<?= $p['imagem'] ?>" alt="<?= $p['nome'] ?>">
                <h3><?= $p['nome'] ?></h3>
                <p>R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
                <a href="produto.php?id=<?= $p['id'] ?>">Ver detalhes</a>
                <a href="carrinho.php?add=<?= $p['id'] ?>" class="btn">Adicionar ao carrinho</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
