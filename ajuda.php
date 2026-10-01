<?php require_once "init.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central de Ajuda e Suporte | L'Atelier EGV</title>

    <link rel="stylesheet" href="css/fixos.css">
    <link rel="stylesheet" href="css/footer.css">
    
    <link rel="stylesheet" href="css/ajuda.css">
</head>
<body>

    <?php renderHeader(); ?>

    <main class="ajuda-page">
        <section class="ajuda-hero">
            <div class="ajuda-hero-content">
                <p class="tag-categoria">ATENDIMENTO & SUPORTE</p>
                <h1>Como podemos <span>ajudar você?</span></h1>
                <p class="subtitulo-hero">
                    Encontre respostas rápidas para suas dúvidas, suporte para revendedores ou entre em contato direto com a nossa equipe de atendimento.
                </p>
            </div>
        </section>

        <section class="atalhos-secao">
            <div class="container-atalhos">
                <a href="#faq" class="card-atalho">
                    <div class="icone-atalho">❓</div>
                    <h3>Dúvidas Frequentes</h3>
                    <p>Entregas, trocas, pagamentos e fragrâncias</p>
                </a>

                <a href="#revendedor" class="card-atalho">
                    <div class="icone-atalho">💼</div>
                    <h3>Espaço do Revendedor</h3>
                    <p>Pedidos, suporte comercial e novos cadastros</p>
                </a>

                <a href="#reclamacoes" class="card-atalho">
                    <div class="icone-atalho">⚖️</div>
                    <h3>Ouvidoria & Reclamações</h3>
                    <p>Canal direto para solução de imprevistos</p>
                </a>

                <a href="#contato" class="card-atalho">
                    <div class="icone-atalho">💬</div>
                    <h3>Canais Diretos</h3>
                    <p>WhatsApp, e-mail e horários de suporte</p>
                </a>
            </div>
        </section>

        <section class="secao-ajuda" id="faq">
            <div class="cabecalho-secao">
                <p class="tag-secao">PERGUNTAS FREQUENTES</p>
                <h2>Tire suas dúvidas antes de comprar</h2>
            </div>

            <div class="faq-container">
                <details class="faq-item" open>
                    <summary>Qual o prazo de entrega dos produtos L'Atelier EGV?</summary>
                    <div class="faq-resposta">
                        <p>O prazo varia conforme a sua região e a modalidade de frete escolhida no momento do checkout. Compras via Sedex geralmente chegam em até 3 dias úteis para capitais. Você pode rastrear seu pedido em tempo real pelo código enviado ao seu e-mail registrado.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>Como funciona a política de trocas e devoluções?</summary>
                    <div class="faq-resposta">
                        <p>Você tem até 7 dias corridos após o recebimento para solicitar a devolução ou troca por arrependimento, desde que o produto esteja lacrado na embalagem original. Caso ocorra algum defeito ou avaria no transporte, realizamos a troca sem custos adicionais em até 30 dias.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>Os perfumes da L'Atelier EGV são originais?</summary>
                    <div class="faq-resposta">
                        <p>Sim. Todas as nossas fragrâncias são 100% originais, com matérias-primas nobres importadas, selo de autenticidade e registro ativo na Anvisa, garantindo altíssima fixação e projeção.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>Quais são as formas de pagamento aceitas?</summary>
                    <div class="faq-resposta">
                        <p>Aceitamos Pix (com aprovação imediata), Cartões de Crédito em até 6x sem juros e Bocal/Boleto Bancário.</p>
                    </div>
                </details>
            </div>
        </section>

        <section class="secao-ajuda revendedor-secao" id="revendedor">
            <div class="revendedor-grid">
                <div class="revendedor-texto">
                    <p class="tag-secao">ÁREA DO REVENDEDOR</p>
                    <h2>Suporte exclusivo para nossos <span>parceiros e revendedores</span></h2>
                    <p>Já é um revendedor cadastrado ou deseja levar a elegância da L'Atelier EGV para sua região?</p>
                    
                    <ul class="lista-beneficios-rev">
                        <li><strong>Portal B2B:</strong> Acesso direto para novos pedidos com tabela diferenciada.</li>
                        <li><strong>Suporte Comercial:</strong> Consultor exclusivo para auxílio nas vendas.</li>
                        <li><strong>Material de Apoio:</strong> Fitas olfativas, amostras e catálogos impressos.</li>
                    </ul>

                    <div class="botoes-revendedor">
                        <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=Ol%C3%A1!%20Gostaria%20de%20falar%20com%20o%20suporte%20ao%20revendedor." target="_blank" class="botao-ouro">FALAR COM CONSULTOR B2B</a>
                        <a href="#" class="botao-transparente">SEJA UM REVENDEDOR</a>
                    </div>
                </div>

                <div class="revendedor-card-info">
                    <h3>Atendimento Preferencial B2B</h3>
                    <p>Segunda a Sexta — 08h às 18h</p>
                    <div class="divisor-ouro"></div>
                    <p class="info-destaque">Atendimento ágil para reposição de estoque e dúvidas fiscais de faturamento.</p>
                </div>
            </div>
        </section>


        <section class="secao-ajuda" id="reclamacoes">
            <div class="cabecalho-secao">
                <p class="tag-secao">CANAL DE OUVIDORIA</p>
                <h2>Tive um imprevisto. Como resolver?</h2>
                <p class="subtitulo-secao">Priorizamos a transparência e a satisfação absoluta de nossos clientes. Se sua solicitação não foi resolvida pelos canais tradicionais, envie uma mensagem à nossa Ouvidoria.</p>
            </div>

            <div class="form-container">
                <form action="#" method="POST" class="form-reclamacao" onsubmit="event.preventDefault(); alert('Sua mensagem foi enviada à nossa Ouvidoria. Entraremos em contato em até 24h úteis.');">
                    <div class="form-group-duplo">
                        <div class="form-group">
                            <label for="nome">Nome Completo *</label>
                            <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail de Contato *</label>
                            <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                        </div>
                    </div>

                    <div class="form-group-duplo">
                        <div class="form-group">
                            <label for="telefone">Telefone / WhatsApp *</label>
                            <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                        </div>
                        <div class="form-group">
                            <label for="pedido">Número do Pedido (se houver)</label>
                            <input type="text" id="pedido" name="pedido" placeholder="Ex: #10482">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assunto">Motivo do Contato *</label>
                        <select id="assunto" name="assunto" required>
                            <option value="">Selecione uma opção</option>
                            <option value="atraso">Atraso na Entrega</option>
                            <option value="defeito">Produto Danificado / Avaria</option>
                            <option value="troca">Dificuldade para Troca/Devolução</option>
                            <option value="atendimento">Critica ao Atendimento</option>
                            <option value="outro">Outros Assuntos</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mensagem">Descrição do Problema *</label>
                        <textarea id="mensagem" name="mensagem" rows="5" placeholder="Descreva o ocorrido com o máximo de detalhes possível..." required></textarea>
                    </div>

                    <button type="submit" class="botao-ouro btn-enviar">ENVIAR PARA A OUVIDORIA</button>
                </form>
            </div>
        </section>


        <section class="secao-ajuda canais-contato" id="contato">
            <div class="cabecalho-secao">
                <p class="tag-secao">FALE CONOSCO</p>
                <h2>Nossos canais oficiais</h2>
            </div>

            <div class="grid-contatos">
                <div class="card-contato">
                    <h3>WhatsApp Oficial</h3>
                    <p>Atendimento rápido e humanizado para tirar dúvidas em tempo real.</p>
                    <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=<?php echo $whatsapp_mensagem; ?>" target="_blank" class="link-contato">Chamar no WhatsApp →</a>
                </div>

                <div class="card-contato">
                    <h3>Atendimento por E-mail</h3>
                    <p>Envie dúvidas detalhadas, comprovantes ou solicitações formais.</p>
                    <a href="mailto:atendimento@latelieregv.com.br" class="link-contato">atendimento@latelieregv.com.br →</a>
                </div>

                <div class="card-contato">
                    <h3>Horário de Funcionamento</h3>
                    <p>Segunda a Sexta: 09h às 18h<br>Sábados: 09h às 13h</p>
                    <span class="status-atendimento">● Canais operantes</span>
                </div>
            </div>
        </section>
    </main>

    <?php renderFooter(); ?>