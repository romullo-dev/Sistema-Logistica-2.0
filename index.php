<?php


if (isset($_POST['cadastrarFuncionario'])) {
    $nomeCompleto = htmlspecialchars($_POST['nomeCompleto']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $login = htmlspecialchars($_POST['login']);
    $senha = htmlspecialchars($_POST['senha']);
    $dataNascimento = htmlspecialchars($_POST['dataNascimento']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $endereco = htmlspecialchars($_POST['endereco']);
    $id_tipo = htmlspecialchars($_POST['id_tipo']);
    $dataContratacao = htmlspecialchars($_POST['dataContratacao']);
    $salario = htmlspecialchars($_POST['salario']);
    $id_status_func = htmlspecialchars($_POST['id_status_func']);
}








/*var_dump('<BR>'.$nomeCompleto.'<BR>');
var_dump('<BR>'.$cpf.'<BR>');
var_dump('<BR>'.$login .'<BR>');
var_dump('<BR>'.$senha.'<BR>');
var_dump('<BR>'.$dataNascimento.'<BR>');
var_dump('<BR>'.$telefone.'<BR>');
var_dump('<BR>'.$endereco.'<BR>');
var_dump('<BR>'.$id_tipo.'<BR>');
var_dump('<BR>'.$dataContratacao.'<BR>');
var_dump('<BR>'.$salario.'<BR>');
var_dump('<BR>'.$id_status_func.'<BR>');*/
