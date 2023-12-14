<?php

require 'configbd2.php';

// Obtener los valores del formulario
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$entrada = $conn->real_escape_string($_POST['entradab']);
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
$total = $entrada;

// Preparar la consulta SQL
$sql = "INSERT INTO entrada_bodega 
        (id_categoria_bodega, id_producto_bodega, id_unidadm_bodega, numentrada_bodega, 
        total) 
        VALUES 
        ($categoria, $producto, $medida, '$entrada', '$total')";

// Ejecutar la consulta
if ($conn->query($sql)) {
    // Obtener el ID del último registro insertado
    $idbodega_entrada = $conn->insert_id;
    echo "Datos guardados correctamente. ID de entrada: $idbodega_entrada";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada bodega
header('Location: entradabodega.php');
?>
