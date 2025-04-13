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

    // dados
    $nomeCompleto = htmlspecialchars($_POST['nomeCompleto']);
    $email = htmlspecialchars($_POST['email']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $user = htmlspecialchars($_POST['user']);
    $senha = htmlspecialchars($_POST['senha']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $id_tipo = $_POST['id_tipo'];
    $id_status_func = $_POST['id_status_func'];

    // Upload da imagem
    $foto = null;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminhoDestino = 'uploads/' . $nomeArquivo;

        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino)) {
            $foto = $nomeArquivo;
        } else {
            echo "Erro ao salvar a imagem.";
        }
    }

    //invocar o método de validar
    $objController->inserir_usuarios($nomeCompleto, $cpf, $user, $senha, $telefone, $id_tipo, $id_status_func, $foto, $id_usuario, $email);
}

// 

//if (isset())

// Exibir usuários (consulta)
if (isset($_POST['consultar_usuario'])) {
    // Evita erro de controller duplicado (se já instanciado antes)
    if (!isset($objController)) {
        $objController = new Controller();
    }

    // Verifica se o campo foi enviado e limpa
    $nomeUsuario = isset($_POST['nomeUsuario']) ? htmlspecialchars(trim($_POST['nomeUsuario'])) : null;

    // Executa a consulta
    $objController->mostrar_usuario($nomeUsuario);
}


//método excluir usuario
if (isset($_POST['excluir_usuario'])) {

    $objController = new Controller();
    $id_usuario = htmlspecialchars($_POST['id_usuario']);
    //invocar o método de excluir_autor
    $objController->excluir_usuario($id_usuario);
}

//METODO ALTERAR USUARIO
if (isset($_POST['alterar_usuario'])) {
    $objController = new Controller();

    $id_usuario = $_POST['id_usuario'];
    $nomeCompleto = htmlspecialchars($_POST['nomeCompleto']);
    $email = htmlspecialchars($_POST['email']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $user = htmlspecialchars($_POST['user']);
    $senha = htmlspecialchars($_POST['senha']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $id_tipo = $_POST['id_tipo'];
    $id_status_func = $_POST['id_status_func'];

    $foto = null;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminhoDestino = 'uploads/' . $nomeArquivo;

        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino)) {
            $foto = $nomeArquivo;
        } else {
            echo "Erro ao salvar a imagem.";
        }
    }



    $objController->alterar_usuario(
        $nomeCompleto,
        $senha,
        $telefone,
        $id_tipo,
        $id_status_func,
        $foto,
        $email,
        $id_usuario
    );
}

//MOTORISTA


if (isset($_POST['cadastrar_motorista'])) {
    $objController = new Controller();

    $id_usuario = $_POST['id_usuario'];
    $cnh = htmlspecialchars($_POST['cnh']);
    $categoria = htmlspecialchars($_POST['categoria']);
    $validade_cnh = htmlspecialchars($_POST['validade_cnh']);

    print_r($id_usuario) . '<BR> <BR>';
    print_r($cnh) . '<BR>';
    print_r($categoria) . '<BR>';
    print_r($validade_cnh) . '<BR>';

    $objController->inserir_motorista($id_usuario, $cnh, $categoria, $validade_cnh);
}


// Exibir Motorista (consulta)
if (isset($_POST['consultar_motorista'])) {
    if (!isset($objController)) {
        $objController = new Controller();
    }

    $nomeUsuario = isset($_POST['nomeMotorista']) ? htmlspecialchars(trim($_POST['nomeMotorista'])) : null;

    $objController->mostrar_motorista($nomeUsuario);
}


if (isset($_POST['excluir_Motorista'])) {
    $objController = new Controller();
    $id_Motorista = htmlspecialchars($_POST['id_Motorista']);
    var_dump($id_Motorista);
    $objController->excluir_Motorista($id_Motorista);
}

//METODO ALTERAR USUARIO
if (isset($_POST['alterar_motorista'])) {
    $objController = new Controller();

    $id_motorista = ($_POST['id_motorista']);
    $cnh = htmlspecialchars($_POST['cnh']);
    $validade_cnh = htmlspecialchars($_POST['validade_cnh']);
    $categoria = htmlspecialchars($_POST['categoria']);

    $objController->alterar_Motorista($id_motorista, $cnh, $categoria, $validade_cnh);
}




