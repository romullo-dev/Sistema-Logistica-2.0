<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/CSS/usuarios.css">

    <title>Consulta de Usuários</title>
</head>

<body>

    <?= $menu ?>
    <br><br>

    <!-- Botão para adicionar novo motorista -->
    <div class="d-flex justify-content-end mb-3">
        <button class="btn text-white" style="background-color: #3e84b0;" data-bs-toggle="modal" data-bs-target="#modalInserirMotorista">
            <i class="bi bi-truck"></i> Adicionar Motorista
        </button>
    </div>

    <!-- Card de consulta -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <form method="post" action="index.php" class="row g-4 align-items-end">
                <div class="col-lg-9 col-md-8">
                    <label for="nomeMotorista" class="form-label">Nome do Motorista</label>
                    <input type="text" name="nomeMotorista" class="form-control" placeholder="Digite o nome...">
                </div>
                <div class="col-lg-3 col-md-4 d-grid">
                    <button type="submit" name="consultar_motorista" class="btn btn-primary">
                        <i class="bi bi-search"></i> Consultar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Listagem de motoristas -->
    <div class="card shadow">
        <div class="card-header text-white text-center" style="background-color: #3e84b0;">
            Lista de Motoristas
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($motoristas as $motorista): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 position-relative">
                            <!-- Dropdown -->
                            <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
                                <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                    <li>
                                        <button class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_motorista<?= $motorista->id_Motorista ?>">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal_excluir_motorista<?= $motorista->id_Motorista ?>">
                                            <i class="bi bi-trash"></i> Excluir
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <!-- Card Info -->
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/../uploads/<?= $motorista->foto ?>"
                                        onerror="this.src='assets/img/default.png'"
                                        class="rounded-circle border"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h5 class="mb-0"><?= $motorista->nomeCompleto ?></h5>
                                        <small class="text-muted"><?= $motorista->email ?></small>
                                    </div>
                                </div>
                                <p class="mb-1"><i class="bi bi-phone text-primary"></i> <?= $motorista->telefone ?></p>
                                <p class="mb-1"><i class="bi bi-credit-card-2-front text-primary"></i> CPF: <?= $motorista->cpf ?></p>
                                <p class="mb-1"><i class="bi bi-card-heading text-primary"></i> CNH: <?= $motorista->cnh ?></p>
                                <p class="mb-1"><i class="bi bi-tags text-primary"></i> Categoria: <?= $motorista->categoria ?></p>
                                <p class="mb-1"><i class="bi bi-calendar-event text-primary"></i> Validade: <?= $motorista->validade_cnh ?></p>
                                <p>
                                    <i class="bi bi-circle-half text-primary"></i>
                                    <?php if ($motorista->status === 'Ativo'): ?>
                                        <span class="badge bg-success">Ativo</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inativo</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal Inserir Motorista -->
    <div class="modal fade" id="modalInserirMotorista" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #3e84b0;">
                    <h5 class="modal-title"><i class="bi bi-truck-front"></i> Novo Motorista</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" maxlength="11" placeholder="Digite o CPF" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nomeCompleto" class="form-label">Nome Completo</label>
                                <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" placeholder="Nome será preenchido automaticamente" readonly>
                            </div>

                            <input type="hidden" name="funcionario_id" id="funcionario_id">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">CNH</label>
                            <input type="text" name="cnh" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Categoria</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Selecione...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Validade CNH</label>
                            <input type="date" name="validade_cnh" class="form-control" required>
                        </div>

                </div>
                <div class="mt-3">
                    <button type="submit" name="cadastrar_motorista" class="btn btn-success" style="background-color: #3e84b0;">Cadastrar</button>
                    <button type="reset" class="btn btn-danger">Limpar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>






















    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cpfInput = document.getElementById('cpf');

            if (cpfInput) {
                cpfInput.addEventListener('blur', () => {
                    const cpf = cpfInput.value.trim();

                    if (cpf.length >= 11) {
                        fetch('router.php?acao=buscarCpf', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: 'cpf=' + encodeURIComponent(cpf)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('nomeCompleto').value = data.nome;
                                    document.getElementById('funcionario_id').value = data.id_usuario;
                                } else {
                                    document.getElementById('nomeCompleto').value = '';
                                    document.getElementById('funcionario_id').value = '';
                                    alert('Usuário não encontrado!');
                                }
                            })
                            .catch(error => {
                                console.error('Erro ao buscar usuário:', error);
                            });
                    }
                });
            }
        });
    </script>


</body>

</html>