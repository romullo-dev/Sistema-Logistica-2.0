<?php
require_once __DIR__ . "/Conexao.class.php";


class Pedido extends Conexao
{
    //remetente
    private $remetenteCpfCnpj;
    private $remetenteNome;
    private $remetente_cep;
    private $remetente_endereco;
    private $remetente_numero;

    //pedido
    private $pedidoNumero;
    private $notaNumero;
    private $chaveNota;

    //destinatario
    private $destinatarioCpfCnpj;
    private $destinatarioNome;

    private $destinatario_cep;
    private $destinatario_numero;
    private $destinatario_endereco;

    //adicionais    
    private $data;
    private $id_pedidos;

    private $arquivoNome;


    public function getArquivoNome()
    {
        return $this->arquivoNome;
    }

    /**
     * Set the value of remetenteCpfCnpj
     */
    public function setArquivoNome($arquivoNome): self
    {
        $this->arquivoNome = $arquivoNome;

        return $this;
    }





    /**
     * Get the value of remetenteCpfCnpj
     */
    public function getRemetenteCpfCnpj()
    {
        return $this->remetenteCpfCnpj;
    }

    /**
     * Set the value of remetenteCpfCnpj
     */
    public function setRemetenteCpfCnpj($remetenteCpfCnpj): self
    {
        $this->remetenteCpfCnpj = $remetenteCpfCnpj;

        return $this;
    }

    /**
     * Get the value of remetenteNome
     */
    public function getRemetenteNome()
    {
        return $this->remetenteNome;
    }

    /**
     * Set the value of remetenteNome
     */
    public function setRemetenteNome($remetenteNome): self
    {
        $this->remetenteNome = $remetenteNome;

        return $this;
    }

    /**
     * Get the value of remetente_cep
     */
    public function getRemetenteCep()
    {
        return $this->remetente_cep;
    }

    /**
     * Set the value of remetente_cep
     */
    public function setRemetenteCep($remetente_cep): self
    {
        $this->remetente_cep = $remetente_cep;

        return $this;
    }

    /**
     * Get the value of remetente_endereco
     */
    public function getRemetenteEndereco()
    {
        return $this->remetente_endereco;
    }

    /**
     * Set the value of remetente_endereco
     */
    public function setRemetenteEndereco($remetente_endereco): self
    {
        $this->remetente_endereco = $remetente_endereco;

        return $this;
    }

    /**
     * Get the value of remetente_numero
     */
    public function getRemetenteNumero()
    {
        return $this->remetente_numero;
    }

    /**
     * Set the value of remetente_numero
     */
    public function setRemetenteNumero($remetente_numero): self
    {
        $this->remetente_numero = $remetente_numero;

        return $this;
    }

    /**
     * Get the value of pedidoNumero
     */
    public function getPedidoNumero()
    {
        return $this->pedidoNumero;
    }

    /**
     * Set the value of pedidoNumero
     */
    public function setPedidoNumero($pedidoNumero): self
    {
        $this->pedidoNumero = $pedidoNumero;

        return $this;
    }

    /**
     * Get the value of notaNumero
     */
    public function getNotaNumero()
    {
        return $this->notaNumero;
    }

    /**
     * Set the value of notaNumero
     */
    public function setNotaNumero($notaNumero): self
    {
        $this->notaNumero = $notaNumero;

        return $this;
    }

    /**
     * Get the value of chaveNota
     */
    public function getChaveNota()
    {
        return $this->chaveNota;
    }

    /**
     * Set the value of chaveNota
     */
    public function setChaveNota($chaveNota): self
    {
        $this->chaveNota = $chaveNota;

        return $this;
    }

    /**
     * Get the value of destinatarioCpfCnpj
     */
    public function getDestinatarioCpfCnpj()
    {
        return $this->destinatarioCpfCnpj;
    }

    /**
     * Set the value of destinatarioCpfCnpj
     */
    public function setDestinatarioCpfCnpj($destinatarioCpfCnpj): self
    {
        $this->destinatarioCpfCnpj = $destinatarioCpfCnpj;

        return $this;
    }

    /**
     * Get the value of destinatarioNome
     */
    public function getDestinatarioNome()
    {
        return $this->destinatarioNome;
    }

    /**
     * Set the value of destinatarioNome
     */
    public function setDestinatarioNome($destinatarioNome): self
    {
        $this->destinatarioNome = $destinatarioNome;

        return $this;
    }

    /**
     * Get the value of destinatario_cep
     */
    public function getDestinatarioCep()
    {
        return $this->destinatario_cep;
    }

    /**
     * Set the value of destinatario_cep
     */
    public function setDestinatarioCep($destinatario_cep): self
    {
        $this->destinatario_cep = $destinatario_cep;

        return $this;
    }

    /**
     * Get the value of destinatario_numero
     */
    public function getDestinatarioNumero()
    {
        return $this->destinatario_numero;
    }

