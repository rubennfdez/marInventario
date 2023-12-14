<?php
require 'configbd2.php';

// Obtener los valores del formulario
$id = $conn->real_escape_string($_POST['id']);
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$inicialSC= $conn->real_escape_string($_POST['inicialsalidac']);
$lunes = $conn->real_escape_string($_POST['lunes']);
$martes = $conn->real_escape_string($_POST['martes']);
$miercoles = $conn->real_escape_string($_POST['miercoles']);
$jueves = $conn->real_escape_string($_POST['jueves']);
$viernes = $conn->real_escape_string($_POST['viernes']);
$sabado = $conn->real_escape_string($_POST['sabado']);
$domingo = $conn->real_escape_string($_POST['domingo']);

// Calcular el actual restando los días de la semana
$actual = $inicialSC - $lunes - $martes - $miercoles - $jueves - $viernes - $sabado - $domingo;

// Preparar la consulta SQL
$sql = "UPDATE salida_cocina SET 
        id_categoria_scocina = '$categoria', 
        id_producto_scocina = '$producto',
        id_unidadm_scocina = '$medida', 
        inicial_scocina = '$inicialSC', 
        lunes = '$lunes', 
        martes = '$martes', 
        miercoles = '$miercoles', 
        jueves = '$jueves', 
        viernes = '$viernes',
        sabado = '$sabado', 
        domingo = '$domingo', 
        actual = '$actual' 
        WHERE idcocina_salida = $id";

// Ejecutar la consulta
if ($conn->query($sql)) {
    echo "Datos actualizados correctamente.";
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de salida bodega
header('Location: salidacocina.php');
?>
