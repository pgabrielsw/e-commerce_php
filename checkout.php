<?php
session_start();

// Redirecionar se carrinho vazio
if (empty($_SESSION['carrinho'])) {
    header('Location: carrinho.php');
    exit;
}

// Array de produtos para calcular total
$produtos = [
    1 => ["nome" => "Notebook Gamer", "preco" => 3500.00],
    2 => ["nome" => "Smartphone Pro", "preco" => 2200.00],
    3 => ["nome" => "Fone Bluetooth", "preco" => 150.00],
    4 => ["nome" => "Smart TV 55\"", "preco" => 2800.00],
    5 => ["nome" => "Console PlayStation", "preco" => 2500.00],
    6 => ["nome" => "Tablet Premium", "preco" => 1200.00],
    7 => ["nome" => "Smartwatch Fitness", "preco" => 800.00],
    8 => ["nome" => "Câmera Digital", "preco" => 1800.00],
    9 => ["nome" => "Alexa Echo Dot", "preco" => 250.00],
    10 => ["nome" => "Drone Profissional", "preco" => 3200.00],
    11 => ["nome" => "Teclado Mecânico", "preco" => 450.00],
    12 => ["nome" => "Mouse Gamer", "preco" => 180.00],
    13 => ["nome" => "SSD 1TB", "preco" => 350.00],
    14 => ["nome" => "Caixa de Som Bluetooth", "preco" => 280.00],
    15 => ["nome" => "Carregador Wireless", "preco" => 95.00]
];

// Calcular total do carrinho
$total = 0;
$totalItens = 0;
foreach($_SESSION['carrinho'] as $id => $qtd) {
    if (isset($produtos[$id])) {
        $total += $produtos[$id]['preco'] * $qtd;
        $totalItens += $qtd;
    }
}

