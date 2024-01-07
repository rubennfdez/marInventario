<?php

require 'configbd2.php';

$id = $conn->real_escape_string($_POST['idcocina_inventario']);
$sql = "SELECT idcocina_inventario, idcategoria_cocina, idproducto_cocina, idum_cocina, 
        inicial_cocina, ec_lunes, sc_lunes, ec_martes, sc_martes, ec_miercoles, sc_miercoles, ec_jueves, 
        sc_jueves, ec_viernes, sc_viernes, ec_sabado, sc_sabado, ec_domingo, sc_domingo 
        FROM inventario_cocina
        WHERE idcocina_inventario=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$entrcocina = [];

if ($rows > 0) {
    $entrcocina = $resultado->fetch_assoc(); // Cambio fetch_array a fetch_assoc
}

echo json_encode($entrcocina, JSON_UNESCAPED_UNICODE);

?>
