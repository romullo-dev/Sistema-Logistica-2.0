<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreamento de Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .btn-primary {
            width: 100%;
            border-radius: 0.375rem;
        }

        .card {
            margin-top: 20px;
        }

        .alert-info {
            margin-top: 20px;
        }
    </style>
</head>

<body>


    <?= $menu ?>

    <br><br> <br><br>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Rastreamento de Pedido</h2>

                <!-- Formulário de rastreio -->
                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <label for="pedido_id" class="form-label">Digite o código de rastreio :</label>
                        <input type="text" class="form-control" name="pedido_id" id="pedido_id" placeholder="Digite o código de rastreio" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #3e84b0; border: none;" name="consultar_rastreio">Rastrear Pedido</button>
                </form>

                <?php if (isset($pedido)) { ?>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title">Detalhes do Pedido</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Código de Rastreio:</strong> <?= $pedido['codigo_rastreamento'] ?></p>
                            <p><strong>Cliente Remetente:</strong> <?= $pedido['remetente_nome'] ?></p>
                            <p><strong>Cliente Destinatario:</strong> <?= $pedido['destinatario_nome'] ?></p>
                            <hr>
                            <p><strong>Número do pedido:</strong> <?= $pedido['pedido_numero'] ?></p>
                            <p><strong>NF-e:</strong> <?= $pedido['nota_numero'] ?></p>
                            <hr>
                            <p><strong>Previsão de Entrega:</strong>
                                <?php
                                if (is_array($rota) && isset($rota['previsao']) && !empty($rota['previsao'])) {
                                    echo date('d/m/Y', strtotime($rota['previsao']));
                                } else {
                                    echo 'Data não disponível';
                                }
                                ?>
                            </p>

                            <hr>

                            <p><strong>Status do pedido: </strong><?= $pedido['status_pedido'] ?></p>
                        </div>
                    </div>
                <?php } elseif (isset($_POST['consultar_rastreio']) && !isset($pedido)) { ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        Pedido não encontrado! Por favor, verifique o código inserido.
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>