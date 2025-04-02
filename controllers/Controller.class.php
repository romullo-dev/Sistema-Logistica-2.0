<?php
class Controller
{

    public function redirecionar($pagina)
    {
        //iniciar sessao
        session_start();
        //incluir menu
        $menu = $this->menu();
        //incluir a view
        require_once 'views/' . $pagina . '.php';
    }
    //inserir usuario

    public function inserir_usuarios ($nomeCompleto, $cpf, $user, $senha, $dataNascimento, $telefone, $endereco, $id_tipo, $dataContratacao, $salario, $id_status_func)
    {
        //instaciar classe Inserir_usuario
        $objInserir_usuario = new Usuario();

        //invocar metodo
        if ($objInserir_usuario->inserirUsuario($nomeCompleto, $cpf, $user, $senha, $dataNascimento, $telefone, $endereco, $id_tipo, $dataContratacao, $salario, $id_status_func) == true) {
            echo 'Inserido com sucesso';
        } else {
            echo 'Erro ao inserir';
        }
    }
    
    public function login_class ($user, $senha) 
    {
        $objLogin_class = new Login();
        //validar usuario,
        if ($objLogin_class->login($user, $senha) == true) {
            
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['user'] = $user;
            //menu
            $menu = $this->menu();
            include_once 'views/home.php';



            //header('location : /../views/views_home.php');
            
        } else {
            include_once 'login.php';
            $this->mostrarMensagem("Login ou senha inválidos!");
        }
    }   


       //mostrar menu
       public function menu()
       {
           print '<nav class="navbar navbar-expand-lg bg-primary text-white container-fluent">';
           print '    <a class="navbar-brand text-white" href="#">DNA</a>';
           print '    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">';
           print '        <span class="navbar-toggler-icon"></span>';
           print '    </button>';
           print '    <div class="collapse navbar-collapse" id="navbarNav">';
           print '        <ul class="navbar-nav ms-auto text-center">';
           print '            <li class="nav-item"><a class="nav-link text-white" href="rastreio.html">Rastreio</a></li>';
           print '            <li class="nav-item dropdown">';
           print '                <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Operacional</a>';
           print '                <ul class="dropdown-menu">';
           print '                    <li><a class="dropdown-item" href="rotas.html">Rotas</a></li>';
           print '                    <li><a class="dropdown-item" href="#">Processos de Ocorrências</a></li>';
           print '                </ul>';
           print '            </li>';
           print '            <li class="nav-item dropdown">';
           print '                <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Cadastros</a>';
           print '                <ul class="dropdown-menu">';
           print '                    <li><a class="dropdown-item" href="Cadastro/cadastro_veiculo.html">Cadastro de Veículo</a></li>';
           print '                    <li><a class="dropdown-item" href="Cadastro/cadastro_motorista.html">Cadastro de Motorista</a></li>';
           print '                    <li><a class="dropdown-item" href="index.php?inserir">Cadastro de Funcionário</a></li>';
           //print '                    <li><a class="dropdown-item" href="views/views_inserir.php">Cadastro de Funcionário</a></li>';
           print '                </ul>';
           print '            </li>';
           print '            <li class="nav-item"><a class="nav-link text-white" href="aereos.html">Tracking Aéreo</a></li>';
           print '            <li class="nav-item dropdown">';
           print '                <a class="nav-link dropdown-toggle btn btn-success text-white" href="#" data-bs-toggle="dropdown">'.$_SESSION['user'].'</a>';
           print '                <ul class="dropdown-menu">';
           print '                    <li><a class="dropdown-item" href="../index.html">Sair</a></li>';
           print '                </ul>';
           print '            </li>';
           print '        </ul>';
           print '    </div>';
           print '</nav>';
       }
       
       public function mostrarMensagem($mensagem)
       {
           //<!-- Modal -->
           print '<div class="modal fade" id="mensagem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
           print '  <div class="modal-dialog">';
           print '    <div class="modal-content">';
           print '      <div class="modal-header">';
           print '        <h5 class="modal-title" id="exampleModalLabel">Informação</h5>';
           print '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
           print '      </div>';
           print '      <div class="modal-body">';
           print '        <div class="alert alert-warning" role="alert">';
           print $mensagem;
           print '        </div>';
           print '      </div>';
           print '      <div class="modal-footer">';
           print '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>';
           print '      </div>';
           print '    </div>';
           print '  </div>';
           print '</div>';
   
           //JS
           print '<script>';
           print '    document.addEventListener("DOMContentLoaded", function() {';
           print '    var myModal = new bootstrap.Modal(document.getElementById("mensagem"));';
           print '    myModal.show();});';
           print '</script>';
   
       }
  

    

}

