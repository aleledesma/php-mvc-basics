<?php
class Nuevo extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function render() {
        $this->view->render('nuevo/index');
    }

    function nuevoUsuario() {
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        //validaciones de datos... (por fines prpacticos me salto este paso)
        if($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            $this->view->message = 'alumno insertado!';
        } else {
            $this->view->message = 'error al insertar alumno!';
        }

        $this->render();
    }
}
?>