<?php

require_once __DIR__ . "/Conexao.class.php";

class Motorista extends Conexao
{
    private $id_usuario;
    private $cnh;
    private $id_Motorista;
    private $categoria;
    private $validade_cnh;

    /**
     * Get the value of id_usuario
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     */
    public function setIdUsuario($id_usuario): self
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of cnh
     */
    public function getCnh()
    {
        return $this->cnh;
    }

    /**
     * Set the value of cnh
     */
    public function setCnh($cnh): self
    {
        $this->cnh = $cnh;

        return $this;
    }

    /**
     * Get the value of id_Motorista
     */
    public function getIdMotorista()
    {
        return $this->id_Motorista;
    }

    /**
     * Set the value of id_Motorista
     */
    public function setIdMotorista($id_Motorista): self
    {
        $this->id_Motorista = $id_Motorista;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     */
    public function setCategoria($categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of validade_cnh
     */
    public function getValidadeCnh()
    {
        return $this->validade_cnh;
    }

    /**
     * Set the value of validade_cnh
     */
    public function setValidadeCnh($validade_cnh): self
    {
        $this->validade_cnh = $validade_cnh;

        return $this;
    }

    function inserir_motorista($id_usuario,  $cnh, $categoria, $validade_cnh)
    {

        $this->setIdUsuario($id_usuario,);
        $this->setCnh($cnh);
        $this->setCategoria($categoria);
        $this->setValidadeCnh($validade_cnh);
        //$this->setIdMotorista($id_Motorista);

        $sql = "INSERT INTO tb_motorista 
            (cnh, categoria, validade_cnh, id_usuario) 
        VALUES 
            (:cnh, :categoria, :validade_cnh, :id_usuario)";

        try {
            $db = $this->conectar();
            $query = $db->prepare($sql);

            $query->bindValue(":id_usuario",      $id_usuario,          PDO::PARAM_INT);
            $query->bindValue(":cnh",             $cnh,                 PDO::PARAM_STR);
            $query->bindValue(":categoria",       $categoria,           PDO::PARAM_STR);
            $query->bindValue(":validade_cnh",    $validade_cnh,        PDO::PARAM_STR);

            $query->execute();

            //echo 'Motorista cadastrado com Sucesso!';

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //Consultar
    //consultar usuario
    public function exibirMotorista($nomeCompleto = null)
    {
        $sql = "SELECT m.*, u.nomeCompleto 
        FROM tb_motorista AS m
        INNER JOIN tb_usuario AS u ON m.id_usuario = u.id_usuario
        WHERE 1=1";


        if (!empty($nomeCompleto)) {
            $sql .= " AND u.nomeCompleto LIKE :nomeCompleto";
        }

        $sql .= " ORDER BY nomeCompleto";

        try {
            $db = $this->conectar();
            $query = $db->prepare($sql);
    
            if (!empty($nomeCompleto)) {
                $query->bindValue(":nomeCompleto", "%$nomeCompleto%");
            }
    
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);    

        } catch (PDOException $e) {
            return false;
        }
    }
}

//$objMotorista = new Motorista();
//$objMotorista->exibirMotorista('Sergio Lima');
