<?php
$produtos = [
    1 => [
        "nome" => "Notebook Gamer", 
        "preco" => 3500.00, 
        "imagem" => "src/notebook.png", 
        "descricao" => "Notebook potente com placa de vídeo dedicada, ideal para estudos, trabalho e jogos. Processador Intel i7, 16GB RAM, SSD 512GB.", 
        "categoria" => "Informática"
    ],
    2 => [
        "nome" => "Smartphone Pro", 
        "preco" => 2200.00, 
        "imagem" => "src/smartphone.png", 
        "descricao" => "Smartphone moderno com câmera tripla de 108MP, tela AMOLED 6.7\", 5G, 256GB de armazenamento.", 
        "categoria" => "Celulares"
    ],
    3 => [
        "nome" => "Fone Bluetooth", 
        "preco" => 150.00, 
        "imagem" => "src/fone.png", 
        "descricao" => "Fone de ouvido sem fio com cancelamento ativo de ruído, bateria de 30h, resistente à água.", 
        "categoria" => "Audio"
    ],
    4 => [
        "nome" => "Smart TV 55\"", 
        "preco" => 2800.00, 
        "imagem" => "src/tv.png", 
        "descricao" => "Smart TV 4K UHD 55 polegadas com sistema Android TV, HDR10, Dolby Vision e comando de voz.", 
        "categoria" => "TV & Video"
    ],
    5 => [
        "nome" => "Console PlayStation", 
        "preco" => 2500.00, 
        "imagem" => "src/console.png", 
        "descricao" => "Console de última geração com gráficos 4K, SSD ultra rápido, controle DualSense com feedback háptico.", 
        "categoria" => "Games"
    ],
    6 => [
        "nome" => "Tablet Premium", 
        "preco" => 1200.00, 
        "imagem" => "src/tablet.png", 
        "descricao" => "Tablet com tela de 11 polegadas 2K, processador octa-core, 8GB RAM, ideal para trabalho e entretenimento.", 
        "categoria" => "Informática"
    ],
    7 => [
        "nome" => "Smartwatch Fitness", 
        "preco" => 800.00, 
        "imagem" => "src/smartwatch.png", 
        "descricao" => "Relógio inteligente com GPS, monitor cardíaco, 50+ modalidades esportivas, à prova d'água.", 
        "categoria" => "Wearables"
    ],
    8 => [
        "nome" => "Câmera Digital", 
        "preco" => 1800.00, 
        "imagem" => "src/camera.png", 
        "descricao" => "Câmera mirrorless 24MP, gravação 4K, estabilização óptica, ideal para fotografia profissional.", 
        "categoria" => "Foto & Video"
    ],
    9 => [
        "nome" => "Alexa Echo Dot", 
        "preco" => 250.00, 
        "imagem" => "src/alexa.png", 
        "descricao" => "Alto-falante inteligente com Alexa, controla dispositivos smart home, música e responde perguntas.", 
        "categoria" => "Casa Inteligente"
    ],
    10 => [
        "nome" => "Drone Profissional", 
        "preco" => 3200.00, 
        "imagem" => "src/drone.png", 
        "descricao" => "Drone com câmera 4K, gimbal 3 eixos, 30min de voo, GPS, ideal para filmagem aérea profissional.", 
        "categoria" => "Foto & Video"
    ],
    11 => [
        "nome" => "Teclado Mecânico", 
        "preco" => 450.00, 
        "imagem" => "src/teclado.png", 
        "descricao" => "Teclado mecânico RGB com switches Blue, anti-ghosting, estrutura em alumínio, perfeito para gamers.", 
        "categoria" => "Periféricos"
    ],
    12 => [
        "nome" => "Mouse Gamer", 
        "preco" => 180.00, 
        "imagem" => "src/mouse.png", 
        "descricao" => "Mouse óptico 16000 DPI, 7 botões programáveis, RGB personalizável, ergonomia para longas sessões.", 
        "categoria" => "Periféricos"
    ],
    13 => [
        "nome" => "SSD 1TB", 
        "preco" => 350.00, 
        "imagem" => "src/ssd.png", 
        "descricao" => "SSD NVMe 1TB, velocidade de leitura 7000MB/s, ideal para acelerar seu computador e games.", 
        "categoria" => "Armazenamento"
    ],
    14 => [
        "nome" => "Caixa de Som Bluetooth", 
        "preco" => 280.00, 
        "imagem" => "src/caixa.png", 
        "descricao" => "Caixa de som portátil 40W, graves potentes, à prova d'água IPX7, 20h de bateria.", 
        "categoria" => "Audio"
    ],
    15 => [
        "nome" => "Carregador Wireless", 
        "preco" => 95.00, 
        "imagem" => "src/carregador.png", 
        "descricao" => "Base de carregamento sem fio 15W, compatível com iPhone e Android, design elegante.", 
        "categoria" => "Acessórios"
    ]
];

