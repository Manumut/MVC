<?php

require_once('../class.db.php');

class aluasig{
    private $con;
    private $nota;
    private $idAlumno;
    private $idAsignatura;
    public function __construct(float $n=0, int $idal=0, int $idasi=0){
        $this->con = new db();
        $this->nota = $n;
        $this->idAlumno = $idal;
        $this->idAsignatura = $idasi;
    }
    public function datos ($idAlumno){ // Obtener datos de la base de datos antes obtenerDatos
        $asi = "";
        $mod = "";
        $cur = "";
        $nota = 0; 
        
        
        $consulta = "SELECT nota, nombre, modulo, curso FROM alu_asig, asignaturas WHERE id_alum = $idAlumno AND id_asig = id";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->execute();
        $sentencia->bind_result($nota , $asi, $mod, $cur);
        
        $calif = array(); // Array para almacenar las calificaciones antes alumnoCalificaciones
        while ($sentencia->fetch()) {
            if ($nota === null) { // Verificar si nota es null
                $nota = 0;
            }
            $calif[] = array(
                "nota" => $nota,
                "asignatura" => $asi,
                "modulo" => $mod,
                "curso" => $cur
            );
        }
        $sentencia->close(); // Cerrar la sentencia para liberar recursos
        return $calif;
    }
}

?>