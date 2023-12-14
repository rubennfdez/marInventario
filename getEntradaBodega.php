<?php

require 'configbd2.php';

$id = $conn->real_escape_string($_POST['idbodega_entrada']);
$sql = "SELECT idbodega_entrada, id_categoria_bodega, id_producto_bodega, id_unidadm_bodega, 
        numentrada_bodega, lunes, martes, miercoles, jueves, viernes, sabado, domingo 
        FROM entrada_bodega
        WHERE idbodega_entrada=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$entrbodega = [];

if ($rows > 0) {
    $entrbodega = $resultado->fetch_assoc(); // Cambio fetch_array a fetch_assoc
}

echo json_encode($entrbodega, JSON_UNESCAPED_UNICODE);

?>
