<?php
require_once '../conexao/Conexao.php';
class Inserir_fucionario extends Conexao
{
        private $teste = 'Alerrandra';
        private $testeNumero = 1;
        public function getTeste()
        {
                return $this->teste;
        }
        public function setTeste($teste): self
        {
                $this->teste = $teste;

                return $this;
        }
        public function getTesteNumero()
        {
                return $this->testeNumero;
        }

        public function setTesteNumero($testeNumero): self
        {
                $this->testeNumero = $testeNumero;

                return $this;
        }

        public function inserirFuncionario($testeNumero, $teste)
        {       
                $this->setTesteNumero  ($testeNumero);
                $this->setTeste($teste);

                //MONTAR QUERY

                $sql = "INSERT INTO tb_ teste(idteste, teste, testeNumero VALUES (NULL,:))";



                //conectar banco de dados
        }


    


}


