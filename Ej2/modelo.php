<?php

// modelo.php

// Incluir el archivo de conexión
require_once('class.db.php');

/**
 * Modifica un libro en la base de datos.
 * @param array $libro Datos del libro (deben incluir 'titulo', 'autor', 'disponible', 'id').
 */
function modificar($libro) {
    // Crear la conexión a la base de datos
    $db = new db();
    $con = $db->getCon(); // Obtener la conexión

    // Verificar si la conexión es exitosa
    if ($con->connect_error) {
        die("Error de conexión: " . $con->connect_error);
    }

    // Preparar la consulta SQL
    $sentencia = "UPDATE libros SET titulo = ?, autor = ?, disponible = ? WHERE id = ?";
    $consulta = $con->prepare($sentencia);

    if ($consulta) {
        // Vincular los parámetros
        $consulta->bind_param("sssi", $libro['titulo'], $libro['autor'], $libro['disponible'], $libro['id']);

        // Ejecutar la consulta
        $consulta->execute();

        // Verificar si la ejecución fue exitosa
        if ($consulta->affected_rows > 0) {
            echo "Libro modificado correctamente.";
        } else {
            echo "No se encontró el libro con el ID proporcionado o no hubo cambios.";
        }

        $consulta->close(); // Cerrar el statement
    } else {
        echo "Error al preparar la consulta: " . $con->error;
    }

    $con->close(); // Cerrar la conexión
}

/**
 * Elimina un libro de la base de datos.
 * @param int $id ID del libro a eliminar.
 */
function borrar($id) {
    // Crear la conexión a la base de datos
    $db = new db();
    $con = $db->getCon(); // Obtener la conexión

    // Verificar si la conexión es exitosa
    if ($con->connect_error) {
        die("Error de conexión: " . $con->connect_error);
    }

    // Preparar la consulta SQL
    $sql = "DELETE FROM libros WHERE id = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Vincular el parámetro
        $stmt->bind_param("i", $id);

        // Ejecutar la consulta
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Libro eliminado correctamente.";
        } else {
            echo "No se encontró el libro con el ID proporcionado.";
        }

        $stmt->close(); // Cerrar el statement
    } else {
        echo "Error al preparar la consulta: " . $con->error;
    }

    $con->close(); // Cerrar la conexión
}
?>
