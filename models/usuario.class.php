<?php

//require_once __DIR__ . "/Conexao.class.php";


class Usuario extends Conexao
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
        private $id_usuario;



        //get e set 
        public function getIdUsuario()
        {
                return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario): self
        {
                $this->id_usuario = $id_usuario;

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
                //$this->senha = password_hash($senha, PASSWORD_DEFAULT);
                $this->senha;
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

                $this->setNomeCompleto($nomeCompleto);
                $this->setCpf($cpf);
                $this->setUser($user);
                $this->setSenha($senha);
                $this->setDataNascimento($dataNascimento);
                $this->setTelefone($telefone);
                $this->setEndereco($endereco);
                $this->setIdTipo($id_tipo);
                $this->setDataContratacao($dataContratacao);
                $this->setSalario($salario);
                $this->setIdStatusFunc($id_status_func);

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
                        //$query->bindValue(":senha", $this->getSenha(), PDO::PARAM_STR);
                        $query->bindValue(":senha", $senha, PDO::PARAM_STR);
                        $query->bindValue(":dataNascimento", $dataNascimento, PDO::PARAM_STR);
                        $query->bindValue(":telefone", $telefone, PDO::PARAM_STR);
                        $query->bindValue(":endereco", $endereco, PDO::PARAM_STR);
                        $query->bindValue(":id_tipo", $id_tipo, PDO::PARAM_STR);
                        $query->bindValue(":dataContratacao", $dataContratacao, PDO::PARAM_STR);
                        $query->bindValue(":salario", $salario, PDO::PARAM_STR);
                        $query->bindValue(":id_status_func", $id_status_func, PDO::PARAM_STR);

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

        //consultar usuario
        public function exibirUsuario($nomeCompleto)
        {
                //$this->setNomeCompleto($nomeCompleto);
                $sql = "SELECT * FROM tb_usuario where true ";
                //vericar se o nome é nulo
                if ($this->getNomeCompleto() != null) {
                        $sql .= " and nome like :nomeCompleto ";
                }

                $sql .= " order by nome";

                try {
                        //conectar com o banco
                        $bd = $this->conectar();
                        $query = $bd->prepare($sql);

                        //preparar o sql
                        if ($this->getNomeCompleto() != null) {
                                $this->setNomeCompleto("%" . $nomeCompleto . "%");
                                $query->bindValue(':nomeCompleto', $this->getNomeCompleto(), PDO::PARAM_STR);
                        }
                        //excutar a query
                        $query->execute();
                        //retorna o resultado
                        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
                        print_r ($resultado);
                        return $resultado;
                } catch (PDOException $e) {
                        //print "Erro ao consultar";
                        return false;
                }
        }

        //método excluir Usuario
        public function excluir_usuario($id_usuario)
        {
                $this->setIdUsuario($id_usuario);

                $sql = "DELETE FROM tb_usuario WHERE  id_usuario = :id_usuario";

                try {
                        $db = $this->conectar();
                        $query = $db->prepare($sql);
                        $query->bindValue(':id_usuario', $this->getIdUsuario(), PDO::PARAM_INT);
                        $query->execute();
                        print 'Exluido';
                        return true;
                } catch (PDOException $e) {
                        print "Erro ao excluir: " . $e->getMessage();
                        return false;
                }
        }
}


$usuario = new Usuario();
$usuario->exibirUsuario('a');