<?php
include('configbd.php');
$nombre = $_REQUEST['nombre'];
$correo = $_REQUEST['correo'];
$pass= $_REQUEST['pass'];
$rol= $_REQUEST['rol'];
$estatus= $_REQUEST['estatus'];


$QueryInsert = ("INSERT INTO usuarios(
    nombre,
    correo,
    pass,
    rol,
    estatus
)
VALUES (
    '".$nombre. "',
    '".$correo. "',
    '".$pass. "',
    '".$rol. "',
    '".$estatus."'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:usuarios.php");
?>
