<?php
require 'configbd2.php';

// Obtener los valores del formulario (de inventario_bodega)
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$entrada = $conn->real_escape_string($_POST['entradab']);
// Otros campos de inventario_bodega que puedas necesitar (DIAS SE LA SEMANA)

// Obtener en principio para la columna total y actual el valor de entrada
$total = $entrada;
$actual = $entrada;

// Preparar la consulta SQL para insertar en inventario_bodega
$sqlEntrada = "INSERT INTO inventario_bodega 
        (idcategoria_bodega, idproducto_bodega, idum_bodega, entrada_bodega, 
        total, actual, fecha) 
        VALUES 
        ($categoria, $producto, $medida, '$entrada', '$total', '$actual', NOW())";

// Ejecutar la consulta
if ($conn->query($sqlEntrada)) {
    // Obtener el ID del último registro insertado
    $idbodega_entrada = $conn->insert_id;
    echo "Datos guardados correctamente. ID de entrada: $idbodega_entrada";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada bodega
header('Location: inventariogeneral.php');
?>
