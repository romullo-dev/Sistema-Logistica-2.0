<?php
 class Motorista extends Conexao 
 {
    private $cpf;
    private $nomeCompleto;
    private $cnh;
    private $categoria;
    private $validade_cnh;
    private $id_Motorista;
    private $funcionario_id;

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    public function getCnh()
    {
        return $this->cnh;
    }

    public function setCnh($cnh): self
    {
        $this->cnh = $cnh;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getValidadeCnh()
    {
        return $this->validade_cnh;
    }

    public function setValidadeCnh($validade_cnh): self
    {
        $this->validade_cnh = $validade_cnh;

        return $this;
    }

    public function getIdMotorista()
    {
        return $this->id_Motorista;
    }

    public function setIdMotorista($id_Motorista): self
    {
        $this->id_Motorista = $id_Motorista;

        return $this;
    }

    public function getFuncionarioId()
    {
        return $this->funcionario_id;
    }

    public function setFuncionarioId($funcionario_id): self
    {
        $this->funcionario_id = $funcionario_id;

        return $this;
    }
    


    function Inserir_motorista ($cpf, $nomeCompleto, $cnh, $categoria, $validade_cnh, $id_Motorista, $funcionario_id)
    {
        $this->setCpf($cpf);
        $this->setNomeCompleto($nomeCompleto);
        $this->setCnh($cnh);
        $this->setCategoria($categoria);
        $this->setValidadeCnh($validade_cnh);


        //$sql = 


    }

    
 }