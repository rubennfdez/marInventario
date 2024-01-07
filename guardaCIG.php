<?php
require 'configbd2.php';

// Obtener los valores del formulario (de inventario_cocina)
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$inicial_cocina = $conn->real_escape_string($_POST['entradab']);
// Otros campos de inventario_cocina que puedas necesitar (DIAS SE LA SEMANA)

// Obtener en principio para la columna inicial y actual el valor de entrada
$total_cocina = $inicial_cocina;
$actual_cocina = $inicial_cocina;

// Preparar la consulta SQL para insertar en inventario_bodega
$sqlEntrada_Cocina = "INSERT INTO inventario_cocina
        (idcategoria_cocina, idproducto_cocina, idum_cocina,
        inicial_cocina, total_cocina, actual_cocina, fecha_cocina) 
        VALUES 
        ($categoria, $producto, $medida, '$inicial_cocina', '$total_cocina', '$actual_cocina', NOW())";

// Ejecutar la consulta
if ($conn->query($sqlEntrada_Cocina)) {
    // Obtener el ID del último registro insertado
    $idcocina_entrada = $conn->insert_id;
    echo "Datos guardados correctamente. ID de entrada: $idcocina_entrada";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada cocina
header('Location: inventariogeneral.php');
?>
