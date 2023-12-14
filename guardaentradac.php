<?php

require 'configbd2.php';

// Obtener los valores del formulario
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$inicialec = $conn->real_escape_string($_POST['inicialentradac']);
/*$lunes = $conn->real_escape_string($_POST['lunes']);
$martes = $conn->real_escape_string($_POST['martes']);
$miercoles = $conn->real_escape_string($_POST['miercoles']);
$jueves = $conn->real_escape_string($_POST['jueves']);
$viernes = $conn->real_escape_string($_POST['viernes']);
$sabado = $conn->real_escape_string($_POST['sabado']);
$domingo = $conn->real_escape_string($_POST['domingo']);*/

// Agrega este código para depuración
var_dump($_POST);

// Calcular el total conforme al valor inicial al momento de agregar datos
$total = $inicialec;

// Preparar la consulta SQL
$sql = "INSERT INTO entrada_cocina
        (id_categoria_cocina, id_producto_cocina, id_unidadm_cocina, inicial_cocina, 
        total) 
        VALUES 
        ($categoria, $producto, $medida, '$inicialec', '$total')";

// Ejecutar la consulta
if ($conn->query($sql)) {
    // Obtener el ID del último registro insertado
    $idcocina_entrada = $conn->insert_id;
    echo "Datos guardados correctamente. ID de salida: $idcocina_entrada";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de salida bodega
header('Location: entradacocina.php');
?>
