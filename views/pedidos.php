<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/CSS/pedidos.css">

    <title>Consulta de Pedidos</title>
</head>

<body>


    <div class="container-fluid py-5 px-4">
        <BR></BR>
        <br>

        <form method="post" action="index.php" class="row g-4 align-items-end">
            <div class="col-lg-9 col-md-8">
                <label for="numeroPedido" class="form-label">Número do Pedido</label>
                <input type="text" name="numeroPedido" class="form-control" id="numeroPedido" placeholder="Digite o número do pedido...">
            </div>
            <div class="col-lg-3 col-md-4 d-grid">
                <button type="submit" name="consultar_pedido" class="btn btn-primary">
                    <i class="bi bi-search"></i> Consultar Pedido
                </button>
            </div>
        </form>


        <form action="index.php" method="post">
            <button type="submit" name="aaaaaaaaaaaaa" ></button>
        </form>






        <div class="card shadow">
            <div class="card-header text-white text-center" style="background-color: #3e84b0;">
                Lista de Pedidos
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Remetente</th>
                            <th>Destinatário</th>
                            <th>Nota</th>
                            <th>Pedido</th>
                            <th>Rastreio</th>
                            <th>Data</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cotacoes as $cotacao): ?>
                            <tr>
                                <td><?= $cotacao['id'] ?></td>
                                <td><?= htmlspecialchars($cotacao['remetente_nome']) ?></td>
                                <td><?= htmlspecialchars($cotacao['destinatario_nome']) ?></td>
                                <td><?= $cotacao['numero_nota'] ?></td>
                                <td><?= $cotacao['numero_pedido'] ?></td>
                                <td><span class="badge bg-secondary"><?= $cotacao['codigo_rastreio'] ?></span></td>
                                <td><?= date('d/m/Y H:i', strtotime($cotacao['data_criacao'])) ?></td>
                                <td class="text-center">
                                    <a href="index.php?ver_cotacao=<?= $cotacao['id'] ?>" class="btn btn-sm btn-outline-info me-1" title="Visualizar">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="index.php?editar_cotacao=<?= $cotacao['id'] ?>" class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="index.php?excluir_cotacao=<?= $cotacao['id'] ?>" class="btn btn-sm btn-outline-danger" title="Excluir" onclick="return confirm('Deseja realmente excluir esta cotação?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (count($cotacoes) === 0): ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">Nenhuma cotação encontrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>






        <!-- Scripts Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>