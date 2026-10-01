<?php
require_once 'init.php';

// SE NÃO ESTIVER LOGADO NO BANCO, REDIRECIONA PARA LOGIN
if (!usuarioLogado()) {
    header('Location: login.php');
    exit;
}

$usuario = getUsuarioLogado();

// Se o ID da sessão não existir na tabela de usuários
if (!$usuario) {
    unset($_SESSION['usuario_id']);
    header('Location: login.php');
    exit;
}

$mensagemSucesso = '';
$erro = '';

// Atualizar dados cadastrais
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar_perfil') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (!empty($nome) && !empty($email)) {
        try {
            $db = getDb();
            $stmt = $db->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ? WHERE id = ?");
            $stmt->execute([$nome, $email, $telefone, $usuario['id']]);

            $mensagemSucesso = "Dados atualizados com sucesso!";
            $usuario = getUsuarioLogado(); // Recarrega os dados atualizados
        } catch (PDOException $e) {
            $erro = "Erro ao atualizar dados: " . $e->getMessage();
        }
    } else {
        $erro = "Por favor, preencha o nome e o e-mail.";
    }
}

renderHeader('Minha Conta');
?>

<style>
.secao-minha-conta { padding: 50px 20px; color: #e0e0e0; }
.container-minha-conta { max-width: 1100px; margin: 0 auto; }

.cabecalho-perfil {
    display: flex; align-items: center; gap: 20px; background: #182232;
    padding: 25px; border-radius: 8px; border: 1px solid #28364d; margin-bottom: 30px;
}
.avatar-perfil {
    width: 70px; height: 70px; border-radius: 50%; background: #C5A059; color: #131A26;
    display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: bold;
}
.info-perfil-topo h2 { margin: 0 0 5px 0; color: #ffffff; font-size: 1.5rem; }
.info-perfil-topo p { margin: 0; color: #8899a6; font-size: 0.95rem; }
.badge-tipo {
    display: inline-block; background: #C5A059; color: #131A26; font-size: 0.75rem;
    font-weight: bold; padding: 3px 8px; border-radius: 4px; margin-left: 8px; text-transform: uppercase;
}

.grid-painel-conta { display: grid; grid-template-columns: 260px 1fr; gap: 25px; }
@media (max-width: 768px) { .grid-painel-conta { grid-template-columns: 1fr; } }

.menu-lateral-conta { background: #182232; border-radius: 8px; border: 1px solid #28364d; overflow: hidden; height: fit-content; }
.item-menu-conta {
    display: flex; align-items: center; gap: 12px; padding: 15px 20px; color: #cccccc;
    text-decoration: none; background: transparent; border: none; width: 100%; text-align: left;
    font-size: 0.95rem; cursor: pointer; border-bottom: 1px solid #233044;
}
.item-menu-conta.ativo, .item-menu-conta:hover { background: #233044; color: #C5A059; border-left: 4px solid #C5A059; }

.conteudo-painel { background: #182232; border-radius: 8px; border: 1px solid #28364d; padding: 30px; }
.aba-conteudo { display: none; }
.aba-conteudo.ativa { display: block; }
.titulo-aba { margin-top: 0; color: #C5A059; font-size: 1.3rem; border-bottom: 1px solid #28364d; padding-bottom: 12px; margin-bottom: 25px; }

.form-conta .form-group { margin-bottom: 20px; }
.form-conta label { display: block; margin-bottom: 8px; color: #bbbbbb; font-size: 0.9rem; }
.form-conta input { width: 100%; padding: 12px; background: #131A26; border: 1px solid #28364d; border-radius: 5px; color: #ffffff; box-sizing: border-box; }
.btn-salvar-conta { background: #C5A059; color: #131A26; border: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; cursor: pointer; }

.alerta-sucesso-conta {
    background-color: #1b382b; color: #4cd98b; border: 1px solid #285e42;
    padding: 12px 20px; border-radius: 6px; margin-bottom: 20px;
}
.alerta-erro-conta {
    background-color: #3d1c1c; color: #ff7878; border: 1px solid #632b2b;
    padding: 12px 20px; border-radius: 6px; margin-bottom: 20px;
}
</style>

<section class="secao-minha-conta">
    <div class="container-minha-conta">

        <div class="cabecalho-perfil">
            <div class="avatar-perfil">
                <?php echo strtoupper(substr($usuario['nome'] ?? 'U', 0, 1)); ?>
            </div>
            <div class="info-perfil-topo">
                <h2>
                    Olá, <?php echo htmlspecialchars($usuario['nome']); ?>
                    <span class="badge-tipo"><?php echo htmlspecialchars($usuario['tipo'] ?? 'Cliente'); ?></span>
                </h2>
                <p><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($usuario['email']); ?></p>
            </div>
        </div>

        <?php if (!empty($mensagemSucesso)): ?>
            <div class="alerta-sucesso-conta"><i class="fa-solid fa-circle-check"></i> <?php echo $mensagemSucesso; ?></div>
        <?php endif; ?>

        <?php if (!empty($erro)): ?>
            <div class="alerta-erro-conta"><i class="fa-solid fa-circle-exclamation"></i> <?php echo $erro; ?></div>
        <?php endif; ?>

        <div class="grid-painel-conta">
            <nav class="menu-lateral-conta">
                <button type="button" class="item-menu-conta ativo" data-aba="meus-dados">
                    <i class="fa-solid fa-user"></i> Meus Dados
                </button>
                <button type="button" class="item-menu-conta" data-aba="meus-pedidos">
                    <i class="fa-solid fa-box-archive"></i> Meus Pedidos
                </button>
                <a href="login.php?action=logout" class="item-menu-conta" style="color: #ff6b6b;">
                    <i class="fa-solid fa-right-from-bracket"></i> Sair
                </a>
            </nav>

            <div class="conteudo-painel">
                <div class="aba-conteudo ativa" id="meus-dados">
                    <h3 class="titulo-aba"><i class="fa-solid fa-user-pen"></i> Editar Dados Cadastrais</h3>
                    
                    <form action="minhaConta.php" method="POST" class="form-conta">
                        <input type="hidden" name="acao" value="atualizar_perfil">
                        
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                        </div>

                        <div style="display: flex; gap: 15px;">
                            <div class="form-group" style="flex: 1;">
                                <label for="cpf">CPF / Documento</label>
                                <input type="text" id="cpf" value="<?php echo htmlspecialchars($usuario['cpf_cnpj'] ?? 'Não informado'); ?>" readonly style="opacity: 0.6;">
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label for="telefone">Celular / WhatsApp</label>
                                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone'] ?? ''); ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn-salvar-conta">Salvar Alterações</button>
                    </form>
                </div>

                <div class="aba-conteudo" id="meus-pedidos">
                    <h3 class="titulo-aba"><i class="fa-solid fa-clock-rotate-left"></i> Histórico de Pedidos</h3>
                    <p style="color: #8899a6;">Nenhum pedido realizado até o momento.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
document.querySelectorAll('.item-menu-conta[data-aba]').forEach(function(botao) {
    botao.addEventListener('click', function() {
        document.querySelectorAll('.item-menu-conta').forEach(b => b.classList.remove('ativo'));
        document.querySelectorAll('.aba-conteudo').forEach(a => a.classList.remove('ativa'));

        this.classList.add('ativo');
        const idAba = this.dataset.aba;
        document.getElementById(idAba).classList.add('ativa');
    });
});
</script>

<?php renderFooter(); ?>