<?php 
require_once './controllers/error.php';

class App {
    function __construct()
    {
       // echo '<p>Nueva APP creada!</p>';
        $url = isset($_GET['url']) ? $_GET['url'] : 'main';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $controllerPath = './controllers/' . $url[0] . '.php';
        if(file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            $numParams = sizeof($url);
            if($numParams > 1) {
                if($numParams > 2) {
                    $params = [];
                    for($i = 2; $i < $numParams; $i++) {
                        array_push($params, $url[$i]);
                    }
                    $controller->{$url[1]}($params);
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }
        } else {
            $controller = new ErrorController();
        }
    }
}

?>