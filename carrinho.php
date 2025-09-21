<?php
session_start();
$produtos = [
    1 => ["nome" => "Notebook Gamer", "preco" => 3500.00, "imagem" => "src/notebook.png"],
    2 => ["nome" => "Smartphone Pro", "preco" => 2200.00, "imagem" => "src/smartphone.png"],
    3 => ["nome" => "Fone Bluetooth", "preco" => 150.00, "imagem" => "src/fone.png"],
    4 => ["nome" => "Smart TV 55\"", "preco" => 2800.00, "imagem" => "src/tv.png"],
    5 => ["nome" => "Console PlayStation", "preco" => 2500.00, "imagem" => "src/console.png"],
    6 => ["nome" => "Tablet Premium", "preco" => 1200.00, "imagem" => "src/tablet.png"],
    7 => ["nome" => "Smartwatch Fitness", "preco" => 800.00, "imagem" => "src/smartwatch.png"],
    8 => ["nome" => "Câmera Digital", "preco" => 1800.00, "imagem" => "src/camera.png"],
    9 => ["nome" => "Alexa Echo Dot", "preco" => 250.00, "imagem" => "src/alexa.png"],
    10 => ["nome" => "Drone Profissional", "preco" => 3200.00, "imagem" => "src/drone.png"],
    11 => ["nome" => "Teclado Mecânico", "preco" => 450.00, "imagem" => "src/teclado.png"],
    12 => ["nome" => "Mouse Gamer", "preco" => 180.00, "imagem" => "src/mouse.png"],
    13 => ["nome" => "SSD 1TB", "preco" => 350.00, "imagem" => "src/ssd.png"],
    14 => ["nome" => "Caixa de Som Bluetooth", "preco" => 280.00, "imagem" => "src/caixa.png"],
    15 => ["nome" => "Carregador Wireless", "preco" => 95.00, "imagem" => "src/carregador.png"]
];


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$mensagem = '';


if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    if (isset($produtos[$id])) {
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id]++;
        }
        $mensagem = '<div class="success">✓ Produto adicionado ao carrinho com sucesso!</div>';
    }
}


if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];
    unset($_SESSION['carrinho'][$id]);
    $mensagem = '<div class="success">✓ Produto removido do carrinho.</div>';
}


if (isset($_POST['update']) && isset($_POST['quantidades'])) {
    foreach ($_POST['quantidades'] as $id => $qtd) {
        $qtd = (int)$qtd;
        if ($qtd <= 0) {
            unset($_SESSION['carrinho'][$id]);
        } else {
            $_SESSION['carrinho'][$id] = $qtd;
        }
    }
    $mensagem = '<div class="success">✓ Carrinho atualizado com sucesso!</div>';
}


