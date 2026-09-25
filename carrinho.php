<?php
require_once 'init.php';

// 0. ESVAZIAR TODO O CARRINHO NO SERVIDOR
if (isset($_GET['limpar'])) {
    unset($_SESSION['carrinho']);
    header("Location: carrinho.php");
    exit;
}

if (isset($_GET['remover'])) {
    $idRemover = (int)$_GET['remover'];
    if (isset($_SESSION['carrinho'][$idRemover])) {
        unset($_SESSION['carrinho'][$idRemover]);
    }
    header("Location: carrinho.php");
    exit;
}

if (isset($_GET['alterar_qtd'])) {
    $id = (int)$_GET['id'];
    $qtd = (int)$_GET['qtd'];
    if (isset($_SESSION['carrinho']) && isset($_SESSION['carrinho'][$id])) {
        if ($qtd > 0) {
            $_SESSION['carrinho'][$id] = $qtd;
        } else {
            unset($_SESSION['carrinho'][$id]);
        }
    }
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        echo json_encode(['status' => 'sucesso']);
        exit;
    }
    header("Location: carrinho.php");
    exit;
}

$subtotal = 0;
$total_quantidade = 0;
$itens_carrinho = [];
$cupons_validos = [
    "DESCONTO10" => ["tipo" => "percentual", "valor" => 10],
    "FRETEGRATIS" => ["tipo" => "frete", "valor" => 0]
];

$tabela_frete = [
    "sudeste"      => ["nome" => "Sudeste",       "prazo" => "1 a 3 dias úteis",  "valor" => 19.90],
    "sul"          => ["nome" => "Sul",           "prazo" => "2 a 4 dias úteis",  "valor" => 24.90],
    "centro-oeste" => ["nome" => "Centro-Oeste",  "prazo" => "3 a 6 dias úteis",  "valor" => 29.90],
    "nordeste"     => ["nome" => "Nordeste",      "prazo" => "4 a 8 dias úteis",  "valor" => 34.90],
    "norte"        => ["nome" => "Norte",         "prazo" => "5 a 10 dias úteis", "valor" => 39.90],
];
$frete_gratis_acima_de = 299.00;

$produtos = [
    1 => ["id" => 1, "nome" => "Dolce Tentazione", "marca" => "L'ATELIER FEMME", "preco" => 359.00, "imagem" => "img/Produtos/linha feminina/Dolce_Tentazione/Dolce_Tentazione.jpg"],
    2 => ["id" => 2, "nome" => "Bleu", "marca" => "L'ATELIER HOMME", "preco" => 389.00, "imagem" => "img/Produtos/linha masculina/Bleu/Bleu.jpg"],
    3 => ["id" => 3, "nome" => "Aura", "marca" => "L'ATELIER HOMME", "preco" => 299.00, "imagem" => "img/Produtos/linha unissex/Aura/Aura.jpg"],
    4 => ["id" => 4, "nome" => "Nuvem algodao", "marca" => "L'ATELIER KIDS", "preco" => 179.00, "imagem" => "img/Produtos/linha infantil/Nuvem algodao/Nuvem.jpg"]
];

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (!isset($_SESSION['carrinho']) || !is_array($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$id])) {
        $qtdAtual = is_array($_SESSION['carrinho'][$id]) ? (int)($_SESSION['carrinho'][$id]['qtd'] ?? 1) : (int)$_SESSION['carrinho'][$id];
        $_SESSION['carrinho'][$id] = $qtdAtual + 1;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }

    header("Location: carrinho.php?adicionado=1");
    exit;
}

if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $id => $val) {
        $qtd = is_array($val) ? (int)($val['qtd'] ?? 1) : (int)$val;

        if (isset($produtos[$id]) && $qtd > 0) {
            $prod = $produtos[$id];
            $prod['qtd'] = $qtd;
            $prod['subtotal_item'] = (float)$prod['preco'] * $qtd;

            $subtotal += $prod['subtotal_item'];
            $total_quantidade += $qtd;

            $itens_carrinho[$id] = $prod;
        }
    }
}

$carrinho = $itens_carrinho;

