<?php
require_once './models/alumnomodel.php';
class consultaModel extends Model {
    function __construct()
    {
        parent::__construct();
    }

    function get() {
        $data = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM alumnos');
            while($row = $query->fetch()) {
                $item = new alumnoModel();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
                array_push($data, $item);
            }
            return $data;
        } catch(PDOException $e){
            return [];
        }
    }

    function getByID($id) {
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM alumnos WHERE matricula = :matricula');
            $query->execute(['matricula' => $id]);
            $item = new alumnoModel();
            $data = $query->fetch();
            if($data) {
                $item->matricula = $data['matricula'];
                $item->nombre = $data['nombre'];
                $item->apellido = $data['apellido'];
                return $item;
            } else {
                return null;
            }
            return $item;
        } catch(PDOException $e) {
            return null;
        }
    }

    function update($data) {
        try {
            $query = $this->db->connect()->prepare('UPDATE alumnos SET nombre = :nombre, apellido = :apellido WHERE matricula = :matricula');
            $query->execute(['nombre' => $data['nombre'], 'apellido' => $data['apellido'], 'matricula' => $data['matricula']]);
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function delete($id) {
        try {
            $query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE matricula = :matricula');
            $query->execute(['matricula' => $id]);
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>