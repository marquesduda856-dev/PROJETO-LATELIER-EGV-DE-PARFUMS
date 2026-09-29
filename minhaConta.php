<?php 
require_once 'init.php';
renderHeader('Minha Conta');
?>

<main class="account-container">
    <div class="account-card">

        <div class="main-tabs">
            <button class="tab-btn active" onclick="switchMainTab('cliente')">
                👤 Área do Cliente
            </button>
            <button class="tab-btn" onclick="switchMainTab('revendedor')">
                🤝 Área do Revendedor
            </button>
        </div>

        <div id="tab-cliente" class="tab-content active">

            <div class="sub-tabs">
                <button class="sub-tab-btn active" onclick="switchSubTab('cliente', 'login')">Entrar</button>
                <button class="sub-tab-btn" onclick="switchSubTab('cliente', 'cadastro')">Criar Conta</button>
            </div>

            <form id="cliente-login" class="form-box active" action="index.php" method="POST">
                <div class="form-group">
                    <label for="cliente-email">E-mail</label>
                    <input type="email" id="cliente-email" name="email" placeholder="seuemail@exemplo.com" required>
                </div>
                <div class="form-group">
                    <label for="cliente-senha">Senha</label>
                    <input type="password" id="cliente-senha" name="senha" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-dourado">Entrar na Conta</button>
            </form>

            <form id="cliente-cadastro" class="form-box" action="index.php" method="POST">
                <div class="form-group">
                    <label for="cliente-nome">Nome Completo</label>
                    <input type="text" id="cliente-nome" name="nome" placeholder="Digite seu nome completo" required>
                </div>
                <div class="form-group">
                    <label for="cliente-cad-email">E-mail</label>
                    <input type="email" id="cliente-cad-email" name="email" placeholder="seuemail@exemplo.com" required>
                </div>
                <div class="form-group">
                    <label for="cliente-cad-senha">Senha</label>
                    <input type="password" id="cliente-cad-senha" name="senha" placeholder="Crie uma senha segura" required>
                </div>
                <button type="submit" class="btn-dourado">Criar Conta de Cliente</button>
            </form>

        </div>

        <div id="tab-revendedor" class="tab-content">

            <div class="sub-tabs">
                <button class="sub-tab-btn active" onclick="switchSubTab('revendedor', 'login')">Entrar</button>
                <button class="sub-tab-btn" onclick="switchSubTab('revendedor', 'cadastro')">Cadastrar-se</button>
            </div>

            <form id="revendedor-login" class="form-box active" action="suporteRevendedor.php" method="POST">
                <div class="form-group">
                    <label for="revendedor-email">E-mail ou CPF do Revendedor</label>
                    <input type="text" id="revendedor-email" name="login_revendedor" placeholder="Digite seu e-mail ou CPF" required>
                </div>
                <div class="form-group">
                    <label for="revendedor-senha">Senha</label>
                    <input type="password" id="revendedor-senha" name="senha_revendedor" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-dourado">Acessar Área Exclusiva</button>
            </form>

            <div id="revendedor-cadastro" class="form-box">
                <div class="info-revendedor-box">
                    <h3>Seja um Revendedor Oficial</h3>
                    <p>Lucre até 100% vendendo nossas fragrâncias exclusivas. Preencha nossa proposta comercial para receber a pré-aprovação rápida.</p>
                    <a href="revendedor.php" class="btn-dourado">Ir para Formulário de Cadastro</a>
                </div>
            </div>

        </div>

    </div>
</main>

<script>
function switchMainTab(tipo) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.main-tabs .tab-btn').forEach(btn => btn.classList.remove('active'));

    if (tipo === 'cliente') {
        document.getElementById('tab-cliente').classList.add('active');
        event.currentTarget.classList.add('active');
    } else {
        document.getElementById('tab-revendedor').classList.add('active');
        event.currentTarget.classList.add('active');
    }
}

function switchSubTab(area, acao) {
    const parentContainer = document.getElementById(`tab-${area}`);

    parentContainer.querySelectorAll('.sub-tab-btn').forEach(btn => btn.classList.remove('active'));
    event.currentTarget.classList.add('active');

    parentContainer.querySelectorAll('.form-box').forEach(box => box.classList.remove('active'));
    document.getElementById(`${area}-${acao}`).classList.add('active');
}
</script>

<?php 
renderFooter();
?>