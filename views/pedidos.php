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
                <label for="numeroNota" class="form-label">Número da fiscal</label>
                <input type="text" name="numeroNota" class="form-control" id="numeroPedido" placeholder="Digite o número da nota fiscal...">
            </div>
            <div class="col-lg-3 col-md-4 d-grid">
                <button type="submit" name="consultar_pedido" class="btn btn-primary">
                    <i class="bi bi-search"></i> Consultar Nota
                </button>
            </div>
        </form>







        <div class="card shadow">
            <div class="card-header text-white text-center" style="background-color: #3e84b0;">
                Lista de Pedidos
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>DATA</th>
                            <th>Remetente</th>
                            <th>Destinatário</th>
                            <th>Nota</th>
                            <th>Status</th>

                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $valor): ?>
                            <tr>
                                <td><?= date('d/m/Y', timestamp: strtotime($valor->data)) ?></td>
                                <td><?= $valor->remetente_nome ?></td>
                                <td><?= $valor->destinatario_nome ?></td>
                                <td><?= $valor->nota_numero ?></td>
                                <td><?= $valor->status_pedido  ?></td>

                                <td class="text-center">
                                    <button class="btn btn-light btn-sm btn-outline-info"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal_visualizar_pedido<?= $valor->id_pedidos ?>">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1"
                                        title="Editar Status da Rota"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal_editar_status_rota<?= $valor->id_pedidos ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>


                                    <a href="index.php?excluir_cotacao=<?= $cotacao['id'] ?>" class="btn btn-sm btn-outline-danger" title="Excluir" onclick="return confirm('Deseja realmente excluir esta cotação?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>

        </div>

        <?php foreach ($resultado as $pedido): ?>
            <div class="modal fade" id="modal_visualizar_pedido<?= $pedido->id_pedidos ?>" tabindex="-1" aria-labelledby="modalLabel<?= $pedido->id_pedidos ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <h5 class="modal-title" id="modalLabel<?= $pedido->id_pedidos ?>">Detalhes do Pedido #<?= $pedido->id_pedidos ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <h6><strong>Remetente:</strong></h6>
                            <p><strong>Nome:</strong> <?= $pedido->remetente_nome ?></p>
                            <p><strong>CPF/CNPJ:</strong> <?= $pedido->remetente_cpf_cnpj ?></p>
                            <p><strong>Endereço:</strong> <?= $pedido->remetente_endereco ?>, <?= $pedido->remetente_numero ?> - <?= $pedido->remetente_cep ?></p>

                            <p><strong>Cadigo de reastreio:</strong> <?= $pedido->codigo_rastreamento ?></p>


                            <hr>

                            <h6><strong>Pedido:</strong></h6>
                            <p><strong>Número do Pedido:</strong> <?= $pedido->pedido_numero ?></p>
                            <p><strong>Número da Nota:</strong> <?= $pedido->nota_numero ?></p>
                            <p><strong>Chave da Nota:</strong> <?= $pedido->chave_nota ?></p>
                            <p><strong>Data de criação:</strong> <?= date('d/m/Y', timestamp: strtotime($valor->data)) ?></p>


                            <hr>

                            <h6><strong>Destinatário:</strong></h6>
                            <p><strong>Nome:</strong> <?= $pedido->destinatario_nome ?></p>
                            <p><strong>CPF/CNPJ:</strong> <?= $pedido->destinatario_cpf_cnpj ?></p>
                            <p><strong>Endereço:</strong> <?= $pedido->destinatario_endereco ?>, <?= $pedido->destinatario_numero ?> - <?= $pedido->destinatario_cep ?></p>

                            <hr>

                            <h6><strong>Arquivo:</strong></h6>
                            <?php if (!empty($pedido->arquivo_nome)): ?>
                                <a href="uploads/<?= $pedido->arquivo_nome ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-file-earmark-arrow-down"></i> Baixar Arquivo
                                </a>
                            <?php else: ?>
                                <p class="text-muted">Nenhum arquivo anexado.</p>
                            <?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>



        <?php foreach ($resultado as $v):
            $this->modal_visualizar_pedidos(
                $v->id_pedidos,
                $v->remetente_cpf_cnpj,
                $v->remetente_nome,
                $v->remetente_cep,
                $v->remetente_endereco,
                $v->remetente_numero,

                $v->pedido_numero,
                $v->nota_numero,
                $v->chave_nota,

                $v->destinatario_cpf_cnpj,
                $v->destinatario_nome,
                $v->destinatario_cep,
                $v->destinatario_endereco,
                $v->destinatario_numero,
                $v->arquivo_nome
            );

        ?>
        <?php endforeach; ?>



        <?php foreach ($resultado as $pedido): ?>
    <div class="modal fade" id="modal_editar_status_rota<?= $pedido->id_pedidos ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Atualizar Status - Pedido #<?= $pedido->id_pedidos ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pedido" value="<?= $pedido->id_pedidos ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select status-select" name="status_pedido" data-id="<?= $pedido->id_pedidos ?>" required>
                                <option disabled selected>Selecione</option>
                                <option value="Entregue">Entregue</option>
                                <option value="Recusado">Recusado</option>
                                <option value="Agendado">Agendado</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>

                        <div class="mb-3 comprovante-div" id="comprovante_div_<?= $pedido->id_pedidos ?>" style="display:none;">
                            <label class="form-label">Comprovante de Entrega</label>
                            <input type="file" class="form-control" name="comprovante_entrega" accept="image/*,application/pdf">
                            <small class="text-muted">Obrigatório apenas para status "Entregue".</small>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="alterar_status_pedido" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function () {
            const id = this.dataset.id;
            const div = document.getElementById('comprovante_div_' + id);
            if (this.value === 'Entregue') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        });
    });
</script>









        <!-- Scripts Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>