renderHeader("Meu Carrinho");
?>

<style>
.alerta-sucesso {
    background-color: #1b382b;
    color: #4cd98b;
    border: 1px solid #285e42;
    padding: 12px 20px;
    border-radius: 6px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
}
.cabecalho-carrinho-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}
.qtd-badge {
    font-size: 0.8em;
    color: #C5A059;
    font-weight: normal;
}
.acoes-carrinho-topo {
    display: flex;
    gap: 10px;
    align-items: center;
}
.btn-adicionar-mais {
    background: transparent;
    border: 1px solid #C5A059;
    color: #C5A059;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}
.btn-adicionar-mais:hover {
    background: #C5A059;
    color: #131A26;
}
.btn-esvaziar-carrinho {
    background: transparent;
    border: 1px solid #d9534f;
    color: #ff6b6b;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}
.btn-esvaziar-carrinho:hover {
    background: #d9534f;
    color: #ffffff;
}
.btn-remover-item {
    background: transparent;
    border: none;
    color: #8899a6;
    cursor: pointer;
    font-size: 1.1rem;
    text-decoration: none;
    padding: 5px;
    transition: color 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.btn-remover-item:hover {
    color: #ff6b6b;
}
</style>

<section class="secao-carrinho">
    <div class="container-fidelidade">

        <?php if (isset($_GET['adicionado']) && $_GET['adicionado'] == 1): ?>
            <div class="alerta-sucesso">
                <i class="fa-solid fa-circle-check"></i>
                <span>Produto adicionado com sucesso ao seu carrinho!</span>
            </div>
        <?php endif; ?>

        <div class="cabecalho-carrinho-flex">
            <h1 class="titulo-secao-carrinho" style="margin: 0;">
                <i class="fa-solid fa-bag-shopping"></i> Meu Carrinho
                <span class="qtd-badge">(<?php echo $total_quantidade; ?> <?php echo $total_quantidade === 1 ? 'item' : 'itens'; ?>)</span>
            </h1>

            <div class="acoes-carrinho-topo">
                <?php if (!empty($carrinho)): ?>
                    <a href="carrinho.php?limpar=1" class="btn-esvaziar-carrinho" onclick="return confirm('Deseja realmente esvaziar todo o carrinho?');">
                        <i class="fa-solid fa-trash-can"></i> Esvaziar carrinho
                    </a>
                <?php endif; ?>
                <a href="produtos.php" class="btn-adicionar-mais">
                    <i class="fa-solid fa-plus"></i> Adicionar mais produtos
                </a>
            </div>
        </div>

        <div class="grid-carrinho">

            <div class="coluna-itens-carrinho">

                <?php if (empty($carrinho)): ?>
                    <div class="carrinho-vazio">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <p>Seu carrinho está vazio.</p>
                        <a href="produtos.php" class="btn-destaque-ouro">Ver Produtos</a>
                    </div>
                <?php else: ?>
                    <div class="lista-itens-carrinho" id="lista-itens-carrinho">
                        <?php foreach ($carrinho as $item): ?>
                            <div class="item-carrinho" data-preco="<?php echo $item['preco']; ?>" data-id="<?php echo $item['id']; ?>">
                                <img src="<?php echo $item['imagem']; ?>" alt="<?php echo $item['nome']; ?>" onerror="this.src='https://placehold.co/120x120/131A26/C5A059?text=Perfume';">

                                <div class="dados-item-carrinho">
                                    <span class="marca-item-carrinho"><?php echo $item['marca']; ?></span>
                                    <h4><?php echo $item['nome']; ?></h4>
                                    <span class="preco-unit-item">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?> / un.</span>
                                </div>

                                <div class="controle-qtd">
                                    <button type="button" class="btn-qtd btn-menos">−</button>
                                    <input type="number" class="input-qtd" value="<?php echo $item['qtd']; ?>" min="1" readonly>
                                    <button type="button" class="btn-qtd btn-mais">+</button>
                                </div>

                                <div class="preco-total-item">
                                    R$ <span class="valor-total-item"><?php echo number_format($item['subtotal_item'], 2, ',', '.'); ?></span>
                                </div>

                                <!-- LINK REMOVER DE FATO NO SERVIDOR -->
                                <a href="carrinho.php?remover=<?php echo $item['id']; ?>" class="btn-remover-item" title="Remover item">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- INFORMAÇÕES DA LOJA -->
                <div class="grid-info-loja">
                    <div class="item-info-loja">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <h4>100% Originais</h4>
                            <p>Todos os produtos com garantia de procedência.</p>
                        </div>
                    </div>
                    <div class="item-info-loja">
                        <i class="fa-solid fa-box"></i>
                        <div>
                            <h4>Embalagem protegida</h4>
                            <p>Plástico bolha e caixa reforçada em todos os frascos.</p>
                        </div>
                    </div>
                    <div class="item-info-loja">
                        <i class="fa-solid fa-rotate-left"></i>
                        <div>
                            <h4>Troca facilitada</h4>
                            <p>7 dias corridos para solicitar troca ou devolução.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUNA DIREITA: RESUMO -->
            <div class="coluna-resumo-carrinho">
                <div class="caixa-resumo">
                    <h3>Resumo do Pedido</h3>

                    <!-- CUPOM / VOUCHER -->
                    <div class="caixa-cupom">
                        <label for="cupom">Cupom ou voucher</label>
                        <div class="linha-input-frete">
                            <input type="text" id="cupom" placeholder="Digite seu cupom">
                            <button type="button" id="btn-aplicar-cupom">Aplicar</button>
                        </div>
                        <p id="msg-cupom" class="msg-cupom"></p>
                    </div>

                    <!-- CÁLCULO DE FRETE -->
                    <div class="caixa-cupom">
                        <label for="cep-carrinho">Calcular frete</label>
                        <div class="linha-input-frete">
                            <input type="text" id="cep-carrinho" placeholder="00000-000" maxlength="9" inputmode="numeric">
                            <button type="button" id="btn-calcular-frete-carrinho">Calcular</button>
                        </div>
                        <p id="msg-frete" class="msg-cupom"></p>
                    </div>

                    <div class="linha-resumo">
                        <span>Subtotal</span>
                        <strong id="res-subtotal">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong>
                    </div>
                    <div class="linha-resumo" id="linha-desconto" style="display:none;">
                        <span>Desconto</span>
                        <strong id="res-desconto" class="valor-desconto">- R$ 0,00</strong>
                    </div>
                    <div class="linha-resumo">
                        <span>Frete</span>
                        <strong id="res-frete">Informe o CEP acima</strong>
                    </div>
                    <div class="linha-resumo linha-total">
                        <span>Total</span>
                        <strong id="res-total">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong>
                    </div>

                    <div class="caixa-pagamento">
                        <h4>Forma de pagamento</h4>

                        <div class="abas-pagamento">
                            <button type="button" class="aba-pagamento aba-ativa" data-metodo="cartao">
                                <i class="fa-regular fa-credit-card"></i> Cartão
                            </button>
                            <button type="button" class="aba-pagamento" data-metodo="pix">
                                <i class="fa-brands fa-pix"></i> Pix / QR Code
                            </button>
                        </div>

                        <div class="conteudo-pagamento" id="pagamento-cartao">
                            <label>Número do cartão</label>
                            <input type="text" placeholder="0000 0000 0000 0000" maxlength="19">

                            <label>Nome impresso no cartão</label>
                            <input type="text" placeholder="Como está no cartão">

                            <div class="linha-dupla">
                                <div>
                                    <label>Validade</label>
                                    <input type="text" placeholder="MM/AA" maxlength="5">
                                </div>
                                <div>
                                    <label>CVV</label>
                                    <input type="text" placeholder="000" maxlength="4">
                                </div>
                            </div>

                            <label>Parcelas</label>
                            <select id="select-parcelas">
                                <option value="1">1x sem juros</option>
                                <option value="2">2x sem juros</option>
                                <option value="3">3x sem juros</option>
                                <option value="6">6x com juros</option>
                            </select>
                        </div>

                        <div class="conteudo-pagamento" id="pagamento-pix" style="display:none;">
                            <div class="caixa-qrcode">
                                <div class="qrcode-placeholder">
                                    <i class="fa-solid fa-qrcode"></i>
                                </div>
                                <p>Escaneie o QR Code com o app do seu banco</p>
                            </div>

                            <label>Ou copie o código Pix</label>
                            <div class="linha-input-frete">
                                <input type="text" id="pix-copia-cola" value="00020126580014BR.GOV.BCB.PIX0136exemplo-chave-pix-latelieregv" readonly>
                                <button type="button" id="btn-copiar-pix"><i class="fa-regular fa-copy"></i></button>
                            </div>
                            <p class="obs-pix">O pagamento é confirmado automaticamente em poucos segundos.</p>
                        </div>
                    </div>

                    <button type="button" class="btn-finalizar-compra">
                        <i class="fa-solid fa-lock"></i> Finalizar Compra
                    </button>

                    <p class="texto-fidelidade-obs">
                        *Compra 100% segura. Seus dados são protegidos em todas as etapas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
const subtotalOriginal = <?php echo $subtotal; ?>;
const cuponsValidos = <?php echo json_encode($cupons_validos); ?>;
const tabelaFrete = <?php echo json_encode($tabela_frete); ?>;
const freteGratisAcimaDe = <?php echo $frete_gratis_acima_de; ?>;
let descontoAtual = 0;
let freteAtual = 0;

function formatarMoeda(valor) {
    return 'R$ ' + valor.toFixed(2).replace('.', ',');
}

// Sincroniza a alteração de quantidade no servidor PHP em segundo plano
function atualizarQtdSessao(id, qtd) {
    fetch('carrinho.php?alterar_qtd=1&id=' + id + '&qtd=' + qtd, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });
}

function recalcularCarrinho() {
    let subtotal = 0;
    let qtdTotal = 0;

    document.querySelectorAll('.item-carrinho').forEach(function (item) {
        const preco = parseFloat(item.dataset.preco);
        const qtd = parseInt(item.querySelector('.input-qtd').value, 10);
        const totalItem = preco * qtd;

        item.querySelector('.valor-total-item').textContent = totalItem.toFixed(2).replace('.', ',');
        subtotal += totalItem;
        qtdTotal += qtd;
    });

    const total = Math.max(subtotal - descontoAtual, 0) + freteAtual;

    document.getElementById('res-subtotal').textContent = formatarMoeda(subtotal);
    document.getElementById('res-total').textContent = formatarMoeda(total);

    const badge = document.querySelector('.qtd-badge');
    if (badge) {
        badge.textContent = '(' + qtdTotal + (qtdTotal === 1 ? ' item)' : ' itens)');
    }

    return subtotal;
}

// Botões de Quantidade (+ e -)
document.querySelectorAll('.btn-mais').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const item = btn.closest('.item-carrinho');
        const id = item.dataset.id;
        const input = item.querySelector('.input-qtd');
        const novaQtd = parseInt(input.value, 10) + 1;
        input.value = novaQtd;
        recalcularCarrinho();
        atualizarQtdSessao(id, novaQtd);
    });
});

