<?php

require_once('cabecera.html');
require_once('class.db.php');

class libros{
    public $titulo;
    public $autor;
    public $estado;

    public function __construct($titulo, $autor, $estado){
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->estado = $estado;
    }

    public function mostrarLibro(){
        $sentencia = "SELECT * FROM libros"; // Creamos la sentencia
        $consulta = $this->conn->prepare($sentencia); // Creamos la consulta
        $consulta->bind_param("ss", $nom, $psw); // Creamos los parametros
        $consulta->bind_result($count); // Creamos el resultado

        $consulta->execute(); // Ejecutamos la consulta
        $consulta->fetch(); // Obtenemos el resultado

        $existe = false; // Variable para comprobar si el usuario existe

        if($count == 1) $existe = true; // Si el usuario existe

        $consulta->close(); // Cerramos la consulta
        return $existe; // Devolvemos el valor de la variable
    }

}

?>