$id = (int)($_GET['id'] ?? 1);

// Verificar se o produto existe
if (!isset($produtos[$id])) {
    header('Location: index.php');
    exit;
}

$produto = $produtos[$id];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $produto['nome'] ?> - Lata Market</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo_inicial">
                <img class="img_latamarket" src="src/lata1-png.png" alt="Lata Market">
                <h1 class="h1_1">Lata Market</h1>
            </div>
            <nav class="nav">
                <a href="carrinho.php" class="cart-link">
                    🛒 Carrinho
                    <span class="cart-count">0</span>
                </a>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <div class="produto-detalhes">
                <div class="produto-imagem-detalhe">
                    <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" class="img-detalhe" 
                         onerror="this.src='https://via.placeholder.com/400x400?text=<?= urlencode($produto['nome']) ?>'">
                </div>
                <div class="produto-info-detalhe">
                    <div class="categoria-badge"><?= $produto['categoria'] ?></div>
                    <h1><?= $produto['nome'] ?></h1>
                    <p class="produto-descricao-completa"><?= $produto['descricao'] ?></p>
                    
                    <div class="preco-container">
                        <span class="preco-grande">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                        <span class="parcelamento">ou 12x de R$ <?= number_format($produto['preco']/12, 2, ',', '.') ?></span>
                    </div>

                    <div class="produto-acoes-detalhe">
                        <a href="carrinho.php?add=<?= $id ?>" class="btn btn-primary btn-grande">
                            🛒 Adicionar ao Carrinho
                        </a>
                        <a href="index.php" class="btn btn-outline">← Voltar à loja</a>
                    </div>

                    <div class="produto-vantagens">
                        <h3>Vantagens:</h3>
                        <ul>
                            <li>✓ Frete grátis para todo o Brasil</li>
                            <li>✓ Garantia de 1 ano</li>
                            <li>✓ Entrega em até 7 dias úteis</li>
                            <li>✓ Suporte técnico especializado</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Produtos relacionados -->
            <section class="produtos-relacionados">
                <h2>Produtos Relacionados</h2>
                <div class="produtos-grid-mini">
                    <?php 
                    // Mostrar 3 produtos aleatórios da mesma categoria ou outros
                    $produtosRelacionados = [];
                    foreach($produtos as $p_id => $p) {
                        if ($p_id != $id && count($produtosRelacionados) < 3) {
                            $produtosRelacionados[] = ['id' => $p_id, 'dados' => $p];
                        }
                    }
                    
                    foreach($produtosRelacionados as $rel): 
                        $p = $rel['dados'];
                        $p_id = $rel['id'];
                    ?>
                        <div class="card-mini">
                            <img src="<?= $p['imagem'] ?>" alt="<?= $p['nome'] ?>" 
                                 onerror="this.src='https://via.placeholder.com/150x120?text=<?= urlencode($p['nome']) ?>'">
                            <h4><?= $p['nome'] ?></h4>
                            <span class="preco-mini">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
                            <a href="produto.php?id=<?= $p_id ?>" class="btn btn-outline btn-pequeno">Ver produto</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Lata Market. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
                