document.querySelectorAll('.btn-menos').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const item = btn.closest('.item-carrinho');
        const id = item.dataset.id;
        const input = item.querySelector('.input-qtd');
        const atual = parseInt(input.value, 10);
        if (atual > 1) {
            const novaQtd = atual - 1;
            input.value = novaQtd;
            recalcularCarrinho();
            atualizarQtdSessao(id, novaQtd);
        }
    });
});

// Aplicar Cupom
document.getElementById('btn-aplicar-cupom').addEventListener('click', function () {
    const campoCupom = document.getElementById('cupom');
    const codigo = campoCupom.value.trim().toUpperCase();
    const msgCupom = document.getElementById('msg-cupom');
    const linhaDesconto = document.getElementById('linha-desconto');
    const subtotal = recalcularCarrinho();

    if (!cuponsValidos[codigo]) {
        msgCupom.textContent = 'Cupom inválido ou expirado.';
        msgCupom.className = 'msg-cupom msg-cupom-erro';
        descontoAtual = 0;
        linhaDesconto.style.display = 'none';
        recalcularCarrinho();
        return;
    }

    const cupom = cuponsValidos[codigo];

    if (cupom.tipo === 'percentual') {
        descontoAtual = subtotal * (cupom.valor / 100);
        msgCupom.textContent = 'Cupom aplicado: ' + cupom.valor + '% de desconto.';
    } else if (cupom.tipo === 'frete') {
        freteAtual = 0;
        document.getElementById('res-frete').textContent = 'Grátis (cupom aplicado)';
        msgCupom.textContent = 'Cupom de frete grátis aplicado.';
    }

    msgCupom.className = 'msg-cupom msg-cupom-sucesso';
    linhaDesconto.style.display = descontoAtual > 0 ? 'flex' : 'none';
    document.getElementById('res-desconto').textContent = '- ' + formatarMoeda(descontoAtual);

    recalcularCarrinho();
});

