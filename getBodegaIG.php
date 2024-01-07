<?php

require 'configbd2.php';

$id = $conn->real_escape_string($_POST['idbodega_inventario']);
$sql = "SELECT idbodega_inventario, idcategoria_bodega, idproducto_bodega, idum_bodega, 
        entrada_bodega, e_lunes, s_lunes, e_martes, s_martes, e_miercoles, s_miercoles, e_jueves, s_jueves, 
        e_viernes, s_viernes, e_sabado, s_sabado, e_domingo, s_domingo 
        FROM inventario_bodega
        WHERE idbodega_inventario=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$entrbodega = [];

if ($rows > 0) {
    $entrbodega = $resultado->fetch_assoc(); // Cambio fetch_array a fetch_assoc
}

echo json_encode($entrbodega, JSON_UNESCAPED_UNICODE);

?>
