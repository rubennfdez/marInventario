<?php
require 'configbd2.php';

// Obtener los valores del formulario (de entrada_bodega)
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$entrada = $conn->real_escape_string($_POST['entradab']);
// Otros campos de entrada_bodega que puedas necesitar (DIAS SE LA SEMANA)

// Calcular el total sumando las entradas de cada día (de entrada_bodega)
$total = $entrada;

// Preparar la consulta SQL para insertar en entrada_bodega
$sqlEntrada = "INSERT INTO entrada_bodega 
        (id_categoria_bodega, id_producto_bodega, id_unidadm_bodega, numentrada_bodega, 
        total) 
        VALUES 
        ($categoria, $producto, $medida, '$entrada', '$total')";

// Ejecutar la consulta para insertar en entrada_bodega
if ($conn->query($sqlEntrada)) {
    // Obtener el ID del último registro insertado en entrada_bodega
    $idEntradaBodega = $conn->insert_id;

    // Aquí empieza la inserción en salida_bodega
    // Reemplaza 'columna1', 'columna2', 'columna3' con los nombres reales de las columnas en salida_bodega
    // Y reemplaza $valor_col1, $valor_col2, $valor_col3 con los valores correspondientes de entrada_bodega

    // Ejemplo:
    $sqlSalida = "INSERT INTO salida_bodega 
            (id_categoria_sbodega, id_producto_sbodega, id_unidadm_sbodega, inicial, actual) 
            VALUES 
            ($categoria, $producto, $medida, '$total', '$total')";

    // Ejecutar la consulta para insertar en salida_bodega
    if ($conn->query($sqlSalida)) {
        // Obtener el ID del último registro insertado en salida_bodega
        $idSalidaBodega = $conn->insert_id;
        echo "Datos guardados correctamente. ID de entrada: $idEntradaBodega, ID de salida: $idSalidaBodega";
    } else {
        echo "Error al guardar los datos en salida_bodega: " . $conn->error;
    }
} else {
    echo "Error al guardar los datos en entrada_bodega: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de entrada bodega
header('Location: entradabodega.php');
?>
