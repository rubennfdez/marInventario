<?php

require 'configbd2.php';

$id = $conn->real_escape_string($_POST['idbodega_salida']);
$sql = "SELECT idbodega_salida, id_categoria_sbodega, id_producto_sbodega, id_unidadm_sbodega, 
        inicial, lunes, martes, miercoles, jueves, viernes, sabado, domingo 
        FROM salida_bodega
        WHERE idbodega_salida=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$salbodega = [];

if ($rows > 0) {
    $salbodega = $resultado->fetch_assoc(); // Cambio fetch_array a fetch_assoc
}

echo json_encode($salbodega, JSON_UNESCAPED_UNICODE);

?>
