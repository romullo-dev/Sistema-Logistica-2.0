<?php
require_once "Controller.php";
require_once "../app/models/Usuario.php";

class UsuarioController extends Controller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $usuarios = $this->usuarioModel->getUsuarios();
        $this->view('usuario', ['usuarios' => $usuarios]);
    }
}
?>
