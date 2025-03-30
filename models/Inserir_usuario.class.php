<?php
require_once __DIR__ . '/../conexao/Conexao.class.php';

class Inserir_usuario extends Conexao
{
        private $nomeCompleto;
        private $cpf;
        private $user;
        private $senha;
        private $dataNascimento;
        private $telefone;
        private $endereco;
        private $id_tipo;
        private $dataContratacao;
        private $salario;
        private $id_status_func;

        //get e set 

        public function getNomeCompleto()
        {
                return $this->nomeCompleto;
        }

        public function setNomeCompleto($nomeCompleto): self
        {
                $this->nomeCompleto = $nomeCompleto;

                return $this;
        }

        public function getCpf()
        {
                return $this->cpf;
        }


        public function setCpf($cpf): self
        {
                $this->cpf = $cpf;

                return $this;
        }


        public function getUser()
        {
                return $this->user;
        }


        public function setUser($user): self
        {
                $this->user = $user;

                return $this;
        }


        public function getSenha()
        {
                return $this->senha;
        }


        public function setSenha($senha): self
        {
                $this->senha = password_hash($senha, PASSWORD_DEFAULT);

                return $this;
        }


        public function getDataNascimento()
        {
                return $this->dataNascimento;
        }


        public function setDataNascimento($dataNascimento): self
        {
                $this->dataNascimento = $dataNascimento;

                return $this;
        }


        public function getTelefone()
        {
                return $this->telefone;
        }


        public function setTelefone($telefone): self
        {
                $this->telefone = $telefone;

                return $this;
        }


        public function getEndereco()
        {
                return $this->endereco;
        }


        public function setEndereco($endereco): self
        {
                $this->endereco = $endereco;

                return $this;
        }


        public function getIdTipo()
        {
                return $this->id_tipo;
        }


        public function setIdTipo($id_tipo): self
        {
                $this->id_tipo = $id_tipo;

                return $this;
        }


        public function getDataContratacao()
        {
                return $this->dataContratacao;
        }


        public function setDataContratacao($dataContratacao): self
        {
                $this->dataContratacao = $dataContratacao;

                return $this;
        }


        public function getSalario()
        {
                return $this->salario;
        }


        public function setSalario($salario): self
        {
                $this->salario = $salario;

                return $this;
        }


        public function getIdStatusFunc()
        {
                return $this->id_status_func;
        }

        public function setIdStatusFunc($id_status_func): self
        {
                $this->id_status_func = $id_status_func;

                return $this;
        }


        public function inserirUsuario($nomeCompleto, $cpf, $user, $senha, $dataNascimento, $telefone, $endereco, $id_tipo, $dataContratacao, $salario, $id_status_func)
        {

                $this->setNomeCompleto  ($nomeCompleto);
                $this->setCpf  ($cpf);
                $this->setUser  ($user);
                $this->setSenha($senha);
                $this->setDataNascimento  ($dataNascimento);
                $this->setTelefone  ($telefone);
                $this->setEndereco  ($endereco);
                $this->setIdTipo ( $id_tipo);
                $this->setDataContratacao ( $dataContratacao);
                $this->setSalario ( $salario);
                $this->setIdStatusFunc ( $id_status_func);

                //MONTAR QUERY
                $sql = "INSERT INTO tb_usuario 
                        (id_usuario, nomeCompleto, cpf, user, senha, dataNascimento, telefone, endereco, id_tipo, dataContratacao, salario, id_status_func) 
                    VALUES 
                        (NULL, :nomeCompleto, :cpf, :user, :senha, :dataNascimento, :telefone, :endereco, :id_tipo, :dataContratacao, :salario, :id_status_func)";

                //Execultar query

                try {
                        // Conectar ao banco
                        $db = $this->conectar();
                        if (!$db) {
                                throw new Exception("Falha na conexão com o banco de dados.");
                        }
                        //preparar sql
                        $query = $db->prepare($sql);
                        //blindagem dos dados
                        $query->bindValue(":nomeCompleto", $nomeCompleto, PDO::PARAM_STR);
                        $query->bindValue(":cpf", $cpf, PDO::PARAM_STR);
                        $query->bindValue(":user", $user, PDO::PARAM_STR);
                        $query->bindValue(":senha", $this->getSenha(), PDO::PARAM_STR);
                        $query->bindValue(":dataNascimento", $dataNascimento, PDO::PARAM_STR);
                        $query->bindValue(":telefone", $telefone, PDO::PARAM_STR);
                        $query->bindValue(":endereco", $endereco, PDO::PARAM_STR);
                        $query->bindValue(":id_tipo", $id_tipo, PDO::PARAM_INT);
                        $query->bindValue(":dataContratacao", $dataContratacao, PDO::PARAM_STR);
                        $query->bindValue(":salario", $salario, PDO::PARAM_STR);
                        $query->bindValue(":id_status_func", $id_status_func, PDO::PARAM_INT);

                        //Executar a query
                        $query->execute();

                        //retorna o resultado
                        //print "Inserido";
                        return true;
                } catch (PDOException $e) {
                        echo 'Erro Inserir' . $e->getMessage();
                        return false;
                }
        }
}


/*$Inserir_fucionario = new Inserir_usuario();
$Inserir_fucionario->inserirUsuario(
    'João Silva',  // nomeCompleto
    '12345674901', // cpf
    'joao.silva',   // user
    'senha123',     // senha
    '1990-05-15',   // dataNascimento
    '1234567890',   // telefone
    'Rua Fictícia, 123', // endereco
    1,              // id_tipo (por exemplo, tipo de usuário 1)
    '2025-03-29',   // dataContratacao
    2500.75,        // salario
    1               // id_status_func (por exemplo, status de ativo)
);*/