// Calcular Frete pelo CEP
function regiaoPorCep(cep) {
    const prefixo = parseInt(cep.substring(0, 2), 10);
    if (prefixo >= 1 && prefixo <= 39) return "sudeste";
    if (prefixo >= 80 && prefixo <= 99) return "sul";
    if (prefixo >= 70 && prefixo <= 79) return "centro-oeste";
    if (prefixo >= 40 && prefixo <= 65) return "nordeste";
    if (prefixo >= 66 && prefixo <= 69) return "norte";
    return null;
}

document.getElementById('btn-calcular-frete-carrinho').addEventListener('click', function () {
    const cepLimpo = document.getElementById('cep-carrinho').value.replace(/\D/g, '');
    const msgFrete = document.getElementById('msg-frete');

    if (cepLimpo.length !== 8) {
        msgFrete.textContent = 'CEP inválido. Digite os 8 números.';
        msgFrete.className = 'msg-cupom msg-cupom-erro';
        return;
    }

    const regiaoKey = regiaoPorCep(cepLimpo);
    const dadosRegiao = tabelaFrete[regiaoKey];

    if (!dadosRegiao) {
        msgFrete.textContent = 'Não localizamos essa região.';
        msgFrete.className = 'msg-cupom msg-cupom-erro';
        return;
    }

    const subtotalAtual = recalcularCarrinho();

    if (subtotalAtual >= freteGratisAcimaDe) {
        freteAtual = 0;
        document.getElementById('res-frete').textContent = 'Grátis';
    } else {
        freteAtual = dadosRegiao.valor;
        document.getElementById('res-frete').textContent =
            formatarMoeda(freteAtual) + ' (' + dadosRegiao.prazo + ')';
    }

    msgFrete.textContent = '';
    recalcularCarrinho();
});

