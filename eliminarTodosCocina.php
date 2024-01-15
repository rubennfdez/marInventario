<?php
// Conexión a la base de datos
require 'configbd2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el nombre de la tabla desde la solicitud POST
    $tabla = $_POST['tabla'];

    // Validar el nombre de la tabla
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tabla)) {
        echo json_encode(array('success' => false, 'message' => 'Nombre de tabla no válido.'));
        exit;
    }

    // Consulta para eliminar todos los registros de la tabla especificada
    $sql = "DELETE FROM $tabla";

    // Ejecuta la consulta
    if ($conn->query($sql)) {
        echo json_encode(array('success' => true, 'message' => "Se eliminaron todos los registros de la tabla $tabla correctamente."));
    } else {
        echo json_encode(array('success' => false, 'message' => "Error al eliminar los registros: " . $conn->error));
    }
} else {
    // Si la solicitud no es POST, muestra un mensaje de error
    echo json_encode(array('success' => false, 'message' => 'Error: Método de solicitud no válido.'));
}
?>
