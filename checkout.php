<?php
$erro = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $endereco = trim($_POST['endereco']);
    $pagamento = $_POST['pagamento'];

    if ($nome && $email && $endereco && $pagamento) {
        echo "<h2>Compra finalizada com sucesso!</h2>";
        echo "<p>Obrigado, $nome. Um e-mail de confirmação foi enviado para $email.</p>";
        exit;
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Finalizar Compra</h1>
    <?php if ($erro) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome"><br>
        
        <label>Email:</label>
        <input type="email" name="email"><br>
        
        <label>Endereço:</label>
        <input type="text" name="endereco"><br>
        
        <label>Método de Pagamento:</label>
        <select name="pagamento">
            <option value="">Selecione</option>
            <option value="cartao">Cartão de Crédito</option>
            <option value="boleto">Boleto</option>
            <option value="pix">PIX</option>
        </select><br>
        
        <button type="submit" class="btn">Finalizar</button>
    </form>
</body>
</html>
