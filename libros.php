<?php
    require_once('class.db.php');
    
    class libro {
        private $con;
        private $id;
        private $titulo;
        private $autor;
        private $dispon;

        public function __construct(int $i = 0, String $tit = "", String $aut = "", bool $dis = true) {
            $this->con = new db();
            $this->id = $i;
            $this->titulo = $tit;
            $this->autor = $aut;
            $this->dispon = $dis;
        }
        
        public function obtenerLibros() {
            $sentencia = "SELECT * FROM libros";
            $consulta = $this->con->getCon()->prepare($sentencia);
            $consulta->execute();
            
            // Vincula los resultados a las propiedades del objeto o variables
            $consulta->bind_result($this->id, $this->titulo, $this->autor, $this->dispon);

            $libros = array(); // Array para almacenar los libros
            
            while ($consulta->fetch()) {
                // Crear un array asociativo para cada libro
                $libro = array(
                    "id" => $this->id,
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
