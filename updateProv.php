<?php
include('configbd.php');
$id_proveedor = $_REQUEST['id_proveedor'];
$nombre_prov = $_REQUEST['nombre_prov'];
$localizacion = $_REQUEST['localizacion'];
$telefono = $_REQUEST['telefono'];
$correo= $_REQUEST['correo'];

$update = "UPDATE proveedores
        SET nombre_prov ='".$nombre_prov."', 
        localizacion ='".$localizacion. "',
        telefono ='".$telefono. "',
	    correo ='".$correo. "'

WHERE id_proveedor='".$id_proveedor. "'";
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='proveedores.php';
    </script>";

?>
