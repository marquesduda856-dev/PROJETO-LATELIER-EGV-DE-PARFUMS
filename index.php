<?php
require_once 'init.php';

// Array de Perfumes em Destaque para a Vitrina
$perfumes_destaque = [
    [
        "id" => 1,
        "nome" => "Dolce Tentazione",
        "marca" => "L'Atelier Femme",
        "preco_de" => "R$ 259,00",
        "preco_por" => "R$ 189,90",
        "imagem" => "img/Produtos/linha feminina/Dolce_Tentazione/Dolce_Tentazione.jpg",
        "link" => "produto.php?id=1"
    ],
    [
        "id" => 2,
        "nome" => "Bleu",
        "marca" => "L'Atelier Homme",
        "preco_de" => "R$ 390,00",
        "preco_por" => "R$ 189,90",
        "imagem" => "img/Produtos/linha masculina/Bleu/Bleu.jpg",
        "link" => "produto.php?id=2"
    ],
    [
        "id" => 3,
        "nome" => "Terra",
        "marca" => "L'Atelier Homme",
        "preco_de" => "R$ 380,00",
        "preco_por" => "R$ 199,90",
        "imagem" => "img/Produtos/linha unissex/Terra/terra.jpg",
        "link" => "produto.php?id=3"
    ],
    [
        "id" => 4,
        "nome" => "Nuvem algodao",
        "marca" => "L'Atelier Kids",
        "preco_de" => "R$ 220,00",
        "preco_por" => "R$ 79,90",
        "imagem" => "img/Produtos/linha infantil/Nuvem algodao/Nuvem.jpg",
        "link" => "produto.php?id=4"
    ]
];

renderHeader("Página Inicial");
?>

<!-- CURSOR PERSONALIZADO -->
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>

<!-- SECÇÃO BANNER EM DESTAQUE - LINHA COMPLETA COM IMAGEM E LOGO -->
<section class="banner-destaque-principal">
    <div class="container-banner-destaque">

        <!-- LADO ESQUERDO: LOGO E APRESENTAÇÃO -->
        <div class="texto-banner-destaque">
            <img src="img/Logo/logoEscrita.jpeg" alt="L'Atelier EGV" class="logo-banner-home" onerror="this.src='https://placehold.co/250x60/0B0F17/C5A059?text=L%27ATELIER+EGV';">
            <h1>COLEÇÃO COMPLETA DE FRAGRÂNCIAS</h1>
            <p>Descubra a linha completa de perfumes femininos, masculinos, unissex e infantis com essências exclusivas e de altíssima fixação.</p>

            <div class="botoes-banner">
                <a href="produtos.php" class="btn-destaque-ouro"><i class="fa-solid fa-bag-shopping"></i> Ver Linha Completa</a>
                <a href="revendedor.php" class="btn-destaque-outline"><i class="fa-solid fa-handshake"></i> Seja Revendedor</a>
            </div>
        </div>

        <!-- LADO DIREITO: IMAGEM DA LINHA COMPLETA (TODOS OS PRODUTOS) -->
        <div class="imagem-banner-destaque">
            <a href="#vitrine" title="Conheça todos os nossos produtos">
                <img src="img/Produtos/completo.jpg"
                     alt="Linha Completa de Produtos L'Atelier EGV"
                     onerror="this.src='https://placehold.co/600x400/131A26/C5A059?text=Linha+Completa+de+Produtos';"
                     class="img-linha-completa">
            </a>
        </div>

    </div>
</section>

<!-- BARRA DE VANTAGENS -->
<section class="secao-vantagens">
    <div class="item-vantagem">
        <i class="fa-solid fa-shield-halved"></i>
        <h4>100% Originais</h4>
        <p>Garantia total de procedência</p>
    </div>

    <a href="entrega.php" class="item-vantagem item-vantagem-btn">
        <i class="fa-solid fa-truck-fast"></i>
        <h4>Entrega Rápida</h4>
        <p>Enviamos para todo o Brasil</p>
        <p>Calcule o seu Frete</p>
    </a>

    <a href="fidelidade.php" class="item-vantagem item-vantagem-btn">
        <i class="fa-solid fa-handshake"></i>
        <h4>Programa de Fidelidade</h4>
        <p>A cada R$499,00 em compras, a % do desconto aumenta em 5%</p>
    </a>
</section>

