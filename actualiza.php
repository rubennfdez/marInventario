<?php
require 'configbd2.php';

// Obtener los valores del formulario
$id = $conn->real_escape_string($_POST['id']);
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$entrada = $conn->real_escape_string($_POST['entradab']);
$lunes = $conn->real_escape_string($_POST['lunes']);
$martes = $conn->real_escape_string($_POST['martes']);
$miercoles = $conn->real_escape_string($_POST['miercoles']);
$jueves = $conn->real_escape_string($_POST['jueves']);
$viernes = $conn->real_escape_string($_POST['viernes']);
$sabado = $conn->real_escape_string($_POST['sabado']);
$domingo = $conn->real_escape_string($_POST['domingo']);

// Calcular el total sumando las entradas de cada día
$total = $entrada + $lunes + $martes + $miercoles + $jueves + $viernes + $sabado + $domingo;

// Preparar la consulta SQL
$sql = "UPDATE entrada_bodega SET 
        id_categoria_bodega = '$categoria', 
        id_producto_bodega = '$producto',
        id_unidadm_bodega = '$medida', 
        numentrada_bodega = '$entrada', 
        lunes = '$lunes', 
        martes = '$martes', 
        miercoles = '$miercoles', 
        jueves = '$jueves', 
        viernes = '$viernes',
        sabado = '$sabado', 
        domingo = '$domingo', 
        total = '$total' 
        WHERE idbodega_entrada = $id";

// Ejecutar la consulta
if ($conn->query($sql)) {
    echo "Datos actualizados correctamente.";
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada bodega
header('Location: entradabodega.php');
?>
