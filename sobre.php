<?php 
require_once 'init.php';

renderHeader('Sobre Nós');
?>

<main class="sobre-container">
    <section class="sobre-hero">
        <div class="hero-content">
            <span class="badge-tag">A Nossa Essência</span>
            <h1 class="hero-title">A Arte da Alta Perfumaria <span class="dourado">L'Atelier EGV</span></h1>
            <p class="hero-subtitle">A união perfeita entre a elegância da perfumaria francesa e a fixação marcante da perfumaria árabe. Conheça a nossa história e os nossos valores.</p>
        </div>
    </section>

    <section class="sobre-historia">
        <div class="historia-grid">
            <div class="historia-texto">
                <h2>A Nossa História</h2>
                <div class="divisor-dourado"></div>
                <p>A <strong>L'Atelier EGV</strong> nasceu da união e da visão apaixonada de <strong>3 sócios e criadores</strong> determinados a redefinir o mercado de fragrâncias de luxo.</p>
                <p>A nossa assinatura olfativa é marcada pelo equilíbrio sublime entre dois mundos extraordinários: a sofisticação, delicadeza e harmonia das <strong>notas da perfumaria francesa</strong> combinadas com a riqueza, opulência e <strong>alta fixação e durabilidade características da perfumaria árabe</strong>.</p>
                <p>Cada essência é elaborada com óleos essenciais nobres importados, garantindo que cada borrifada entregue uma experiência sensorial prolongada, inesquecível e profundamente sofisticada.</p>
            </div>
            <div class="historia-imagem-box">
                <div class="moldura-dourada">
                    <div class="imagem-placeholder">
                        <img src="img/Logo/logo.jpeg" alt="L'Atelier EGV" class="img-logo-historia" onerror="this.src='https://placehold.co/100x100/0B0F17/C5A059?text=EGV';">
                        <p>L'Atelier EGV</p>
                        <small>França & Arábia em Cada Gota</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sobre-pilares">
        <div class="seccao-header">
            <h2>Os Nossos Pilares</h2>
            <p>O compromisso que guia cada criação e parceria da L'Atelier EGV</p>
        </div>

        <div class="pilares-grid">
            <div class="pilar-card">
                <div class="pilar-icon">👑</div>
                <h3>Alta Fixação & Exclusividade</h3>
                <p>Notas francesas refinadas combinadas à potência e durabilidade marcante da perfumaria árabe na pele.</p>
            </div>

            <div class="pilar-card">
                <div class="pilar-icon">🌿</div>
                <h3>Sustentabilidade & Respeito</h3>
                <p>Fórmulas dermatologicamente testadas, cruelty-free e produzidas sob rigorosos padrões de qualidade.</p>
            </div>

            <!-- Card Clicável apontando para revendedor.php -->
            <a href="revendedor.php" class="pilar-card pilar-card-link" title="Clique para saber como ser um revendedor">
                <div class="pilar-icon">💼</div>
                <h3>Parceria & Crescimento <i class="fa-solid fa-arrow-up-right-from-square icon-link"></i></h3>
                <p>Acreditamos no sucesso compartilhado. Lucratividade excelente, suporte dedicado e produtos de alta demanda. <strong class="link-destaque">Seja nosso revendedor &rarr;</strong></p>
            </a>
        </div>
    </section>

    <section class="sobre-numeros">
        <div class="numeros-grid">
            <div class="numero-item">
                <span class="numero-val">+15k</span>
                <span class="numero-lbl">Clientes Encantados</span>
            </div>
            <div class="numero-item">
                <span class="numero-val">3</span>
                <span class="numero-lbl">Sócios & Criadores</span>
            </div>
            <div class="numero-item">
                <span class="numero-val">40%</span>
                <span class="numero-lbl">Margem para Revenda</span>
            </div>
            <div class="numero-item">
                <span class="numero-val">100%</span>
                <span class="numero-lbl">Cruelty Free & Qualidade</span>
            </div>
        </div>
    </section>

    <section class="sobre-cta">
        <div class="cta-box">
            <h2>Faça Parte da Nossa História</h2>
            <p>Quer levar o luxo e a durabilidade da L'Atelier EGV para os seus clientes e construir um negócio rentável?</p>
            <div class="cta-botoes">
                <a href="revendedor.php" class="btn-dourado"><i class="fa-solid fa-handshake"></i> Quero ser Revendedor(a)</a>
                <a href="produtos.php" class="btn-outline-dourado"><i class="fa-solid fa-store"></i> Conhecer Produtos</a>
            </div>
        </div>
    </section>
</main>

<?php 
renderFooter();
?>