//VEICULO
if (isset($_POST['cadastroVeiculo'])) {

    $objController = new Controller();

    $placa = strtoupper($_POST['placa']);
    $modelo = ($_POST['modelo']);
    $ano = htmlspecialchars($_POST['ano']);
    $marca = htmlspecialchars($_POST['marca']);
    $cor = htmlspecialchars($_POST['cor']);
    $status_veiculo = htmlspecialchars($_POST['status_veiculo']);
    $observacoes = htmlspecialchars($_POST['observacoes']);

    $objController->inserirVeiculo($placa, $modelo, $ano, $marca, $cor, $status_veiculo, $observacoes);
}

if (isset($_POST['consultar_veiculo'])) {
    $objController = new Controller();
    $placaVeiculo = ($_POST['placaVeiculo']);

    $objController->mostrarVeiculo($placaVeiculo);
}

//método excluir veiculo
if (isset($_POST['excluirVeiculo'])) {

    $objController = new Controller();
    $id_veiculo = htmlspecialchars($_POST['id_veiculo']);
    //invocar o método de excluir_autor
    $objController->excluir_veiculo($id_veiculo);
}


//METODO ALTERAR VEICULO
if (isset($_POST['alterar_veiculo'])) {
    $objController = new Controller();

    $id_veiculo = $_POST['id_veiculo'];
    $modelo = htmlspecialchars($_POST['modelo']);
    $marca = htmlspecialchars($_POST['marca']);
    $ano = htmlspecialchars($_POST['ano']);
    $cor = htmlspecialchars($_POST['cor']);
    $tipo = htmlspecialchars($_POST['status_veiculo']);

    $objController->alterar_veiculo($modelo, $marca, $cor, $ano, $status_veiculo, $id_veiculo);
}

//PEDIDOS

if (isset($_POST['incluir_pedido'])) {

    $objController = new Controller();

    //remetente
    $remetenteCpfCnpj = htmlspecialchars($_POST['remetente_cpf_cnpj']);
    $remetenteNome = htmlspecialchars($_POST['remetente_nome']);
    $remetente_cep = htmlspecialchars($_POST['remetente_cep']);
    $remetente_endereco = htmlspecialchars($_POST['remetente_endereco']);
    $remetente_numero = htmlspecialchars($_POST['remetente_numero']);

    // Informações do Pedido
    $pedidoNumero = htmlspecialchars($_POST['pedido_numero']);
    $notaNumero = htmlspecialchars($_POST['nota_numero']);
    $chaveNota = htmlspecialchars($_POST['chave_nota']);

    //Destinatário
    $destinatarioCpfCnpj = htmlspecialchars($_POST['destinatario_cpf_cnpj']);
    $destinatarioNome = htmlspecialchars($_POST['destinatario_nome']);
    $destinatario_cep = htmlspecialchars($_POST['destinatario_cep']);
    $destinatario_numero = htmlspecialchars($_POST['destinatario_numero']);
    $destinatario_endereco = htmlspecialchars($_POST['destinatario_endereco']);
    

    // Tratamento do upload do arquivo
    $arquivoNome = null;
    if (isset($_FILES['arquivo_nome']) && $_FILES['arquivo_nome']['error'] === UPLOAD_ERR_OK) {
        $arquivoTemp = $_FILES['arquivo_nome']['tmp_name'];
        $arquivoNome = $_FILES['arquivo_nome']['name'];
        $diretorioDestino = 'uploads/'; 
        $caminhoDestino = $diretorioDestino . basename($arquivoNome);

        if (move_uploaded_file($arquivoTemp, $caminhoDestino)) {
            $arquivoNome = $caminhoDestino;
        } else {
            echo "Erro ao carregar o arquivo.";
        }
    }

     $objController->inserir_Pedido($arquivoNome, 
     $destinatario_endereco,
     $destinatario_numero,
     $destinatario_cep,
     $remetente_numero,
     $remetente_endereco,
     $remetenteCpfCnpj,
     $remetenteNome,
     $pedidoNumero,
     $notaNumero,
     $chaveNota,
     $destinatarioCpfCnpj,
    $destinatarioNome,
    $remetente_cep
    );

    //inserir

    if (isset($_POST["consultar_pedido"])) {
        var_dump($_POST);
    
        $pedido_numero = $_POST["aaaaaaaaaaaaa"];
        print_r($pedido_numero);
    
        // Agora pode chamar o controller se quiser
        // $objController = new Controller();
        // $objController->exibir_pedidos($pedido_numero);
    }
    
}
