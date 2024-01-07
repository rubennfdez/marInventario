<?php
require 'configbd2.php';

// Obtener los valores antiguos de la tabla "entrada bodega"
$id = $conn->real_escape_string($_POST['id']);
$sql_old_values_entrada = "SELECT numentrada_bodega, lunes, martes, miercoles, jueves, viernes, sabado, domingo FROM entrada_bodega WHERE idbodega_entrada = $id";
$result_old_values_entrada = $conn->query($sql_old_values_entrada);
$old_values_entrada = $result_old_values_entrada->fetch_assoc();

// Obtener valores antiguos de la tabla "salida bodega"
$sql_old_values_salida = "SELECT inicial FROM salida_bodega WHERE idbodega_salida = $id";
$result_old_values_salida = $conn->query($sql_old_values_salida);
$old_values_salida = $result_old_values_salida->fetch_assoc();

// Obtener los valores del formulario
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

// Calcular el nuevo valor para la columna "Total"
$new_total = $entrada + $lunes + $martes + $miercoles + $jueves + $viernes + $sabado + $domingo;

// Calcular el nuevo valor para la columna "actual" en "salida bodega"
$new_actual_salida = $old_values_salida['inicial'] + $new_total - ($old_values_entrada['numentrada_bodega'] + $old_values_entrada['lunes'] + $old_values_entrada['martes'] + $old_values_entrada['miercoles'] + $old_values_entrada['jueves'] + $old_values_entrada['viernes'] + $old_values_entrada['sabado'] + $old_values_entrada['domingo']);

// Actualizar la tabla entrada bodega
$sql_update_entrada = "UPDATE entrada_bodega SET 
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
        total = '$new_total' 
        WHERE idbodega_entrada = $id";

// Actualizar la tabla salida bodega
$sql_update_salida = "UPDATE salida_bodega SET
    categoria = '$categoria',
    producto = '$producto',
    um = '$medida',
    inicial = '$new_total',
    actual = '$new_actual_salida'
    WHERE idbodega_salida = $id";

// Ejecutar la consulta para actualizar ENTRADA BODEGA
if ($conn->query($sql_update_entrada)) {
    // Ejecutar la consulta de actualización en "salida bodega"
    if ($conn->query($sql_update_salida)) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos en salida bodega: " . $conn->error;
    }
} else {
    echo "Error al actualizar los datos en entrada bodega: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada bodega
header('Location: entradabodega.php');
?>
