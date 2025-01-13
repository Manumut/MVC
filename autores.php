<?php

require_once('cabecera.html');
require_once('class.db.php');

class autores{
    public $nombre;

    public function __construct($nombre){
        $this->nombre = $nombre;
    }
}
?>