<?php
    function ajuste(){
        require_once("modelo.php");

        if (isset($_POST["borrar"])) {
            if (isset($_POST["libros"])) {
                $libros = $_POST["libros"];
                foreach ($libros as $libro) {
                    if (function_exists('borrar')) {
                        borrar($libro); // Asegúrate de que esta función esté definida en modelo.php
                    } else {
                        die("Error: La función 'borrar()' no está definida.");
                    }
                }
            }
            
        } else if (isset($_POST["modificar"])) {
            if (isset($_POST["libros"])) {
                $libros = $_POST["libros"];
                if(count($libros) == 1) {
                    $libro = $libros[0];
                    modificar($libro);  // Asegúrate de que la función modificar esté definida en modelo.php
                }
            }
        } else if (isset($_POST["añadir"])) {
            if (isset($_POST["libros"])) { 
                // Eliminar espacios
                if(trim($_POST["libros"]) == "") {
                    require_once('libros.php');
                    $lib = new libro();
                    $libros = $lib->obtenerLibros();  // Aquí obtenemos el array de libros
                    require_once('inicio.php');
                } else {
                    $newTitulo = $_POST["libros"];
                    $newAutor = $_POST["autor"];
                    $newDisp = $_POST["disponible"];

                    require_once("modelo.php");
                    // Lógica para añadir el nuevo libro (agregar función añadir() si es necesario)
                }
            }
        }
    }

    function editar(){
        if(isset($_POST["titulo"])){
            require_once('libros.php');
        } else {
            require_once('libros.php');
            $lib = new libro();
            $libros = $lib->obtenerLibros();  // Aquí obtenemos el array de libros
            require_once('inicio.php');
        }
    }

    if(isset($_REQUEST["action"])){ // Si se ha pulsado un botón
        $action = $_REQUEST["action"]; // Creamos la variable de acción
        $action(); // Ejecutamos la acción
    } else {
        require_once('libros.php');
        $lib = new libro();
        $libros = $lib->obtenerLibros();  // Aquí obtenemos el array de libros
        
        require_once('comienzo.php');
    }
?>
