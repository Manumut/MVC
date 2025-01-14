<?php
    require_once('class.db.php');
    class libro{
        private $con;
        private $id;
        private $titulo;
        private $autor;
        private $dispon;

        public function __construct(int $i = 0, String $tit = "", String $aut = "", bool $dis = true){
            $this->con = new db();
            $this->id = $i;
            $this->titulo = $tit;
            $this->autor = $aut;
            $this->dispon = $dis;
        }
        
        public function obtenerLibros(){
            $sentencia = "SELECT * FROM libros";
            $consulta = $this->con->getCon()->prepare($sentencia);
            // $consulta->bind_param("ss", $nom, $psw); // Creamos los parametros
            $consulta->execute();
            $consulta->bind_result($this->titulo, $this->autor, $this->dispon);

            $libros = array(); // Array para almacenar los libros
            while ($consulta->fetch()) {
                // Crear un array asociativo para cada libro
                $libro = array(
                    "titulo" => $this->titulo,
                    "autor" => $this->autor,
                    "dispon" => $this->dispon
                );

                // Añadir el libro al array de libros
                $libros[] = $libro;
            }

            return $libros;
        }
    }
?>


