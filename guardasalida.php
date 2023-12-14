<?php

require 'configbd2.php';

// Obtener los valores del formulario
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$inicial = $conn->real_escape_string($_POST['inicialb']);
/*$lunes = $conn->real_escape_string($_POST['lunes']);
$martes = $conn->real_escape_string($_POST['martes']);
$miercoles = $conn->real_escape_string($_POST['miercoles']);
$jueves = $conn->real_escape_string($_POST['jueves']);
$viernes = $conn->real_escape_string($_POST['viernes']);
$sabado = $conn->real_escape_string($_POST['sabado']);
$domingo = $conn->real_escape_string($_POST['domingo']);*/

// Agrega este código para depuración
var_dump($_POST);

// Calcular el total sumando las entradas de cada día
$actual = $inicial;

// Preparar la consulta SQL
$sql = "INSERT INTO salida_bodega 
        (id_categoria_sbodega, id_producto_sbodega, id_unidadm_sbodega, inicial, 
        actual) 
        VALUES 
        ($categoria, $producto, $medida, '$inicial', '$actual')";

// Ejecutar la consulta
if ($conn->query($sql)) {
    // Obtener el ID del último registro insertado
    $idbodega_salida = $conn->insert_id;
    echo "Datos guardados correctamente. ID de salida: $idbodega_salida";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de salida bodega
header('Location: salidabodega.php');
?>
