<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <title>Home - Sistema Logística</title>

    <style>
        /* Estilo do corpo */
        body {
            background: linear-gradient(120deg, #1e3c72, #2a5298);
            color: white;
            font-family: 'Arial', sans-serif;
        }

        /* Cabeçalho fixo */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .navbar .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff !important;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-size: 1.2rem;
        }

        .navbar .nav-link:hover {
            color: #f39c12 !important;
        }

        /* Ajustes de margem para o conteúdo */
        .content {
            margin-top: 80px;
        }

        /* Card Customizado */
        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            text-align: center;
        }

        /* Botão de ação */
        .btn-custom {
            background-color: #f39c12;
            color: white;
            font-size: 1.2rem;
            padding: 15px 30px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #e67e22;
            color: #fff;
        }

        /* Título da página */
        .page-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            font-weight: bold;
            color: #f39c12;
        }

        /* Estilos para o layout de cards */
        .card-deck {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card-deck .card {
            width: 18rem;
            margin: 15px;
        }

        /* Efeito de loading (exemplo de feedback visual) */
        .loading {
            font-size: 1.5rem;
            color: #f39c12;
        }
    </style>
</head>

<body>

    <!-- Menu de Navegação -->
    <?php print $menu ?>

    <!-- Conteúdo da Página -->
    <div class="content">
        <h1 class="page-title">Bem-vindo ao Sistema Logística</h1>

        <!-- Cards de Ações -->
        <div class="card-deck">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rastrear AWB</h5>
                    <p class="card-text">Acesse o status do seu AWB em tempo real.</p>
                    <a href="rastreio.php" class="btn btn-custom">Rastrear</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">Visualize os pedidos ativos e históricos.</p>
                    <a href="pedidos.php" class="btn btn-custom">Ver Pedidos</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estatísticas</h5>
                    <p class="card-text">Acompanhe as métricas e performance da logística.</p>
                    <a href="estatisticas.php" class="btn btn-custom">Ver Estatísticas</a>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>