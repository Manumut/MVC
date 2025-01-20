<?php

    require_once('../Modelo/class.alum.php');
    require_once('../Modelo/class.asignatura.php');
    require_once('../Modelo/class.alumasig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <main >
        <h1>Bienvenid@</h1>
        <form class="formInicio" action="index.php?action=opcion" method="post">
            <input type="submit" name="nota" value="CALIFICAR">
            <input type="submit" name="exp" value="EXPEDIENTES">
        </form>
    </main>
</body>
</html>