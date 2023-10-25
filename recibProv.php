<?php
include('configbd.php');
$nombre_prov = $_REQUEST['nombre_prov'];
$localizacion = $_REQUEST['localizacion'];
$telefono= $_REQUEST['telefono'];
$correo= $_REQUEST['correo'];


$QueryInsert = ("INSERT INTO proveedores(
    nombre_prov,
    localizacion,
    telefono,
    correo
)
VALUES (
    '".$nombre_prov. "',
    '".$localizacion. "',
    '".$telefono. "',
    '".$correo."'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:proveedores.php");
?>