if (isset($_GET['limpar'])) {
    $_SESSION['carrinho'] = [];
    $mensagem = '<div class="success">✓ Carrinho limpo com sucesso!</div>';
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Lata Market</title>
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
            <nav class="nav">
                <a href="index.php" class="btn btn-outline">← Continuar comprando</a>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <h1>🛒 Seu Carrinho de Compras</h1>
            
            <?php if ($mensagem): ?>
                <?= $mensagem ?>
            <?php endif; ?>

            <?php if (empty($_SESSION['carrinho'])): ?>
                <div class="carrinho-vazio">
                    <div class="carrinho-vazio-icon">🛒</div>
                    <h2>Seu carrinho está vazio</h2>
                    <p>Que tal dar uma olhada nos nossos produtos incríveis?</p>
                    <a href="index.php" class="btn btn-primary">Ver produtos</a>
                </div>
            <?php else: ?>
                <form method="post" class="carrinho-form">
                    <div class="carrinho-container">
                        <div class="carrinho-itens">
                            <?php
                            $total = 0;
                            $totalItens = 0;
                            foreach($_SESSION['carrinho'] as $id => $qtd):
                                if (!isset($produtos[$id])) continue;
                                
                                $nome = $produtos[$id]['nome'];
                                $preco = $produtos[$id]['preco'];
                                $imagem = $produtos[$id]['imagem'];
                                $subtotal = $qtd * $preco;
                                $total += $subtotal;
                                $totalItens += $qtd;
                            ?>
                            <div class="carrinho-item">
                                <div class="item-imagem">
                                    <img src="<?= $imagem ?>" alt="<?= $nome ?>" 
                                         onerror="this.src='https://via.placeholder.com/80x80?text=<?= urlencode($nome) ?>'">
                                </div>
                                <div class="item-detalhes">
                                    <h3><?= $nome ?></h3>
                                    <p class="item-preco">R$ <?= number_format($preco, 2, ',', '.') ?></p>
                                </div>
                                <div class="item-quantidade">
                                    <label>Qtd:</label>
                                    <input type="number" name="quantidades[<?= $id ?>]" 
                                           value="<?= $qtd ?>" min="1" max="99" class="qtd-input">
                                </div>
                                <div class="item-subtotal">
                                    <strong>R$ <?= number_format($subtotal, 2, ',', '.') ?></strong>
                                </div>
                                <div class="item-acoes">
                                    <a href="carrinho.php?remove=<?= $id ?>" class="btn-remover" 
                                       onclick="return confirm('Deseja remover este item?')">🗑️</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="carrinho-resumo">
                            <div class="resumo-card">
                                <h3>Resumo do Pedido</h3>
                                <div class="resumo-linha">
                                    <span>Itens (<?= $totalItens ?>):</span>
                                    <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                                </div>
                                <div class="resumo-linha">
                                    <span>Frete:</span>
                                    <span class="frete-gratis">GRÁTIS</span>
                                </div>
                                <hr>
                                <div class="resumo-total">
                                    <span>Total:</span>
                                    <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                                </div>
                                <div class="resumo-parcelamento">
                                    <small>ou 12x de R$ <?= number_format($total/12, 2, ',', '.') ?> sem juros</small>
                                </div>
                                
                                <div class="resumo-acoes">
                                    <button type="submit" name="update" class="btn btn-outline">
                                        Atualizar carrinho
                                    </button>
                                    <a href="checkout.php" class="btn btn-primary btn-grande">
                                        Finalizar compra
                                    </a>
                                </div>
                            </div>

                            <div class="carrinho-cupom">
                                <h4>Tem um cupom?</h4>
                                <div class="cupom-form">
                                    <input type="text" placeholder="Digite seu cupom" class="cupom-input">
                                    <button type="button" class="btn btn-outline">Aplicar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="carrinho-acoes-extras">
                    <a href="carrinho.php?limpar=1" class="btn-limpar" 
                       onclick="return confirm('Deseja limpar todo o carrinho?')">
                        🗑️ Limpar carrinho
                    </a>
                </div>

            
                <section class="produtos-sugeridos">
                    <h2>Você também pode gostar</h2>
                    <div class="sugestoes-grid">
                        <?php 
                        
                        $sugestoes = [];
                        foreach($produtos as $p_id => $p) {
                            if (!isset($_SESSION['carrinho'][$p_id]) && count($sugestoes) < 4) {
                                $sugestoes[] = ['id' => $p_id, 'dados' => $p];
                            }
                        }
                        
                        foreach($sugestoes as $sug): 
                            $p = $sug['dados'];
                            $p_id = $sug['id'];
                        ?>
                            <div class="sugestao-card">
                                <img src="<?= $p['imagem'] ?>" alt="<?= $p['nome'] ?>" 
                                     onerror="this.src='https://via.placeholder.com/120x120?text=<?= urlencode($p['nome']) ?>'">
                                <h4><?= $p['nome'] ?></h4>
                                <span class="preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
                                <a href="carrinho.php?add=<?= $p_id ?>" class="btn btn-primary btn-pequeno">+ Adicionar</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Lata Market. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.qtd-input').forEach(input => {
            input.addEventListener('change', function() {
            });
        });
    </script>
</body>
</html>