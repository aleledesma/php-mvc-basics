<?php

class View {
    public $message;
    public $alumnos;
    public $alumno;
    function render($nombre)
    {
        require './views/' . $nombre . '.php';
    }
}

?>