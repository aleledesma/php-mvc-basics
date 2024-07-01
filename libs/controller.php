<?php

class Controller {
    public $view;
    public $model;
    function __construct()
    {
        $this->view = new View();
    }

    function loadModel($modelo) {
        $url = './models/' . $modelo . 'model.php';
        if(file_exists($url)) {
            require $url;
            $nombreModelo = $modelo . 'Model';
            $this->model = new $nombreModelo();
        }
    }
}

?>