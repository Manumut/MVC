<?php

require_once('../class.db.php');
class alumno {
    public $con;
    private $id;
    private $dni;
    private $nombre;

    public function __construct(int $id=0, String $dni="", String $nombre="") {
        $this->con = new db();
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
    }

    public function alumnos() { // Funcion para obtener los alumnos  antes obtenerAlumnos
        $consulta = "SELECT * FROM alumnos";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->execute();
        $sentencia->bind_result($this->id, $this->dni, $this->nombre); // Asociar las columnas a las propiedades
        
        $alumnos = array();
        while ($sentencia->fetch()) {
            $alumnos[] = array( // Crear un array asociativo para cada alumno
                "id" => $this->id,
                "dni" => $this->dni,
                "nombre" => $this->nombre
            );
        }
        return $alumnos;
    }

    public function obtenerAlumnos() { // Funcion para obtener los alumnos  antes obtenerAlumnos
        $consulta = "SELECT * FROM alumno";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->bind_result($this->id, $this->dni, $this->nombre); // Asociar las columnas a las propiedades
        $sentencia->execute();
        
        $alumnos = array();
        while ($sentencia->fetch()) {
            $alumnos[] = array( // Crear un array asociativo para cada alumno
                "id" => $this->id,
                "dni" => $this->dni,
                "nombre" => $this->nombre
            );
        }
        return $alumnos;
    }

}
