<?php
    class db{ // Clase db
        private $conn; // Variable de conexion
        
        public function __construct(){ // Constructor
            $this->conn = new mysqli("Localhost", USUARIO_CON, PSW_CON, "biblioteca"); // Creamos la conexion
        }
    }
?>