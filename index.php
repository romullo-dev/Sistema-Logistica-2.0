<?php

require_once 'controllers/Controller.class.php';
require_once 'models/Inserir_usuario.class.php';



//inserir usuario
if (isset($_POST['cadastroUsuario'])) {
    //instaciar controller 
    $objController =  new Controller();
    
    //dados
    $nomeCompleto = htmlspecialchars($_POST['nomeCompleto']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $user = htmlspecialchars($_POST['user']);
    $senha = htmlspecialchars($_POST['senha']);
    $dataNascimento = htmlspecialchars($_POST['dataNascimento']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $endereco = htmlspecialchars($_POST['endereco']);
    $id_tipo = ($_POST['id_tipo']);
    $dataContratacao = htmlspecialchars($_POST['dataContratacao']);
    $salario = ($_POST['salario']);
    $id_status_func = ($_POST['id_status_func']);

    //invocar o método de validar
    $objController->inserir_usuarios($nomeCompleto, $cpf, $user, $senha, $dataNascimento, $telefone, $endereco, $id_tipo, $dataContratacao, $salario, $id_status_func);
}


/*var_dump('<BR>'.$nomeCompleto.'<BR>');
var_dump('<BR>'.$cpf.'<BR>');
var_dump('<BR>'.$user .'<BR>');
var_dump('<BR>'.$senha.'<BR>');
var_dump('<BR>'.$dataNascimento.'<BR>');
var_dump('<BR>'.$telefone.'<BR>');
var_dump('<BR>'.$endereco.'<BR>');
var_dump('<BR>'.$id_tipo.'<BR>');
var_dump('<BR>'.$dataContratacao.'<BR>');
var_dump('<BR>'.$salario.'<BR>');
var_dump('<BR>'.$id_status_func.'<BR>');*/


//LOGIN 

if (isset($_POST[''])) 
