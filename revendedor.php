<?php 
require_once 'init.php';
renderHeader('Seja um Revendedor');
?>

<main class="revendedor-container">
    <div class="revendedor-grid">

        <div class="revendedor-info">
            <img src="img/Logo/logoEscrita.jpeg" alt="L'Atelier EGV" class="revendedor-logo">
            <h2 class="info-title">Faça parte da nossa rede de parceiros</h2>
            <p class="info-desc">Revenda produtos de alta perfumaria com margens lucrativas, suporte exclusivo e garantia de procedência.</p>
        </div>

        <div class="revendedor-form-wrapper">
            <h1 class="page-title neon-text">Seja um Revendedor</h1>
            <p class="page-subtitle">Preencha o formulário abaixo e a nossa equipa entrará em contacto.</p>

            <?php if (isset($_SESSION['revendedor_sucesso'])): ?>
                <div class="status-verde">
                    <h3>Solicitação Enviada!</h3>
                    <p><?php echo htmlspecialchars($_SESSION['revendedor_sucesso'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <?php unset($_SESSION['revendedor_sucesso']); ?>
            <?php endif; ?>

            <form action="processaRevendedor.php" method="POST" class="help-form">
                <div class="form-group">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required placeholder="Seu nome completo">
                </div>

                <div class="form-group">
                    <label for="cpf">CPF *</label>
                    <input type="text" id="cpf" name="cpf" required placeholder="000.000.000-00">
                </div>

                <div class="form-group">
                    <label for="email">E-mail *</label>
                    <input type="email" id="email" name="email" required placeholder="seuemail@dominio.com">
                </div>

                <div class="form-group">
                    <label for="celular">Celular *</label>
                    <input type="tel" id="celular" name="celular" required placeholder="(00) 00000-0000">
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de nascimento *</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" required>
                </div>

                <div class="form-group">
                    <label for="genero">Gênero *</label>
                    <select id="genero" name="genero" required>
                        <option value="" disabled selected>Selecione seu gênero</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Outro">Outro</option>
                        <option value="Prefiro não informar">Prefiro não informar</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group flex-1">
                        <label for="cep">CEP *</label>
                        <input type="text" id="cep" name="cep" required placeholder="00000-000">
                    </div>

                    <div class="form-group flex-1">
                        <label for="numero">Número *</label>
                        <input type="text" id="numero" name="numero" required placeholder="Ex: 123">
                    </div>
                </div>

                <div class="form-group">
                    <label for="experiencia">Possui experiência com vendas? *</label>
                    <select id="experiencia" name="experiencia" required>
                        <option value="" disabled selected>Selecione uma opção</option>
                        <option value="Sim, já vendo cosméticos/perfumes">Sim, já vendo cosméticos/perfumes</option>
                        <option value="Sim, vendo outros produtos">Sim, vendo outros produtos</option>
                        <option value="Não, estou começando agora">Não, estou começando agora</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mensagem">Mensagem / Observações</label>
                    <textarea id="mensagem" name="mensagem" rows="4" placeholder="Conte-nos um pouco sobre suas expectativas ou dúvidas..."></textarea>
                </div>

                <div class="form-action">
                    <button type="submit" class="neon-btn full-width">Enviar Solicitação de Revenda</button>
                </div>
            </form>
        </div>

    </div>
</main>

<?php 
renderFooter();
?>