<h1>Lista de Usuários</h1>
<ul>
    <?php foreach ($usuarios as $usuario): ?>
        <li><?= htmlspecialchars($usuario['nome']) ?></li>
    <?php endforeach; ?>
</ul>
<a href="<?= BASE_URL ?>">Voltar</a>
