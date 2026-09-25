<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$nome_empresa = "L'ATELIER EGV DE PARFUMS";
$whatsapp_numero = "5511999999999"; 
$whatsapp_mensagem = urlencode("Olá! Vim pelo site e gostaria de informações sobre a revenda e produtos.");

function renderHeader($titulo_pagina = "Início") {
    global $nome_empresa;
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo_pagina . " | " . $nome_empresa; ?></title>

        <!-- Folhas de Estilo (CSS) -->
        <link rel="stylesheet" href="css/init.css">
        <link rel="stylesheet" href="css/fixos.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/fidelidade.css">
        <link rel="stylesheet" href="css/entrega.css">
        <link rel="stylesheet" href="css/carrinho.css">
        <link rel="stylesheet" href="css/minhaConta.css">
        <link rel="stylesheet" href="css/revendedor.css">
        <link rel="stylesheet" href="css/suporte.css">
        <link rel="stylesheet" href="css/sobre.css">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>

    <div class="top-bar">
        <p><i class="fa-solid fa-truck"></i> FRETE GRÁTIS EM COMPRAS ACIMA DE R$ 299 | SEJA UM REVENDEDOR OFICIAL</p>
    </div>

    <header class="header-site">
        <div class="container-header">
            <a href="index.php" class="logo-link" title="Ir para a página inicial">
                <img src="img/Logo/logoEscrita.jpeg" alt="<?php echo $nome_empresa; ?>" class="img-logo" onerror="this.src='https://placehold.co/200x50/0B0F17/C5A059?text=L%27ATELIER+EGV';">
            </a>

            <div class="caixa-busca">
                <form action="produtos.php" method="GET">
                    <input type="text" name="busca" placeholder="Buscar perfume, linha ou fragrância..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="menu-usuario">
                <a href="minhaConta.php" class="item-menu"><i class="fa-regular fa-user"></i> Minha Conta</a>
                <a href="carrinho.php" class="item-menu carrinho-icon">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <?php
                        $qtd_total_header = 0;
                        if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
                            foreach ($_SESSION['carrinho'] as $val) {
                                $qtd_total_header += is_array($val) ? (int)($val['qtd'] ?? 1) : (int)$val;
                            }
                        }
                    ?>
                    <span class="qtd-carrinho"><?php echo $qtd_total_header; ?></span>
                </a>
            </div>
        </div>

        <?php 
        if (file_exists('nav.php')) {
            include 'nav.php';
        }
        ?>
    </header>

    <main>
    <?php
}

function renderFooter() {
    global $nome_empresa, $whatsapp_numero, $whatsapp_mensagem;
    ?>
    </main>

    <footer class="footer-site">
        <div class="container-footer">
            
            <div class="coluna">
                <a href="index.php">
                    <img src="img/Logo/logoEscrita.jpeg" alt="<?php echo $nome_empresa; ?>" class="img-logo-footer" onerror="this.src='https://placehold.co/180x45/0B0F17/C5A059?text=L%27ATELIER+EGV';">
                </a>
                <p>Alta perfumaria artesanal e importada. Linhas completas e exclusivas para todos os estilos.</p>
            </div>

            <div class="coluna">
                <h3>Menu Rápido</h3>
                <ul>
                    <li><a href="sobre.php"><i class="fa-solid fa-angle-right"></i> Sobre Nós</a></li>
                    <li><a href="revendedor.php"><i class="fa-solid fa-angle-right"></i> Seja Nosso Revendedor</a></li>
                    <li><a href="produtos.php"><i class="fa-solid fa-angle-right"></i> Todos os Produtos</a></li>
                </ul>
            </div>

            <div class="coluna">
                <h3>Atendimento</h3>
                <p><i class="fa-brands fa-whatsapp"></i> WhatsApp: (11) 99999-9999</p>
                <p><i class="fa-regular fa-envelope"></i> contato@latelierparfums.com</p>
            </div>

        </div>

        <div class="copy-footer">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $nome_empresa; ?>. Todos os direitos reservados.</p>
        </div>
    </footer>

    <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=<?php echo $whatsapp_mensagem; ?>" target="_blank" class="btn-whatsapp" title="Fale conosco pelo WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    </body>
    </html>
    <?php
}
?>