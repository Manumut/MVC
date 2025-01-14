<?php
    function modificar(){
        require_once("modelo.php");
        if (isset($_POST["borrar"])) {
            
        }else if (isset($_POST["modificar"])) {
            # code...
        }else if (isset($_POST["añadir"])) {
            # code...
        }
    }

    if(isset($_REQUEST["action"])){ // Si se ha pulsado un boton
        $action = $_REQUEST["action"]; // Creamos la variable de accion

        $action(); // Ejecutamos la accion
    }else{
        require_once('libros.php');
        $lib = new libro();
        $libros = $lib->obtenerLibros();  // Aquí obtenemos el array de libros
        
        require_once('comienzo.php');
    }
    
?>