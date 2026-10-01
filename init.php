<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();

date_default_timezone_set('America/Sao_Paulo');

// Configurações do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'latelier_egv');
define('DB_USER', 'root');
define('DB_PASS', '');

function getDb() {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            error_log("Erro no BD: " . $e->getMessage());
            die("<div style='padding:20px; font-family:sans-serif; color:red;'>
                <h3>Erro na Conexão com o Banco de Dados</h3>
                <p>Verifique se o MySQL está ligado no XAMPP e se a base de dados <strong>latelier_egv</strong> existe.</p>
                <small>Detalhes: " . $e->getMessage() . "</small>
            </div>");
        }
    }
    return $pdo;
}

function usuarioLogado() {
    return isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id']);
}

function getUsuarioLogado() {
    if (!usuarioLogado()) return null;
    try {
        $db = getDb();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$_SESSION['usuario_id']]);
        $user = $stmt->fetch();
        return $user ?: null;
    } catch (Exception $e) {
        return null;
    }
}

function produtoEhFavorito($produto_id) {
    if (!usuarioLogado()) return false;
    try {
        $db = getDb();
        $stmt = $db->prepare("SELECT id FROM favoritos WHERE usuario_id = ? AND produto_id = ?");
        $stmt->execute([$_SESSION['usuario_id'], $produto_id]);
        return (bool) $stmt->fetch();
    } catch (Exception $e) {
        return false;
    }
}

$nome_empresa = "L'ATELIER EGV DE PARFUMS";
$whatsapp_numero = "5511999999999";
$whatsapp_mensagem = urlencode("Olá! Vim pelo site e gostaria de informações sobre a revenda e produtos.");

// Função do Header que carrega AUTOMATICAMENTE o CSS de cada página
function renderHeader($titulo_pagina = "Início", $css_pagina = "") {
    global $nome_empresa;
    $v = time(); // Quebra de cache

    // Se não for passado um CSS manual, detecta o nome do arquivo atual (ex: 'index', 'feminina')
    if (empty($css_pagina)) {
        $pagina_atual = basename($_SERVER['PHP_SELF'], '.php');
        if (file_exists("css/{$pagina_atual}.css")) {
            $css_pagina = $pagina_atual;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($titulo_pagina) . " | " . htmlspecialchars($nome_empresa); ?></title>

        <!-- CSS Base/Globais -->
        <link rel="stylesheet" href="css/init.css?v=<?php echo $v; ?>">
        <link rel="stylesheet" href="css/footer.css?v=<?php echo $v; ?>">

        <!-- CSS Específico da Página Atual (index.css, feminina.css, etc.) -->
        <?php if (!empty($css_pagina) && file_exists("css/{$css_pagina}.css")): ?>
            <link rel="stylesheet" href="css/<?php echo $css_pagina; ?>.css?v=<?php echo $v; ?>">
        <?php endif; ?>

        <!-- CSS Fixos do Topo e Menu -->
        <link rel="stylesheet" href="css/fixos.css?v=<?php echo $v; ?>">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>

    <header class="header-site">
        <div class="container-header">
            <a href="index.php" class="logo-link" title="Ir para a página inicial">
                <img src="img/Logo/logoEscrita.png.png" alt="<?php echo htmlspecialchars($nome_empresa); ?>" class="img-logo" onerror="this.src='https://placehold.co/220x80/0B0F17/C5A059?text=L%27ATELIER+EGV';">
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

                <a href="ajuda.php" class="item-menu" title="Atendimento / Ajuda">
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