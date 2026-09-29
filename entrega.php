<?php
require_once 'init.php';

// Tabela base de frete por região (valores e prazos ilustrativos —
// ajuste conforme sua tabela real de transportadora/Correios)
$tabela_frete = [
    "sudeste"      => ["nome" => "Sudeste (SP, RJ, MG, ES)",        "prazo" => "1 a 3 dias úteis",  "valor" => 19.90],
    "sul"          => ["nome" => "Sul (PR, SC, RS)",                 "prazo" => "2 a 4 dias úteis",  "valor" => 24.90],
    "centro-oeste" => ["nome" => "Centro-Oeste (GO, MT, MS, DF)",     "prazo" => "3 a 6 dias úteis",  "valor" => 29.90],
    "nordeste"     => ["nome" => "Nordeste",                         "prazo" => "4 a 8 dias úteis",  "valor" => 34.90],
    "norte"        => ["nome" => "Norte",                            "prazo" => "5 a 10 dias úteis", "valor" => 39.90],
];

$frete_gratis_acima_de = 299.00;

renderHeader("Entregas e Frete", "css/entrega.css");
?>

<!-- BANNER DA PÁGINA -->
<section class="banner-pagina-interna">
    <div class="container-banner-interno">
        <i class="fa-solid fa-truck-fast icone-banner-interno"></i>
        <h1>ENTREGAS E FRETE</h1>
        <p>Calcule o frete para a sua região e saiba como protegemos seus frascos até a sua porta.</p>
    </div>
</section>

<!-- CALCULADORA DE FRETE -->
<section class="secao-calculadora-frete">
    <div class="container-fidelidade">
        <h2 align="center" class="titulo-secao">CALCULE SEU FRETE</h2>
        <p class="texto-fidelidade-intro">
            Digite o seu CEP para ver o prazo estimado e o valor do frete para a sua região.
            Compras acima de <strong>R$ <?php echo number_format($frete_gratis_acima_de, 2, ',', '.'); ?></strong> têm frete grátis.
        </p>

        <div class="caixa-calculadora">
            <form id="form-frete" onsubmit="return false;">
                <label for="cep">Seu CEP</label>
                <div class="linha-input-frete">
                    <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" inputmode="numeric" required>
                    <button type="button" id="btn-calcular-frete">
                        <i class="fa-solid fa-magnifying-glass-location"></i> Calcular
                    </button>
                </div>
                <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank" class="link-nao-sei-cep">
                    Não sei meu CEP
                </a>
            </form>

            <div id="resultado-frete" class="resultado-frete" style="display:none;">
                <div class="linha-resultado">
                    <span>Região</span>
                    <strong id="res-regiao">-</strong>
                </div>
                <div class="linha-resultado">
                    <span>Prazo estimado</span>
                    <strong id="res-prazo">-</strong>
                </div>
                <div class="linha-resultado">
                    <span>Valor do frete</span>
                    <strong id="res-valor">-</strong>
                </div>
                <p id="res-obs" class="obs-resultado-frete"></p>
            </div>

            <p id="erro-cep" class="erro-cep" style="display:none;">
                CEP inválido. Digite os 8 números do seu CEP.
            </p>
        </div>

        <p class="texto-fidelidade-obs">
            *Valores e prazos estimados. O frete final é sempre confirmado no carrinho antes da finalização da compra.
        </p>
    </div>
</section>

<!-- TABELA POR REGIÃO -->
<section class="secao-niveis-fidelidade">
    <div class="container-fidelidade">
        <h2 align="center" class="titulo-secao">PRAZOS E VALORES POR REGIÃO</h2>

        <div class="grid-regioes">
            <?php foreach ($tabela_frete as $regiao): ?>
                <div class="card-nivel">
                    <span class="numero-nivel"><?php echo $regiao['nome']; ?></span>
                    <span class="percentual-nivel">R$ <?php echo number_format($regiao['valor'], 2, ',', '.'); ?></span>
                    <span class="faixa-nivel"><?php echo $regiao['prazo']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROTEÇÃO DOS PRODUTOS -->
