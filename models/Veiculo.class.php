<?php
require_once __DIR__ . "/Conexao.class.php";

class Veiculo extends Conexao
{
    private $placa;
    private $modelo;
    private $marca;
    private $ano;
    private $id_veiculo;
    private $cor;
    private $status_veiculo;
    private $observacoes;

    /**
     * Get the value of placa
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set the value of placa
     */
    public function setPlaca($placa): self
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     */
    public function setModelo($modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of ano
     */
    public function getAno()
    {
        return $this->ano;
    }


    public function setAno($ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getIdVeiculo()
    {
        return $this->id_veiculo;
    }

    public function setIdVeiculo($id_veiculo): self
    {
        $this->id_veiculo = $id_veiculo;

        return $this;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor): self
    {
        $this->cor = $cor;

        return $this;
    }

    public function getStatusVeiculo()
    {
        return $this->status_veiculo;
    }

    public function setStatusVeiculo($status_veiculo): self
    {
        $this->status_veiculo = $status_veiculo;

        return $this;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    public function setObservacoes($observacoes): self
    {
        $this->observacoes = $observacoes;

        return $this;
    }



    public function Inserir_veiculo($placa, $modelo, $marca, $ano, $cor, $status_veiculo, $observacoes)
    {
        $this->setPlaca($placa);
        $this->setModelo($modelo);
        $this->setMarca($marca);
        $this->setAno($ano);
        $this->setCor($cor);
        $this->setStatusVeiculo($status_veiculo);
        $this->setObservacoes($observacoes);

        $sql = "INSERT INTO tb_veiculo
            (placa, modelo, marca, ano, cor, status_veiculo,observacoes)
        VALUES
            (:placa, :modelo, :marca, :ano, :cor, :status_veiculo,:observacoes)";

        try {
            $bd = $this->conectar();
            $query = $bd->prepare($sql);
            $query->bindValue(":placa", $placa, PDO::PARAM_STR);
            $query->bindValue(":modelo", $modelo, PDO::PARAM_STR);
            $query->bindValue(":marca", $marca, PDO::PARAM_STR);
            $query->bindValue(":ano", $ano, PDO::PARAM_INT);
            $query->bindValue(":cor", $cor, PDO::PARAM_STR);
            $query->bindValue(":status_veiculo", $status_veiculo, PDO::PARAM_STR);
            $query->bindValue(":observacoes", $observacoes, PDO::PARAM_STR);

            $query->execute();

            //echo 'Deu certo';

            return true;
        } catch (Exception $e) {
            //echo 'Deu ruim' . $e;
            return  false;
        }
    }

    //consultar usuario
    public function exibirVeiculo($placa = null)
    {
            $sql = "SELECT * FROM tb_veiculo WHERE 1=1";

            if (!empty($placa)) {
                    $sql .= " AND placa  LIKE :placa";
            }

            $sql .= " ORDER BY placa";

            try {
                    $bd = $this->conectar();
                    $query = $bd->prepare($sql);

                    if (!empty($placa)) {
                            $placaBusca = "%" . $placa . "%";
                            $query->bindValue(':placa', $placaBusca, PDO::PARAM_STR);
                    }
                    $query->execute();
                    return $resultado = $query->fetchAll(PDO::FETCH_OBJ);

                    //print_r ($resultado);
            } catch (PDOException $e) {
                    echo 'Erro' . $e->getMessage();
                    return false;
            }
    }




}

/*$objveiculo = new Veiculo ();
$objveiculo->exibirVeiculo('s',
);*/

