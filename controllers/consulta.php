<?php
class Consulta extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function render() {
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function verAlumno($params) {
        $matricula = $params[0];
        $user = $this->model->getById($matricula);
        if($user) {
            $this->view->alumno = $user;
            session_start();
            $_SESSION['id_verAlumno'] = $user->matricula;
            $this->view->render('consulta/detalle');
        } else {
            $this->view->render('consulta/noUserFound');
        }
    }

    function actualizarAlumno() {
        session_start();
        $matricula = $_SESSION['id_verAlumno'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        unset($_SESSION['id_verAlumno']);
        
        if($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            $user = new alumnoModel();
            $user->matricula = $matricula;
            $user->nombre = $nombre;
            $user->apellido = $apellido;
            $this->view->alumno = $user;
            $this->view->message = 'Alumno actualizado correctamente !';
        } else {
            $this->view->message = 'No se pudo actualizar el alumno :(';
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($params) {
        $matricula = $params[0];
        if($this->model->delete($matricula)) {
            $this->view->message = 'Alumno eliminado correctamente';
        } else {
            $this->view->message = 'Error al eliminar el alumno';
        }
        $this->render();
    }
}


?>