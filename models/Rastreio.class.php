<?php
require_once __DIR__ . "/Conexao.class.php";


class Rastreio extends Conexao 
{
    private $id_pedidos;

    /**
     * Get the value of id_pedidos
     */
    public function getIdPedidos()
    {
        return $this->id_pedidos;
    }

    /**
     * Set the value of id_pedidos
     */
    public function setIdPedidos($id_pedidos): self
    {
        $this->id_pedidos = $id_pedidos;
        return $this;
    }

    /**
     * Método principal de rastreamento
     */
    public function Rastrear_pedido($id_pedidos) 
    {
        $this->setIdPedidos($id_pedidos);
        $con = $this->conectar();

        // 1. Buscar os dados do pedido
        $sql_pedido = "SELECT * FROM tb_pedidos WHERE id_pedidos = :id_pedidos";
        $stmt_pedido = $con->prepare($sql_pedido);
        $stmt_pedido->bindParam(":id_pedidos", $this->id_pedidos);
        $stmt_pedido->execute();
        $pedido = $stmt_pedido->fetch(PDO::FETCH_ASSOC);

        // Se não encontrou o pedido, retorna null
        if (!$pedido) {
            return null;
        }

        // 2. Buscar o ID da rota associado ao pedido
        $sql_rota_pedido = "SELECT rota_id FROM tb_rota_pedidos WHERE pedido_id = :id_pedidos";
        $stmt_rel = $con->prepare($sql_rota_pedido);
        $stmt_rel->bindParam(":id_pedidos", $this->id_pedidos);
        $stmt_rel->execute();
        $relacao = $stmt_rel->fetch(PDO::FETCH_ASSOC);

        // Se não encontrou rota, retorna apenas o pedido
        if (!$relacao) {
            return ['pedido' => $pedido, 'rota' => null];
        }

        $rota_id = $relacao['rota_id'];

        // 3. Buscar os dados da rota
        $sql_rota = "SELECT * FROM tb_rotas WHERE id_Rotas = :rota_id";
        $stmt_rota = $con->prepare($sql_rota);
        $stmt_rota->bindParam(":rota_id", $rota_id);
        $stmt_rota->execute();
        $rota = $stmt_rota->fetch(PDO::FETCH_ASSOC);

        // Retorna tudo agrupado
        return  [
            'pedido' => $pedido,
            'rota'   => $rota
        ];

        //var_dump($resultado);
    }
}
$objRastreio = new Rastreio  ();
$objRastreio->Rastrear_pedido(5);


