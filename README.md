🛒 Lata Market
E-commerce desenvolvido em PHP para venda de produtos eletrônicos, criado como projeto acadêmico com foco em funcionalidades essenciais de uma loja online.
👥 Equipe de Desenvolvimento

Pablo Gabriel - @pgabrielsw
Yuri
Gabriel Silva
Gabriel Damasceno
Matheus

🛠️ Tecnologias Utilizadas

PHP - Lógica do servidor e manipulação de sessões
HTML5 - Estrutura semântica das páginas
CSS3 - Estilização responsiva com variáveis CSS
JavaScript - Interatividade e validações do frontend

📋 Funcionalidades
🏪 Catálogo de Produtos

15 produtos eletrônicos pré-cadastrados
Sistema de filtros por categoria (Informática, Celulares, Audio, etc.)
Interface responsiva com grid adaptável
Imagens com fallback para placeholders

🛒 Carrinho de Compras

Gerenciamento de itens via sessão PHP
Adição/remoção de produtos
Atualização de quantidades
Cálculo automático de totais
Sugestões de produtos relacionados
Sistema de cupons (interface)

📱 Página de Produto

Detalhes completos com descrições
Produtos relacionados
Informações de garantia e frete
Parcelamento em até 12x
Design otimizado para conversão

💳 Sistema de Checkout

Formulário completo de dados pessoais
Endereço de entrega com validação de CEP
Múltiplas formas de pagamento:

PIX
Cartão de Crédito/Débito
Boleto Bancário


Tela de confirmação com número do pedido
Validações client-side e server-side

🚀 Como Executar
Pré-requisitos

Servidor web local (XAMPP, WAMP, MAMP ou similar)
PHP 7.4 ou superior

Instalação

Clone o repositório

bash   git clone https://github.com/pgabrielsw/e-commerce_php.git

Configure o ambiente

bash   # Mova os arquivos para o diretório do servidor
   # XAMPP: htdocs/lata-market/
   # WAMP: www/lata-market/

Inicie o servidor

Ative Apache no painel de controle
Acesse: http://localhost/lata-market/



📁 Estrutura do Projeto
e-commerce_php/
├── index.php           # Página inicial com catálogo e filtros
├── produto.php         # Página de detalhes do produto
├── carrinho.php        # Gerenciamento do carrinho de compras  
├── checkout.php        # Finalização da compra
├── style.css          # Estilos CSS responsivos
├── src/               # Imagens dos produtos
│   ├── lata1-png.png  # Logo da loja
│   ├── notebook.png   # Imagens dos produtos
│   └── ...            # Demais imagens
└── README.md          # Documentação do projeto
🎨 Design e UX
Interface Moderna

Design responsivo mobile-first
Paleta de cores profissional
Animações suaves (fadeIn, hover effects)
Tipografia clara e legível

Experiência do Usuário

Navegação intuitiva entre páginas
Feedback visual para todas as ações
Sistema de badges e categorias
Loading states e mensagens de erro/sucesso

🔧 Características Técnicas
Backend PHP

Sistema de sessões para carrinho persistente
Validação de formulários server-side
Estrutura de dados em arrays associativos
Redirecionamentos e controle de fluxo

Frontend Responsivo

CSS Grid e Flexbox para layouts
Media queries para dispositivos móveis
Variáveis CSS para consistência visual
JavaScript vanilla para interatividade

Segurança

Sanitização de dados de entrada (htmlspecialchars)
Validação de e-mail e campos obrigatórios
Controle de sessões seguro
Prevenção contra XSS básico

📊 Produtos Disponíveis
O sistema conta com 15 produtos categorizados:

Informática: Notebook, Tablet
Celulares: Smartphone Pro
Games: Console PlayStation
Audio: Fones, Caixas de Som
Periféricos: Teclado, Mouse
E mais: TV, Câmera, Drone, Smartwatch, etc.

🎯 Objetivos de Aprendizado
Este projeto foi desenvolvido para aplicar conceitos de:

Programação Web: PHP, HTML, CSS, JavaScript
Arquitetura MVC básica: Separação de responsabilidades
UX/UI Design: Interface centrada no usuário
E-commerce: Fluxo completo de compra online
Desenvolvimento em equipe: Versionamento com Git

🚧 Limitações Conhecidas

Produtos armazenados em arrays (sem banco de dados)
Sistema de pagamento simulado
Sem autenticação de usuários
Carrinho perdido ao fechar o navegador
CEP com dados mockados para Belo Horizonte

📄 Licença
Este projeto foi desenvolvido para fins educacionais e está disponível como código aberto.

⭐ Desenvolvido com dedicação pela equipe Lata Market ⭐
