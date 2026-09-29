<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$nome_empresa = "L'ATELIER EGV DE PARFUMS";
$whatsapp_numero = "5511999999999"; 
$whatsapp_mensagem = urlencode("Olá! Vim pelo site e gostaria de informações sobre a revenda e produtos.");

function renderHeader($titulo_pagina = "Início") {
    global $nome_empresa;
    $v = time(); // Quebra de cache do navegador
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo_pagina . " | " . $nome_empresa; ?></title>

        <!-- CSS Específicos das Páginas -->
        <link rel="stylesheet" href="css/init.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/index.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/fidelidade.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/entrega.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/carrinho.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/minhaConta.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/revendedor.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/suporte.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/sobre.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/footer.css?v=<?php echo $v; ?>">

        <!-- fixos.css no final para ter prioridade no cabeçalho -->
        <link rel="stylesheet" href="css/fixos.css?v=<?php echo $v; ?>">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>

    <header class="header-site">
        <div class="container-header">
            <a href="index.php" class="logo-link" title="Ir para a página inicial">
                <img src="img/Logo/logoEscrita.png.png" alt="<?php echo $nome_empresa; ?>" class="img-logo" onerror="this.src='https://placehold.co/220x80/0B0F17/C5A059?text=L%27ATELIER+EGV';">
            </a>

            <?php 
            if (file_exists('nav.php')) {
                include 'nav.php';
            }
            ?>

            <div class="menu-usuario">
                <a href="produtos.php" class="item-menu" title="Buscar Produtos">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>

                <a href="suporte.php" class="item-menu" title="Atendimento / Ajuda">
                    <i class="fa-solid fa-headset"></i>
                </a>

                <a href="minhaConta.php" class="item-menu" title="Minha Conta">
                    <i class="fa-regular fa-user"></i>
                </a>

                <a href="favoritos.php" class="item-menu" title="Meus Favoritos">
                    <i class="fa-regular fa-heart"></i>
                </a>

                <a href="carrinho.php" class="item-menu carrinho-icon" title="Carrinho">
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
    </header>

    <main>
    <?php
}

function renderFooter() {
    global $whatsapp_numero, $whatsapp_mensagem;
    ?>
    </main>

    <footer class="footer">
        <!-- Benefícios -->
        <section class="beneficios-footer">
            <div class="beneficio">
                <img src="./img/pagina_linha_F/icone_12.png" alt="Produto original">
                <span>100% ORIGINAL E LACRADO</span>
            </div>

            <div class="beneficio">
                <img src="./img/pagina_linha_F/icone_13.png" alt="Entrega segura">
                <span>ENTREGA SEGURA</span>
            </div>

            <div class="beneficio">
                <img src="./img/pagina_linha_F/icone_14.png" alt="Atendimento especializado">
                <span>ATENDIMENTO ESPECIALIZADO</span>
            </div>
        </section>

        <!-- Parte Inferior do Footer -->
        <section class="footer-inferior">
            <div class="footer-marca">
                <h2>L'ATELIER <span>EGV</span></h2>
            </div>

            <div class="footer-redes">
                <div class="redes">
                    <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=<?php echo $whatsapp_mensagem; ?>" target="_blank" class="rede" title="WhatsApp">
                        <img src="./img/pagina_linha_F/icone_16.png" alt="WhatsApp">
                    </a>

                    <a href="#" class="rede" title="Facebook">
                        <img src="./img/pagina_linha_F/icone_17.png" alt="Facebook">
                    </a>

                    <a href="#" class="rede" title="Instagram">
                        <img src="./img/pagina_linha_F/icone_15.png" alt="Instagram">
                    </a>
                </div>
            </div>
        </section>
    </footer>

    </body>
    </html>
    <?php
}
?>