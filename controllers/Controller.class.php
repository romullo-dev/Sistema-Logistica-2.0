<?php
require_once __DIR__ . '/../models/Inserir_usuario.class.php'; // Caminho para o Inserir_usuario
require_once __DIR__ . '/../conexao/Conexao.class.php'; // Caminho para o Conexao


class Controller
{
    //inserir usuario

    public function inserir_usuarios ($nomeCompleto, $cpf, $user, $senha, $dataNascimento, $telefone, $endereco, $id_tipo, $dataContratacao, $salario, $id_status_func)
    {
        //instaciar classe Inserir_usuario
        $objInserir_usuario = new Inserir_usuario();

        //invocar metodo
        if ($objInserir_usuario->inserirUsuario($nomeCompleto, $cpf, $user, $senha, $dataNascimento, $telefone, $endereco, $id_tipo, $dataContratacao, $salario, $id_status_func) == true) {
            echo 'Inserido com sucesso';
        } else {
            echo 'Erro ao inserir';
        }


    }


    

}