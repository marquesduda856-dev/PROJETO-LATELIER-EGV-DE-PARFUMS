<?php
require_once 'init.php';

if (!usuarioLogado()) {
    header("Location: minhaConta.php");
    exit;
}

$db = getDb();
$usuario_id = $_SESSION['usuario_id'];

$stmt = $db->prepare("SELECT produto_id FROM favoritos WHERE usuario_id = ? ORDER BY criado_em DESC");
$stmt->execute([$usuario_id]);
$meus_favoritos = $stmt->fetchAll(PDO::FETCH_COLUMN);

renderHeader('Meus Favoritos');
?>

<main class="account-container">
    <div class="account-card" style="padding: 30px;">
        <h2 style="color: var(--cor-dourado, #C5A059); margin-bottom: 20px;">❤️ Meus Produtos Favoritos</h2>

        <?php if (empty($meus_favoritos)): ?>
            <p style="color: var(--texto-cinza, #94A3B8);">Você ainda não favoritou nenhum produto.</p>
            <a href="produtos.php" class="btn-dourado" style="margin-top: 15px; display: inline-block; width: auto;">Explorar Produtos</a>
        <?php else: ?>
            <div style="display: grid; gap: 15px;">
                <?php foreach ($meus_favoritos as $prod_id): ?>
                    <div style="background: #0B0F17; padding: 15px; border-radius: 6px; border: 1px solid #1E293B; display: flex; justify-content: space-between; align-items: center;">
                        <span><strong>Código do Produto:</strong> <?php echo htmlspecialchars($prod_id); ?></span>
                        <button onclick="favoritarProduto('<?php echo $prod_id; ?>', this)" class="btn-outline-dourado" style="width: auto; padding: 6px 12px; font-size: 0.8rem;">Remover ❤</button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<script>
function favoritarProduto(produtoId, btn) {
    fetch('favoritos_api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ produto_id: produtoId })
    })
    .then(res => res.json())
    .then(data => {
        if(data.sucesso) {
            location.reload();
        } else {
            alert(data.mensagem);
        }
    });
}
</script>

<?php renderFooter(); ?>