    /**
     * Set the value of destinatario_numero
     */
    public function setDestinatarioNumero($destinatario_numero): self
    {
        $this->destinatario_numero = $destinatario_numero;

        return $this;
    }

    /**
     * Get the value of destinatario_endereco
     */
    public function getDestinatarioEndereco()
    {
        return $this->destinatario_endereco;
    }

    /**
     * Set the value of destinatario_endereco
     */
    public function setDestinatarioEndereco($destinatario_endereco): self
    {
        $this->destinatario_endereco = $destinatario_endereco;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

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


    public function InserirPedido($arquivoNome, $destinatario_endereco, $destinatario_numero, $destinatario_cep, $remetente_numero, $remetente_endereco, $remetenteCpfCnpj, $remetenteNome, $pedidoNumero, $notaNumero, $chaveNota, $destinatarioCpfCnpj, $destinatarioNome, $remetente_cep)
    {
        //remetente
        $this->setRemetenteCpfCnpj($remetenteCpfCnpj);
        $this->setRemetenteNome($remetenteNome);
        $this->setRemetenteCep($remetente_cep);
        $this->setRemetenteEndereco($remetente_endereco);
        $this->setRemetenteNumero($remetente_numero);

        // Informações do Pedido
        $this->setPedidoNumero($pedidoNumero);
        $this->setNotaNumero($notaNumero);
        $this->setChaveNota($chaveNota);

        //Destinatário
        $this->setDestinatarioCpfCnpj($destinatarioCpfCnpj);
        $this->setDestinatarioNome($destinatarioNome);

        $this->setDestinatarioCep($destinatario_cep);

        $this->setDestinatarioNumero($destinatario_numero);

        $this->setArquivoNome($arquivoNome);






        $sql = "INSERT INTO tb_pedidos
        (remetente_cpf_cnpj, remetente_nome, remetente_cep, remetente_endereco, remetente_numero, pedido_numero, nota_numero, chave_nota, destinatario_cpf_cnpj, destinatario_nome, destinatario_cep, destinatario_endereco, destinatario_numero, arquivo_nome)
        VALUES
        (:remetente_cpf_cnpj, :remetente_nome, :remetente_cep, :remetente_endereco, :remetente_numero, :pedido_numero, :nota_numero, :chave_nota, :destinatario_cpf_cnpj, :destinatario_nome, :destinatario_cep, :destinatario_endereco, :destinatario_numero, :arquivo_nome)";

        try {
            $db = $this->conectar();
            $query = $db->prepare($sql);

            $query->bindValue(":remetente_cpf_cnpj", $remetenteCpfCnpj, PDO::PARAM_STR);
            $query->bindValue(":remetente_nome", $remetenteNome, PDO::PARAM_STR);
            $query->bindValue(":remetente_cep", $remetente_cep, PDO::PARAM_STR);
            $query->bindValue(":remetente_endereco", $remetente_endereco, PDO::PARAM_STR);
            $query->bindValue(":remetente_numero", $remetente_numero, PDO::PARAM_INT);

            $query->bindValue(":pedido_numero", $pedidoNumero, PDO::PARAM_STR);
            $query->bindValue(":nota_numero", $notaNumero, PDO::PARAM_STR);
            $query->bindValue(":chave_nota", $chaveNota, PDO::PARAM_STR);

            $query->bindValue(":destinatario_cpf_cnpj", $destinatarioCpfCnpj, PDO::PARAM_STR);
            $query->bindValue(":destinatario_nome", $destinatarioNome, PDO::PARAM_STR);
            $query->bindValue(":destinatario_cep", $destinatario_cep, PDO::PARAM_STR);
            $query->bindValue(":destinatario_endereco", $destinatario_endereco, PDO::PARAM_STR);
            $query->bindValue(":destinatario_numero", $destinatario_numero, PDO::PARAM_INT);

            $query->bindValue(":arquivo_nome", $arquivoNome, PDO::PARAM_STR);

            $query->execute();

            return true;
        } catch (Exception $e) {
            echo "Erro" . $e->getMessage();
        }
    }

    //mostrar
    public function exibir_pedidos($pedido_numero = null)
    {
        $sql = "SELECT * FROM tb_pedidos WHERE 1=1";

        if (!empty($nomeCompleto)) {
            $sql .= " AND pedido_numero LIKE :pedido_numero";
        }

        $sql .= " ORDER BY pedido_numero";

        try {
            $bd = $this->conectar();
            $query = $bd->prepare($sql);

            if (!empty($nomeCompleto)) {
                $nomeBusca = "%" . $pedido_numero . "%";
                $query->bindValue(':pedido_numero', $nomeBusca, PDO::PARAM_STR);
            }

            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);

            //print_r($resul);
        } catch (PDOException $e) {
            echo 'Erro' . $e->getMessage();
            return false;
        }
    }



}

/*$obj = new Pedido();
$obj->exibir_pedidos('');*/
