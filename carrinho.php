<?php
session_start();

// Array de produtos simulados
$produtos = [
    1 => ["nome" => "Notebook", "preco" => 3500.00],
    2 => ["nome" => "Smartphone", "preco" => 2200.00],
    3 => ["nome" => "Fone Bluetooth", "preco" => 150.00]
];

// Inicializa carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar produto
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    if (!isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = 1;
    } else {
        $_SESSION['carrinho'][$id]++;
    }
}

// Remover produto
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['carrinho'][$id]);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <table>
        <tr>
            <th>Produto</th>
            <th>Qtd</th>
            <th>Preço Unit.</th>
            <th>Subtotal</th>
            <th>Ação</th>
        </tr>
        <?php
        $total = 0;
        foreach($_SESSION['carrinho'] as $id => $qtd):
            $nome = $produtos[$id]['nome'];
            $preco = $produtos[$id]['preco'];
            $subtotal = $qtd * $preco;
            $total += $subtotal;
        ?>
        <tr>
            <td><?= $nome ?></td>
            <td><?= $qtd ?></td>
            <td>R$ <?= number_format($preco, 2, ',', '.') ?></td>
            <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
            <td><a href="carrinho.php?remove=<?= $id ?>">Remover</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total:</strong></td>
            <td colspan="2"><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td>
        </tr>
    </table>
    <a href="checkout.php" class="btn">Finalizar Compra</a>
    <a href="index.php">Voltar</a>
</body>
</html>
