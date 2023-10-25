<?php
include('configbd.php');
$nombre_ubicacion = $_REQUEST['nombre_ubicacion'];
$descripcion = $_REQUEST['descripcion'];



$QueryInsert = ("INSERT INTO ubicacion(
    id_ubicacion,
    nombre_ubicacion,
    descripcion
)
VALUES (
    null,
    '".$nombre_ubicacion. "',
    '".$descripcion. "'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:ubicacion.php");
?>
