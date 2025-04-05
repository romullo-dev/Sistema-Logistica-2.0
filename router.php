<?php

require_once __DIR__ . "/autoload.php";

//pegar a url
$url = explode('?', $_SERVER['REQUEST_URI']);
//escolher na variável $url do link desejado
$pagina = $url[1];

#ROTAS DE REDIRECIONAMENTO
//redirecionar para pagina informada
if (isset($pagina)) {
    $objController = new Controller();
    $objController->redirecionar($pagina);
}


//Auteticação
if (isset($_POST['login'])) {
    $objController = new Controller;
    $user = htmlspecialchars($_POST['user']);
    $senha = htmlspecialchars($_POST['senha']);

    //var_dump ($user);
    //var_dump ($senha);

    $objController->login_class($user, $senha);
}

//usuario
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

// 

//if (isset())

//exibir consultar_autor
if (isset($_POST['consultar_usuario'])) {
    //instanciar controller
    $objController = new Controller();

    $nomeUsuario = htmlspecialchars($_POST['nomeUsuario']);

    //dados
    $objController->mostrar_usuario($nomeUsuario);
}

//método excluir usuario
if (isset($_POST['excluir_usuario'])) {

    $objController = new Controller();
    $id_usuario = htmlspecialchars($_POST['id_usuario']);
    //invocar o método de excluir_autor
    //$objController->excluir_usuario($id_usuario);


}



