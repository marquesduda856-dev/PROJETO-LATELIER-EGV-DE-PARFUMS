<?php
require_once 'init.php';
<<<<<<< HEAD
renderHeader("Entregas e Frete");
?>

<section class="secao-calculadora-frete">
    
    <!-- TÍTULO PRINCIPAL DA PÁGINA -->
    <h1 class="titulo-secao" style="text-align: center; justify-content: center; margin-bottom: 8px;">
        <i class="fa-solid fa-truck-fast"></i> ENTREGAS E FRETE
    </h1>
    <p style="text-align: center; color: var(--texto-cinza); margin-bottom: 30px; font-size: 0.95rem;">
        Calcule o frete para a sua região e saiba como protegemos os seus frascos até à sua porta.
    </p>

    <!-- CAIXA CALCULADORA DE FRETE -->
    <div class="caixa-calculadora">
        <h3 style="color: var(--cor-dourado); font-size: 1.1rem; margin-bottom: 12px; text-align: center;">CALCULE O SEU FRETE</h3>
        <label for="input-cep">Digite o seu CEP para ver o prazo estimado e o valor do frete:</label>

        <form action="" method="POST">
            <div class="linha-input-frete">
                <input type="text" id="input-cep" name="cep" placeholder="00000-000" maxlength="9" required>
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i> Calcular
                </button>
            </div>
        </form>

        <a href="https://buscacepinter.correios.com.br/app/cep/index.php" target="_blank" class="link-nao-sei-cep">
            Não sei o meu CEP
        </a>

        <!-- RESULTADO DO CÁLCULO -->
        <div class="resultado-frete">
            <div class="linha-resultado">
                <span>Prazo estimado:</span>
                <strong>1 a 3 dias úteis</strong>
            </div>
            <div class="linha-resultado">
                <span>Valor do frete:</span>
                <strong>R$ 19,90</strong>
            </div>
            <p class="obs-resultado-frete">
                * Compras acima de R$ 299,00 têm frete grátis para todo o Brasil.
            </p>
        </div>
    </div>

    <!-- PRAZOS E VALORES POR REGIÃO (EM CARDS) -->
    <div style="max-width: 1100px; margin: 60px auto 0;">
        <h3 style="color: var(--cor-dourado); text-align: center; font-size: 1.2rem; margin-bottom: 28px; letter-spacing: 1px;">
            PRAZOS E VALORES POR REGIÃO
        </h3>

        <div class="grid-regioes">
            <div class="card-regiao">
                <i class="fa-solid fa-location-dot"></i>
                <h4>Sudeste</h4>
                <div class="preco-regiao">R$ 19,90</div>
                <div class="prazo-regiao">1 a 3 dias úteis</div>
            </div>

            <div class="card-regiao">
                <i class="fa-solid fa-location-dot"></i>
                <h4>Sul</h4>
                <div class="preco-regiao">R$ 24,90</div>
                <div class="prazo-regiao">2 a 4 dias úteis</div>
            </div>

            <div class="card-regiao">
                <i class="fa-solid fa-location-dot"></i>
                <h4>Centro-Oeste</h4>
                <div class="preco-regiao">R$ 29,90</div>
                <div class="prazo-regiao">3 a 6 dias úteis</div>
            </div>

            <div class="card-regiao">
                <i class="fa-solid fa-location-dot"></i>
                <h4>Nordeste</h4>
                <div class="preco-regiao">R$ 34,90</div>
                <div class="prazo-regiao">4 a 8 dias úteis</div>
            </div>

            <div class="card-regiao">
                <i class="fa-solid fa-location-dot"></i>
                <h4>Norte</h4>
                <div class="preco-regiao">R$ 39,90</div>
                <div class="prazo-regiao">5 a 10 dias úteis</div>
            </div>
        </div>
    </div>

    <!-- COMO PROTEGEMOS O SEU PERFUME (EM CARDS) -->
    <div style="max-width: 1100px; margin: 60px auto 0;">
        <h3 style="color: var(--cor-dourado); text-align: center; font-size: 1.2rem; margin-bottom: 28px; letter-spacing: 1px;">
            COMO PROTEGEMOS O SEU PERFUME
        </h3>

        <div class="grid-protecao">
            <div class="card-protecao">
                <i class="fa-solid fa-box-open"></i>
                <div>
                    <h4>Plástico Bolha</h4>
                    <p>Cada frasco é enrolado individualmente em plástico bolha para absorver impactos durante o transporte.</p>
                </div>
            </div>

            <div class="card-protecao">
                <i class="fa-solid fa-box"></i>
                <div>
                    <h4>Caixa Reforçada</h4>
                    <p>Caixas de papelão duplo e reforçado, prevenindo danos e deformações no transporte.</p>
                </div>
            </div>

            <div class="card-protecao">
                <i class="fa-solid fa-shield-halved"></i>
                <div>
                    <h4>Lacre de Segurança</h4>
                    <p>Fita de segurança inviolável garantindo que a caixa chegue 100% selada ao destino.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CAIXA DE SUPORTE WHATSAPP -->
    <div class="caixa-suporte-whatsapp">
        <p>Ainda tem dúvidas sobre o frete?</p>
        <a href="https://wa.me/seunumero" target="_blank" class="btn-destaque-ouro" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; text-decoration: none; padding: 12px 28px; border-radius: 4px; font-weight: bold; width: auto;">
            <i class="fa-brands fa-whatsapp"></i> Falar no WhatsApp
        </a>
    </div>

</section>

=======

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

>>>>>>> 30019621cbd5f5379d5468c645187a616bdf87d8
<?php
renderFooter();
?>