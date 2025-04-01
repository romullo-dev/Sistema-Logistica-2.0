<?php

require_once __DIR__ . '/../controllers/Controller.class.php';

//session_start();



?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Funcionario</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <?php /*print $menu*/ ?>
    </header>

    <main>
        <div class="container mt-4">
            <form action="../router.php" method="post" id="funcionarioForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" id="nomeCompleto"   name="nomeCompleto" class="form-control" placeholder="Ex.: Maria Oliveira" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf"  name="cpf" class="form-control" placeholder="Ex.: 123.456.789-00" maxlength="11" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">User</label>
                        <input type="user"  name="user" id="user" class="form-control" placeholder="user" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="text" id="senha" name="senha" class="form-control" placeholder="Ex.: 1234" maxlength="14" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" id="dataNascimento"  name="dataNascimento" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="tel" id="telefone"  name="telefone" class="form-control" placeholder="Ex.: (11) 91234-5678" maxlength="15" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Ex.: Rua das Palmeiras, 123 - São Paulo/SP" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cargo" class="form-label">Tipo</label>
                        <select id="id_tipo" name="id_tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="1">Rastreador</option>
                            <option value="2">Motorista</option>
                            <option value="3">Administrador</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dataContratacao" class="form-label">Data de Contratação</label>
                        <input type="date" id="dataContratacao" name="dataContratacao" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="salario" class="form-label">Salário (R$)</label>
                        <input type="number" name="salario" id="salario" class="form-control" placeholder="Ex.: 3500.00" min="0" step="0.01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="id_status_func" class="form-label">Status do Funcionário</label>
                        <select id="id_status_func" name="id_status_func" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit"  name="cadastroUsuario" class="btn btn-success">Cadastrar Funcionário</button>
                    <button type="reset" class="btn btn-danger">Limpar Campos</button>
                </div>
            </form>
    </main>
    <footer class="text-center mt-4">
        <p>Transportadora DNA - Todos os direitos reservados.</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>