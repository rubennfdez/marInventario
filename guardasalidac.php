<?php

require 'configbd2.php';

// Obtener los valores del formulario
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$inicialsc = $conn->real_escape_string($_POST['inicialsalidac']);
/*$lunes = $conn->real_escape_string($_POST['lunes']);
$martes = $conn->real_escape_string($_POST['martes']);
$miercoles = $conn->real_escape_string($_POST['miercoles']);
$jueves = $conn->real_escape_string($_POST['jueves']);
$viernes = $conn->real_escape_string($_POST['viernes']);
$sabado = $conn->real_escape_string($_POST['sabado']);
$domingo = $conn->real_escape_string($_POST['domingo']);*/

// Agrega este código para depuración
var_dump($_POST);

// Calcular el actual conforme al valor inicial al momento de agregar datos
$actual = $inicialsc;

// Preparar la consulta SQL
$sql = "INSERT INTO salida_cocina
        (id_categoria_scocina, id_producto_scocina, id_unidadm_scocina, inicial_scocina, 
        actual) 
        VALUES 
        ($categoria, $producto, $medida, '$inicialsc', '$actual')";

// Ejecutar la consulta
if ($conn->query($sql)) {
    // Obtener el ID del último registro insertado
    $idcocina_salida = $conn->insert_id;
    echo "Datos guardados correctamente. ID de salida: $idcocina_salida";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de salida bodega
header('Location: salidacocina.php');
?>
