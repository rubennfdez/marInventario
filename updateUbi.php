<?php
include('configbd.php');
$id_ubicacion = $_REQUEST['id_ubicacion'];
$nombre_ubicacion = $_REQUEST['nombre_ubicacion'];
$descripcion = $_REQUEST['descripcion'];


$update = "UPDATE ubicacion
        SET nombre_ubicacion ='".$nombre_ubicacion."', 
        descripcion ='".$descripcion. "'


WHERE id_ubicacion='".$id_ubicacion. "'";
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='ubicacion.php';
    </script>";

?>
