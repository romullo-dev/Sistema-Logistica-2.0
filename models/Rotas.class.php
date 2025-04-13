<?php
require_once __DIR__ . "/Conexao.class.php";

class Rotas extends Conexao
{
    private $tipo_rota;
    private $nome_rota;
    private $origem;
    private $destino;
    private $previsao;
    private $data_saida;
    private $motorista_id;
    private $veiculo_id;
    private $observacoes;
    private $status_rota;
    private $distancia;
    private $chaves = []; // Mantém privada
    private $pedidos = []; // Mantém privada

    // Métodos setters e getters para cada variável
    public function setTipoRota($tipo_rota)
    {
        $this->tipo_rota = $tipo_rota;
        return $this;
    }

    public function setNomeRota($nome_rota)
    {
        $this->nome_rota = $nome_rota;
        return $this;
    }

    public function setOrigem($origem)
    {
        $this->origem = $origem;
        return $this;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
        return $this;
    }

    public function setPrevisao($previsao)
    {
        $this->previsao = $previsao;
        return $this;
    }

    public function setDataSaida($data_saida)
    {
        $this->data_saida = $data_saida;
        return $this;
    }

    public function setMotoristaId($motorista_id)
    {
        $this->motorista_id = $motorista_id;
        return $this;
    }

    public function setVeiculoId($veiculo_id)
    {
        $this->veiculo_id = $veiculo_id;
        return $this;
    }

    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
        return $this;
    }

    public function setStatusRota($status_rota)
    {
        $this->status_rota = $status_rota;
        return $this;
    }

    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;
        return $this;
    }

    // Setters e Getters para a propriedade `chaves`
    public function setChaves($chaves)
    {
        $this->chaves = $chaves;
        return $this;
    }

    public function getChaves()
    {
        return $this->chaves;
    }

    // Métodos getters (não alterados)
    public function getTipoRota() { return $this->tipo_rota; }
    public function getNomeRota() { return $this->nome_rota; }
    public function getOrigem() { return $this->origem; }
    public function getDestino() { return $this->destino; }
    public function getPrevisao() { return $this->previsao; }
    public function getDataSaida() { return $this->data_saida; }
    public function getMotoristaId() { return $this->motorista_id; }
    public function getVeiculoId() { return $this->veiculo_id; }
    public function getObservacoes() { return $this->observacoes; }
    public function getStatusRota() { return $this->status_rota; }
    public function getDistancia() { return $this->distancia; }

    // Método de inserção da rota (não alterado)
    public function inserir_rotas($tipo_rota, $nome_rota, $origem, $destino, $previsao, $data_saida, $motorista_id, $veiculo_id, $observacoes, $status_rota, $distancia, $chaves)
{
    // Definindo os parâmetros com os setters
    $this->setTipoRota($tipo_rota)
        ->setNomeRota($nome_rota)
        ->setOrigem($origem)
        ->setDestino($destino)
        ->setPrevisao($previsao)
        ->setDataSaida($data_saida)
        ->setMotoristaId($motorista_id)
        ->setVeiculoId($veiculo_id)
        ->setObservacoes($observacoes)
        ->setStatusRota($status_rota)
        ->setDistancia($distancia)
        ->setChaves($chaves); 

    $sql = "INSERT INTO tb_rotas (
                tipo_rota, nome_rota, origem, destino,
                previsao, data_saida, motorista_id,
                veiculo_id, observacoes, status_rota, distancia
            ) VALUES (
                :tipo_rota, :nome_rota, :origem, :destino,
                :previsao, :data_saida, :motorista_id,
                :veiculo_id, :observacoes, :status_rota, :distancia
            )";

    try {
        $db = $this->conectar();
        $query = $db->prepare($sql);

        // Bind dos valores
        $query->bindValue(':tipo_rota', $this->getTipoRota(), PDO::PARAM_STR);
        $query->bindValue(':nome_rota', $this->getNomeRota(), PDO::PARAM_STR);
        $query->bindValue(':origem', $this->getOrigem(), PDO::PARAM_STR);
        $query->bindValue(':destino', $this->getDestino(), PDO::PARAM_STR);
        $query->bindValue(':previsao', $this->getPrevisao(), PDO::PARAM_STR);
        $query->bindValue(':data_saida', $this->getDataSaida(), PDO::PARAM_STR);
        $query->bindValue(':motorista_id', $this->getMotoristaId(), PDO::PARAM_INT);
        $query->bindValue(':veiculo_id', $this->getVeiculoId(), PDO::PARAM_INT);
        $query->bindValue(':observacoes', $this->getObservacoes(), PDO::PARAM_STR);
        $query->bindValue(':status_rota', $this->getStatusRota(), PDO::PARAM_STR);
        $query->bindValue(':distancia', $this->getDistancia(), PDO::PARAM_STR);

        $query->execute();

        $rota_id = $db->lastInsertId();

        $sqlRelacionamento = "INSERT INTO tb_rota_pedidos (rota_id, pedido_id) VALUES (:rota_id, :pedido_id)";
        $queryRelacionamento = $db->prepare($sqlRelacionamento);

        $sqlBuscaPedido = "SELECT id_pedidos FROM tb_pedidos WHERE chave_nota = :chave_nfe";
        $queryBuscaPedido = $db->prepare($sqlBuscaPedido);

        foreach ($this->getChaves() as $chave_nfe) {
            $queryBuscaPedido->bindValue(':chave_nfe', $chave_nfe, PDO::PARAM_STR);
            $queryBuscaPedido->execute();
            $pedido = $queryBuscaPedido->fetch(PDO::FETCH_ASSOC);

            if ($pedido) {
                $queryRelacionamento->bindValue(':rota_id', $rota_id, PDO::PARAM_INT);
                $queryRelacionamento->bindValue(':pedido_id', $pedido['id_pedidos'], PDO::PARAM_INT);
                $queryRelacionamento->execute();
            }
        }

        return true; 
    } catch (PDOException $e) {
        print "Erro ao inserir rota: " . $e->getMessage();
        return false;
    }
}


public function exibir_Rotas($pedidos = null)
{
    $sql = "
            SELECT r.*, 
                   u.nomeCompleto AS motorista_nome, 
                   m.cnh AS motorista_cnh, 
                   v.placa AS veiculo_placa, 
                   v.modelo AS veiculo_modelo
            FROM tb_rotas r
            LEFT JOIN tb_motorista m ON r.motorista_id = m.id_motorista
            LEFT JOIN tb_veiculo v ON r.veiculo_id = v.id_veiculo
            LEFT JOIN tb_usuario u ON m.id_usuario = u.id_usuario
            WHERE 1=1
            ORDER BY r.id_Rotas DESC
            LIMIT 0, 1000;
        ";

    if (!empty($pedidos)) {
        $sql .= " AND p.pedido_numero LIKE :pedidos";
    }

    $sql .= " ORDER BY r.id_Rotas DESC";

    try {
        $bd = $this->conectar();
        $query = $bd->prepare($sql);

        if (!empty($pedidos)) {
            $sql .= " AND p.pedido_numero LIKE :pedidos";
        }
    
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);

        //print_r($resul);

    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
        return false;
    }
}




}


//$objrotas = new rotas();

//$objrotas->exibir_Rotas('5');

