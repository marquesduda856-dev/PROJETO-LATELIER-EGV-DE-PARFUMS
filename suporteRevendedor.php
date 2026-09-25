<?php 
require_once 'init.php';

// Trata acesso direto via formulário de Login da Minha Conta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['login_revendedor'])) {
    $login = filter_input(INPUT_POST, 'login_revendedor', FILTER_SANITIZE_SPECIAL_CHARS);
    $partes = explode('@', $login);
    $_SESSION['revendedor_nome'] = ucfirst($partes[0]);
}

$nomeRevendedor = isset($_SESSION['revendedor_nome']) ? $_SESSION['revendedor_nome'] : 'Revendedor(a)';

renderHeader('Área Exclusiva do Revendedor');
?>

<link rel="stylesheet" href="suporte.css">

<main class="suporte-container">
    <div class="welcome-banner">
        <div class="badge-sucesso">✓ Registo Recebido com Sucesso</div>
        <h1 class="welcome-title">Seja bem-vindo(a), <span class="dourado"><?php echo htmlspecialchars($nomeRevendedor); ?></span>!</h1>
        <p class="welcome-subtitle">A sua solicitação foi pré-aprovada. Agora você tem acesso imediato ao nosso material oficial e atendimento prioritário.</p>
    </div>

    <div class="suporte-grid">

        <div class="suporte-coluna-esquerda">

            <div class="card-suporte card-pdf">
                <div class="card-icon">📄</div>
                <h3>Catálogo Oficial de Revendedor</h3>
                <p>Confira nosso catálogo completo.</p>
                
                <a href="img/Cat%C3%A1logo%20Oficial%20L'Atelier%20EGV.pdf" download="Catálogo Oficial L'Atelier EGV.pdf" class="btn-dourado">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Baixar Catálogo PDF
                </a>
            </div>

            <div class="card-suporte card-gerente">
                <div class="gerente-header">
                    <div class="avatar-container">
                        <div class="avatar">G</div>
                        <span class="status-online" title="Online"></span>
                    </div>
                    <div class="gerente-info">
                        <h4>Gerente de Contas Regional</h4>
                        <p class="gerente-nome">Guilherme Henrique</p>
                        <span class="tag-atendimento">Atendimento Dedicado</span>
                    </div>
                </div>
                <p>Dúvidas sobre o primeiro pedido ou condições de pagamento? Fale diretamente com o seu gerente no WhatsApp.</p>
                
                <a href="https://wa.me/5511999999999?text=Ol%C3%A1%20Guilherme,%20acabei%20de%20me%20cadastrar%20como%20revendedor(a)%20e%20gostaria%20de%20mais%20informA%C3%A7%C3%B5es." target="_blank" class="btn-outline-dourado">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                    </svg>
                    Conversar com o Gerente
                </a>
            </div>

        </div>

        <div class="suporte-coluna-direita">
            <div class="chat-card">
                <div class="chat-header">
                    <div class="chat-title-box">
                        <span class="chat-icon">💬</span>
                        <div>
                            <h3>Suporte Exclusivo ao Revendedor</h3>
                            <span class="chat-sub">Assistente Virtual & Equipe L'Atelier</span>
                        </div>
                    </div>
                    <span class="badge-live">AO VIVO</span>
                </div>

                <div class="chat-messages" id="chatMessages">
                    <div class="message msg-bot">
                        <div class="msg-content">
                            Olá, <strong><?php echo htmlspecialchars($nomeRevendedor); ?></strong>! 👋 Bem-vindo(a) à L'Atelier EGV.
                        </div>
                        <span class="msg-time">Agora</span>
                    </div>
                    <div class="message msg-bot">
                        <div class="msg-content">
                            Você já pode fazer o download do nosso catálogo de revendedor. Como posso te ajudar com os seus primeiros passos?
                        </div>
                        <span class="msg-time">Agora</span>
                    </div>
                </div>

                <div class="chat-quick-replies">
                    <button type="button" class="quick-btn" onclick="enviarMensagemRapida('Qual o valor do primeiro pedido mínimo?')">Pedido Mínimo?</button>
                    <button type="button" class="quick-btn" onclick="enviarMensagemRapida('Qual a margem de lucro dos perfumes?')">Margem de Lucro?</button>
                    <button type="button" class="quick-btn" onclick="enviarMensagemRapida('Como funciona o frete/envio?')">Prazos de Envio?</button>
                </div>

                <form id="chatForm" class="chat-input-form" onsubmit="enviarMensagemManual(event)">
                    <input type="text" id="chatInput" placeholder="Escreva sua dúvida aqui..." autocomplete="off">
                    <button type="submit" class="btn-send" title="Enviar Mensagem">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div>

    <div class="tabela-seccao-wrapper">
        <button type="button" class="btn-dourado-toggle" id="toggleTabelaBtn" onclick="toggleTabelaPrecos()">
            <span class="btn-text">
                <span class="icon-chart">📊</span> 
                Tabela Exclusiva de Preços & Lucratividade (40%)
            </span>
            <span class="badge-margem">40% MARGEM</span>
            <span class="icon-arrow" id="arrowIcon">▼</span>
        </button>

        <div class="tabela-container-oculta" id="tabelaPrecosWrapper" style="display: none;">
            
            <div class="tabela-header-card">
                <div class="tabela-header-info">
                    <h2>Tabela Oficial de Preços & Lucro</h2>
                    <p>Valores exclusivos de atacado para revendedores autorizados <strong>L'Atelier EGV</strong>.</p>
                </div>
                <div class="lucro-info-badge">
                    <span class="lucro-val">40%</span>
                    <span class="lucro-lbl">Lucro Líquido Garantido</span>
                </div>
            </div>

            <!-- LINHA FEMININA -->
            <div class="categoria-bloco">
                <div class="categoria-banner fem">
                    <span class="cat-icon">🌸</span>
                    <h3>Linha Feminina</h3>
                </div>
                
                <div class="table-responsive">
                    <table class="tabela-precos">
                        <thead>
                            <tr>
                                <th style="width: 28%;">Fragrância / Produto</th>
                                <th style="width: 24%;">Item / Especificação</th>
                                <th style="width: 16%;">Preço Consumidor</th>
                                <th style="width: 16%;">Custo Revendedor</th>
                                <th style="width: 16%;">Seu Lucro (40%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="6" class="col-fragrancia">
                                    <strong class="nome-perfume">Dolce Tentazione</strong>
                                    <span class="familia-olfativa">Gourmand / Frutado</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>
                            <tr>
                                <td>Manteiga Corporal / Creme (200g)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr>
                                <td>Esfoliante de Açúcar (250g)</td>
                                <td class="preco-venda">R$ 69,90</td>
                                <td class="preco-custo">R$ 41,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 27,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Líquido (250ml)</td>
                                <td class="preco-venda">R$ 49,90</td>
                                <td class="preco-custo">R$ 29,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 19,96</span></td>
                            </tr>
                            <tr>
                                <td>Hidratante Fluido (200ml)</td>
                                <td class="preco-venda">R$ 64,90</td>
                                <td class="preco-custo">R$ 38,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 25,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (5 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 389,90</td>
                                <td class="preco-custo">R$ 233,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 155,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="4" class="col-fragrancia">
                                    <strong class="nome-perfume">Vanille Impériale</strong>
                                    <span class="familia-olfativa">Oriental Gourmand</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 199,90</td>
                                <td class="preco-custo">R$ 119,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 79,96</span></td>
                            </tr>
                            <tr>
                                <td>Creme Concentrado (200g)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr>
                                <td>Esfoliante Corporal (250g)</td>
                                <td class="preco-venda">R$ 69,90</td>
                                <td class="preco-custo">R$ 41,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 27,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (3 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 299,90</td>
                                <td class="preco-custo">R$ 179,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 119,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Éclat D’Or</strong>
                                    <span class="familia-olfativa">Floral Oriental</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Jardin de Soie</strong>
                                    <span class="familia-olfativa">Floral Frutado</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="4" class="col-fragrancia">
                                    <strong class="nome-perfume">Rosa Impériale</strong>
                                    <span class="familia-olfativa">Floral</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>
                            <tr>
                                <td>Loção Corporal (200ml)</td>
                                <td class="preco-venda">R$ 64,90</td>
                                <td class="preco-custo">R$ 38,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 25,96</span></td>
                            </tr>
                            <tr>
                                <td>Creme para Mãos (50g)</td>
                                <td class="preco-venda">R$ 34,90</td>
                                <td class="preco-custo">R$ 20,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 13,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (3 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 249,90</td>
                                <td class="preco-custo">R$ 149,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 99,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="5" class="col-fragrancia">
                                    <strong class="nome-perfume">Sol de Capri</strong>
                                    <span class="familia-olfativa">Cítrico</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 179,90</td>
                                <td class="preco-custo">R$ 107,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 71,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete em Gel (250ml)</td>
                                <td class="preco-venda">R$ 49,90</td>
                                <td class="preco-custo">R$ 29,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 19,96</span></td>
                            </tr>
                            <tr>
                                <td>Esfoliante Revitalizante (250g)</td>
                                <td class="preco-venda">R$ 69,90</td>
                                <td class="preco-custo">R$ 41,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 27,96</span></td>
                            </tr>
                            <tr>
                                <td>Loção Pós-Sol (200ml)</td>
                                <td class="preco-venda">R$ 59,90</td>
                                <td class="preco-custo">R$ 35,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 23,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (4 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 309,90</td>
                                <td class="preco-custo">R$ 185,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 123,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Sândalo Real</strong>
                                    <span class="familia-olfativa">Amadeirado Cremoso</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 199,90</td>
                                <td class="preco-custo">R$ 119,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 79,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Nuit Velours</strong>
                                    <span class="familia-olfativa">Chipre Oriental</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- LINHA MASCULINA -->
            <div class="categoria-bloco">
                <div class="categoria-banner masc">
                    <span class="cat-icon">🌿</span>
                    <h3>Linha Masculina</h3>
                </div>
                
                <div class="table-responsive">
                    <table class="tabela-precos">
                        <thead>
                            <tr>
                                <th style="width: 28%;">Fragrância / Produto</th>
                                <th style="width: 24%;">Item / Especificação</th>
                                <th style="width: 16%;">Preço Consumidor</th>
                                <th style="width: 16%;">Custo Revendedor</th>
                                <th style="width: 16%;">Seu Lucro (40%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="5" class="col-fragrancia">
                                    <strong class="nome-perfume">Bourbon & Miel</strong>
                                    <span class="familia-olfativa">Gourmand Amadeirado</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 199,90</td>
                                <td class="preco-custo">R$ 119,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 79,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Líquido Corpo/Barba (250ml)</td>
                                <td class="preco-venda">R$ 52,90</td>
                                <td class="preco-custo">R$ 31,74</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 21,16</span></td>
                            </tr>
                            <tr>
                                <td>Esfoliante Corporal (250g)</td>
                                <td class="preco-venda">R$ 69,90</td>
                                <td class="preco-custo">R$ 41,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 27,96</span></td>
                            </tr>
                            <tr>
                                <td>Balm / Hidratante (100ml)</td>
                                <td class="preco-venda">R$ 49,90</td>
                                <td class="preco-custo">R$ 29,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 19,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (4 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 319,90</td>
                                <td class="preco-custo">R$ 191,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 127,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Épice Noir</strong>
                                    <span class="familia-olfativa">Oriental Especiado</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Cuir Noir</strong>
                                    <span class="familia-olfativa">Amadeirado Couro</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 199,90</td>
                                <td class="preco-custo">R$ 119,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 79,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="4" class="col-fragrancia">
                                    <strong class="nome-perfume">Bleu Sauvage</strong>
                                    <span class="familia-olfativa">Aromático Fresco</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>
                            <tr>
                                <td>Shower Gel 2 em 1 (250ml)</td>
                                <td class="preco-venda">R$ 54,90</td>
                                <td class="preco-custo">R$ 32,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 21,96</span></td>
                            </tr>
                            <tr>
                                <td>Hidratante Corporal (200ml)</td>
                                <td class="preco-venda">R$ 64,90</td>
                                <td class="preco-custo">R$ 38,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 25,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (3 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 264,90</td>
                                <td class="preco-custo">R$ 158,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 105,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Oud Majestueux</strong>
                                    <span class="familia-olfativa">Amadeirado Denso</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 229,90</td>
                                <td class="preco-custo">R$ 137,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 91,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Agrumes d'Or</strong>
                                    <span class="familia-olfativa">Cítrico Mineral</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 189,90</td>
                                <td class="preco-custo">R$ 113,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 75,96</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- LINHA UNISSEX -->
            <div class="categoria-bloco">
                <div class="categoria-banner unissex">
                    <span class="cat-icon">✨</span>
                    <h3>Linha Unissex</h3>
                </div>
                
                <div class="table-responsive">
                    <table class="tabela-precos">
                        <thead>
                            <tr>
                                <th style="width: 28%;">Fragrância / Produto</th>
                                <th style="width: 24%;">Item / Especificação</th>
                                <th style="width: 16%;">Preço Consumidor</th>
                                <th style="width: 16%;">Custo Revendedor</th>
                                <th style="width: 16%;">Seu Lucro (40%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="5" class="col-fragrancia">
                                    <strong class="nome-perfume">Praliné Céleste</strong>
                                    <span class="familia-olfativa">Gourmand Ambarado</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 229,90</td>
                                <td class="preco-custo">R$ 137,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 91,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Acetinado (250ml)</td>
                                <td class="preco-venda">R$ 54,90</td>
                                <td class="preco-custo">R$ 32,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 21,96</span></td>
                            </tr>
                            <tr>
                                <td>Esfoliante Corporal (250g)</td>
                                <td class="preco-venda">R$ 69,90</td>
                                <td class="preco-custo">R$ 41,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 27,96</span></td>
                            </tr>
                            <tr>
                                <td>Creme Concentrado (200g)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (4 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 369,90</td>
                                <td class="preco-custo">R$ 221,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 147,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Terra & Aurum</strong>
                                    <span class="familia-olfativa">Ambarado Amadeirado</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 199,90</td>
                                <td class="preco-custo">R$ 119,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 79,96</span></td>
                            </tr>

                            <tr>
                                <td class="col-fragrancia">
                                    <strong class="nome-perfume">Aura de Amber</strong>
                                    <span class="familia-olfativa">Ambarado Místico</span>
                                </td>
                                <td>Perfume / Kit Individual (100ml)</td>
                                <td class="preco-venda">R$ 199,90</td>
                                <td class="preco-custo">R$ 119,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 79,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="6" class="col-fragrancia">
                                    <strong class="nome-perfume">Verde Infinito</strong>
                                    <span class="familia-olfativa">Cítrico Herbal</span>
                                </td>
                                <td>Perfume (100ml)</td>
                                <td class="preco-venda">R$ 179,90</td>
                                <td class="preco-custo">R$ 107,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 71,96</span></td>
                            </tr>
                            <tr>
                                <td>Manteiga Corporal / Creme (200g)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr>
                                <td>Esfoliante de Açúcar (250g)</td>
                                <td class="preco-venda">R$ 69,90</td>
                                <td class="preco-custo">R$ 41,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 27,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Líquido (250ml)</td>
                                <td class="preco-venda">R$ 49,90</td>
                                <td class="preco-custo">R$ 29,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 19,96</span></td>
                            </tr>
                            <tr>
                                <td>Hidratante Fluido (200ml)</td>
                                <td class="preco-venda">R$ 64,90</td>
                                <td class="preco-custo">R$ 38,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 25,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (5 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 379,90</td>
                                <td class="preco-custo">R$ 227,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 151,96</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- LINHA INFANTIL E BEBÊ -->
            <div class="categoria-bloco">
                <div class="categoria-banner infantil">
                    <span class="cat-icon">🧸</span>
                    <h3>Linha Infantil & Bebê</h3>
                </div>
                
                <div class="table-responsive">
                    <table class="tabela-precos">
                        <thead>
                            <tr>
                                <th style="width: 28%;">Fragrância / Produto</th>
                                <th style="width: 24%;">Item / Especificação</th>
                                <th style="width: 16%;">Preço Consumidor</th>
                                <th style="width: 16%;">Custo Revendedor</th>
                                <th style="width: 16%;">Seu Lucro (40%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="5" class="col-fragrancia">
                                    <strong class="nome-perfume">Princesa das Flores</strong>
                                    <span class="familia-olfativa">Infantil Doce</span>
                                </td>
                                <td>Colônia (100ml)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete em Barra (90g)</td>
                                <td class="preco-venda">R$ 19,90</td>
                                <td class="preco-custo">R$ 11,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 7,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Líquido (200ml)</td>
                                <td class="preco-venda">R$ 36,90</td>
                                <td class="preco-custo">R$ 22,14</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 14,76</span></td>
                            </tr>
                            <tr>
                                <td>Shampoo (200ml)</td>
                                <td class="preco-venda">R$ 39,90</td>
                                <td class="preco-custo">R$ 23,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 15,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (4 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 149,90</td>
                                <td class="preco-custo">R$ 89,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 59,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="5" class="col-fragrancia">
                                    <strong class="nome-perfume">Pequeno Explorador</strong>
                                    <span class="familia-olfativa">Masculino Infantil</span>
                                </td>
                                <td>Colônia (100ml)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete em Barra (90g)</td>
                                <td class="preco-venda">R$ 19,90</td>
                                <td class="preco-custo">R$ 11,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 7,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Líquido (200ml)</td>
                                <td class="preco-venda">R$ 36,90</td>
                                <td class="preco-custo">R$ 22,14</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 14,76</span></td>
                            </tr>
                            <tr>
                                <td>Shampoo (200ml)</td>
                                <td class="preco-venda">R$ 39,90</td>
                                <td class="preco-custo">R$ 23,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 15,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (4 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 149,90</td>
                                <td class="preco-custo">R$ 89,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 59,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="5" class="col-fragrancia">
                                    <strong class="nome-perfume">Nuvem de Algodão / Mágica</strong>
                                    <span class="familia-olfativa">Unissex Infantil</span>
                                </td>
                                <td>Colônia (100ml)</td>
                                <td class="preco-venda">R$ 79,90</td>
                                <td class="preco-custo">R$ 47,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 31,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete em Barra (90g)</td>
                                <td class="preco-venda">R$ 19,90</td>
                                <td class="preco-custo">R$ 11,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 7,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Líquido (200ml)</td>
                                <td class="preco-venda">R$ 36,90</td>
                                <td class="preco-custo">R$ 22,14</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 14,76</span></td>
                            </tr>
                            <tr>
                                <td>Shampoo (200ml)</td>
                                <td class="preco-venda">R$ 39,90</td>
                                <td class="preco-custo">R$ 23,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 15,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (4 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 149,90</td>
                                <td class="preco-custo">R$ 89,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 59,96</span></td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="col-fragrancia">
                                    <strong class="nome-perfume">Primeiro Abraço</strong>
                                    <span class="familia-olfativa">Linha Bebê / Recém-Nascido</span>
                                </td>
                                <td>Água de Colônia (100ml)</td>
                                <td class="preco-venda">R$ 84,90</td>
                                <td class="preco-custo">R$ 50,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 33,96</span></td>
                            </tr>
                            <tr>
                                <td>Sabonete Glicerinado (90g)</td>
                                <td class="preco-venda">R$ 24,90</td>
                                <td class="preco-custo">R$ 14,94</td>
                                <td class="preco-lucro"><span class="badge-lucro">+ R$ 9,96</span></td>
                            </tr>
                            <tr class="linha-kit">
                                <td><strong>Kit Completo (2 itens)</strong> <span class="tag-kit">Ofertão</span></td>
                                <td class="preco-venda">R$ 94,90</td>
                                <td class="preco-custo">R$ 56,94</td>
                                <td class="preco-lucro"><span class="badge-lucro highlight">+ R$ 37,96</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
function adicionarMensagem(texto, tipo) {
    const container = document.getElementById('chatMessages');
    const msgDiv = document.createElement('div');
    msgDiv.className = `message ${tipo === 'user' ? 'msg-user' : 'msg-bot'}`;
    
    const hora = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    
    msgDiv.innerHTML = `
        <div class="msg-content">${texto}</div>
        <span class="msg-time">${hora}</span>
    `;
    
    container.appendChild(msgDiv);
    container.scrollTop = container.scrollHeight;
}

function responderBot(mensagemUser) {
    let resposta = "Nossa equipe comercial responderá em instantes. Se preferir atendimento imediato, clique no botão do WhatsApp ao lado!";
    
    const msgLower = mensagemUser.toLowerCase();
    
    if (msgLower.includes('mínimo') || msgLower.includes('minimo') || msgLower.includes('pedido')) {
        resposta = "O investimento inicial mínimo é super acessível para novos revendedores, a partir de apenas R$ 300,00 em produtos à sua escolha!";
    } else if (msgLower.includes('lucro') || msgLower.includes('margem')) {
        resposta = "Nossas margens de lucro garantidas são de 40% sobre o preço final do consumidor, podendo chegar a 100% em promoções especiais de kits.";
    } else if (msgLower.includes('frete') || msgLower.includes('envio')) {
        resposta = "Realizamos envios para todo o Brasil via Transportadora e Correios. Pedidos acima de determinado valor contam com frete grátis!";
    }

    setTimeout(() => {
        adicionarMensagem(resposta, 'bot');
    }, 800);
}

function enviarMensagemRapida(texto) {
    adicionarMensagem(texto, 'user');
    responderBot(texto);
}

function enviarMensagemManual(e) {
    e.preventDefault();
    const input = document.getElementById('chatInput');
    const texto = input.value.trim();
    
    if (texto !== '') {
        adicionarMensagem(texto, 'user');
        responderBot(texto);
        input.value = '';
    }
}

function toggleTabelaPrecos() {
    const wrapper = document.getElementById('tabelaPrecosWrapper');
    const arrow = document.getElementById('arrowIcon');
    
    if (wrapper.style.display === 'block') {
        wrapper.style.display = 'none';
        arrow.classList.remove('rotativo');
    } else {
        wrapper.style.display = 'block';
        arrow.classList.add('rotativo');
        wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>

<?php 
renderFooter();
?>