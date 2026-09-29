<?php
require_once 'init.php';

// Configuração do programa de fidelidade
$valor_por_nivel = 499.00; // a cada R$ este valor, sobe um nível
$percentual_por_nivel = 5;  // aumento de desconto por nível
$niveis_exibidos = 6;       // quantos níveis mostrar na tabela

// Gera os níveis dinamicamente
$niveis = [];
for ($i = 0; $i < $niveis_exibidos; $i++) {
    $de = $i * $valor_por_nivel;
    $ate = $de + $valor_por_nivel;
    $desconto = $i * $percentual_por_nivel;
    $niveis[] = [
        "de" => $de,
        "ate" => $ate,
        "desconto" => $desconto
    ];
}

renderHeader("Programa de Fidelidade", "css/fidelidade.css");
?>

<!-- BANNER DA PÁGINA -->
<section class="banner-pagina-interna">
    <div class="container-banner-interno">
        <i class="fa-solid fa-gem icone-banner-interno"></i>
        <h1>PROGRAMA DE FIDELIDADE</h1>
        <p>Quanto mais você compra, maior o seu desconto. Simples assim.</p>
    </div>
</section>

<!-- COMO FUNCIONA -->
<section class="secao-fidelidade-intro">
    <div class="container-fidelidade">
        <h2 class="titulo-secao">COMO FUNCIONA</h2>
        <p class="texto-fidelidade-intro">
            A cada <strong>R$ <?php echo number_format($valor_por_nivel, 2, ',', '.'); ?></strong> acumulados em compras na L'Atelier EGV,
            o seu percentual de desconto sobe automaticamente em <strong><?php echo $percentual_por_nivel; ?>%</strong>.
            Não existe cadastro separado nem pontos para trocar: o seu histórico de compras já vai
            construindo o seu nível de desconto, que é aplicado direto no carrinho na sua próxima compra.
        </p>

        <div class="grid-como-funciona">
            <div class="passo-fidelidade">
                <i class="fa-solid fa-bag-shopping"></i>
                <h4>1. Compre</h4>
                <p>Cada compra soma valor à sua conta de fidelidade.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-arrow-up-right-dots"></i>
                <h4>2. Suba de nível</h4>
                <p>A cada R$ <?php echo number_format($valor_por_nivel, 2, ',', '.'); ?> acumulados, seu desconto aumenta 5%.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-tags"></i>
                <h4>3. Economize</h4>
                <p>O desconto do seu nível é aplicado automaticamente nas próximas compras.</p>
            </div>
        </div>
    </div>
</section>

<!-- TABELA DE NÍVEIS -->
<section class="secao-niveis-fidelidade">
    <div class="container-fidelidade">
        <h2 class="titulo-secao">NÍVEIS DE DESCONTO</h2>

        <div class="grid-niveis">
            <?php foreach ($niveis as $index => $nivel): ?>
                <div class="card-nivel <?php echo $index === 0 ? 'card-nivel-inicial' : ''; ?>">
                    <span class="numero-nivel">Nível <?php echo $index + 1; ?></span>
                    <span class="percentual-nivel"><?php echo $nivel['desconto']; ?>%</span>
                    <span class="faixa-nivel">
                        <?php if ($index === 0): ?>
                            Até R$ <?php echo number_format($nivel['ate'], 2, ',', '.'); ?>
                        <?php else: ?>
                            A partir de R$ <?php echo number_format($nivel['de'], 2, ',', '.'); ?>
                        <?php endif; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="texto-fidelidade-obs">
            *O desconto continua aumentando 5% a cada R$ <?php echo number_format($valor_por_nivel, 2, ',', '.'); ?>
            adicionais, sem limite de nível.
        </p>
    </div>
</section>

<!-- CHAMADA PARA AÇÃO -->
<section class="secao-cta-fidelidade">
    <div class="container-fidelidade texto-centralizado">
        <h2>Comece a acumular hoje</h2>
        <p>Toda compra na L'Atelier EGV já conta para o seu próximo nível de desconto.</p>
        <a href="index.php" class="btn-destaque-ouro">
            <i class="fa-solid fa-bag-shopping"></i> Pagina Inicial
        </a>
    </div>
</section>

<?php
renderFooter();
?>