$erro = "";
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $cep = trim($_POST['cep'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $numero = trim($_POST['numero'] ?? '');
    $complemento = trim($_POST['complemento'] ?? '');
    $cidade = trim($_POST['cidade'] ?? '');
    $estado = $_POST['estado'] ?? '';
    $pagamento = $_POST['pagamento'] ?? '';

   
    if (!$nome || !$email || !$telefone || !$cep || !$endereco || !$numero || !$cidade || !$estado || !$pagamento) {
        $erro = "Preencha todos os campos obrigatórios!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido!";
    } elseif (strlen($cep) !== 9) {
        $erro = "CEP deve ter 9 dígitos (00000-000)!";
    } else {
        
        $numeroPedido = 'LP' . date('Ymd') . rand(1000, 9999);
        $sucesso = true;
        
        $_SESSION['carrinho'] = [];
    }
}


$estados = [
    'AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazonas',
    'BA' => 'Bahia', 'CE' => 'Ceará', 'DF' => 'Distrito Federal', 'ES' => 'Espírito Santo',
    'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso', 'MS' => 'Mato Grosso do Sul',
    'MG' => 'Minas Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná',
    'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande do Norte',
    'RS' => 'Rio Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraima', 'SC' => 'Santa Catarina',
    'SP' => 'São Paulo', 'SE' => 'Sergipe', 'TO' => 'Tocantins'
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra - Lata Market</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo_inicial">
                <a href="index.php">
                    <img class="img_latamarket" src="src/lata1-png.png" alt="Lata Market">
                    <h1 class="h1_1">Lata Market</h1>
                </a>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <?php if ($sucesso): ?>
                <div class="checkout-sucesso">
                    <div class="sucesso-icon">✅</div>
                    <h1>Compra realizada com sucesso!</h1>
                    <div class="pedido-info">
                        <h2>Pedido #<?= $numeroPedido ?></h2>
                        <p><strong>Total:</strong> R$ <?= number_format($total, 2, ',', '.') ?></p>
                        <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
                        <p><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></p>
                        <p><strong>Forma de pagamento:</strong> 
                            <?php
                            $formas = [
                                'cartao_credito' => 'Cartão de Crédito',
                                'cartao_debito' => 'Cartão de Débito',
                                'pix' => 'PIX',
                                'boleto' => 'Boleto Bancário'
                            ];
                            echo $formas[$pagamento] ?? $pagamento;
                            ?>
                        </p>
                    </div>
                    <div class="sucesso-mensagem">
                        <h3>Próximos passos:</h3>
                        <ul>
                            <li>✅ Confirmação enviada para seu e-mail</li>
                            <li>📦 Seu pedido será preparado em até 2 dias úteis</li>
                            <li>🚚 Entrega prevista em 5-7 dias úteis</li>
                            <li>📱 Você receberá o código de rastreamento por SMS</li>
                        </ul>
                    </div>
                    <div class="sucesso-acoes">
                        <a href="index.php" class="btn btn-primary">Continuar comprando</a>
                        <a href="javascript:window.print()" class="btn btn-outline">Imprimir comprovante</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="checkout-container">
                    <div class="checkout-form-container">
                        <h1>🛒 Finalizar Compra</h1>
                        
                        <?php if ($erro): ?>
                            <div class="error"><?= $erro ?></div>
                        <?php endif; ?>

                        <form method="post" class="checkout-form">
                            <div class="form-section">
                                <h3>👤 Dados Pessoais</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="nome">Nome completo *</label>
                                        <input type="text" id="nome" name="nome" 
                                               value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail *</label>
                                        <input type="email" id="email" name="email" 
                                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone/WhatsApp *</label>
                                    <input type="tel" id="telefone" name="telefone" 
                                           value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>" 
                                           placeholder="(11) 99999-9999" required>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3>📍 Endereço de Entrega</h3>
                                <div class="form-row">
                                    <div class="form-group cep-group">
                                        <label for="cep">CEP *</label>
                                        <input type="text" id="cep" name="cep" 
                                               value="<?= htmlspecialchars($_POST['cep'] ?? '') ?>" 
                                               placeholder="00000-000" maxlength="9" required>
                                        <button type="button" id="buscar-cep" class="btn-buscar-cep">Buscar</button>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group endereco-group">
                                        <label for="endereco">Endereço *</label>
                                        <input type="text" id="endereco" name="endereco" 
                                               value="<?= htmlspecialchars($_POST['endereco'] ?? '') ?>" required>
                                    </div>
                                    <div class="form-group numero-group">
                                        <label for="numero">Número *</label>
                                        <input type="text" id="numero" name="numero" 
                                               value="<?= htmlspecialchars($_POST['numero'] ?? '') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" id="complemento" name="complemento" 
                                           value="<?= htmlspecialchars($_POST['complemento'] ?? '') ?>" 
                                           placeholder="Apartamento, bloco, etc.">
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="cidade">Cidade *</label>
                                        <input type="text" id="cidade" name="cidade" 
                                               value="<?= htmlspecialchars($_POST['cidade'] ?? '') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado *</label>
                                        <select id="estado" name="estado" required>
                                            <option value="">Selecione</option>
                                            <?php foreach($estados as $uf => $nome): ?>
                                                <option value="<?= $uf ?>" 
                                                    <?= ($_POST['estado'] ?? '') === $uf ? 'selected' : '' ?>>
                                                    <?= $nome ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3>💳 Forma de Pagamento</h3>
                                <div class="pagamento-opcoes">
                                    <label class="pagamento-opcao">
                                        <input type="radio" name="pagamento" value="pix" 
                                               <?= ($_POST['pagamento'] ?? '') === 'pix' ? 'checked' : '' ?>>
                                        <div class="opcao-content">
                                            <div class="opcao-icon">📱</div>
                                            <div class="opcao-info">
                                                <strong>PIX</strong>
                                                <small>Aprovação imediata</small>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="pagamento-opcao">
                                        <input type="radio" name="pagamento" value="cartao_credito" 
                                               <?= ($_POST['pagamento'] ?? '') === 'cartao_credito' ? 'checked' : '' ?>>
                                        <div class="opcao-content">
                                            <div class="opcao-icon">💳</div>
                                            <div class="opcao-info">
                                                <strong>Cartão de Crédito</strong>
                                                <small>Parcelamento em até 12x sem juros</small>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="pagamento-opcao">
                                        <input type="radio" name="pagamento" value="cartao_debito" 
                                               <?= ($_POST['pagamento'] ?? '') === 'cartao_debito' ? 'checked' : '' ?>>
                                        <div class="opcao-content">
                                            <div class="opcao-icon">💳</div>
                                            <div class="opcao-info">
                                                <strong>Cartão de Débito</strong>
                                                <small>Débito automático</small>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="pagamento-opcao">
                                        <input type="radio" name="pagamento" value="boleto" 
                                               <?= ($_POST['pagamento'] ?? '') === 'boleto' ? 'checked' : '' ?>>
                                        <div class="opcao-content">
                                            <div class="opcao-icon">🧾</div>
                                            <div class="opcao-info">
                                                <strong>Boleto Bancário</strong>
                                                <small>Vencimento em 3 dias úteis</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-actions">
                                <a href="carrinho.php" class="btn btn-outline">← Voltar ao carrinho</a>
                                <button type="submit" class="btn btn-primary btn-grande">
                                    Finalizar compra - R$ <?= number_format($total, 2, ',', '.') ?>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="checkout-sidebar">
                        <div class="pedido-resumo">
                            <h3>📋 Resumo do Pedido</h3>
                            
                            <div class="resumo-itens">
                                <?php foreach($_SESSION['carrinho'] as $id => $qtd): ?>
                                    <?php if (isset($produtos[$id])): ?>
                                        <div class="resumo-item">
                                            <span class="item-nome"><?= $produtos[$id]['nome'] ?></span>
                                            <span class="item-qtd">x<?= $qtd ?></span>
                                            <span class="item-preco">R$ <?= number_format($produtos[$id]['preco'] * $qtd, 2, ',', '.') ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="resumo-totais">
                                <div class="resumo-linha">
                                    <span>Subtotal (<?= $totalItens ?> itens):</span>
                                    <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                                </div>
                                <div class="resumo-linha">
                                    <span>Frete:</span>
                                    <span class="frete-gratis">GRÁTIS</span>
                                </div>
                                <div class="resumo-total">
                                    <strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong>
                                </div>
                                <div class="resumo-parcelamento">
                                    <small>ou 12x de R$ <?= number_format($total/12, 2, ',', '.') ?> sem juros</small>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-seguranca">
                            <h4>🔒 Compra 100% Segura</h4>
                            <ul>
                                <li>✓ Site protegido por SSL</li>
                                <li>✓ Seus dados estão seguros</li>
                                <li>✓ Garantia de entrega</li>
                                <li>✓ Suporte 24/7</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Lata Market. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        document.getElementById('cep').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
            e.target.value = value;
        });

        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
            e.target.value = value;
        });

        document.getElementById('buscar-cep').addEventListener('click', function() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');
            if (cep.length === 8) {
                document.getElementById('endereco').value = 'Cabana do Pai Tomás';
                document.getElementById('cidade').value = 'Belo Horizonte';
                document.getElementById('estado').value = 'MG';
                alert('Endereço encontrado!');
            } else {
                alert('CEP inválido!');
            }
        });
    </script>
</body>
</html>