// Máscara simples de CEP (00000-000)
document.getElementById('cep-carrinho').addEventListener('input', function (e) {
    let valor = e.target.value.replace(/\D/g, '').substring(0, 8);
    if (valor.length > 5) {
        valor = valor.substring(0, 5) + '-' + valor.substring(5);
    }
    e.target.value = valor;
});

// Abas de pagamento
document.querySelectorAll('.aba-pagamento').forEach(function (aba) {
    aba.addEventListener('click', function () {
        document.querySelectorAll('.aba-pagamento').forEach(a => a.classList.remove('aba-ativa'));
        aba.classList.add('aba-ativa');

        document.getElementById('pagamento-cartao').style.display = 'none';
        document.getElementById('pagamento-pix').style.display = 'none';
        document.getElementById('pagamento-' + aba.dataset.metodo).style.display = 'block';
    });
});

// Copiar código Pix
document.getElementById('btn-copiar-pix').addEventListener('click', function () {
    const campoPix = document.getElementById('pix-copia-cola');
    campoPix.select();
    campoPix.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(campoPix.value);

    const btn = this;
    const iconeOriginal = btn.innerHTML;
    btn.innerHTML = '<i class="fa-solid fa-check"></i>';
    setTimeout(() => { btn.innerHTML = iconeOriginal; }, 1500);
});
</script>

<?php
renderFooter();
?>