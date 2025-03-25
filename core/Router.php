<?php
class Router {
    public static function route() {
        require_once "../config/config.php";

        $url = isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : ['home'];
        $controller = ucfirst($url[0]) . "Controller";
        $method = isset($url[1]) ? $url[1] : 'index';

        if (file_exists("../app/controllers/$controller.php")) {
            require_once "../app/controllers/$controller.php";
            $controllerInstance = new $controller();

            if (method_exists($controllerInstance, $method)) {
                call_user_func_array([$controllerInstance, $method], array_slice($url, 2));
            } else {
                self::error404();
            }
        } else {
            self::error404();
        }
    }

    private static function error404() {
        http_response_code(404);
        echo "Página não encontrada!";
        exit();
    }
}
?>
