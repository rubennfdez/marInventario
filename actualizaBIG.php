<?php
require 'configbd2.php';

// Obtener los valores del formulario
$id = $conn->real_escape_string($_POST['id']);
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$entrada_bodega = $conn->real_escape_string($_POST['entrada_bodega']);
$e_lunes = $conn->real_escape_string($_POST['e_lunes']);
$s_lunes = $conn->real_escape_string($_POST['s_lunes']);
$e_martes = $conn->real_escape_string($_POST['e_martes']);
$s_martes = $conn->real_escape_string($_POST['s_martes']);
$e_miercoles = $conn->real_escape_string($_POST['e_miercoles']);
$s_miercoles = $conn->real_escape_string($_POST['s_miercoles']);
$e_jueves = $conn->real_escape_string($_POST['e_jueves']);
$s_jueves = $conn->real_escape_string($_POST['s_jueves']);
$e_viernes = $conn->real_escape_string($_POST['e_viernes']);
$s_viernes = $conn->real_escape_string($_POST['s_viernes']);
$e_sabado = $conn->real_escape_string($_POST['e_sabado']);
$s_sabado = $conn->real_escape_string($_POST['s_sabado']);
$e_domingo = $conn->real_escape_string($_POST['e_domingo']);
$s_domingo = $conn->real_escape_string($_POST['s_domingo']);

// Calcular el total sumando las entradas de cada día
$total = $entrada_bodega + $e_lunes + $e_martes + $e_miercoles + $e_jueves + $e_viernes + $e_sabado + $e_domingo;
$actual = $total - $s_lunes - $s_martes - $s_miercoles - $s_jueves - $s_viernes - $s_sabado - $s_domingo;
// Preparar la consulta SQL
$sql = "UPDATE inventario_bodega SET 
        idcategoria_bodega = '$categoria', 
        idproducto_bodega = '$producto',
        idum_bodega = '$medida', 
        entrada_bodega = '$entrada_bodega', 
        e_lunes = '$e_lunes', 
        s_lunes = '$s_lunes', 
        e_martes = '$e_martes', 
        s_martes = '$s_martes', 
        e_miercoles = '$e_miercoles',
        s_miercoles = '$s_miercoles',  
        e_jueves = '$e_jueves',
        s_jueves = '$s_jueves',  
        e_viernes = '$e_viernes',
        s_viernes = '$s_viernes',
        e_sabado = '$e_sabado',
        s_sabado = '$s_sabado',  
        e_domingo = '$e_domingo',
        s_domingo = '$s_domingo',  
        total = '$total',
        actual = '$actual' 
        WHERE idbodega_inventario = $id";

// Ejecutar la consulta para actualizar ENTRADA BODEGA
if ($conn->query($sql)) {
    echo "Datos actualizados correctamente.";
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada bodega
header('Location: inventariogeneral.php');
?>