<!-- NAVEGAÇÃO POR LINHAS DE PRODUTO -->
<section class="secao-categorias">
    <h2 class="titulo-secao">EXPLORAR POR LINHAS</h2>

    <div class="grid-categorias">

        <a href="produtos.php?categoria=feminina" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha feminina/feminina.jpeg" alt="Linha Feminina" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Feminina';">
            </div>
            <h3>Linha Feminina</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

        <a href="produtos.php?categoria=masculina" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha masculina/masculino.jpeg" alt="Linha Masculina" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Masculina';">
            </div>
            <h3>Linha Masculina</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

        <a href="produtos.php?categoria=unissex" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha unissex/unissex.jpeg" alt="Linha Unissex" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Unissex';">
            </div>
            <h3>Linha Unissex</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

        <a href="produtos.php?categoria=infantil" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha infantil/infantil.jpeg" alt="Linha Infantil" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Infantil';">
            </div>
            <h3>Linha Infantil</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

    </div>
</section>

<!-- VITRINA DE PRODUTOS -->
<section id="vitrine" class="secao-produtos">
    <h2 class="titulo-secao">PERFUMES EM DESTAQUE</h2>

    <div class="grid-produtos">
        <?php foreach ($perfumes_destaque as $item): ?>
            <div class="card-produto">

                <a href="<?php echo $item['link']; ?>" class="link-imagem-produto">
                    <img src="<?php echo $item['imagem']; ?>" alt="<?php echo $item['nome']; ?>" onerror="this.src='https://placehold.co/300x320/131A26/C5A059?text=Perfume';">
                </a>

                <div class="dados-produto">
                    <span class="marca"><?php echo $item['marca']; ?></span>

                    <h3 class="nome">
                        <a href="<?php echo $item['link']; ?>"><?php echo $item['nome']; ?></a>
                    </h3>

                    <div class="precos">
                        <span class="preco-antigo"><?php echo $item['preco_de']; ?></span>
                        <span class="preco-atual"><?php echo $item['preco_por']; ?></span>
                    </div>

                    <a href="carrinho.php?id=<?php echo $item['id']; ?>" class="btn-comprar">
                        <i class="fa-solid fa-cart-shopping"></i> Comprar
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ===================== //
    // SCROLL REVEAL DAS SEÇÕES
    // ===================== //
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revelado');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.secao-categorias, .secao-produtos, .secao-vantagens')
        .forEach(secao => observer.observe(secao));

    // ===================== //
    // TÍTULO REVELADO LETRA POR LETRA
    // ===================== //
    const titulo = document.querySelector('.texto-banner-destaque h1');
    if (titulo) {
        const texto = titulo.textContent;
        titulo.innerHTML = texto.split('').map((char, i) =>
            `<span class="letra" style="animation-delay:${0.2 + i * 0.02}s">${char === ' ' ? '&nbsp;' : char}</span>`
        ).join('');
    }

    // ===================== //
    // CURSOR PERSONALIZADO COM ANEL SUAVE
    // ===================== //
    if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        const dot = document.getElementById('cursor-dot');
        const ring = document.getElementById('cursor-ring');
        let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            dot.style.left = mouseX + 'px';
            dot.style.top = mouseY + 'px';
        });

        function animarAnel() {
            ringX += (mouseX - ringX) * 0.15;
            ringY += (mouseY - ringY) * 0.15;
            ring.style.left = ringX + 'px';
            ring.style.top = ringY + 'px';
            requestAnimationFrame(animarAnel);
        }
        animarAnel();

        document.querySelectorAll('a, button, .card-categoria, .card-produto').forEach(el => {
            el.addEventListener('mouseenter', () => ring.classList.add('cursor-ativo'));
            el.addEventListener('mouseleave', () => ring.classList.remove('cursor-ativo'));
        });
    }

    // ===================== //
    // SPOTLIGHT NOS CARDS (categoria + produto)
    // ===================== //
    document.querySelectorAll('.card-categoria, .card-produto').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mx', x + 'px');
            card.style.setProperty('--my', y + 'px');
        });
    });

    // ===================== //
    // TILT 3D NOS CARDS DE PRODUTO
    // ===================== //
    document.querySelectorAll('.card-produto').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centroX = rect.width / 2;
            const centroY = rect.height / 2;

            const rotX = ((y - centroY) / centroY) * -6;
            const rotY = ((x - centroX) / centroX) * 6;

            card.style.transform = `perspective(600px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-4px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(600px) rotateX(0) rotateY(0) translateY(0)';
        });
    });
});
</script>

<?php
renderFooter();
?>