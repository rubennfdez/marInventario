<?php
require 'configbd2.php';

// Obtener los valores del formulario
$id = $conn->real_escape_string($_POST['id']);
$categoria = $conn->real_escape_string($_POST['categoria']);
$producto = $conn->real_escape_string($_POST['producto']);
$medida = $conn->real_escape_string($_POST['medida']);
$inicial_cocina = $conn->real_escape_string($_POST['inicial_cocina']);
$ec_lunes = $conn->real_escape_string($_POST['ec_lunes']);
$sc_lunes = $conn->real_escape_string($_POST['sc_lunes']);
$ec_martes = $conn->real_escape_string($_POST['ec_martes']);
$sc_martes = $conn->real_escape_string($_POST['sc_martes']);
$ec_miercoles = $conn->real_escape_string($_POST['ec_miercoles']);
$sc_miercoles = $conn->real_escape_string($_POST['sc_miercoles']);
$ec_jueves = $conn->real_escape_string($_POST['ec_jueves']);
$sc_jueves = $conn->real_escape_string($_POST['sc_jueves']);
$ec_viernes = $conn->real_escape_string($_POST['ec_viernes']);
$sc_viernes = $conn->real_escape_string($_POST['sc_viernes']);
$ec_sabado = $conn->real_escape_string($_POST['ec_sabado']);
$sc_sabado = $conn->real_escape_string($_POST['sc_sabado']);
$ec_domingo = $conn->real_escape_string($_POST['ec_domingo']);
$sc_domingo = $conn->real_escape_string($_POST['sc_domingo']);

// Calcular el total sumando las entradas de cada día
$total_cocina = $inicial_cocina + $ec_lunes + $ec_martes + $ec_miercoles + $ec_jueves + $ec_viernes + $ec_sabado + $ec_domingo;

// Calcular el actual restando las salidas de cada día con lo inicial en producto.
$actual_cocina = $total_cocina - $sc_lunes - $sc_martes - $sc_miercoles - $sc_jueves - $sc_viernes - $sc_sabado - $sc_domingo;
// Preparar la consulta SQL
$sql = "UPDATE inventario_cocina SET 
        idcategoria_cocina = '$categoria', 
        idproducto_cocina = '$producto',
        idum_cocina = '$medida', 
        inicial_cocina = '$inicial_cocina', 
        ec_lunes = '$ec_lunes', 
        sc_lunes = '$sc_lunes', 
        ec_martes = '$ec_martes', 
        sc_martes = '$sc_martes', 
        ec_miercoles = '$ec_miercoles',
        sc_miercoles = '$sc_miercoles',  
        ec_jueves = '$ec_jueves',
        sc_jueves = '$sc_jueves',  
        ec_viernes = '$ec_viernes',
        sc_viernes = '$sc_viernes',
        ec_sabado = '$ec_sabado',
        sc_sabado = '$sc_sabado',  
        ec_domingo = '$ec_domingo',
        sc_domingo = '$sc_domingo',  
        total_cocina = '$total_cocina',
        actual_cocina = '$actual_cocina' 
        WHERE idcocina_inventario = $id";

// Ejecutar la consulta para actualizar ENTRADAS Y SALIDAS EN COCINA
if ($conn->query($sql)) {
    echo "Datos actualizados correctamente.";
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a la página de INVENTARIO GENERAL
header('Location: inventariogeneral.php');
?>
