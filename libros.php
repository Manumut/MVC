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
}

?>