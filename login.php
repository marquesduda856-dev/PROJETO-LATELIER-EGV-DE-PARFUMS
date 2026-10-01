<?php
require_once 'init.php';

// Ação de Deslogar / Limpar Sessão
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['usuario_id']);
    session_destroy();
    header('Location: login.php');
    exit;
}

// Se JÁ estiver logado e a conta existir no banco, manda direto para o painel
if (usuarioLogado() && getUsuarioLogado() !== null) {
    header('Location: minhaConta.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = getDb();
        $acao = $_POST['acao'] ?? '';

        // 1. LOGIN CLIENTE
        if ($acao === 'login_cliente') {
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            if (!empty($email) && !empty($senha)) {
                $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ? AND (tipo = 'Cliente' OR tipo IS NULL OR tipo = '')");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && (password_verify($senha, $user['senha']) || $senha === $user['senha'])) {
                    $_SESSION['usuario_id'] = $user['id'];
                    header('Location: minhaConta.php');
                    exit;
                } else {
                    $erro = 'E-mail ou senha incorretos.';
                }
            } else {
                $erro = 'Informe o e-mail e a senha.';
            }
        } 

        // 2. CADASTRO CLIENTE
        elseif ($acao === 'cadastrar_cliente') {
            $nome    = trim($_POST['nome'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $cpf     = trim($_POST['cpf'] ?? '');
            $celular = trim($_POST['celular'] ?? '');
            $senha   = $_POST['senha'] ?? '';

            if (!empty($nome) && !empty($email) && !empty($senha)) {
                $stmtCheck = $db->prepare("SELECT id FROM usuarios WHERE email = ?");
                $stmtCheck->execute([$email]);
                if ($stmtCheck->fetch()) {
                    $erro = 'Este e-mail já está cadastrado no sistema.';
                } else {
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha, telefone, cpf_cnpj, tipo, status_revendedor) VALUES (?, ?, ?, ?, ?, 'Cliente', 'ativo')");
                    $stmt->execute([$nome, $email, $senhaHash, $celular, $cpf]);

                    $novoId = $db->lastInsertId();
                    if ($novoId) {
                        $_SESSION['usuario_id'] = $novoId;
                        header('Location: minhaConta.php');
                        exit;
                    } else {
                        $erro = 'Erro ao obter ID do novo usuário. Verifique se a tabela tem AUTO_INCREMENT no ID.';
                    }
                }
            } else {
                $erro = 'Preencha Nome, E-mail e Senha para criar sua conta.';
            }
        }

        // 3. LOGIN REVENDEDOR
        elseif ($acao === 'login_revendedor') {
            $emailDoc = trim($_POST['email'] ?? '');
            $senha    = $_POST['senha'] ?? '';

            if (!empty($emailDoc) && !empty($senha)) {
                $stmt = $db->prepare("SELECT * FROM usuarios WHERE (email = ? OR cpf_cnpj = ?) AND tipo = 'Revendedor'");
                $stmt->execute([$emailDoc, $emailDoc]);
                $user = $stmt->fetch();

                if ($user && (password_verify($senha, $user['senha']) || $senha === $user['senha'])) {
                    $_SESSION['usuario_id'] = $user['id'];
                    header('Location: minhaConta.php');
                    exit;
                } else {
                    $erro = 'Dados incorretos ou conta de revendedor não encontrada.';
                }
            } else {
                $erro = 'Informe e-mail/CNPJ e senha de revendedor.';
            }
        }

        // 4. CADASTRO REVENDEDOR
        elseif ($acao === 'cadastrar_revendedor') {
            $nome    = trim($_POST['nome'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $doc     = trim($_POST['documento'] ?? '');
            $celular = trim($_POST['celular'] ?? '');
            $senha   = $_POST['senha'] ?? '';

            if (!empty($nome) && !empty($email) && !empty($senha)) {
                $stmtCheck = $db->prepare("SELECT id FROM usuarios WHERE email = ?");
                $stmtCheck->execute([$email]);
                if ($stmtCheck->fetch()) {
                    $erro = 'Este e-mail já está cadastrado.';
                } else {
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha, telefone, cpf_cnpj, tipo, status_revendedor) VALUES (?, ?, ?, ?, ?, 'Revendedor', 'pendente')");
                    $stmt->execute([$nome, $email, $senhaHash, $celular, $doc]);

                    $novoId = $db->lastInsertId();
                    if ($novoId) {
                        $_SESSION['usuario_id'] = $novoId;
                        header('Location: minhaConta.php');
                        exit;
                    } else {
                        $erro = 'Erro ao registrar solicitação de revenda.';
                    }
                }
            } else {
                $erro = 'Preencha os campos obrigatórios da solicitação.';
            }
        }
    } catch (PDOException $e) {
        $erro = '<strong>Erro no Banco de Dados:</strong> ' . htmlspecialchars($e->getMessage());
    }
}

renderHeader('Entrar / Criar Conta');
?>

<style>
.secao-auth { padding: 50px 20px; color: #e0e0e0; }
.box-auth-wrapper {
    max-width: 520px; margin: 0 auto; background: #182232;
    border-radius: 12px; border: 1px solid #28364d;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4); overflow: hidden;
}
.seletor-perfil { display: flex; background: #0d121c; border-bottom: 2px solid #28364d; }
.btn-tipo-perfil {
    flex: 1; padding: 18px; background: transparent; border: none; color: #8899a6;
    font-size: 1rem; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
}
.btn-tipo-perfil.ativo { color: #C5A059; background: #182232; border-bottom: 3px solid #C5A059; }

.sub-abas-auth { display: flex; border-bottom: 1px solid #28364d; background: #131A26; }
.btn-sub-aba {
    flex: 1; padding: 14px; background: transparent; border: none; color: #8899a6;
    font-size: 0.92rem; font-weight: 600; cursor: pointer;
}
.btn-sub-aba.ativa { color: #ffffff; border-bottom: 2px solid #C5A059; background: #182232; }

.conteudo-auth-bloco { padding: 30px; }
.painel-perfil, .form-auth { display: none; }
.painel-perfil.ativo, .form-auth.ativo { display: block; }

.form-group-auth { margin-bottom: 18px; }
.form-group-auth label { display: block; margin-bottom: 8px; font-size: 0.88rem; color: #cccccc; }
.form-group-auth input {
    width: 100%; padding: 12px 14px; background: #131A26; border: 1px solid #28364d;
    border-radius: 6px; color: #ffffff; font-size: 0.95rem; box-sizing: border-box;
}
.form-group-auth input:focus { border-color: #C5A059; outline: none; }
.btn-auth-submit {
    width: 100%; padding: 14px; background: #C5A059; color: #131A26; border: none;
    border-radius: 6px; font-weight: bold; font-size: 1rem; cursor: pointer; margin-top: 10px;
}
.alerta-erro {
    background-color: #3d1c1c; color: #ff7878; border: 1px solid #632b2b;
    padding: 12px 15px; border-radius: 6px; font-size: 0.88rem; margin-bottom: 20px; word-break: break-word;
}
</style>

<section class="secao-auth">
    <div class="box-auth-wrapper">
        <div class="seletor-perfil">
            <button type="button" class="btn-tipo-perfil ativo" data-perfil="cliente">
                <i class="fa-solid fa-user"></i> Cliente
            </button>
            <button type="button" class="btn-tipo-perfil" data-perfil="revendedor">
                <i class="fa-solid fa-briefcase"></i> Revendedor
            </button>
        </div>

        <div class="conteudo-auth-bloco">
            <?php if (!empty($erro)): ?>
                <div class="alerta-erro"><i class="fa-solid fa-circle-exclamation"></i> <?php echo $erro; ?></div>
            <?php endif; ?>

            <!-- ABA CLIENTE -->
            <div class="painel-perfil ativo" id="painel-cliente">
                <div class="sub-abas-auth">
                    <button type="button" class="btn-sub-aba ativa" data-sub="login-cliente">Entrar</button>
                    <button type="button" class="btn-sub-aba" data-sub="cadastrar-cliente">Criar Conta</button>
                </div>

                <form action="login.php" method="POST" class="form-auth ativo" id="form-login-cliente" style="margin-top: 20px;">
                    <input type="hidden" name="acao" value="login_cliente">
                    <div class="form-group-auth">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="seuemail@exemplo.com" required>
                    </div>
                    <div class="form-group-auth">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn-auth-submit">Entrar como Cliente</button>
                </form>

                <form action="login.php" method="POST" class="form-auth" id="form-cadastrar-cliente" style="margin-top: 20px;">
                    <input type="hidden" name="acao" value="cadastrar_cliente">
                    <div class="form-group-auth">
                        <label>Nome Completo</label>
                        <input type="text" name="nome" placeholder="Seu nome completo" required>
                    </div>
                    <div class="form-group-auth">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="seuemail@exemplo.com" required>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <div class="form-group-auth" style="flex: 1;">
                            <label>CPF</label>
                            <input type="text" name="cpf" placeholder="000.000.000-00">
                        </div>
                        <div class="form-group-auth" style="flex: 1;">
                            <label>Celular / WhatsApp</label>
                            <input type="text" name="celular" placeholder="(11) 99999-8888">
                        </div>
                    </div>
                    <div class="form-group-auth">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Crie uma senha" required>
                    </div>
                    <button type="submit" class="btn-auth-submit">Criar Minha Conta</button>
                </form>
            </div>

            <!-- ABA REVENDEDOR -->
            <div class="painel-perfil" id="painel-revendedor">
                <div class="sub-abas-auth">
                    <button type="button" class="btn-sub-aba ativa" data-sub="login-revendedor">Entrar</button>
                    <button type="button" class="btn-sub-aba" data-sub="cadastrar-revendedor">Seja Nosso Revendedor</button>
                </div>

                <form action="login.php" method="POST" class="form-auth ativo" id="form-login-revendedor" style="margin-top: 20px;">
                    <input type="hidden" name="acao" value="login_revendedor">
                    <div class="form-group-auth">
                        <label>E-mail ou CNPJ</label>
                        <input type="text" name="email" placeholder="revendedor@exemplo.com ou CNPJ" required>
                    </div>
                    <div class="form-group-auth">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn-auth-submit">Entrar na Área do Revendedor</button>
                </form>

                <form action="login.php" method="POST" class="form-auth" id="form-cadastrar-revendedor" style="margin-top: 20px;">
                    <input type="hidden" name="acao" value="cadastrar_revendedor">
                    <div class="form-group-auth">
                        <label>Nome Completo / Razão Social</label>
                        <input type="text" name="nome" placeholder="Sua empresa ou seu nome" required>
                    </div>
                    <div class="form-group-auth">
                        <label>E-mail Comercial</label>
                        <input type="email" name="email" placeholder="comercial@exemplo.com" required>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <div class="form-group-auth" style="flex: 1;">
                            <label>CPF ou CNPJ</label>
                            <input type="text" name="documento" placeholder="00.000.000/0001-00">
                        </div>
                        <div class="form-group-auth" style="flex: 1;">
                            <label>WhatsApp</label>
                            <input type="text" name="celular" placeholder="(11) 99999-8888" required>
                        </div>
                    </div>
                    <div class="form-group-auth">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Crie uma senha" required>
                    </div>
                    <button type="submit" class="btn-auth-submit">Enviar Solicitação de Revenda</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.querySelectorAll('.btn-tipo-perfil').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.btn-tipo-perfil').forEach(b => b.classList.remove('ativo'));
        document.querySelectorAll('.painel-perfil').forEach(p => p.classList.remove('ativo'));
        this.classList.add('ativo');
        document.getElementById('painel-' + this.dataset.perfil).classList.add('ativo');
    });
});

document.querySelectorAll('.btn-sub-aba').forEach(btn => {
    btn.addEventListener('click', function() {
        const parent = this.closest('.painel-perfil');
        parent.querySelectorAll('.btn-sub-aba').forEach(b => b.classList.remove('ativa'));
        parent.querySelectorAll('.form-auth').forEach(f => f.classList.remove('ativo'));
        this.classList.add('ativa');
        document.getElementById('form-' + this.dataset.sub).classList.add('ativo');
    });
});
</script>

<?php renderFooter(); ?>