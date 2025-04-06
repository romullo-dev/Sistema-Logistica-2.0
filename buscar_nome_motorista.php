<?php
require_once 'controllers/Controller.class.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
    $controller = new Controller();
    $controller->buscarPorCpf($cpf);
}
