<?php
require_once 'init.php';
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

<?php
renderFooter();
?>