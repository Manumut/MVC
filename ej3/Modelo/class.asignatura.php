<?php

require_once('../class.db.php');

class asignatura{
    private $conn;
    private $id;
    private $nombre;
    private $modulo;
    private $curso;

    public function __construct(int $id=0, String $nombre="", String $modulo="", String $curso="") {
        $this->conn = new db();
        $this->id = $id;
        $this->nombre = $nombre;
        $this->modulo = $modulo;
        $this->curso = $curso;
    }

    public function obtenerAsignaturas() { // Funcion para obtener las asignaturas
        $consulta = "SELECT * FROM asignaturas";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->execute();
        $sentencia->bind_result($this->id, $this->nombre, $this->modulo, $this->curso);
        
        $asignaturas = array();
        while ($sentencia->fetch()) {
            $asignaturas[] = array( // Crear un array asociativo para cada asignatura
                "id" => $this->id,
                "nombre" => $this->nombre,
                "modulo" => $this->modulo,
                "curso" => $this->curso
            );
        }
        return $asignaturas;
    }
}

?>