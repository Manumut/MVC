<?php
    
    function mostrarCalificacionesAlumnos($idAlumno, $aluNom = "", $aluDni = "") {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        require_once('class.aluasig.php');
        $aluasig = new aluasig();
        $aluCalificaciones = $aluasig->obtenerDatos($idAlumno);
        require_once('calificar.php');
    }

    function mostrarCalificar() {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        require_once('calificar.php');
    }

    function mostrarExpedientes() {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        require_once('expedientes.php');
    }

    





    
    if(isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
        $action();
    }else{
        require_once('mostrar.html');
    }
?>