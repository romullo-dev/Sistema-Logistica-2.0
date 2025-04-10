<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/CSS/usuarios.css">

  <title>Veículos</title>
</head>

<body>
  <div class="container py-5">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-primary">
        <i class="bi bi-truck-front-fill me-2"></i>Veículos
      </h2>
      <button class="btn text-white" style="background-color: #3e84b0;" data-bs-toggle="modal"
        data-bs-target="#modalCadastroVeiculo">
        <i class="bi bi-truck"></i> Adicionar Veículo
      </button>
    </div>

    <!-- Filtro de busca -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
      <div class="card-body py-3 px-4">
        <form class="row g-2 align-items-center">
          <div class="col-md-10">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search text-muted"></i>
              </span>
              <input type="text" class="form-control border-start-0"
                placeholder="Buscar por placa, modelo, marca ou motorista...">
            </div>
          </div>
          <div class="col-md-2 text-end">
            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">
              <i class="bi bi-funnel-fill me-1"></i> Filtrar
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Aqui entraria a listagem dos veículos com PHP -->
    <div class="alert alert-info text-center">
      Listagem de veículos aqui...
    </div>

  </div>

  <!-- Modal de Cadastro de Veículo -->
  <div class="modal fade" id="modalCadastroVeiculo" tabindex="-1" aria-labelledby="modalCadastroVeiculoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-4 border-0 shadow">

        <!-- Cabeçalho -->
        <div class="modal-header bg-primary text-white rounded-top-4">
          <h5 class="modal-title" id="modalCadastroVeiculoLabel">
            <i class="bi bi-truck-front-fill me-2"></i>Cadastro de Veículo
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
            aria-label="Fechar"></button>
        </div>

        <!-- Corpo -->
        <div class="modal-body">
          <form action="index.php" method="post" >
            <div class="row g-3">

              <div class="col-md-4">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="ABC-1234">
              </div>

              <div class="col-md-4">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo"placeholder="Ex: Strada">
              </div>

              <div class="col-md-4">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: Fiat">
              </div>

              <div class="col-md-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano" placeholder="2023">
              </div>

              <div class="col-md-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" placeholder="Ex: Branco">
              </div>

              <div class="col-md-6">
                <label for="status" class="form-label">Status do Veículo</label>
                <select class="form-select" name="status_veiculo" id="status">
                  <option selected disabled>Selecione o status</option>
                  <option value="Ativo">Disponível</option>
                  <option value="em_uso">Em Uso</option>
                  <option value="Manutenção">Em Manutenção</option>
                  <option value="Inativo">Inativo</option>
                </select>
              </div>

              <div class="col-12">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control" name="observacoes" id="observacoes" rows="3"
                  placeholder="Ex: Última revisão feita em 01/2025..."></textarea>
              </div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i>Cancelar
          </button>
          <button type="submit" name="inserir_veiculo" class="btn btn-primary">
            <i class="bi bi-save2-fill me-1"></i>Salvar
          </button>
        </div>

        </form>


      </div>
    </div>
  </div>

  <!-- Scripts do Bootstrap (JS + Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
