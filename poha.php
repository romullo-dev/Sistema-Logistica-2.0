<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modal_excluir_veiculo<?= $v->id_veiculo ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Excluir Veículo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir o veículo <strong><?= $v->modelo ?></strong> - <strong><?= $v->placa ?></strong>?
                </div>
                <form method="post" action="index.php">
                    <div class="modal-footer">
                        <input type="hidden" name="id_veiculo" value="<?= $v->id_veiculo ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="excluir_veiculo" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR -->
    <div class="modal fade" id="modal_editar_veiculo<?= $v->id_veiculo ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #3e84b0;">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Editar Veículo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="index.php">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_veiculo" value="<?= $v->id_veiculo ?>">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Placa</label>
                                <input type="text" class="form-control" name="placa" value="<?= $v->placa ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Modelo</label>
                                <input type="text" class="form-control" name="modelo" value="<?= $v->modelo ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Marca</label>
                                <input type="text" class="form-control" name="marca" value="<?= $v->marca ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Ano</label>
                                <input type="number" class="form-control" name="ano" value="<?= $v->ano ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Cor</label>
                                <input type="text" class="form-control" name="cor" value="<?= $v->cor ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status_veiculo" required>
                                    <option value="Ativo" <?= $v->status_veiculo == 'Ativo' ? 'selected' : '' ?>>Ativo</option>
                                    <option value="Manutenção" <?= $v->status_veiculo == 'Manutenção' ? 'selected' : '' ?>>Manutenção</option>
                                    <option value="Inativo" <?= $v->status_veiculo == 'Inativo' ? 'selected' : '' ?>>Inativo</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Observações</label>
                                <textarea class="form-control" name="observacoes" rows="3"><?= $v->observacoes ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="editar_veiculo" class="btn text-white" style="background-color: #3e84b0;">Salvar Alterações</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