<section class="secao-fidelidade-intro">
    <div class="container-fidelidade">
        <h2 align="center" class="titulo-secao">COMO PROTEGEMOS SEU PERFUME</h2>
        <p class="texto-fidelidade-intro">
            Frascos de vidro exigem cuidado redobrado no transporte. Por isso, cada pedido da L'Atelier EGV
            passa por um processo de embalagem em camadas antes de sair do nosso estoque.
        </p>

        <div class="grid-como-funciona">
            <div class="passo-fidelidade">
                <i class="fa-solid fa-layer-group"></i>
                <h4>Plástico bolha</h4>
                <p>Cada frasco é individualmente enrolado em plástico bolha, absorvendo impactos durante o transporte.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-box"></i>
                <h4>Caixa reforçada</h4>
                <p>Usamos caixas de papelão de parede dupla, mais resistentes a quedas e pressão na transportadora.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-wind"></i>
                <h4>Preenchimento interno</h4>
                <p>Papel kraft picado ou almofadas de ar preenchem os espaços vazios, evitando que o frasco se movimente dentro da caixa.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-stamp"></i>
                <h4>Lacre de segurança</h4>
                <p>A caixa sai lacrada com fita de segurança personalizada, garantindo que ela chegue até você intacta.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h4>Sinalização de frágil</h4>
                <p>Todo pacote é identificado externamente como "frágil", orientando o manuseio correto pela transportadora.</p>
            </div>
            <div class="passo-fidelidade">
                <i class="fa-solid fa-clipboard-check"></i>
                <h4>Conferência final</h4>
                <p>Antes do fechamento, cada pedido passa por uma conferência visual para checar se a embalagem está firme e segura.</p>
            </div>
        </div>
    </div>
</section>

<!-- CHAMADA PARA AÇÃO -->
<section class="secao-cta-fidelidade">
    <div class="container-fidelidade texto-centralizado">
        <h2>Ainda com dúvidas sobre o frete?</h2>
        <p>Fale com a gente pelo WhatsApp que te ajudamos a calcular o prazo certinho.</p>
        <a href="https://wa.me/5511999999999" target="_blank" class="btn-destaque-ouro">
            <i class="fa-brands fa-whatsapp"></i> Falar no WhatsApp
        </a>
    </div>
</section>

<script>
// Tabela de frete espelhada em JS para cálculo em tempo real no navegador.
// Regiões definidas por faixa de CEP (aproximado pelos 2 primeiros dígitos).
const tabelaFrete = <?php echo json_encode($tabela_frete); ?>;
const freteGratisAcimaDe = <?php echo $frete_gratis_acima_de; ?>;

// Faixas de CEP por região (baseado nos 2 primeiros dígitos do CEP)
function regiaoPorCep(cep) {
    const prefixo = parseInt(cep.substring(0, 2), 10);

    if (prefixo >= 1 && prefixo <= 39) return "sudeste";       // SP, RJ, ES, MG
    if (prefixo >= 80 && prefixo <= 99) return "sul";          // PR, SC, RS
    if (prefixo >= 70 && prefixo <= 79) return "centro-oeste"; // DF, GO, MT, MS
    if (prefixo >= 40 && prefixo <= 65) return "nordeste";     // BA a MA
    if (prefixo >= 66 && prefixo <= 69) return "norte";        // PA, AM, AP, RR, AC, RO
    return null;
}

document.getElementById('btn-calcular-frete').addEventListener('click', function () {
    const cepInput = document.getElementById('cep');
    const cepLimpo = cepInput.value.replace(/\D/g, '');

    const erroCep = document.getElementById('erro-cep');
    const resultadoFrete = document.getElementById('resultado-frete');

    if (cepLimpo.length !== 8) {
        erroCep.style.display = 'block';
        resultadoFrete.style.display = 'none';
        return;
    }

    const regiaoKey = regiaoPorCep(cepLimpo);
    const dadosRegiao = tabelaFrete[regiaoKey];

    if (!dadosRegiao) {
        erroCep.style.display = 'block';
        resultadoFrete.style.display = 'none';
        return;
    }

    erroCep.style.display = 'none';

    document.getElementById('res-regiao').textContent = dadosRegiao.nome;
    document.getElementById('res-prazo').textContent = dadosRegiao.prazo;
    document.getElementById('res-valor').textContent =
        'R$ ' + dadosRegiao.valor.toFixed(2).replace('.', ',');
    document.getElementById('res-obs').textContent =
        'Frete grátis em compras acima de R$ ' + freteGratisAcimaDe.toFixed(2).replace('.', ',') + '.';

    resultadoFrete.style.display = 'block';
});

// Máscara simples de CEP (00000-000)
document.getElementById('cep').addEventListener('input', function (e) {
    let valor = e.target.value.replace(/\D/g, '').substring(0, 8);
    if (valor.length > 5) {
        valor = valor.substring(0, 5) + '-' + valor.substring(5);
    }
    e.target.value = valor;
});
</script>

<?php
renderFooter();
?>