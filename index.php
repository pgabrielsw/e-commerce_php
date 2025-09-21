<?php
$produtos = [
    ["id" => 1, "nome" => "Notebook Gamer", "preco" => 3500.00, "imagem" => "src/notebook.png", "descricao" => "Notebook potente para estudos e trabalho.", "categoria" => "Informática"],
    ["id" => 2, "nome" => "Smartphone Pro", "preco" => 2200.00, "imagem" => "src/smartphone.png", "descricao" => "Smartphone moderno com ótima câmera.", "categoria" => "Celulares"],
    ["id" => 3, "nome" => "Fone Bluetooth", "preco" => 150.00, "imagem" => "src/fone.png", "descricao" => "Fone de ouvido sem fio com cancelamento de ruído.", "categoria" => "Audio"],
    ["id" => 4, "nome" => "Smart TV 55\"", "preco" => 2800.00, "imagem" => "src/tv.png", "descricao" => "Smart TV 4K com sistema Android integrado.", "categoria" => "TV & Video"],
    ["id" => 5, "nome" => "Console PlayStation", "preco" => 2500.00, "imagem" => "src/console.png", "descricao" => "Console de última geração para gamers.", "categoria" => "Games"],
    ["id" => 6, "nome" => "Tablet Premium", "preco" => 1200.00, "imagem" => "src/tablet.png", "descricao" => "Tablet com tela de alta resolução e ótima performance.", "categoria" => "Informática"],
    ["id" => 7, "nome" => "Smartwatch Fitness", "preco" => 800.00, "imagem" => "src/smartwatch.png", "descricao" => "Relógio inteligente com monitoramento de saúde.", "categoria" => "Wearables"],
    ["id" => 8, "nome" => "Câmera Digital", "preco" => 1800.00, "imagem" => "src/camera.png", "descricao" => "Câmera profissional para fotografia e vídeos.", "categoria" => "Foto & Video"],
    ["id" => 9, "nome" => "Alexa Echo Dot", "preco" => 250.00, "imagem" => "src/alexa.png", "descricao" => "Alto-falante inteligente com assistente virtual.", "categoria" => "Casa Inteligente"],
    ["id" => 10, "nome" => "Drone Profissional", "preco" => 3200.00, "imagem" => "src/drone.png", "descricao" => "Drone com câmera 4K e gimbal estabilizado.", "categoria" => "Foto & Video"],
    ["id" => 11, "nome" => "Teclado Mecânico", "preco" => 450.00, "imagem" => "src/teclado.png", "descricao" => "Teclado mecânico RGB para gamers.", "categoria" => "Periféricos"],
    ["id" => 12, "nome" => "Mouse Gamer", "preco" => 180.00, "imagem" => "src/mouse.png", "descricao" => "Mouse óptico de alta precisão com LED.", "categoria" => "Periféricos"],
    ["id" => 13, "nome" => "SSD 1TB", "preco" => 350.00, "imagem" => "src/ssd.png", "descricao" => "Armazenamento SSD ultra rápido.", "categoria" => "Armazenamento"],
    ["id" => 14, "nome" => "Caixa de Som Bluetooth", "preco" => 280.00, "imagem" => "src/caixa.png", "descricao" => "Caixa de som portátil com grave potente.", "categoria" => "Audio"],
    ["id" => 15, "nome" => "Carregador Wireless", "preco" => 95.00, "imagem" => "src/carregador.png", "descricao" => "Carregador sem fio para smartphones.", "categoria" => "Acessórios"]
];


$categorias = array_unique(array_column($produtos, 'categoria'));
sort($categorias);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lata Market</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="src/lata1-png.png">
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
                </a>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <section class="hero">
                <h2>Bem-vindo ao Lata Market!</h2>
                <p>Os melhores produtos de tecnologia com os melhores preços!</p>
            </section>

            <section class="filtros">
                <h3>Filtrar por categoria:</h3>
                <div class="categoria-filtros">
                    <button class="filtro-btn active" onclick="filtrarCategoria('todos')">Todos</button>
                    <?php foreach($categorias as $categoria): ?>
                        <button class="filtro-btn" onclick="filtrarCategoria('<?= $categoria ?>')"><?= $categoria ?></button>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="produtos" id="produtos-container">
                <?php foreach($produtos as $p): ?>
                    <div class="card produto-item" data-categoria="<?= $p['categoria'] ?>">
                        <div class="produto-imagem">
                            <img src="<?= $p['imagem'] ?>" alt="<?= $p['nome'] ?>" onerror="this.src='https://via.placeholder.com/250x200?text=<?= urlencode($p['nome']) ?>'">
                            <div class="produto-badge"><?= $p['categoria'] ?></div>
                        </div>
                        <div class="produto-info">
                            <h3><?= $p['nome'] ?></h3>
                            <p class="produto-descricao"><?= $p['descricao'] ?></p>
                            <div class="produto-preco">
                                <span class="preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
                            </div>
                            <div class="produto-acoes">
                                <a href="produto.php?id=<?= $p['id'] ?>" class="btn btn-outline">Ver detalhes</a>
                                <a href="carrinho.php?add=<?= $p['id'] ?>" class="btn btn-primary">Adicionar ao carrinho</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Lata Market. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        function filtrarCategoria(categoria) {
            const produtos = document.querySelectorAll('.produto-item');
            const botoes = document.querySelectorAll('.filtro-btn');
            
            botoes.forEach(btn => btn.classList.remove('active'));
            
            event.target.classList.add('active');
            
            produtos.forEach(produto => {
                if (categoria === 'todos' || produto.dataset.categoria === categoria) {
                    produto.style.display = 'flex';
                } else {
                    produto.style.display = 'none';
                }
            });
        }

       
        document.addEventListener('DOMContentLoaded', function() {
        });
    </script>
</body>
</html>