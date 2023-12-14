<?php

require 'configbd2.php';

$id = $conn->real_escape_string($_POST['idcocina_salida']);
$sql = "SELECT idcocina_salida, id_categoria_scocina, id_producto_scocina, id_unidadm_scocina, 
        inicial_scocina, lunes, martes, miercoles, jueves, viernes, sabado, domingo 
        FROM salida_cocina
        WHERE idcocina_salida=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$salcocina = [];

if ($rows > 0) {
    $salcocina = $resultado->fetch_assoc(); // Cambio fetch_array a fetch_assoc
}

echo json_encode($salcocina, JSON_UNESCAPED_UNICODE);

?>
