<?php
header("Content-Type: application/json");
error_reporting(~E_ALL & ~E_NOTICE & ~E_WARNING);
define('API_TOKEN', '781e5e245d69b566979b86e28d23f2c7');

function verificarToken($headers)
{
    if (!isset($headers['Authorization'])) return false;
    if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
        return $matches[1] === API_TOKEN;
    }
    return false;
}

$headers = getallheaders();
if (!verificarToken($headers)) {
    http_response_code(401);
    echo json_encode(['erro' => 'Token inválido ou ausente.']);
    exit;
}

require_once 'autoload.php';
$rota = new Rotas();

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {

    case 'GET':
        $dados = $rota->exibir_Rotas();
        echo json_encode($dados);
        break;

    case 'POST':
        if (!$input) {
            http_response_code(400);
            echo json_encode(['erro' => 'Dados JSON ausentes.']);
            break;
        }

        $ok = $rota->inserir_rotas(
            $input['tipo_rota'],
            $input['nome_rota'],
            $input['origem'],
            $input['destino'],
            $input['previsao'],
            $input['data_saida'],
            $input['motorista_id'],
            $input['veiculo_id'],
            $input['observacoes'],
            $input['status_rota'],
            $input['distancia'],
            $input['chaves']
        );

        echo json_encode(['sucesso' => $ok]);
        break;

    case 'PUT':
        if (!$input || !isset($input['id_Rotas']) || !isset($input['status_rota'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Parâmetros inválidos para atualização.']);
            break;
        }

        $ok = $rota->alterRota($input['id_Rotas'], $input['status_rota']);
        echo json_encode(['sucesso' => $ok]);
        break;

    case 'DELETE':
        http_response_code(405);
        echo json_encode(['erro' => 'Método DELETE não implementado.']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'Método HTTP não suportado.']);
        break;
}
