<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreamento de AWB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #resultado {
            display: none; /* Esconde o resultado inicialmente */
        }
    </style>
</head>
<body>
    <br><br>

<div class="container mt-5">
    <h2 class="text-center">Rastreamento de AWB</h2>

    <!-- Formulário de Rastreio -->
    <form id="form-rastreio" class="mt-4">
        <div class="mb-3">
            <label for="codigo_awb" class="form-label">Digite o código AWB:</label>
            <input type="text" class="form-control" id="codigo_awb" name="codigo_awb" required placeholder="Ex: AWB123456">
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Rastrear</button>
        </div>
    </form>

    <!-- Exibição do Resultado -->
    <div id="resultado" class="mt-4">
        <h4>Resultado do Rastreamento:</h4>
        <p id="status">Carregando...</p>
        <p id="localizacao">Localização: Carregando...</p>
        <p id="data_atualizacao">Última Atualização: Carregando...</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Função que simula a consulta do AWB
    const rastrearAWB = (codigoAWB) => {
        // Simulando os dados de rastreamento para diferentes códigos AWB
        const rastreios = {
            "AWB123456": {
                status: "Saiu do centro de distribuição",
                localizacao: "Centro de Distribuição A",
                data_atualizacao: "2025-04-13 08:00:00"
            },
            "AWB789101": {
                status: "Em trânsito",
                localizacao: "Rodovia X - Rota Y",
                data_atualizacao: "2025-04-13 10:15:00"
            },
            "AWB112233": {
                status: "Entregue",
                localizacao: "Endereço de destino",
                data_atualizacao: "2025-04-12 15:30:00"
            }
        };

        // Verifica se o AWB existe no nosso "banco de dados"
        if (rastreios[codigoAWB]) {
            return rastreios[codigoAWB];
        } else {
            return null; // AWB não encontrado
        }
    };

    // Captura o evento de submit do formulário
    document.getElementById('form-rastreio').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio do formulário

        const codigoAWB = document.getElementById('codigo_awb').value.trim();
        const resultadoDiv = document.getElementById('resultado');
        
        // Limpa resultados anteriores
        document.getElementById('status').innerText = 'Carregando...';
        document.getElementById('localizacao').innerText = 'Localização: Carregando...';
        document.getElementById('data_atualizacao').innerText = 'Última Atualização: Carregando...';

        // Simula o rastreamento
        const rastreio = rastrearAWB(codigoAWB);

        if (rastreio) {
            // Exibe o resultado
            document.getElementById('status').innerText = `Status: ${rastreio.status}`;
            document.getElementById('localizacao').innerText = `Localização: ${rastreio.localizacao}`;
            document.getElementById('data_atualizacao').innerText = `Última Atualização: ${rastreio.data_atualizacao}`;
        } else {
            // Caso o AWB não seja encontrado
            document.getElementById('status').innerText = 'AWB não encontrado.';
            document.getElementById('localizacao').innerText = '';
            document.getElementById('data_atualizacao').innerText = '';
        }

        // Exibe o resultado
        resultadoDiv.style.display = 'block';
    });
</script>

</body>
</html>
