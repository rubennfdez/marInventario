<?php

require 'configbd2.php';

$id = $conn->real_escape_string($_POST['idcocina_entrada']);
$sql = "SELECT idcocina_entrada, id_categoria_cocina, id_producto_cocina, id_unidadm_cocina, 
        inicial_cocina, lunes, martes, miercoles, jueves, viernes, sabado, domingo 
        FROM entrada_cocina
        WHERE idcocina_entrada=$id LIMIT 1";

$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$entcocina = [];

if ($rows > 0) {
    $entcocina = $resultado->fetch_assoc(); // Cambio fetch_array a fetch_assoc
}

echo json_encode($entcocina, JSON_UNESCAPED_UNICODE);

?>
