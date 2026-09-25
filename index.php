<?php
require_once 'init.php';

// Array de Perfumes em Destaque para a Vitrina
$perfumes_destaque = [
    [
        "id" => 1,
        "nome" => "Dolce Tentazione",
        "marca" => "L'Atelier Femme",
        "preco_de" => "R$ 450,00",
        "preco_por" => "R$ 359,00",
        "imagem" => "img/Produtos/linha feminina/Dolce_Tentazione/Dolce_Tentazione.jpg",
        "link" => "carrinho.php?acao=add&id=1"
    ],
    [
        "id" => 2,
        "nome" => "Bleu",
        "marca" => "L'Atelier Homme",
        "preco_de" => "R$ 490,00",
        "preco_por" => "R$ 389,00",
        "imagem" => "img/Produtos/linha masculina/Bleu/Bleu.jpg",
        "link" => "carrinho.php?acao=add&id=2"
    ],
    [
        "id" => 3,
        "nome" => "Aura",
        "marca" => "L'Atelier Homme",
        "preco_de" => "R$ 380,00",
        "preco_por" => "R$ 299,00",
        "imagem" => "img/Produtos/linha unissex/Aura/Aura.jpg",
        "link" => "carrinho.php?acao=add&id=3"
    ],
    [
        "id" => 4,
        "nome" => "Nuvem algodao",
        "marca" => "L'Atelier Kids",
        "preco_de" => "R$ 220,00",
        "preco_por" => "R$ 179,00",
        "imagem" => "img/Produtos/linha infantil/Nuvem algodao/Nuvem.jpg",
        "link" => "carrinho.php?acao=add&id=4"
    ]
];

renderHeader("Página Inicial");
?>

<html>
    <head>
        
    </head>
<body>

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
            <a href="produtos.php" title="Conheça todos os nossos produtos">
                <img src="img/Produtos/linha completa/todos.jpg" 
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
                <img src="img/Produtos/linha feminina/Rosa/Rosa.jpg" alt="Linha Feminina" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Feminina';">
            </div>
            <h3>Linha Feminina</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

        <a href="produtos.php?categoria=masculina" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha masculina/Cuir/Cuir.jpg" alt="Linha Masculina" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Masculina';">
            </div>
            <h3>Linha Masculina</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

        <a href="produtos.php?categoria=unissex" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha unissex/Aura/Aura.jpg" alt="Linha Unissex" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Unissex';">
            </div>
            <h3>Linha Unissex</h3>
            <span>Ver fragrâncias &rarr;</span>
        </a>

        <a href="produtos.php?categoria=infantil" class="card-categoria">
            <div class="caixa-img-cat">
                <img src="img/Produtos/linha infantil/Pequeno/Pequeno.jpg" alt="Linha Infantil" onerror="this.src='https://placehold.co/400x300/131A26/C5A059?text=Linha+Infantil';">
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

                    <a href="<?php echo $item['link']; ?>" class="btn-comprar">
                        <i class="fa-solid fa-cart-shopping"></i> Comprar
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>
</body>



<?php
renderFooter();
?>