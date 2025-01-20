<?php
require_once('../../../../../cred.php');
    class db{ // Clase db
        private $con; // Variable de conexion
        public function __construct(){ // Constructor
            $this->con = new mysqli("Localhost", USUARIO_CON, PSW_CON, "biblioteca"); // Creamos la conexion
        }
         // Método para obtener la conexión mysqli
         public function getCon() {
            return $this->con;
        }
    };
?>