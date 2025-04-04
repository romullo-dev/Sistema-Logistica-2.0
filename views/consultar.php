<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title></title>
</head>

<body>

    <?php print $menu ?>
    <div class="container-fluid">
        <br>
        <form method="post" action="index.php">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nome_autor" class="form-label">Nome Autor</label>
                        <input type="text" name="nome_autor" class="form-control" id="nome_cliente" placeholder="Digite o autor...">
                    </div>
                </div>
                <div>
                <button type="submit" name="consultar_autor" class="btn btn-primary"><i class="bi bi-search"></i> Consultar</button>
        </form>
        <br>
    </div>

    <pre><?php //print_r($resultado); ?></pre>


    <?php //print_r ($resultado); ?>

    <div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Usuário</th>
                <th>Senha</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th>CPF</th>
                <th>Salário</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
                <th>Data de Contratação</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $key => $valor) {
                print '<tr>';
                print '  <th scope="row">' . $valor->id_usuario . '</th>';
                print '  <td>' . $valor->nomeCompleto . '</td>';
                print '  <td>' . $valor->user . '</td>';
                print '  <td>' . $valor->senha . '</td>';
                print '  <td>' . $valor->telefone . '</td>';
                print '  <td>' . $valor->id_tipo . '</td>';
                print '  <td>' . $valor->cpf . '</td>';
                print '  <td>' . $valor->salario . '</td>';
                print '  <td>' . $valor->endereco . '</td>';
                print '  <td>' . $valor->dataNascimento . '</td>';
                print '  <td>' . $valor->dataContratacao . '</td>';
                print '  <td>' . $valor->id_status_func . '</td>';
                print '  <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#alterar_usuario' . $valor->id_usuario . '"><i class="bi bi-pencil-square"></i> Alterar</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_usuario' . $valor->id_usuario . '"><i class="bi bi-x-square-fill"></i> Excluir</button>
                        </td>';
                print '</tr>';
           }
            ?>
        </tbody>
    </table>
</div>

</div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
