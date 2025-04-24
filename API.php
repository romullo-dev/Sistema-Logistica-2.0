<?php

header("Content-Type: application/json");

error_reporting(~E_ALL & ~E_NOTICE & ~E_WARNING);


include_once 'autoload.php';

$method = $_SERVER['REQUEST_METHOD'];

$input = json_decode(file_get_contents('php://input'), true);


switch ($method) {
    case 'GET':
        try {
            $OBJVeiculo = new Veiculo();

            $veiculos = $OBJVeiculo->mostrarVeiculo($input['placa']);

            print json_encode($veiculos);


        } catch (PDOException $e) {
            print json_encode(value: ['error' => $e->getMessage()]);
        }

        break;

        case 'POST':
            if (
                isset($input['placa']) &&
                isset($input['modelo']) &&
                isset($input['marca']) &&
                isset($input['ano']) &&
                isset($input['cor']) &&
                isset($input['status_veiculo']) &&
                isset($input['observacoes'])
            ) {
                try {
                    $OBJVeiculo = new Veiculo();
                    $veiculos = $OBJVeiculo->InserirVeiculo(
                        $input['placa'],
                        $input['modelo'],
                        $input['marca'],
                        $input['ano'],
                        $input['cor'],
                        $input['status_veiculo'],
                        $input['observacoes']
                    );
                    echo json_encode(['sucesso' => true]);
                } catch (PDOException $e) {
                    echo json_encode(['error' => $e->getMessage()]);
                }
            } else {
                echo json_encode(['error' => "Os dados são obrigatórios!"]);
            }
            break;
    
    default:
        # code...
        break;
}

